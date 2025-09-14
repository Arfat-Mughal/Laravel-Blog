{{-- Enhanced Header Component (layouts/parts/header.blade.php) --}}
<header class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-lg border-b border-gray-200/50 dark:border-slate-700/50 transition-all duration-300" id="main-header">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8" role="navigation" aria-label="Main navigation">
        <div class="flex justify-between items-center h-16 lg:h-20">
            <!-- Logo/Brand -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('index', app()->getLocale()) }}" class="flex items-center group" aria-label="Home">
                    <!-- Logo Icon -->
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <!-- Brand Name -->
                    <div class="hidden sm:block">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 dark:from-white dark:via-blue-200 dark:to-purple-200 bg-clip-text text-transparent">
                            {{ config('app.name') }}
                        </h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400 -mt-1">Modern Blog Platform</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('index', app()->getLocale()) }}" 
                   class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-300 relative group {{ request()->routeIs('index') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                    {{ __('Home') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300 {{ request()->routeIs('index') ? 'w-full' : '' }}"></span>
                </a>
                
                <a href="{{ route('posts.index', app()->getLocale()) }}" 
                   class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-300 relative group {{ request()->routeIs('posts.*') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                    {{ __('Articles') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300 {{ request()->routeIs('posts.*') ? 'w-full' : '' }}"></span>
                </a>
                
                <a href="{{ route('categories.index', app()->getLocale()) }}" 
                   class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-300 relative group {{ request()->routeIs('categories.*') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                    {{ __('Categories') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300 {{ request()->routeIs('categories.*') ? 'w-full' : '' }}"></span>
                </a>
                
                @if(Route::has('about'))
                <a href="{{ route('about', app()->getLocale()) }}" 
                   class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-300 relative group {{ request()->routeIs('about') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                    {{ __('About') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300 {{ request()->routeIs('about') ? 'w-full' : '' }}"></span>
                </a>
                @endif
                
                @if(Route::has('contact'))
                <a href="{{ route('contact', app()->getLocale()) }}" 
                   class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-300 relative group {{ request()->routeIs('contact') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                    {{ __('Contact') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300 {{ request()->routeIs('contact') ? 'w-full' : '' }}"></span>
                </a>
                @endif
            </div>

            <!-- Right side actions -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                @if(Route::has('search'))
                <div class="hidden md:block relative">
                    <form action="{{ route('search', app()->getLocale()) }}" method="GET" class="relative">
                        <input 
                            type="search" 
                            name="q" 
                            id="search-input"
                            value="{{ request('q') }}"
                            placeholder="{{ __('Search articles...') }}" 
                            class="w-64 pl-10 pr-4 py-2 bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-full text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            autocomplete="off"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </form>
                </div>
                @endif

                <!-- Theme Toggle -->
                <button 
                    id="theme-toggle" 
                    class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 transition-all duration-300"
                    aria-label="Toggle theme"
                >
                    <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 18a6 6 0 100-12 6 6 0 000 12z"/>
                        <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V4a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 5.636a.75.75 0 011.06 0l1.061 1.06a.75.75 0 01-1.06 1.061L5.636 6.697a.75.75 0 010-1.06zm12.728 0a.75.75 0 010 1.06l-1.06 1.061a.75.75 0 11-1.061-1.06l1.06-1.061a.75.75 0 011.061 0zm-6.364 9.192a.75.75 0 01.75.75v1.75a.75.75 0 01-1.5 0v-1.75a.75.75 0 01.75-.75zM1.5 12a.75.75 0 01.75-.75h1.75a.75.75 0 010 1.5H2.25A.75.75 0 011.5 12zm18.5 0a.75.75 0 01.75-.75h1.75a.75.75 0 010 1.5h-1.75a.75.75 0 01-.75-.75zM5.636 18.364a.75.75 0 011.06 0l1.061-1.06a.75.75 0 11-1.06-1.061l-1.061 1.06a.75.75 0 010 1.061zm12.728 0a.75.75 0 010-1.06l-1.06-1.061a.75.75 0 10-1.061 1.06l1.06 1.061a.75.75 0 001.061 0z" clip-rule="evenodd"/>
                    </svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Language Selector -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        <span class="hidden sm:block text-sm font-medium">{{ strtoupper(app()->getLocale()) }}</span>
                    </button>
                    
                    <!-- Language dropdown -->
                    <div class="absolute right-0 top-full mt-2 w-32 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-gray-200 dark:border-slate-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100">
                        <div class="py-2">
                            @php
                                $currentRoute = Route::currentRouteName();
                                $currentParams = Route::current()->parameters();
                            @endphp
                            
                            <a href="{{ $currentRoute && Route::has($currentRoute) ? route($currentRoute, array_merge($currentParams, ['lang' => 'en'])) : url('/en') }}"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ app()->getLocale() === 'en' ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : '' }}">
                                🇺🇸 English
                            </a>
                            <a href="{{ $currentRoute && Route::has($currentRoute) ? route($currentRoute, array_merge($currentParams, ['lang' => 'es'])) : url('/es') }}"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ app()->getLocale() === 'es' ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : '' }}">
                                🇪🇸 Español
                            </a>
                            <a href="{{ $currentRoute && Route::has($currentRoute) ? route($currentRoute, array_merge($currentParams, ['lang' => 'fr'])) : url('/fr') }}"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200 {{ app()->getLocale() === 'fr' ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : '' }}">
                                🇫🇷 Français
                            </a>
                        </div>
                    </div>
                </div>

                @auth
                    <!-- User menu -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 p-2 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 transition-all duration-300">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                            </div>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- User dropdown -->
                        <div class="absolute right-0 top-full mt-2 w-48 bg-white dark:bg-slate-800 rounded-lg shadow-lg border border-gray-200 dark:border-slate-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100">
                            <div class="py-2">
                                <div class="px-4 py-2 border-b border-gray-100 dark:border-slate-700">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name ?? 'User' }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email ?? '' }}</p>
                                </div>
                                @if(Route::has('dashboard'))
                                <a href="{{ route('dashboard', app()->getLocale()) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    {{ __('Dashboard') }}
                                </a>
                                @endif
                                @if(Route::has('profile'))
                                <a href="{{ route('profile', app()->getLocale()) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ __('Profile') }}
                                </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register buttons -->
                    @if(Route::has('login'))
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-colors duration-300">
                        {{ __('Login') }}
                    </a>
                    @endif
                    @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full font-medium transition-colors duration-300">
                        {{ __('Register') }}
                    </a>
                    @endif
                @endauth

                <!-- Mobile menu button -->
                <button 
                    id="mobile-menu-toggle"
                    class="lg:hidden p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-slate-800 transition-all duration-300"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    aria-label="Toggle mobile menu"
                >
                    <svg id="menu-icon" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div 
            id="mobile-menu" 
            class="lg:hidden fixed inset-0 top-16 bg-white dark:bg-slate-900 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out"
            aria-hidden="true"
        >
            <div class="px-4 py-6 space-y-4">
                <!-- Mobile search -->
                @if(Route::has('search'))
                <div class="mb-6">
                    <form action="{{ route('search', app()->getLocale()) }}" method="GET" class="relative">
                        <input 
                            type="search" 
                            name="q" 
                            value="{{ request('q') }}"
                            placeholder="{{ __('Search articles...') }}" 
                            class="w-full pl-10 pr-4 py-3 bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-full text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </form>
                </div>
                @endif

                <!-- Mobile navigation links -->
                <a href="{{ route('index', app()->getLocale()) }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                    {{ __('Home') }}
                </a>
                
                <a href="{{ route('posts.index', app()->getLocale()) }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                    {{ __('Articles') }}
                </a>
                
                <a href="{{ route('categories.index', app()->getLocale()) }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                    {{ __('Categories') }}
                </a>
                
                @if(Route::has('about'))
                <a href="{{ route('about', app()->getLocale()) }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                    {{ __('About') }}
                </a>
                @endif
                
                @if(Route::has('contact'))
                <a href="{{ route('contact', app()->getLocale()) }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                    {{ __('Contact') }}
                </a>
                @endif

                @guest
                <div class="border-t border-gray-200 dark:border-slate-700 pt-4 mt-4">
                    @if(Route::has('login'))
                    <a href="{{ route('login') }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                        {{ __('Login') }}
                    </a>
                    @endif
                    @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="block py-3 text-lg font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                        {{ __('Register') }}
                    </a>
                    @endif
                </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Progress bar for reading -->
    <div id="reading-progress" class="h-1 bg-gradient-to-r from-blue-600 to-purple-600 transform scale-x-0 origin-left transition-transform duration-300"></div>
</header>