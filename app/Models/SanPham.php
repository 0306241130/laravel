<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\DanhMuc;
use App\Models\BinhLuan;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    /** @use HasFactory<\Database\Factories\SanPhamFactory> */
    use HasFactory,SoftDeletes;

    protected $table = 'san_phams';

    protected $fillable =
    [
        'id',
        'tensanpham',
        'gia',
        'hinhanh',
        'mota',
        'loaisanpham'
    ];

    protected $hidden =
    [
        'created_at',
        'deleted_at'
    ];

    public function DanhMuc(): BelongsTo
    {
        return $this->belongsTo(DanhMuc::class, 'loaisanpham');
    }

    public function BinhLuan(): HasMany
    {
        return $this->hasMany(BinhLuan::class,'sanphamId');
    }
}
