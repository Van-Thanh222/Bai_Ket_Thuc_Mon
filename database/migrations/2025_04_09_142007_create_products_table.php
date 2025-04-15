<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('image')->nullable(); 
            $table->unsignedBigInteger('id_type'); 
            $table->unsignedBigInteger('id_trademark'); 
            $table->decimal('unit_price', 20, 2); 
            $table->decimal('price', 20, 2); 
            $table->decimal('promotion_price', 20, 2)->nullable(); 
            $table->boolean('new')->default(false); 
            $table->boolean('top')->default(false); 
            $table->text('description')->nullable(); 
            
            // Các cột bổ sung cho ô tô
            $table->year('year')->nullable(); // Năm sản xuất
            $table->integer('mileage')->nullable(); // Số km đã đi
            $table->string('fuel_type')->nullable(); // Loại nhiên liệu
            $table->string('transmission')->nullable(); // Hộp số
            $table->string('engine')->nullable(); // Động cơ
            $table->integer('seats')->nullable(); // Số chỗ ngồi
            $table->string('color')->nullable(); // Màu xe
            $table->string('origin')->nullable(); // Xuất xứ
            $table->string('condition')->nullable(); // Tình trạng: Mới/Cũ
            $table->string('warranty')->nullable(); // Thông tin bảo hành
            $table->string('vin')->nullable(); // Mã số khung

            $table->timestamps(); 

            // Khóa ngoại
            $table->foreign('id_type')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('id_trademark')->references('id')->on('trademarks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
