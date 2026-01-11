@props(['product'])

<a href="#" class="group block">
    <div class="relative rounded-2xl bg-white border border-gray-200 overflow-hidden hover:shadow-xl hover:border-indigo-200 transition-all duration-300">
        <!-- Sale Badge -->
        @if($product->is_on_sale ?? false)
            <div class="absolute top-4 left-4 z-10">
                <span class="inline-flex items-center rounded-full bg-red-500 px-3 py-1 text-xs font-semibold text-white shadow-lg">
                    SALE
                </span>
            </div>
        @endif

        <!-- Wishlist Button -->
        <button type="button" 
                class="absolute top-4 right-4 z-10 h-10 w-10 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-white shadow-lg transition-all duration-200 opacity-0 group-hover:opacity-100"
                onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $product->id }}').submit();">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
        </button>
        
        <form id="wishlist-form-{{ $product->id }}" action="#" method="POST" class="hidden">
            @csrf
        </form>

        <!-- Image Container -->
        <div class="relative aspect-square bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
            @if ($product->primaryImage)
                <img
                    src="{{ asset('storage/' . $product->primaryImage->image_path) }}"
                    alt="{{ $product->name }}"
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                    loading="lazy"
                >
                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            @else
                <div class="h-full w-full flex flex-col items-center justify-center text-gray-400">
                    <svg class="h-12 w-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-sm font-medium">No image</span>
                </div>
            @endif

            <!-- Quick View Button -->
            <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <button class="w-full rounded-lg bg-white/90 backdrop-blur-sm py-3 text-sm font-semibold text-indigo-700 hover:bg-white shadow-lg transition-colors"
                        onclick="event.preventDefault(); showQuickView({{ $product->id }})">
                    Lihat Detail
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4 lg:p-6">
            <!-- Category -->
            @if($product->category)
                <div class="mb-2">
                    <span class="inline-block rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700">
                        {{ $product->category->name }}
                    </span>
                </div>
            @endif

            <!-- Title -->
            <h3 class="text-sm lg:text-base font-semibold text-gray-900 line-clamp-2 min-h-[3rem] mb-2 group-hover:text-indigo-700 transition-colors">
                {{ $product->name }}
            </h3>

            <!-- Price -->
            <div class="flex items-center justify-between mt-3">
                <div>
                    <p class="text-lg font-bold text-indigo-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    @if($product->original_price && $product->original_price > $product->price)
                        <p class="text-sm text-gray-500 line-through">
                            Rp {{ number_format($product->original_price, 0, ',', '.') }}
                        </p>
                    @endif
                </div>

                <!-- Condition -->
                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                    @switch($product->condition)
                        @case('new')
                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                            Baru
                            @break
                        @case('like_new')
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            Like New
                            @break
                        @case('good')
                            <span class="h-2 w-2 rounded-full bg-blue-400"></span>
                            Baik
                            @break
                        @case('fair')
                            <span class="h-2 w-2 rounded-full bg-yellow-400"></span>
                            Cukup
                            @break
                        @default
                            <span class="h-2 w-2 rounded-full bg-gray-400"></span>
                            {{ ucfirst(str_replace('_', ' ', $product->condition)) }}
                    @endswitch
                </span>
            </div>

            <!-- Seller & Location -->
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        @if($product->seller->avatar ?? false)
                            <img src="{{ asset('storage/' . $product->seller->avatar) }}" 
                                 alt="{{ $product->seller->name }}"
                                 class="h-6 w-6 rounded-full object-cover">
                        @else
                            <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center">
                                <span class="text-xs font-semibold text-indigo-600">
                                    {{ substr($product->seller->name ?? 'S', 0, 1) }}
                                </span>
                            </div>
                        @endif
                        <span class="text-xs text-gray-600 truncate max-w-[100px]">
                            {{ $product->seller->name ?? 'Seller' }}
                        </span>
                    </div>
                    
                    @if($product->location)
                        <div class="flex items-center gap-1 text-xs text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="truncate max-w-[80px]">{{ $product->location }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Rating -->
            @if($product->average_rating ?? false)
                <div class="mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-1">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product->average_rating))
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @elseif($i - 0.5 <= $product->average_rating)
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <defs>
                                        <linearGradient id="half-{{ $product->id }}-{{ $i }}">
                                            <stop offset="50%" stop-color="currentColor"/>
                                            <stop offset="50%" stop-color="#D1D5DB"/>
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#half-{{ $product->id }}-{{ $i }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endif
                        @endfor
                        <span class="ml-1 text-sm text-gray-600">{{ number_format($product->average_rating, 1) }}</span>
                    </div>
                    @if($product->sold_count ?? false)
                        <span class="text-xs text-gray-500">{{ $product->sold_count }} terjual</span>
                    @endif
                </div>
            @endif
        </div>
    </div>
</a>

<!-- Quick View Modal (to be implemented) -->
<script>
function showQuickView(productId) {
    // Implement quick view modal
    fetch(`/products/${productId}/quick-view`)
        .then(response => response.json())
        .then(data => {
            // Show modal with product details
            console.log('Quick view for product:', data);
        });
}
</script>