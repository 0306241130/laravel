<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DanhMucResource;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(
            [
                'message' => 'lấy danh sách thành công',
                'data' => DanhMucResource::collection(DanhMuc::all())
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $validate = $request->validate(
                ['tendanhmuc' => 'required|max:40|min:4']
            );

            $danhMuc = DanhMuc::create($validate);
            return response()->json(
                [
                    'message' => 'tạo danh mục thành công',
                    'data' => new DanhMucResource($danhMuc)
                ],
                201
            );
        } catch (\Exception $e) {
            Log::error("lỗi tạo danh mục" . $e);
            return response()->json(
                [
                    'message' => 'tạo danh mục thất bại',
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DanhMuc $danhmuc)
    {
        //
        return response()->json(
            [
                'message' => 'lấy dữ liệu thành công',
                'data' => new DanhMucResource($danhmuc)
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhMuc $danhmuc)
    {
        //
        try {

            $validate = $request->validate(['tendanhmuc' => 'required|max:40|min:4']);

            $result = $danhmuc->update($validate);

            return response()->json(
                [
                    'message' => 'cập nhật thành công',
                    'result' => $result
                ],
                201
            );
        } catch (\Exception $e) {
            Log::error("Lỗi cập nhật " . $e);
            return response()->json(
                ['message' => 'lỗi cập nhật'],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhMuc $danhmuc)
    {
        //
        $data = $danhmuc;
        $result = $danhmuc->delete();
        return response()->json(
            [
                'message' => 'xóa mềm thành công',
                'result' => $result,
                'data' => new DanhMucResource($data)
            ],
            200
        );
    }
}
