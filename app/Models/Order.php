<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'user_id',
        'product_id',
        'product_name',
        'quantity',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'Original_price',
        'Promotional_price',
        'Total_Price',
        'status',
        'note',
        'discount_code_id',
        'discount_price'
    ];

    // Quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Quan hệ với mã giảm giá
    public function discountCode()
    {
        return $this->belongsTo(DiscountCode::class, 'discount_code_id');
    }
}
