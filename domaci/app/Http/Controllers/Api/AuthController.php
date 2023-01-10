<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
   public function register(Request $request)
   {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:50',
         'email' => 'required|email|unique:users',
        'password' => 'required|string|min:7',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors());
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    $token = $user->createToken('moj_token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token,
        'token_type'=>'Bearer'
    ];

    return response()->json($response);

   }

   public function login(Request $request)
   {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors());
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response(['message' => 'Pogresni parametri!']);
    } else {
        $token = $user->createToken('moj_login_token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
            'token_type'=>'Bearer'
        ];

        return response()->json($response);
    }
   }
}
