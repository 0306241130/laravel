<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BinhLuanResource extends JsonResource
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
                'id' => $this->id,
                'mo_ta' => $this->mota,
                'user_id' => [
                    'name' => $this->User->name,
                    'email' => $this->User->email
                ],
                'san_pham_id' => [
                    'ma_san_pham' => $this->SanPham->id,
                    'ten_san_pham' => $this->SanPham->tensanpham
                ]
            ];
    }
}
