<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SanPham;
class DanhMuc extends Model
{
    /** @use HasFactory<\Database\Factories\DanhMucFactory> */
    use HasFactory,SoftDeletes;

    protected $table = 'danh_mucs';

    protected $fillable = [
        'id',
        'tendanhmuc'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    public function SanPham(): HasMany
    {
        return $this->hasMany(SanPham::class, 'loaisanpham');
    }
}
