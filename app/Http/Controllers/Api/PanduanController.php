<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panduan;
use Illuminate\Support\Facades\Validator;

class PanduanController extends Controller
{
    public function index(){
        $panduans = Panduan::all();
        if($panduans){
            return response()->json([
                'success' => true,
                'message' => "Panduan berhasil diterima!",
                'panduans'    => $panduans,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Panduan tidak ada!'
        ], 409);
    }

    public function create(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'title'      => 'required',
            'description'      => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create panduan
        $panduan = Panduan::create([
            'title'      => $request->title,
            'description'      => $request->description,
        ]);

        //return response JSON panduan is created
        if($panduan) {
            return response()->json([
                'success' => true,
                'message' => "Panduan berhasil ditambahkan!",
                'panduan'    => $panduan,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Panduan gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $panduan = Panduan::where('id', $id)->first();

        if($panduan){
            return response()->json([
                'success' => true,
                'message' => "Panduan berhasil diterima!",
                'panduan'    => $panduan,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Panduan tidak ditemukan!'
        ], 409);
    }
}
