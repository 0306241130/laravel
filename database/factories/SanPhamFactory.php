<?php

namespace Database\Factories;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DanhMuc;

/**
 * @extends Factory<SanPham>
 */
class SanPhamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'loaisanpham' => DanhMuc::inRandomOrder()->first()->id ?? DanhMuc::factory(),
            'tensanpham' => ucwords(fake()->unique()->words(3,true)),
            'gia' => fake()->randomFloat(2,100,500),
            'mota' => fake()->sentence(),
            'hinhanh' => fake()->imageUrl()
        ];
    }
}
