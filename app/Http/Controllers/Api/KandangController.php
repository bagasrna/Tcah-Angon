<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandang;

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
