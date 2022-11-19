<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kandang;

class KandangController extends Controller
{
    public function index(){
        $kandangs = Kandang::select('id', 'peternak_id', 'name', 'bagi_hasil', 'potensi_roi', 'status', 'harga', 'paket', 'created_at', 'updated_at')->with(['peternak'])->get();
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
}
