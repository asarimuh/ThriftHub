@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/product-index.css') }}">
@endpush

<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8 flex gap-6">

        <!-- SIDEBAR -->
        <aside class="w-64 shrink-0 bg-white border border-gray-200 rounded-xl p-4 h-fit sticky top-24">
            <h4 class="text-sm font-semibold text-gray-900 mb-4">
                Filter Produk
            </h4>

            <!-- Search -->
            <div class="mb-4">
                <label class="text-xs font-medium text-gray-600">Cari</label>
                <input
                    type="text"
                    placeholder="Nama produk..."
                    class="mt-1 w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                >
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label class="text-xs font-medium text-gray-600">Kategori</label>
                <select class="mt-1 w-full rounded-lg border-gray-300 text-sm">
                    <option>Semua</option>
                    <option>Pakaian</option>
                    <option>Sepatu</option>
                    <option>Tas</option>
                    <option>Aksesoris</option>
                </select>
            </div>

            <!-- Condition -->
            <div class="mb-4">
                <label class="text-xs font-medium text-gray-600">Kondisi</label>
                <select class="mt-1 w-full rounded-lg border-gray-300 text-sm">
                    <option>Semua</option>
                    <option>Baru</option>
                    <option>Seperti Baru</option>
                    <option>Bekas (Baik)</option>
                </select>
            </div>

            <!-- Price -->
            <div class="mb-6">
                <label class="text-xs font-medium text-gray-600">Harga</label>
                <select class="mt-1 w-full rounded-lg border-gray-300 text-sm">
                    <option>Semua</option>
                    <option>&lt; Rp 100.000</option>
                    <option>Rp 100.000 - Rp 300.000</option>
                    <option>&gt; Rp 300.000</option>
                </select>
            </div>

            <button class="w-full text-sm px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition">
                Reset Filter
            </button>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1">

            <!-- TOP BAR -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between mb-6">
                <div class="relative w-full sm:w-80">
                    <input
                        type="text"
                        placeholder="Cari produk..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <select class="rounded-lg border-gray-300 text-sm">
                    <option>Urutkan: Terbaru</option>
                    <option>Harga Terendah</option>
                    <option>Harga Tertinggi</option>
                </select>
            </div>

            <!-- PRODUCT GRID (dummy data) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <!-- PAGINATION PLACEHOLDER -->
            <div class="mt-10 flex justify-center">
                <button class="px-4 py-2 border rounded-lg text-sm text-gray-600 hover:bg-gray-50">
                    Load more
                </button>
            </div>

        </main>
    </div>
</x-app-layout>
