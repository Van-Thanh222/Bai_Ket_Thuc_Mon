<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trademarks', function (Blueprint $table) {
            $table->id(); // id tự động tăng
            $table->string('name');
            $table->string('avatar')->nullable(); // cho phép null nếu chưa có hình
            $table->text('describe')->nullable(); // mô tả có thể dài và cho phép null
            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trademarks');
    }
};

