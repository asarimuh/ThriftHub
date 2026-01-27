<x-app-layout>
     <!-- COMPACT HERO -->
    <section class="relative bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 text-white overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-8">

                <!-- LEFT CARD STACK -->
                <div class="hidden lg:flex justify-center">
                    @include('home.partials.hero-card-left')
                </div>

                {{-- Mid text --}}
                <div class="text-center max-w-3xl mx-auto">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight">
                        Baju lama,
                        <span class="block text-indigo-200 mt-1">cerita baru.</span>
                    </h1>

                    <p class="mt-4 text-indigo-100 max-w-xl mx-auto">
                        Marketplace preloved fashion berkualitas dengan harga terjangkau.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="#products"
                        class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-indigo-700 hover:bg-indigo-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-lg">
                            Jelajahi Produk
                        </a>

                        @auth
                            @if(auth()->user()->isBuyer())
                                <form method="POST" action="#">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center justify-center rounded-full border border-white/40 px-6 py-3 text-sm font-medium hover:bg-white/10 hover:border-white/60 transition-all duration-200 backdrop-blur-sm">
                                        Mulai Jual
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center rounded-full border border-white/40 px-6 py-3 text-sm font-medium hover:bg-white/10 hover:border-white/60 transition-all duration-200 backdrop-blur-sm">
                                Daftar Gratis
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- RIGHT CARD STACK -->
                <div class="hidden lg:flex justify-center">
                    @include('home.partials.hero-card-right')
                </div>

            </div>
        </div>
    </section>

    <!-- PRODUCTS SECTION WITH FILTERS -->
    <section id="products" class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Section Header with Search & Filter -->
            <div class="mb-6">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            Produk Terbaru
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">
                            Temukan fashion preloved yang sesuai dengan gaya Anda
                        </p>
                    </div>

                    <!-- Search Bar -->
                    <div class="w-full lg:w-auto">
                        <div class="relative">
                            <input 
                                type="text" 
                                placeholder="Cari produk, brand, atau kata kunci..."
                                class="w-full lg:w-80 pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition"
                            >
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Controls -->
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <!-- Sort Dropdown -->
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2.5 pr-10 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none cursor-pointer">
                            <option>Urutkan: Terbaru</option>
                            <option>Harga: Rendah ke Tinggi</option>
                            <option>Harga: Tinggi ke Rendah</option>
                            <option>Rating Tertinggi</option>
                            <option>Terlaris</option>
                        </select>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2.5 pr-10 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none cursor-pointer">
                            <option>Semua Kategori</option>
                            <option>Pakaian</option>
                            <option>Sepatu</option>
                            <option>Aksesoris</option>
                            <option>Tas</option>
                            <option>Perlengkapan</option>
                        </select>
                    </div>

                    <!-- Condition Filter -->
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2.5 pr-10 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none cursor-pointer">
                            <option>Semua Kondisi</option>
                            <option>Baru</option>
                            <option>Seperti Baru</option>
                            <option>Bekas (Baik)</option>
                            <option>Bekas (Cukup)</option>
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2.5 pr-10 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none cursor-pointer">
                            <option>Semua Harga</option>
                            <option>Di bawah Rp 100.000</option>
                            <option>Rp 100.000 - Rp 300.000</option>
                            <option>Rp 300.000 - Rp 500.000</option>
                            <option>Di atas Rp 500.000</option>
                        </select>
                    </div>

                    <!-- Clear Filters Button -->
                    <button class="px-4 py-2.5 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition">
                        Hapus Filter
                    </button>

                    <!-- View Toggle -->
                    <div class="flex border border-gray-300 rounded-lg overflow-hidden ml-auto">
                        <button class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50 border-r border-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                        </button>
                        <button class="px-3 py-2 bg-gray-100 text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            @if ($products->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
    
                @if($products->hasPages())
                    <div class="mt-12 flex justify-center">
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                Sebelumnya
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded-lg">
                                1
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                2
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                3
                            </button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                @endif
            @else
                <div class="py-16 text-center bg-white rounded-xl border border-gray-200">
                    <div class="max-w-md mx-auto">
                        <div class="h-20 w-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada produk yang cocok</h3>
                        <p class="text-gray-600 mb-6">
                            Coba ubah filter pencarian atau kembali nanti
                        </p>
                        <button class="px-6 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            Reset Filter
                        </button>
                    </div>
                </div>
            @endif

            <!-- Quick Categories -->
            <div class="mt-12">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Jelajahi Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Semua
                    </a>
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Pakaian
                    </a>
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Sepatu
                    </a>
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Tas
                    </a>
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Aksesoris
                    </a>
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Kaos
                    </a>    
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Jeans
                    </a>
                    <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition">
                        Jaket
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- VALUE PROPS -->
    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">
                    Kenapa Memilih ThriftHub?
                </h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Solusi lengkap untuk fashion berkelanjutan yang menguntungkan semua pihak
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                <div class="group p-8 rounded-3xl bg-gradient-to-br from-indigo-50 to-white border border-indigo-100 hover:border-indigo-200 hover:shadow-xl transition-all duration-300">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Jual Mudah & Cepat</h3>
                    <p class="mt-3 text-gray-600">
                        Upload produk dan mulai jual dalam hitungan menit. Sistem kami yang simpel memudahkan proses penjualan.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-gradient-to-br from-indigo-50 to-white border border-indigo-100 hover:border-indigo-200 hover:shadow-xl transition-all duration-300">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Harga Terjangkau</h3>
                    <p class="mt-3 text-gray-600">
                        Fashion berkualitas tanpa harga mahal. Dapatkan barang branded dengan harga yang ramah di kantong.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-gradient-to-br from-indigo-50 to-white border border-indigo-100 hover:border-indigo-200 hover:shadow-xl transition-all duration-300">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center text-2xl shadow-lg mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Ramah Lingkungan</h3>
                    <p class="mt-3 text-gray-600">
                        Kurangi limbah fashion dengan preloved. Setiap transaksi membantu mengurangi dampak lingkungan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SELLER CTA -->
    <section class="relative bg-gradient-to-r from-indigo-600 to-indigo-800 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 rounded-full bg-white blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-indigo-300 blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-bold mb-6">
                    Punya baju yang jarang dipakai?
                </h2>
                <p class="text-xl text-indigo-200 mb-10">
                    Jual sekarang dan beri cerita baru untuk fashionmu. Mulai dari Rp 0 biaya pendaftaran.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        @if(auth()->user()->isBuyer())
                            <form method="POST" action="{{ route('seller.upgrade') }}" class="inline-flex">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-lg font-semibold text-indigo-700 hover:bg-indigo-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-lg">
                                    Mulai Jual Sekarang
                                    <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-lg font-semibold text-indigo-700 hover:bg-indigo-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-lg">
                            Daftar Gratis
                            <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </a>
                    @endauth
                    
                    <a href="#" 
                       class="inline-flex items-center justify-center rounded-full border-2 border-white/40 px-8 py-4 text-lg font-medium hover:bg-white/10 hover:border-white/60 transition-all duration-200 backdrop-blur-sm">
                        Pelajari Cara Kerja
                    </a>
                </div>

                <!-- Features -->
                <div class="mt-12 grid grid-cols-2 lg:grid-cols-4 gap-6 max-w-2xl mx-auto">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm">Tanpa Biaya Daftar</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <span class="text-sm">Keamanan Transaksi</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm">Komunitas Aktif</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm">Bantuan 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>