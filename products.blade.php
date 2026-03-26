<h1 class="text-3xl font-black italic border-l-8 border-blue-600 pl-4 mb-10 uppercase text-[#1e1b4b]">
    Danh sách sản phẩm
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach($products as $product)
    <div class="group bg-white rounded-[20px] shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 overflow-hidden relative flex flex-col h-full">
        
        <div class="aspect-square bg-[#f8f9fa] overflow-hidden flex items-center justify-center relative">
            <a href="{{ route('products.show', $product->id) }}" class="w-full h-full">
                <span class="absolute top-4 left-4 bg-white/90 text-[#4318ff] font-black text-[10px] px-3 py-1 rounded-lg uppercase shadow-sm z-10">
                    {{ $product->brand }}
                </span>
                
                <img src="{{ $product->image }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            </a>

            <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                <a href="{{ route('products.edit', $product->id) }}" class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-yellow-500 shadow-md hover:bg-yellow-50">
                    <i class="fa fa-edit text-xs"></i>
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Xóa sản phẩm này?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-red-500 shadow-md hover:bg-red-50">
                        <i class="fa fa-trash text-xs"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="p-5 flex-1 flex flex-col">
            <small class="text-gray-400 font-bold uppercase tracking-[0.2em] text-[9px] mb-1">
                Professional Gear
            </small>
            
            <a href="{{ route('products.show', $product->id) }}">
                <h3 class="font-black text-[#1b2559] text-sm mb-3 line-clamp-2 italic h-10 group-hover:text-[#4318ff] transition-colors leading-tight">
                    {{ $product->name }}
                </h3>
            </a>
            
            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-50">
                <div>
                    <p class="text-[#4318ff] font-black text-lg">
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    </p>
                </div>
                
                <a href="{{ route('products.show', $product->id) }}" 
                   class="bg-[#4318ff] text-white w-10 h-10 rounded-xl flex items-center justify-center hover:bg-[#3311cc] shadow-lg shadow-blue-200 transition-all hover:-translate-y-1">
                    <i class="fa-solid fa-cart-plus"></i>
                </a>
            </div>
        </div>