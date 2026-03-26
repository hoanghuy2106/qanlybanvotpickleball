<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - Pickleball VN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto py-20 px-4">
        <a href="/" class="text-blue-600 font-bold mb-10 block">← Quay lại trang chủ</a>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-10 shadow-2xl border-t-4 border-blue-600">
            <div class="border-2 border-gray-100">
                <img src="{{ $product->image }}" class="w-full h-auto">
            </div>

            <div>
                <p class="text-blue-600 font-black uppercase tracking-widest text-sm mb-2">{{ $product->brand }}</p>
                <h1 class="text-4xl font-black italic text-navy mb-4 uppercase">{{ $product->name }}</h1>
                <p class="text-3xl text-red-600 font-black mb-6">{{ number_format($product->price, 0, ',', '.') }}đ</p>
                
                <div class="border-y py-6 mb-6">
                    <h3 class="font-black mb-2 uppercase italic text-gray-500">Mô tả sản phẩm</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                <button class="w-full bg-navy text-white py-5 font-black italic text-xl hover:bg-blue-700 transition-all shadow-lg uppercase">
                    Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </div>
</body>
</html>