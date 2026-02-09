<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left: Brand & Main Links -->
            <div class="flex items-center gap-8">
                <!-- Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center">
                        <img src="{{ asset('images/brand/brand-logo.svg') }}" alt="" srcset="">
                    </div>
                    <span class="font-semibold text-gray-900">
                        ThriftHub
                    </span>
                </a>

                <!-- Main Nav -->
                <div class="hidden sm:flex items-center gap-6 text-sm">
                    <a href="{{ route('products.index') }}"
                       class="text-gray-700 hover:text-indigo-600">
                        Jelajahi
                    </a>

                    @auth
                        @if(auth()->user()->isSeller())
                            <a href="{{ route('seller.products.index') }}"
                               class="text-gray-700 hover:text-indigo-600">
                                Produk Saya
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Right: Actions -->
            <div class="flex items-center gap-4">
                @auth
                    {{-- Buyer CTA --}}
                    @if(auth()->user()->isBuyer())
                        <form method="POST" action="{{ route('seller.upgrade') }}">
                            @csrf
                            <button
                                type="submit"
                                class="hidden sm:inline-flex items-center rounded-md border border-indigo-600 px-3 py-1.5 text-sm text-indigo-600 hover:bg-indigo-50 transition"
                            >
                                Mulai Jual
                            </button>
                        </form>
                    @endif

                    <!-- User Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 text-sm">
                                <span class="text-gray-700">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-width="2" d="M6 8l4 4 4-4"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    Keluar
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Guest -->
                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-700 hover:text-indigo-600">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                        Daftar
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>
