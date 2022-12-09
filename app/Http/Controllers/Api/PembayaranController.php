<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function index(){
        $rekenings = Pembayaran::all();

        if($rekenings) {
            return response()->json([
                'success' => true,
                'message' => "Rekening berhasil diterima!",
                'rekening'    => $rekenings,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => "Rekening gagal ditambahkan!",
        ], 409);
    }

    public function create(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'peternak_id'      => 'required',
            'bank'      => 'required',
            'rekening'      => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create rekening
        $rekening = Pembayaran::create([
            'peternak_id'      => $request->peternak_id,
            'bank'      => $request->bank,
            'rekening'      => $request->rekening,
        ]);

        //return response JSON pembayaran is created
        if($rekening) {
            return response()->json([
                'success' => true,
                'message' => "Rekening berhasil ditambahkan!",
                'rekening'    => $rekening,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Rekening gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $pembayarans = Pembayaran::select('*')
                    ->where('peternak_id', $id)
                    ->with(['peternak'])
                    ->get();

        if($pembayarans){
            return response()->json([
                'success' => true,
                'message' => "List Pembayaran berhasil diterima!",
                'pembayaran'    => $pembayarans,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'List Pembayaran tidak ditemukan!'
        ], 409);
    }
}
