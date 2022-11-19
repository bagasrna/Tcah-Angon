<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Validator;

class AboutusController extends Controller
{
    public function index(){
        $aboutUs = AboutUs::all();
        if($aboutUs){
            return response()->json([
                'success' => true,
                'message' => "About Us berhasil diterima!",
                'aboutUs'    => $aboutUs,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'About Us tidak ada!'
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

        //create About Us
        $aboutUs = AboutUs::create([
            'title'      => $request->title,
            'description'      => $request->description,
        ]);

        //return response JSON aboutus is created
        if($aboutUs) {
            return response()->json([
                'success' => true,
                'message' => "About Us berhasil ditambahkan!",
                'aboutUs'    => $aboutUs,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "About Us gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $aboutUs = AboutUs::where('id', $id)->first();

        if($aboutUs){
            return response()->json([
                'success' => true,
                'message' => "About Us berhasil diterima!",
                'aboutUs'    => $aboutUs,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'About Us tidak ditemukan!'
        ], 409);
    }
}
