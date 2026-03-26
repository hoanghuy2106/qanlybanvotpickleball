<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Trang chủ với dữ liệu mẫu (Fake data)
    public function index()
    {
        $products = collect([
            (object)['id' => 1, 'brand' => 'JOOLA', 'name' => 'JOOLA Ben Johns Perseus CFS 16mm', 'image' => 'https://joola.com/wp-content/uploads/2023/04/18140_BenJohnsPerseus_16_Front-600x600.jpg', 'price' => 5500000],
            (object)['id' => 2, 'brand' => 'JOOLA', 'name' => 'JOOLA Anna Bright Scorpeus CFS 14mm', 'image' => 'https://joola.com/wp-content/uploads/2023/04/18143_AnnaBrightScorpeus_14_Front-600x600.jpg', 'price' => 5250000],
            (object)['id' => 3, 'brand' => 'JOOLA', 'name' => 'JOOLA Collin Johns Scorpeus CFS 16mm', 'image' => 'https://joola.com/wp-content/uploads/2023/04/18142_CollinJohnsScorpeus_16_Front-600x600.jpg', 'price' => 5250000],
            (object)['id' => 4, 'brand' => 'JOOLA', 'name' => 'JOOLA Tyson McGuffin Magnus CFS 14mm', 'image' => 'https://joola.com/wp-content/uploads/2023/04/18141_TysonMcGuffinMagnus_14_Front-600x600.jpg', 'price' => 5500000]
        ]);
        return view('welcome', compact('products'));
    }

    // Lấy tất cả sản phẩm từ Database thật
    public function allProducts()
    {
        $products = Product::all(); 
        return view('products', compact('products'));
    }

    // Chi tiết sản phẩm từ Database thật
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }

    // Đăng ký, Đăng nhập, Đăng xuất (Giữ nguyên của bạn)
    public function register(Request $request) {
        $request->validate(['first_name' => 'required', 'last_name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required|min:6']);
        $user = User::create(['name' => $request->first_name . ' ' . $request->last_name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        Auth::login($user);
        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }

    public function login(Request $request) {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
        if (Auth::attempt($credentials)) { $request->session()->regenerate(); return redirect()->intended('/'); }
        return redirect()->back()->with('error', 'Lỗi đăng nhập');
    }

    public function logout(Request $request) {
        Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken();
        return redirect('/');
    }
}