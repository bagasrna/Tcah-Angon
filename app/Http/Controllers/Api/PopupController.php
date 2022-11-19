<?php

namespace App\Http\Controllers\Api;

use App\Models\PopUp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PopupController extends Controller
{
    public function index(){
        $popups = PopUp::all();
        $random = PopUp::inRandomOrder()->first();
        
        if($popups){
            return response()->json([
                'success' => true,
                'message' => "Popup berhasil diterima!",
                'popups'    => $popups,  
                'random'    => $random,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Popup tidak ada!'
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

        //create popup
        $popup = PopUp::create([
            'title'      => $request->title,
            'description'      => $request->description,
        ]);

        //return response JSON popup is created
        if($popup) {
            return response()->json([
                'success' => true,
                'message' => "Popup berhasil ditambahkan!",
                'popup'    => $popup,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Pop Up gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $popup = PopUp::where('id', $id)->first();

        if($popup){
            return response()->json([
                'success' => true,
                'message' => "Pop Up berhasil diterima!",
                'popup'    => $popup,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Pop Up tidak ditemukan!'
        ], 409);
    }
}
