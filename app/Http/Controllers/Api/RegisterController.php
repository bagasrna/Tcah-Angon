<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class RegisterController extends Controller
{
    public function index(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'activation_code' => random_int(100000, 999999),
            'is_active' => 0
        ]);

        //return response JSON user is created
        if($user) {
            $dataEmail = [
                'user'    => $user,
            ];
           
            Mail::to($user->email)->send(new SendEmail($dataEmail));

            return response()->json([
                'success' => true,
                'message' => "Registrasi berhasil!",
                'user'    => $user,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }
}
