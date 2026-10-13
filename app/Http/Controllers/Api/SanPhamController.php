<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Http\Resources\SanPhamResource;
use Illuminate\Support\Facades\Log;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(
            [
                'data' => SanPhamResource::collection(SanPham::with('DanhMuc')->get()),
                'message' => 'lấy danh sách thành công'
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
            $validate = $request->validate([
                'tensanpham' => 'required',
                'gia' => 'required',
                'hinhanh' => 'required',
                'mota' => 'required',
                'loaisanpham' => 'required'
            ]);

            $sanPham = SanPham::create($validate);

            return response()->json(
                [
                    'message' => 'thêm thành công',
                    'data' => new SanPhamResource($sanPham)
                ],
                201
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'thêm thất bại',
                    'error' => $e
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SanPham $sanpham)
    {
        return response()->json([
            'data' => new SanPhamResource($sanpham),
            'message' => 'Tìm thấy sản phẩm'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SanPham $sanpham)
    {
        //
        try {
            $validate = $request->validate([
                'tensanpham' => 'required',
                'gia' => 'required',
                'hinhanh' => 'required',
                'mota' => 'required',
                'loaisanpham' => 'required'
            ]);

            $result = $sanpham->update($validate);

            return response()->json(
                [
                    'message' => 'cập nhật thành công',
                    'result' => $result
                ],
                201
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'cập nhật thất bại',

                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SanPham $sanpham)
    {
        //
        $result = $sanpham->delete();
        return response()->json(
            [
                'message' => 'xóa thành công',
                'result' => $result
            ],
            200
        );
    }

    public function trash()
    {
        try {
            $data = SanPham::with("DanhMuc")->onlyTrashed()->latest()->get();

            return response()->json([
                'message' => 'lấy dữ liệu thùng rác thành công',
                'data' => SanPhamResource::collection($data)
            ], 200);
        } catch (\Exception $e) {
            Log::error("đã xảy ra lỗi" . $e);
            return response()->json(
                ['message' => 'lấy dữ liệu thất bại'],
                500
            );
        }
    }

    public function restore(string $sanpham)
    {
        try {
            $searchSanPham = SanPham::onlyTrashed()->findOrFail($sanpham);

            $result = $searchSanPham->restore();

            return response()->json(
                [
                    'message' => 'khôi phục thành công',
                    'result' => $result
                ],
                200
            );
        } catch (\Exception $e) {
            Log::error("xảy ra lỗi khi khôi phục" . $e);
            return response()->json(
                ['message' => 'khôi phục dữ liệu thất bại'],
                500
            );
        }
    }

    public function deleteForce(string $sanpham)
    {
        try {
            $searchSanPham = SanPham::onlyTrashed()->findOrFail($sanpham);

            $oldSanPham = new SanPhamResource($searchSanPham);

            $result = $searchSanPham->forceDelete();

            return response()->json(
                [
                    'message' => 'xóa vĩnh viễn thành công',
                    'result' => $result,
                    'data' => $oldSanPham
                ],
                200
            );
        } catch (\Exception $e) {
            Log::error("lỗi xóa vĩnh viễn " . $e);
            return response()->json(
                ['message' => 'xóa vĩnh viễn thất bại'],
                500
            );
        }
    }
}
