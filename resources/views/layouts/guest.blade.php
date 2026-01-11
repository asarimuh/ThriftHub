<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'PakaiLagi') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Left: Branding / Story -->
        <div
            class="hidden lg:flex flex-col px-12 py-16 bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 text-white min-h-screen">

            <!-- Top: Brand & Intro -->
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <div class="flex h-9 w-9 items-center justify-center">
                        <img src="{{ asset('images/brand/brand-logo-white.svg') }}" alt="brand-logo" srcset="">
                    </div>
                    <span class="text-lg font-semibold tracking-wide">
                        ThriftHub
                    </span>
                </div>

                <h1 class="text-4xl font-bold leading-snug">
                    Baju lama,<br>
                    <span class="text-indigo-200">cerita baru.</span>
                </h1>

                <p class="mt-4 max-w-md text-md text-indigo-100 leading-relaxed">
                    Marketplace jual beli baju bekas maupun baru.
                    Beri kesempatan kedua untuk fashion yang masih layak pakai.
                </p>
            </div>

            <!-- Middle: Value Props -->
            <div class="mt-10 space-y-5">
                <div class="flex items-start gap-3">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-indigo-500/30 text-xl mt-0.5">
                        ✓
                    </div>
                    <div>
                        <p class="text-xl font-medium leading-tight">
                            Jual mudah & aman
                        </p>
                        <p class="mt-0.5 text-sm text-indigo-200">
                            Upload dan jual dalam hitungan menit
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-indigo-500/30 text-xl mt-0.5">
                        $
                    </div>
                    <div>
                        <p class="text-xl font-medium leading-tight">
                            Harga terjangkau
                        </p>
                        <p class="mt-0.5 text-sm text-indigo-200">
                            Fashion berkualitas dengan harga lebih hemat
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-indigo-500/30 text-xl mt-0.5">
                        ♻
                    </div>
                    <div>
                        <p class="text-xl font-medium leading-tight">
                            Dukung keberlanjutan
                        </p>
                        <p class="mt-0.5 text-sm text-indigo-200">
                            Kurangi limbah fashion bersama
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer (Pinned to bottom) -->
            <div class="mt-auto pt-12 text-xs text-indigo-300">
                © {{ date('Y') }} PakaiLagi
            </div>

        </div>

        <!-- Right: Auth Content -->
        <div class="flex flex-col justify-center px-6 py-12 lg:px-20">
            <div class="w-full max-w-md mx-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>