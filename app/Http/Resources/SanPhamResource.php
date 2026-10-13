<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SanPhamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ma_san_pham' => $this->id,
            'ten_san_pham' => $this->tensanpham,
            'gia' => $this->gia,
            'hinh_anh' => $this->hinhanh,
            'mo_ta' => $this->mota,
            'ngay_tao' => $this->created_at?->format('d/m/Y') ?? '',
            'danh_muc' => [
                'ma_danh_muc' => $this->DanhMuc?->id,
                'ten_danh_muc' => $this->DanhMuc?->tendanhmuc,
            ],
        ];
    }
}
