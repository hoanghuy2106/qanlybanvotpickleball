<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm - Pickleball VN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .text-navy { color: #1e1b4b; }
        .bg-navy { background-color: #1e1b4b; }
    </style>
</head>
<body class="bg-gray-50">

    @php
        $products = [
            (object)[
                'id' => 1,
                'name' => 'Vợt Joola Ben Johns Perseus CFS 16',
                'brand' => 'JOOLA',
                'price' => 5500000,
                'image' => 'https://joola.com/wp-content/uploads/2023/04/Ben-Johns-Perseus-CFS-16-Paddle-Front.jpg',
                'label' => 'NEW',
            ],
            (object)[
                'id' => 2,
                'name' => 'Vợt Selkirk Vanguard Power Air Invikta',
                'brand' => 'SELKIRK',
                'price' => 6200000,
                'image' => 'https://www.selkirk.com/cdn/shop/files/Selkirk-Vanguard-Power-Air-Invikta-Paddle-Front_1024x1024.jpg',
                'label' => 'BEST SELLER',
            ],
            (object)[
                'id' => 3,
                'name' => 'Vợt Joola Anna Bright Scorpeus CGS 14',
                'brand' => 'JOOLA',
                'price' => 4800000,
                'image' => 'https://joola.com/wp-content/uploads/2023/05/Anna-Bright-Scorpeus-CGS-14-Paddle-Front.jpg',
                'label' => 'NEW',
            ],
            (object)[
                'id' => 4,
                'name' => 'Vợt Luxx Control Air Invikta',
                'brand' => 'SELKIRK',
                'price' => 5900000,
                'image' => 'https://www.selkirk.com/cdn/shop/files/LuxxControlAir-Paddle-Invikta-BlackFront_1024x1024.jpg',
                'label' => 'CONTROL',
            ],
        ];
    @endphp

    <div class="max-w-7xl mx-auto py-16 px-4">
        
        <h1 class="text-3xl font-black italic border-l-8 border-blue-600 pl-4 mb-12 uppercase text-[#1e1b4b]">
            Khám phá vợt <span class="text-blue-600">Joola</span>
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="group bg-white rounded-[25px] shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 overflow-hidden relative flex flex-col h-full">
                
                <div class="aspect-square bg-[#f8f9fa] overflow-hidden flex items-center justify-center relative">
                    <a href="/product/{{ $product->id }}" class="w-full h-full block">
                        <span class="absolute top-4 left-4 bg-white/90 text-navy font-black text-[10px] px-3 py-1 rounded-lg uppercase shadow-sm z-10 tracking-widest">
                            {{ $product->brand }}
                        </span>
                        
                        <img src="{{ $product->image }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </a>

                    <div class="absolute top-4 right-4 bg-red-600 text-white text-[10px] px-3 py-1 font-black italic uppercase rounded-lg shadow-lg z-10 tracking-widest">
                        {{ $product->label }}
                    </div>

                    <div class="absolute top-16 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-30">
                        <a href="#" class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-yellow-500 shadow-xl hover:bg-yellow-500 hover:text-white transition-all border border-gray-100">
                            <i class="fa fa-edit text-xs"></i>
                        </a>
                        <button class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-red-500 shadow-xl hover:bg-red-500 hover:text-white transition-all border border-gray-100">
                            <i class="fa fa-trash text-xs"></i>
                        </button>
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <small class="text-gray-400 font-bold uppercase tracking-[0.2em] text-[9px] mb-2block">Professional Series / Carbon Surface</small>
                    
                    <a href="/product/{{ $product->id }}">
                        <h3 class="font-black text-sm h-10 mb-4 text-[#1e1b4b] line-clamp-2 italic group-hover:text-blue-600 transition-colors leading-tight">
                            {{ $product->name }}
                        </h3>
                    </a>

                    <div class="mt-auto flex justify-between items-center pt-5 border-t border-gray-50">
                        <div>
                            <p class="text-[#4318ff] font-black text-xl italic tracking-tighter">
                                {{ number_format($product->price, 0, ',', '.') }}đ
                            </p>
                        </div>
                        
                        <button class="bg-[#1e1b4b] text-white w-12 h-12 rounded-2xl flex items-center justify-center hover:bg-[#4318ff] shadow-xl shadow-blue-100 transition-all hover:-translate-y-1">
                            <i class="fa-solid fa-cart-shopping text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>