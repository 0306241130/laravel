<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\BinhLuan;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $this->command->info('đã tạo 10 user');
        BinhLuan::factory(40)->create();
        $this->command->info('đã tạo 50 bình luận');
        // DanhMuc::factory(10)->create();
        // $this->command->info('đã tạo 10 danh mục');
        // SanPham::factory(50)->create();
        // $this->command->info('đã tạo 50 sản phẩm');
    }
}
