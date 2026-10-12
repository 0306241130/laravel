<?php

use Illuminate\Support\Facades\Route;
use App\Models\SanPham;

Route::get('/', function () {
    $data = SanPham::with("DanhMuc")->get();
    dd($data);
});
