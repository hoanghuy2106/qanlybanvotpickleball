<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    /**
     * Hiển thị trang chủ với danh sách vợt
     */
    public function index()
    {
        // Lấy tất cả sản phẩm, sắp xếp cái mới nhất lên đầu
        $products = Product::latest()->get(); 
        
        // Trỏ về file welcome.blade.php (File chứa Header và Banner Joola của bạn)
        return view('welcome', compact('products')); 
    }

    /**
     * Hiển thị chi tiết một cây vợt
     */
    public function show($id)
    {
        // Tìm sản phẩm theo ID, nếu không thấy trả về trang 404 thay vì báo lỗi trắng
        $product = Product::findOrFail($id);

        // (Nâng cao) Lấy thêm 4 sản phẩm cùng hãng để làm phần "Sản phẩm liên quan"
        $relatedProducts = Product::where('brand', $product->brand)
                                    ->where('id', '!=', $id)
                                    ->take(4)
                                    ->get();

        return view('product_detail', compact('product', 'relatedProducts'));
    }
}