<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function index(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => "Email tidak ditemukan!",
            ], 409);
        }

        $data = [
            'user'    => $user,
        ];
       
        Mail::to($request->email)->send(new SendEmail($data));
       
        return response()->json([
            'success' => true,
            'message' => "Email kode aktivasi berhasil dikirim",
            'user'    => $user,
        ], 200);
    }
}
