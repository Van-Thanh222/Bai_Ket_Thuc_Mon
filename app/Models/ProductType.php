<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;


class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_types';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    // Một loại sản phẩm có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class, 'id_type');
    }
}

