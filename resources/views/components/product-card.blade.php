@props(['product'])

<a href="{{ route('products.show', $product) }}" class="group block">
    <div class="relative rounded-lg bg-white border border-gray-200 overflow-hidden hover:shadow-lg hover:border-indigo-200 transition-all duration-300">

        <!-- Wishlist Button -->
        <button type="button" 
                class="absolute top-3 right-3 z-10 h-8 w-8 rounded-full bg-white/90 flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-white shadow transition-all duration-200 opacity-0 group-hover:opacity-100"
                onclick="toggleWishlist(this)">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
        </button>

        <!-- Image Container -->
        <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
            {{-- @if (isset($product->image) && $product->image) --}}
                <img
                    src="{{ asset('/images/clothes.png')}}"
                    alt="{{ $product->name ?? 'Product Image' }}"
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    loading="lazy"
                >
            {{-- @else --}}
                <div class="h-full w-full flex flex-col items-center justify-center text-gray-400">
                    <svg class="h-10 w-10 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-xs font-medium">No image</span>
                </div>
            {{-- @endif --}}
        </div>

        <!-- Content -->
        <div class="p-4">
            <!-- Category -->
            <div class="mb-2">
                <span class="inline-block rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                    {{ $product->category->name ?? 'Fashion' }}
                </span>
            </div>

            <!-- Title -->
            <h3 class="text-sm font-semibold text-gray-900 line-clamp-2 min-h-[3rem] mb-2 group-hover:text-indigo-700 transition-colors">
                {{ $product->title ?? 'Product Name' }}
            </h3>

            <!-- Price -->
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-base font-bold text-indigo-600">
                        Rp {{ isset($product->price) ? number_format($product->price, 0, ',', '.') : '99.000' }}
                    </p>
                </div>

                <!-- Condition -->
                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700">
                    @php
                        $conditions = ['Baru', 'Seperti Baru', 'Bekas (Baik)', 'Bekas (Cukup)'];
                        $condition = $product->condition ?? $conditions[array_rand($conditions)];
                        $colors = ['bg-green-500', 'bg-emerald-400', 'bg-blue-400', 'bg-yellow-400'];
                    @endphp
                    <span class="h-2 w-2 rounded-full {{ $colors[array_rand($colors)] }}"></span>
                    {{ $product->condition }}
                </span>
            </div>

            <!-- Seller & Rating -->
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center">
                            <span class="text-xs font-semibold text-indigo-600">
                                {{ substr($product->seller ?? 'S', 0, 1) }}
                            </span>
                        </div>
                        <span class="text-xs text-gray-600 truncate max-w-[100px]">
                            {{ $product->seller->name ?? 'Seller Name' }}
                        </span>
                    </div>
                    
                    <!-- Rating -->
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-xs text-gray-600">{{ number_format(rand(35, 50)/10, 1) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>

<script>
function toggleWishlist(button) {
    const heart = button.querySelector('svg');
    const isFilled = heart.style.fill !== 'none';
    
    if (isFilled) {
        heart.style.fill = 'none';
        heart.style.stroke = 'currentColor';
    } else {
        heart.style.fill = 'currentColor';
        heart.style.stroke = 'none';
    }
}
</script>