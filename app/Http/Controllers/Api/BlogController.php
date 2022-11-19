<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        if($blogs){
            return response()->json([
                'success' => true,
                'message' => "Blog berhasil diterima!",
                'blogs'    => $blogs,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Blog tidak ada!'
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

        //create blog
        $blog = Blog::create([
            'title'      => $request->title,
            'description'      => $request->description,
        ]);

        //return response JSON blog is created
        if($blog) {
            return response()->json([
                'success' => true,
                'message' => "Blog berhasil ditambahkan!",
                'blog'    => $blog,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => "Blog gagal ditambahkan!",
        ], 409);
    }

    public function show($id){
        $blog = Blog::where('id', $id)->first();

        if($blog){
            return response()->json([
                'success' => true,
                'message' => "Blog berhasil diterima!",
                'blog'    => $blog,  
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Blog tidak ditemukan!'
        ], 409);
    }
}
