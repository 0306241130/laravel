<?php

namespace Database\Factories;

use App\Models\DanhMuc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DanhMuc>
 */
class DanhMucFactory extends Factory
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
            'tendanhmuc' => ucwords(fake()->unique()->words(2,true))
        ];
    }
}
