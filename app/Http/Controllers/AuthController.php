<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request) {
        $payload = $request->all();
        $user = User::query()
        ->where("email", $payload["email"])
        ->first();
        if($user != null) {
            return response()->json([
                "status" => false,
                "message" => "email telah digunakan",
                "data" => null
            ]);
        }
        $user = User::query()->create($payload);
        $token = $user->CreateToken("authorization");
        return response()->json([
            "status" => true,
            "message" => "berhasil register",
            "data" => $token->plainTextToken
        ]);
    }
    
    function login(Request $request) {
        $user = User::query()
        ->where("email", $request->input("email"))
        ->first();

        if($user == null) {
            return response()->json([
                "status" => false,
                "message" => "email tidak ditemukan",
                "data" => null
            ]);
        }
        if(!Hash::check($request->input("password"), $user->password)) {
            return response()->json([
                "status" => false,
                "message" => "password salah",
                "data" => null
            ]);
        }
        $token = $user->CreateToken("authorization");
        return response()->json([
            "status" => true,
            "message" => "berhasil login",
            "data" => $token->plainTextToken
        ]);
    }

    function me(Request $request) {
        $user = $request->user();
        return response()->json([
            "status" => true,
            "message" => "berhasil register",
            "data" => $user
        ]);
    }
}
