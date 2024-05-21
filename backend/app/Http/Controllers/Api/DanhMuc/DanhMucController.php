<?php

namespace App\Http\Controllers\Api\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DanhMuc\ThemDanhMucRequest;

// Models
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Danh sách Danh mục
        $danhmucs = DanhMuc::get();
    
        $responseData = [
            'ds_danhmuc' => $danhmucs,
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
    public function store(ThemDanhMucRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }
}