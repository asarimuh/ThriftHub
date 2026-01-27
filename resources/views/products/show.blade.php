<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            {{-- Product gallery --}}
            <div class="sticky top-24">
                <x-products.gallery :product="$product" />
            </div>

            {{-- Product info --}}
            <div class="space-y-6">

                {{-- Category --}}
                <span
                    class="inline-block rounded-full bg-indigo-50 px-3 py-1
                           text-xs font-medium text-indigo-700"
                >
                    {{ $product->category?->name ?? 'Uncategorized' }}
                </span>

                {{-- Product name --}}
                <h1 class="text-3xl font-semibold text-gray-900 leading-tight">
                    {{ $product->name }}
                </h1>

                {{-- Price --}}
                <p class="text-2xl font-bold text-indigo-600">
                    Rp {{ number_format($product->price) }}
                </p>

                {{-- Divider --}}
                <hr class="border-gray-200">

                {{-- Description --}}
                <div class="prose prose-gray max-w-none">
                    {{ $product->description }}
                </div>

                {{-- Actions --}}
                <div class="pt-4">
                    <button
                        class="w-full rounded-xl bg-indigo-600 px-6 py-4
                               text-white text-sm font-semibold
                               hover:bg-indigo-700
                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                               transition"
                    >
                        Add to Cart
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
