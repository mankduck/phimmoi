<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Auth
use App\Http\Controllers\Api\V1\AuthController;
// DanhMuc
use App\Http\Controllers\Api\DanhMuc\DanhMucController;
// DanhMuc
use App\Http\Controllers\Api\TheLoai\TheLoaiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login', [AuthController::class, 'login']);

// Api Danh mục
Route::prefix('/danhmuc')->group(function () {
    Route::post('', [DanhMucController::class, 'index']);
});

// Api Thể loại
Route::prefix('/theloai')->group(function () {
    Route::post('', [TheLoaiController::class, 'index']);
});