<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;


class AuthController extends Controller{
    public function __construct(){

    }

    public function login(AuthRequest $request){
        // return $request->all();
    }
}