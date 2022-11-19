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
                'message' => "User tidak ditemukan!",
            ], 409);
        }

        $user->activation_code = random_int(100000, 999999);
        $user->save();

        $data = [
            'user'    => $user,
            'type' => 'verification'
        ];
       
        Mail::to($request->email)->send(new SendEmail($data));
       
        return response()->json([
            'success' => true,
            'message' => "Email kode aktivasi berhasil dikirim",
            'user'    => $user,
        ], 200);
    }

    public function forgot(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => "User tidak ditemukan!",
            ], 409);
        }

        $user->activation_code = random_int(100000, 999999);
        $user->save();

        $data = [
            'user'    => $user,
            'type' => 'forgot'
        ];
       
        Mail::to($request->email)->send(new SendEmail($data));
       
        return response()->json([
            'success' => true,
            'message' => "Email kode forgot berhasil dikirim",
            'user'    => $user,
        ], 200);
    }
}
