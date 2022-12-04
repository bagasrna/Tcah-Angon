<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kandang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KandangController extends Controller
{
    public function index(){
        $kandangs = Kandang::select('*')
                    ->with(['peternak'])
                    ->get();

        if($kandangs){
            return response()->json([
                'success' => true,
                'message' => "Kandang berhasil diterima!",
                'kandangs'    => $kandangs,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kandang tidak ada!'
        ], 409);
    }

    public function create(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'peternak_id'      => 'required',
            'name'      => 'required',
            'foto' => 'required|image|file',
            'bagi_hasil'      => 'required',
            'potensi_roi'      => 'required',
            'unit_tersedia'      => 'required',
            'status'      => 'required',
            'harga'      => 'required',
            'harga_kg'      => 'required',
            'paket'      => 'required',
            'proposal'      => 'required',
            'dibutuhkan'      => 'required',
            'durasi'      => 'required',
            'berat_awal'      => 'required',
            'estimasi'      => 'required',
            'berat_akhir'      => 'required',
            'persentase'      => 'required',
            'kesehatan'      => 'required',
            'pakan'      => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create kandang
        $kandang = Kandang::create([
            'peternak_id'      => $request->peternak_id,
            'name'      => $request->name,
            'foto' => $request->file('foto')->store('kandang'),
            'bagi_hasil'      => $request->bagi_hasil,
            'potensi_roi'      => $request->potensi_roi,
            'unit_tersedia'      => $request->unit_tersedia,
            'status'      => $request->status,
            'harga'      => $request->harga,
            'harga_kg'      => $request->harga_kg,
            'paket'      => $request->paket,
            'proposal'      => $request->proposal,
            'dibutuhkan'      => $request->dibutuhkan,
            'durasi'      => $request->durasi,
            'berat_awal'      => $request->berat_awal,
            'estimasi'      => $request->estimasi,
            'berat_akhir'      => $request->berat_akhir,
            'persentase'      => $request->persentase,
            'berat'      => $request->berat,
            'kesehatan'      => $request->kesehatan,
            'pakan'      => $request->pakan,
        ]);

        //return response JSON kandang is created
        if($kandang) {
            return response()->json([
                'success' => true,
                'message' => "Kandang berhasil ditambahkan!",
                'kandang'    => $kandang,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Kandang gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $kandang = Kandang::select('*')
                    ->where('id', $id)
                    ->with(['peternak'])
                    ->first();

        if($kandang){
            return response()->json([
                'success' => true,
                'message' => "Kandang berhasil diterima!",
                'kandang'    => $kandang,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kandang tidak ditemukan!'
        ], 409);
    }

    public function paket($id){
        $kandangs = Kandang::select('*')
                    ->with(['peternak'])
                    ->where('paket', $id)
                    ->get();

        if(count($kandangs) > 0){
            return response()->json([
                'success' => true,
                'message' => "Kandang berhasil diterima!",
                'kandangs'    => $kandangs,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kandang tidak ada!'
        ], 409);
    }
}
