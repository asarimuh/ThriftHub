<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
<div class="navbar flex justify-between shadow-md mx-2 items-center">
    <div class="nav-brand">
        <img src="{{ asset('images/brand/brand-logo.svg') }}" alt="brand lowo">
    </div>
    <div class="nav-links">
        <a href="{{ route('login') }}" class="">Home</a>
        <a href="{{ route('login') }}" class="">Shop</a>
        <a href="{{ route('login') }}" class="">About</a>
    </div>
</div>

<div class="main-container">
    <div class="hero">
        <div class="hero-left">
        
        </div>
        <div class="hero-right">

        </div>
    </div>

    <div class="section section-1">

    </div>
    <div class="section section-2">

    </div>
</div>

</body>
</html>