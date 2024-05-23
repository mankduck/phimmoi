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
    // Danh sách thể loại
    Route::post('', [TheLoaiController::class, 'index']);

    // Thêm thể loại
    Route::post('/store', [TheLoaiController::class, 'store']);
    
    // Chi tiết Thể loại
    Route::get('/show/{id}', [TheLoaiController::class, 'show']);

    // Chi tiết Thể loại
    Route::post('/update/{id}', [TheLoaiController::class, 'update']);

    // Xóa Thể loại
    Route::get('/delete/{id}', [TheLoaiController::class, 'destroy']);
});