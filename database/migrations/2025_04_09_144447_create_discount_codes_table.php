<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCodesTable extends Migration
{
    public function up()
    {
        Schema::create('discount_codes', function (Blueprint $table) {
            $table->id(); // id tự tăng
            $table->string('name'); // tên mã giảm giá
            $table->decimal('price', 20, 2); // giá giảm (có thể là số tiền hoặc phần trăm)
            $table->text('description')->nullable(); // mô tả
            $table->decimal('unit_price', 20, 2); // điều kiện áp dụng (ví dụ: đơn hàng trên 500k)
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('discount_codes');
    }
}

