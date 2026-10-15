<?php

namespace Database\Factories;

use App\Models\BinhLuan;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SanPham;
use App\Models\User;

/**
 * @extends Factory<BinhLuan>
 */
class BinhLuanFactory extends Factory
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
            'mota' => fake()->sentence(),
            'userId' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'sanphamId' => SanPham::inRandomOrder()->first()?->id ?? SanPham::factory()
        ];
    }
}
