<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\UserCatalogue;
use Illuminate\Http\Request;


class UserCatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhomTk = UserCatalogue::get();

        $responseData = [
            'ds_nhomTk' => $nhomTk,
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
            'ten_the_loai' => $request->name,
            'trang_thai' => $request->trangthai,
            'mo_ta' => $request->mota,
        ];


        return UserCatalogue::create($data_AddTheLoai);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Chi tiết Thể loại
        $chitiet_theloai = UserCatalogue::findOrFail($id);

        return response()->json($chitiet_theloai);
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
        // Cập nhật
        $data = [
            'ten_nhom' => $request->ten_nhom,
            'trang_thai' => $request->trang_thai,
            'mo_ta' => $request->mo_ta,
        ];

        UserCatalogue::where('id', $request->id)
            ->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        UserCatalogue::destroy($id);
    }
}