<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            {{-- Product gallery --}}
            <div class="sticky top-24">
                <x-products.gallery :product="$product" />
            </div>

            {{-- Product info --}}
            <div class="product-info">

                {{-- Product name --}}
                <h1 class="text-3xl font-semibold text-gray-900 leading-tight">
                    {{ $product->title }}
                </h1>

                {{-- Price --}}
                <p class="text-2xl font-bold text-gray-700 mt-4">
                    Rp {{ number_format($product->price) }}
                </p>

                <h1 class="text-xl font-normal text-gray-700 leading-tight mt-4">
                    <?php 
                    $productConditionFormatted = str_replace('_', " ", $product->condition);    

                    echo "Condition : " . $productConditionFormatted;
                    ?>
                </h1>

                <h1 class="text-xl font-normal text-gray-700 leading-tight mt-2">
                    Size : {{ $product->size }}
                </h1>

                <h1 class="text-xl font-normal text-gray-700 leading-tight mt-2">
                    Stock : {{ $product->stock }}
                </h1>

                {{-- Divider --}}
                <hr class="border-gray-300 mt-4">

                {{-- Description --}}
                <div class="prose prose-gray max-w-none mt-2">
                    {{ $product->description }}
                </div>

                {{-- Actions --}}
                <div class="pt-4">
                    <button
                        class="w-full rounded-xl bg-indigo-600 px-6 py-4
                               text-white text-sm font-semibold
                               hover:bg-indigo-700
                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                               transition">
                        Add to Cart
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
