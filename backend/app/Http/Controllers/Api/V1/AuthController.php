<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function login(AuthRequest $request)
    {

        $information = $request->only('email', 'mat_khau');
        // dd($information);

        //Xác thực thông tin đăng nhập
        if (Auth::attempt($information)) {
            $token = $request->user()->createToken('backendAuth')->plainTextToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // return response()->json(1);
    }
}