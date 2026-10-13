<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SanPhamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix("/sanpham")->controller(SanPhamController::class)->name('sanpham.')->group(function () {
    Route::get("/thung-rac", 'trash')->name('trash');
    Route::post('/{sanpham}/khoi-phuc', 'restore')->name('restore');
    Route::delete("/{sanpham}/xoa-vinh-vien", 'deleteForce')->name('deleteforce');
});

Route::apiResource('sanpham', SanPhamController::class);
