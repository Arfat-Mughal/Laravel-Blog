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

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const icon = document.getElementById('menu-icon');
            
            menu.classList.toggle('active');
            
            if (menu.classList.contains('active')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = event.target.closest('[onclick="toggleMobileMenu()"]');
            
            if (!menu.contains(event.target) && !button && menu.classList.contains('active')) {
                toggleMobileMenu();
            }
        });

        // Add loading states and smooth transitions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading spinner to forms
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<div class="loading-spinner w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>';
                    }
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>