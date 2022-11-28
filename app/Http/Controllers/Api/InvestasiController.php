<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investasi;
use App\Models\Kandang;
use Illuminate\Support\Facades\Validator;

class InvestasiController extends Controller
{
    public function index(Request $request){
        $investasis = Investasi::where('user_id', $request->user()->id)
                        ->with(['user', 'kandang', 'pembayaran'])
                        ->get();

        if($investasis){
            return response()->json([
                'success' => true,
                'message' => "Investasi berhasil diterima!",
                'investasis'    => $investasis,  
                'user' => $request->user()
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Investasi tidak ada!'
        ], 409);
    }

    public function create(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'kandang_id' => 'required',
            'pembayaran_id' => 'required',
            'jumlah_unit' => 'required',
            'bukti_pembayaran' => 'required|image|file',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kandang = Kandang::where('id', $request->kandang_id)->first();

        if($kandang->unit_tersedia < $request->jumlah_unit){
            return response()->json([
                'success' => false,
                'message' => "Investasi gagal! Unit tidak mencukupi!",
            ], 409);
        }
        
        $total_harga = $request->jumlah_unit * $kandang->harga;
        $kandang->unit_tersedia -= $request->jumlah_unit;
        $kandang->terkumpul += $total_harga;

        if($kandang->terkumpul > $kandang->dibutuhkan){
            return response()->json([
                'success' => false,
                'message' => "Investasi gagal! Dana investasi lebih dari dana yang dibutuhkan!",
            ], 409);
        }

        $kandang->save();
        
        //create investasi
        $investasi = Investasi::create([
            'user_id' => $request->user_id,
            'kandang_id' => $request->kandang_id,
            'pembayaran_id' => $request->pembayaran_id,
            'jumlah_unit' => $request->jumlah_unit,
            'bukti_pembayaran' => $request->file('bukti_pembayaran')->store('bukti_pembayaran'),
            'total_harga' => $total_harga,
        ]);

        //return response JSON investasi is created
        if($investasi) {
            return response()->json([
                'success' => true,
                'message' => "Investasi berhasil!",
                'investasi'    => $investasi, 
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Investasi gagal!",
        ], 409);
    }
}
