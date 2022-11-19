<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::all();
        if($faqs){
            return response()->json([
                'success' => true,
                'message' => "Faq berhasil diterima!",
                'faqs'    => $faqs,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Faq tidak ditemukan!'
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

        //create faq
        $faq = Faq::create([
            'title'      => $request->title,
            'description'      => $request->description,
        ]);

        //return response JSON faq is created
        if($faq) {
            return response()->json([
                'success' => true,
                'message' => "Faq berhasil ditambahkan!",
                'faq'    => $faq,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Faq gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $faq = Faq::where('id', $id)->first();

        if($faq){
            return response()->json([
                'success' => true,
                'message' => "Faq berhasil diterima!",
                'faq'    => $faq,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Faq tidak ditemukan!'
        ], 409);
    }
}
