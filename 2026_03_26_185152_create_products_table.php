<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // Hãng (Joola, Selkirk...)
            $table->string('name');  // Tên vợt
            $table->string('image'); // Link ảnh hoặc đường dẫn file
            $table->decimal('price', 15, 2); // Dùng decimal chuẩn hơn bigInteger cho tiền tệ
            
            // BỔ SUNG DÒNG NÀY: Để hiện nội dung trong trang chi tiết của bạn
            $table->text('description')->nullable(); 
            
            // BỔ SUNG THÊM (Tùy chọn): Nếu bạn muốn lọc theo loại bề mặt như mẫu PHP cũ
            $table->string('surface')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};