<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', 'Laravel, Blog, Better than WordPress')">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/blog-interactive.js') }}" defer></script>
    @stack('scripts')

    <link rel="icon shortcut" href="{{ asset('favicon.ico') }}">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @auth <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}"> @endauth
    @stack('styles')
    @include('feed::links')
</head>
<body itemscope itemtype="http://schema.org/WebPage" class="bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div id="app" class="min-h-screen">
         @include('layouts.parts.header')

        <main class="flex-grow">
            <div class="@yield('container', 'px-6 py-8 mx-auto max-w-7xl sm:px-8 lg:px-10') animate-fadeInUp" style="animation-delay: 0.2s;">
                @include('components.alert')
                @yield('content')
            </div>
        </main>

        @include('components.noscript')
        @include('layouts.parts.footer')
    </div>

</body>
</html>