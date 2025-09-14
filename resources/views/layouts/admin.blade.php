<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', 'Laravel, Blog, Better than WordPress')">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow">

    <title>{{ config('app.name') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div id="app" class="flex h-screen">
        @include('layouts.parts.side-admin')
        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col animate-fadeInUp" style="animation-delay: 0.2s;">
            <!-- Enhanced Header -->
            @include('layouts.parts.header-admin')

            <div class="flex-grow overflow-y-auto">
                <!-- Enhanced Breadcrumb -->
                <nav class="px-6 py-3 bg-white border-b border-gray-200" aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-sm">
                        <li class="breadcrumb-item">
                            <a class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium" href="{{ route('admin.index') }}">
                                <i class="fas fa-tachometer-alt mr-1"></i>
                                Admin
                            </a>
                        </li>
                        @yield('breadcrumbs')
                    </ol>
                </nav>

                <!-- Main Content -->
                <main>
                    <div class="@yield('container-fluid', 'px-6 py-8 mx-auto max-w-7xl sm:px-8 lg:px-10')">
                        @include('components.alert')
                        @yield('content')
                    </div>
                </main>
            </div>

            @include('components.noscript')
            @include('layouts.parts.footer-admin')
            @stack('scripts')
        </div>
    </div>

    <script>
        // Enhanced dropdown functionality
        function initializeDropdown(buttonId, menuId) {
            const button = document.getElementById(buttonId);
            const menu = document.getElementById(menuId);
            
            if (!button || !menu) return;
            
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                
                // Close other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                    if (otherMenu !== menu) {
                        otherMenu.classList.add('opacity-0', 'invisible', 'scale-95');
                        otherMenu.classList.remove('opacity-100', 'visible', 'scale-100');
                    }
                });
                
                // Toggle current dropdown
                menu.classList.toggle('opacity-0');
                menu.classList.toggle('invisible');
                menu.classList.toggle('scale-95');
                menu.classList.toggle('opacity-100');
                menu.classList.toggle('visible');
                menu.classList.toggle('scale-100');
                
                // Rotate arrow
                const arrow = button.querySelector('svg:last-child');
                if (arrow) {
                    arrow.style.transform = menu.classList.contains('opacity-100') ? 'rotate(180deg)' : 'rotate(0deg)';
                }
            });
        }

        // Initialize dropdowns
        initializeDropdown('languageDropdown', 'languageDropdownMenu');
        initializeDropdown('navbarDropdown', 'userDropdownMenu');

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            const buttons = document.querySelectorAll('#languageDropdown, #navbarDropdown');
            
            let clickedInsideAnyDropdown = false;
            
            buttons.forEach(button => {
                if (button.contains(event.target)) {
                    clickedInsideAnyDropdown = true;
                }
            });
            
            dropdowns.forEach(dropdown => {
                if (dropdown.contains(event.target)) {
                    clickedInsideAnyDropdown = true;
                }
            });
            
            if (!clickedInsideAnyDropdown) {
                dropdowns.forEach(dropdown => {
                    dropdown.classList.add('opacity-0', 'invisible', 'scale-95');
                    dropdown.classList.remove('opacity-100', 'visible', 'scale-100');
                });
                
                // Reset arrows
                buttons.forEach(button => {
                    const arrow = button.querySelector('svg:last-child');
                    if (arrow) {
                        arrow.style.transform = 'rotate(0deg)';
                    }
                });
            }
        });

        // Add loading states to sidebar links
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar-item');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Add loading state
                    this.style.opacity = '0.7';
                    this.style.pointerEvents = 'none';
                    
                    // Reset after navigation (in case it fails)
                    setTimeout(() => {
                        this.style.opacity = '';
                        this.style.pointerEvents = '';
                    }, 3000);
                });
            });
        });
    </script>
</body>
</html>