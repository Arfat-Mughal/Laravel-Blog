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
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    @stack('styles')

    <style>
        /* Custom animations and enhanced styles */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.4s ease-out;
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .sidebar-item {
            position: relative;
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            margin: 0.25rem 0.75rem;
        }

        .sidebar-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            transform: translateX(5px);
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 0 3px 3px 0;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar-item:hover::before {
            transform: scaleY(1);
        }

        .dropdown-menu {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .dropdown:hover .dropdown-menu {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .admin-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .breadcrumb-item {
            position: relative;
            transition: all 0.2s ease;
        }

        .breadcrumb-item:hover {
            color: #667eea;
        }

        .sidebar-brand {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div id="app" class="flex h-screen">
        <!-- Enhanced Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white shrink-0 shadow-2xl animate-slideInLeft">
            <div class="relative overflow-hidden">
                <div class="absolute inset-0 gradient-bg opacity-5"></div>
                <ul class="py-6 relative z-10">
                    <li class="px-6 py-4 text-center">
                        <h2 class="text-sm font-bold text-gray-300 uppercase tracking-wider">
                            {{ __('Dashboard') }}
                        </h2>
                        <div class="sidebar-brand text-lg font-bold mt-1">
                            {{ config('app.name') }}
                        </div>
                    </li>

                    <li class="mt-8">
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 mr-3">
                                <i class="fas fa-home text-sm"></i>
                            </div>
                            <span class="font-medium">Start</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.users.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-green-500 to-green-600 mr-3">
                                <i class="fas fa-users text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Users') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.posts.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-purple-500 to-purple-600 mr-3">
                                <i class="fas fa-cubes text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Posts') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.categories.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 mr-3">
                                <i class="fas fa-book text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Categories') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.files-manager') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-red-500 to-red-600 mr-3">
                                <i class="fas fa-folder-open text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Files Manager') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <button class="absolute top-6 right-6 p-2 text-gray-400 hover:text-white transition-all duration-200 hover:bg-gray-700 rounded-lg" type="button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                </svg>
            </button>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col animate-fadeInUp" style="animation-delay: 0.2s;">
            <!-- Enhanced Header -->
            <header class="admin-header glass-effect shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button class="lg:hidden text-gray-600 hover:text-gray-800 p-2 rounded-lg hover:bg-gray-100 transition-all duration-200" type="button">
                            <i class="sidebar-toggler-icon fas fa-bars text-xl"></i>
                        </button>

                        <a class="ml-4 text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent hover:scale-105 transition-transform duration-300" href="{{ url('/') }}">
                            {{ config('app.name') }}
                        </a>
                    </div>

                    <div class="flex items-center space-x-6">
                        <!-- Enhanced Language Dropdown -->
                        <div class="relative dropdown">
                            <button class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition-all duration-200 font-medium" id="languageDropdown">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ strtoupper(app()->getLocale()) }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div class="dropdown-menu absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-30 min-w-max overflow-hidden" id="languageDropdownMenu">
                                @foreach (config('blog.available_locales') as $locale)
                                    <a class="flex items-center px-4 py-3 text-sm transition-all duration-200 
                                             @if(app()->getLocale() == $locale) 
                                                 bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 font-semibold border-l-4 border-blue-500
                                             @else 
                                                 text-gray-700 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 hover:text-gray-900
                                             @endif" 
                                       href="{{ route('admin.set-lang', $locale) }}">
                                        <span class="mr-3 text-lg">
                                            @if($locale == 'en') 🇺🇸
                                            @elseif($locale == 'es') 🇪🇸
                                            @elseif($locale == 'fr') 🇫🇷
                                            @elseif($locale == 'de') 🇩🇪
                                            @elseif($locale == 'it') 🇮🇹
                                            @elseif($locale == 'pt') 🇵🇹
                                            @elseif($locale == 'ru') 🇷🇺
                                            @elseif($locale == 'ja') 🇯🇵
                                            @elseif($locale == 'ko') 🇰🇷
                                            @elseif($locale == 'zh') 🇨🇳
                                            @elseif($locale == 'ar') 🇸🇦
                                            @else 🌐
                                            @endif
                                        </span>
                                        <div class="flex flex-col">
                                            <span class="font-medium">{{ strtoupper($locale) }}</span>
                                            <span class="text-xs text-gray-500">
                                                @if($locale == 'en') English
                                                @elseif($locale == 'es') Español
                                                @elseif($locale == 'fr') Français
                                                @elseif($locale == 'de') Deutsch
                                                @elseif($locale == 'it') Italiano
                                                @elseif($locale == 'pt') Português
                                                @elseif($locale == 'ru') Русский
                                                @elseif($locale == 'ja') 日本語
                                                @elseif($locale == 'ko') 한국어
                                                @elseif($locale == 'zh') 中文
                                                @elseif($locale == 'ar') العربية
                                                @else {{ ucfirst($locale) }}
                                                @endif
                                            </span>
                                        </div>
                                        @if(app()->getLocale() == $locale)
                                            <svg class="w-4 h-4 ml-auto text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Enhanced User Dropdown -->
                        <div class="relative dropdown">
                            <button id="navbarDropdown" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100 transition-all duration-200" type="button" aria-haspopup="true" aria-expanded="false">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <span class="font-medium">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div class="absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-20 min-w-max opacity-0 invisible transition-all duration-300 transform scale-95 origin-top-right overflow-hidden" aria-labelledby="navbarDropdown" id="userDropdownMenu">
                                @include('layouts.parts.menu')
                            </div>
                        </div>
                    </div>
                </div>
            </header>

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