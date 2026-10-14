<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DanhMucResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'ma_danh_muc' => $this->id,
                'ten_danh_muc' => $this->tendanhmuc,
                'ngay_tao' => $this->created_at->format("d/m/Y")
            ];
    }
}
