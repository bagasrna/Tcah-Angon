<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peternak;

class PeternakController extends Controller
{
    public function index(){
        $peternaks = Peternak::all();
        if($peternaks){
            return response()->json([
                'success' => true,
                'message' => "Peternak berhasil diterima!",
                'peternaks'    => $peternaks,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Peternak tidak ada!'
        ], 409);
    }

    public function show($id){
        $peternak = Peternak::where('id', $id)->first();

        if($peternak){
            return response()->json([
                'success' => true,
                'message' => "Peternak berhasil diterima!",
                'peternak'    => $peternak,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Peternak tidak ditemukan!'
        ], 409);
    }
}
