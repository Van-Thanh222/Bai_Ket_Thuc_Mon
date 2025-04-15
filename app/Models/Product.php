<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'id_type',
        'id_trademark',
        'unit_price',
        'price',
        'promotion_price',
        'new',
        'top',
        'description',

        // ✅ Các trường bổ sung cho xe ô tô
        'year',
        'mileage',
        'fuel_type',
        'transmission',
        'engine',
        'seats',
        'color',
        'origin',
        'condition',
        'warranty',
        'vin',
    ];

    // Mỗi sản phẩm thuộc về một loại
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'id_type');
    }

    // Mỗi sản phẩm thuộc về một thương hiệu
    public function trademark()
    {
        return $this->belongsTo(Trademark::class, 'id_trademark');
    }
    public function danhgias()
{
    return $this->hasMany(DanhGia::class, 'id_product');
}

    
}
