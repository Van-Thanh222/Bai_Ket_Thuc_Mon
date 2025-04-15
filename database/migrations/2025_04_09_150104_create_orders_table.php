<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');

            // Khách hàng
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');

            // Sản phẩm
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->integer('quantity');

            // Giá
            $table->decimal('Original_price', 20, 2); // Giá gốc
            $table->decimal('Promotional_price', 20, 2); // Giá khuyến mãi (nếu có)
            $table->decimal('Total_Price', 20, 2); // Tổng giá sau giảm

            // Giảm giá
            $table->unsignedBigInteger('discount_code_id')->nullable();
            $table->decimal('discount_price', 20, 2)->nullable()->default(0); // Số tiền giảm giá

            $table->tinyInteger('status')->default(1); // 1: mới, 2: xử lý, ...
            $table->text('note')->nullable();

            $table->timestamps();

            // Ràng buộc khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('discount_code_id')->references('id')->on('discount_codes')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
