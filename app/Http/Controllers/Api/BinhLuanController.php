<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BinhLuanResource;
use App\Models\BinhLuan;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(
            [
                'message' => 'lấy danh sách bình luận',
                'data' => BinhLuanResource::collection(BinhLuan::with(['User', 'SanPham'])->get())
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
            $data = $request->validate(
                [
                    'mota' => 'required|max:100',
                    'sanphamId' => 'required'
                ]
            );

            //giả lập lấy ngẫu nhiên user bình luận
            //Sau này sẽ lấy bằng auth()->user()->id

            $data['userId'] = User::inRandomOrder()->first()?->id;

            $resutl = BinhLuan::create($data);

            return response()->json(
                [
                    'message' => 'tạo bình luận thành công',
                    'result' => new BinhLuanResource($resutl)
                ],
                201
            );
        } catch (\Exception $e) {
            Log::error("Lỗi tạo bình luận" . $e);
            return response()->json(
                [
                    'message' => 'lỗi tạo bình luận',
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
