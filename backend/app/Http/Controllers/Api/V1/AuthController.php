<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller
{
    public function __construct()
    {

    }
    public function login(AuthRequest $request)
    {

        $users = User::where('trang_thai', 1)->select('email', 'password')->get();

        dd($users);

        $responseData = [
            'user' => $users,
        ];


        return response()->json($responseData);
    }
}