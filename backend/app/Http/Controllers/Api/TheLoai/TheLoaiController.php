<?php

namespace App\Http\Controllers\Api\TheLoai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\TheLoai;

// Requests
use App\Http\Requests\TheLoai\ThemTheLoaiRequest;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Danh sách Thể loại
        $theloais = TheLoai::get();
    
        $responseData = [
            'ds_theloai' => $theloais,
        ];
    
        return response()->json($responseData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Thêm Thể loại
        $data_AddTheLoai = [
            'ten_the_loai' => $request['nameTheLoai'],
            'trang_thai' => $request['trangThaiTheLoai'],
            'mo_ta' => $request['moTaTheLoai'],
        ];
        
        return TheLoai::create($data_AddTheLoai);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Chi tiết Thể loại
        $theloai = TheLoai::findOrFail($id);
        
        return response()->json($theloai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        TheLoai::destroy($id);
    }
}