<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tên bảng trong database (Laravel thường tự hiểu là 'products', nhưng khai báo cho chắc)
    protected $table = 'products';

    /**
     * Khai báo các cột được phép thêm dữ liệu nhanh (Mass Assignable)
     * Phải khớp với các cột bạn vừa tạo trong Migration
     */
    protected $fillable = [
        'brand',
        'name',
        'image',
        'price',
        'description', // Cột mô tả bạn vừa thêm vào migration
        'surface',     // Cột bề mặt vợt (nếu có)
    ];

    /**
     * Tự động định dạng giá tiền khi lấy ra (Tùy chọn)
     * Giúp bạn không cần dùng number_format ở mọi nơi
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.') . 'đ';
    }
}