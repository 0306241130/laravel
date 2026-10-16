<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\SanPham;

class BinhLuan extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'binh_luans';

    protected $fillable = [
        'id',
        'mota',
        'userId',
        'sanphamId'
    ];

    protected $hidden = [
        'created_at',
        'delete_at'
    ];

    public function SanPham(): BelongsTo
    {
        return $this->belongsTo(SanPham::class, 'sanphamId');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
