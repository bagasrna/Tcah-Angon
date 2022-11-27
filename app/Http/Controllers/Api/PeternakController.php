<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peternak;
use Illuminate\Support\Facades\Validator;

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
        $peternak = Peternak::where('id', $id)
                    ->with(['kandangs', 'ulasans'])            
                    ->first();

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

    public function create(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
            'photo' => 'required|image|file',
            'address' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'dokumentasi' => 'required',
            'dokumentasi.*' => 'required|image|file',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        foreach($request->file('dokumentasi') as $dokumentasi){
            $image[] = $dokumentasi->store('dokumentasi');
        }
        //create peternak
        $peternak = Peternak::create([
            'name' => $request->name,
            'status' => $request->status,
            'photo' => $request->file('photo')->store('photo_profile'),
            'address' => $request->address,
            'rating' => $request->rating,
            'description' => $request->description,
            'dokumentasi' => json_encode($image),
        ]);

        //return response JSON peternak is created
        if($peternak) {
            return response()->json([
                'success' => true,
                'message' => "Peternak berhasil ditambahkan!",
                'peternak'    => $peternak, 
                'dokumentasi' => json_decode($peternak->dokumentasi)
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Peternak gagal ditambahkan!",
        ], 409);
    }
}
