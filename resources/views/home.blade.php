<x-app-layout>

    <!-- HERO -->
    <section class="relative bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 rounded-full bg-indigo-400 blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 rounded-full bg-indigo-300 blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div class="text-center lg:text-left">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight tracking-tight">
                    Baju lama,
                    <span class="block text-indigo-200 mt-2">cerita baru.</span>
                </h1>

                <p class="mt-6 text-lg text-indigo-100 max-w-lg mx-auto lg:mx-0">
                    PakaiLagi adalah marketplace preloved untuk jual beli fashion yang masih layak pakai. Hemat, berkelanjutan, dan penuh cerita.
                </p>

                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#products"
                       class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-base font-semibold text-indigo-700 hover:bg-indigo-50 hover:scale-105 active:scale-95 transition-all duration-200 shadow-lg">
                        Jelajahi Produk
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </a>

                    @auth
                        @if(auth()->user()->isBuyer())
                            <form method="POST" action="{{ route('seller.upgrade') }}" class="inline-flex">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-full border-2 border-white/40 px-8 py-4 text-base font-medium hover:bg-white/10 hover:border-white/60 transition-all duration-200 backdrop-blur-sm">
                                    Mulai Jual
                                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center rounded-full border-2 border-white/40 px-8 py-4 text-base font-medium hover:bg-white/10 hover:border-white/60 transition-all duration-200 backdrop-blur-sm">
                            Daftar Gratis
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </a>
                    @endauth
                </div>

                <!-- Stats -->
                <div class="mt-12 grid grid-cols-3 gap-6 max-w-md mx-auto lg:mx-0">
                    <div class="text-center">
                        <div class="text-2xl font-bold">500+</div>
                        <div class="text-sm text-indigo-200 mt-1">Produk Terjual</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">200+</div>
                        <div class="text-sm text-indigo-200 mt-1">Seller Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">4.8★</div>
                        <div class="text-sm text-indigo-200 mt-1">Rating</div>
                    </div>
                </div>
            </div>

            <!-- Hero Visual -->
            <div class="relative mt-12 lg:mt-0">
                <div class="relative mx-auto max-w-md">
                    <!-- Main Card -->
                    <div class="relative rounded-3xl bg-white/10 backdrop-blur-xl border border-white/20 p-8 shadow-2xl">
                        <!-- Product Images Stack -->
                        <div class="relative h-80">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-2xl"></div>
                            
                            <!-- Product Images -->
                            <div class="absolute top-4 left-4 w-3/4 h-64 rounded-2xl overflow-hidden shadow-lg">
                                <div class="w-full h-full bg-gradient-to-br from-indigo-400 to-indigo-600"></div>
                            </div>
                            <div class="absolute top-8 right-4 w-2/3 h-56 rounded-2xl overflow-hidden shadow-lg rotate-3">
                                <div class="w-full h-full bg-gradient-to-br from-indigo-300 to-indigo-500"></div>
                            </div>
                            <div class="absolute bottom-4 left-8 w-3/5 h-48 rounded-2xl overflow-hidden shadow-lg -rotate-3">
                                <div class="w-full h-full bg-gradient-to-br from-indigo-200 to-indigo-400"></div>
                            </div>
                        </div>

                        <!-- Tag -->
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                            <span class="inline-flex items-center rounded-full bg-white px-4 py-1.5 text-xs font-semibold text-indigo-700 shadow-lg">
                                ♻️ Preloved Berkualitas
                            </span>
                        </div>

                        <!-- Price Tag -->
                        <div class="absolute -bottom-4 right-6">
                            <div class="rounded-2xl bg-white px-4 py-2 shadow-xl">
                                <span class="text-xs text-gray-500">Mulai dari</span>
                                <div class="text-lg font-bold text-indigo-700">Rp 49K</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VALUE PROPS -->
    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">
                    Kenapa Memilih PakaiLagi?
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

    <!-- PRODUCTS -->
    <section id="products" class="bg-gradient-to-b from-gray-50 to-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">
                    Produk Terbaru
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Temuan menarik dari seller PakaiLagi
                </p>
            </div>

            @if ($products->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                @if($products->hasPages())
                    <div class="mt-16 flex justify-center">
                        {{ $products->links() }}
                    </div>
                @endif

                <div class="mt-12 text-center">
                    <a href="#" 
                       class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-semibold">
                        Lihat Semua Produk
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            @else
                <div class="py-20 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="h-32 w-32 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-16 h-16 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada produk tersedia</h3>
                        <p class="text-gray-600">
                            Nantikan produk menarik dari seller kami!
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CATEGORIES -->
    @if($categories->count() ?? false)
    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">
                    Jelajahi Kategori
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Temukan berdasarkan jenis dan gaya
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($categories as $category)
                    <a href="#" 
                       class="group p-6 rounded-2xl bg-gray-50 hover:bg-indigo-50 hover:shadow-lg border border-gray-200 hover:border-indigo-200 transition-all duration-200 text-center">
                        <div class="h-12 w-12 rounded-lg bg-white border border-gray-200 group-hover:border-indigo-200 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            @if($category->icon)
                                <span class="text-2xl">{{ $category->icon }}</span>
                            @else
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            @endif
                        </div>
                        <span class="font-medium text-gray-700 group-hover:text-indigo-700">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

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