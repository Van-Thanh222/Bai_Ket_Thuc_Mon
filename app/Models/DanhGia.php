<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danhgia'; // Tên bảng

    protected $fillable = [
        'id_product',
        'id_user',
        'sao',
        'danhgia',
    ];

    /**
     * Liên kết đến sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    /**
     * Liên kết đến người dùng đánh giá
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
