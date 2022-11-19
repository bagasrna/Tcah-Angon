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
            'first_name'      => 'required',
            'last_name'      => 'required',
            'address'      => 'required',
            'phone'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = User::create([
            'first_name'      => $request->first_name,
            'last_name'      => $request->last_name,
            'address'      => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'activation_code' => random_int(100000, 999999),
            'is_active' => 0
        ]);

        //return response JSON user is created
        if($user) {
            $dataEmail = [
                'user'    => $user,
                'type' => 'verification'
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

    public function verification(Request $request){
        $user = User::where('email', $request->email)->first();

        if($request->activation_code == $user->activation_code){
            $user->is_active = 1;
            $user->save();
            
            return response()->json([
                'success' => true,
                'message' => "Verifikasi berhasil!",
                'user'    => $user,  
            ], 201);
        } else {
            return response()->json([
                'success' => false,
            ], 409);
        }
    }

    public function forgot(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required|min:8',
            'activation_code' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if($user){
            if($user->activation_code == $request->activation_code){
                $user->password = bcrypt($request->password);
                $user->save();

                return response()->json([
                    'success' => true,
                    'message' => "Berhasil mengubah password!",
                    'user'    => $user,  
                ], 201);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal mengubah password!",
            ], 409);
        }
    }

    public function forgotVerification(Request $request){
        $user = User::where('email', $request->email)->first();

        if($request->activation_code == $user->activation_code){
            return response()->json([
                'success' => true,
                'message' => "Verifikasi kode forgot berhasil!",
                'user'    => $user,  
            ], 201);
        } else {
            return response()->json([
                'success' => false,
            ], 409);
        }
    }
}
