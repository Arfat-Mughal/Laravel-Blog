<header class="glass-effect shadow-lg relative z-50 animate-fadeInUp" itemscope itemtype="http://schema.org/WPHeader">
    <div class="absolute inset-0 gradient-bg opacity-5"></div>
    <nav class="flex flex-wrap items-center justify-between px-4 sm:px-6 py-3 sm:py-4 mx-auto max-w-7xl relative z-10">
        <!-- Logo/Brand -->
        <a class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent hover:scale-105 transition-transform duration-300 flex-shrink-0" 
           href="{{ url('/') }}" itemprop="name">
            {{ __('app_name') }}
        </a>
        
        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-600 hover:text-gray-800 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 relative z-50"
                type="button" id="hamburger-btn" aria-label="{{ __('Toggle navigation') }}">
            <svg class="w-6 h-6 transform transition-transform duration-200" id="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex md:flex-grow md:justify-start ml-5 animate-slideInRight" id="navbarMain">
            <ul class="flex space-x-6 lg:space-x-8" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li class="nav-item" itemprop="hasPart">
                    <a class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200 text-sm lg:text-base"
                       itemprop="url" href="{{ route('index', app()->getLocale()) }}">{{ __('Home') }}</a>
                </li>

                <li class="relative nav-item dropdown" itemprop="hasPart">
                    <a class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium flex items-center text-sm lg:text-base" 
                       href="#" role="button">
                        {{ __('Categories') }}
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>

                    <div class="dropdown-menu absolute bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-20 min-w-max overflow-hidden">
                        <a itemprop="url" class="block px-4 lg:px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-gray-900 transition-all duration-200 text-sm" 
                           href="{{ route('categories.index', app()->getLocale()) }}">
                            {{ __('All') }}
                        </a>

                        @foreach(App\Models\Category::with('content')->get() as $category)
                            @php $content = $category->content()->first(); @endphp
                            @if(!empty($content))
                                <span itemprop="hasPart">
                                    <a itemprop="url" class="block px-4 lg:px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-gray-900 transition-all duration-200 border-t border-gray-100 text-sm" 
                                       href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}">
                                        {{ __($content->title) }}
                                    </a>
                                </span>
                            @endif
                        @endforeach
                    </div>
                </li>

                <li class="nav-item" itemprop="hasPart">
                    <a itemprop="url" class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200 text-sm lg:text-base" 
                       href="{{ route('posts.index', app()->getLocale()) }}">{{ __('Posts') }}</a>
                </li>

                <li class="nav-item" itemprop="hasPart">
                    <a class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200 text-sm lg:text-base"
                       href="{{ route('contact', app()->getLocale()) }}">{{ __('contact_us') }}</a>
                </li>
            </ul>
        </div>

        <!-- Desktop Right Section -->
        <div class="hidden md:flex md:flex-grow md:justify-end animate-slideInRight" id="navbarMainRight">
            <div class="flex items-center space-x-2 lg:space-x-4 ml-4 lg:ml-8">
                <!-- Language Dropdown -->
                <div class="relative dropdown">
                    <button class="flex items-center space-x-2 px-2 lg:px-3 py-2 text-xs lg:text-sm text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition-all duration-200 font-medium">
                        <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.020.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="hidden sm:inline">{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="w-3 h-3 lg:w-4 lg:h-4 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div class="dropdown-menu absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-30 min-w-max overflow-hidden">
                       @foreach (config('blog.available_locales') as $locale)
                            @php
                                $route = request()->route();
                                $params = $route ? $route->parameters() : [];
                                $params['lang'] = $locale;

                                // Use current route name if available, otherwise fallback to index
                                $url = ($route && $route->getName())
                                    ? route($route->getName(), $params)
                                    : route('index', $locale);
                            @endphp

                            <a href="{{ $url }}" class="flex items-center px-4 py-3 text-xs lg:text-sm transition-all duration-200
                                @if(app()->getLocale() == $locale) 
                                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 font-semibold border-l-4 border-blue-500
                                @else 
                                    text-gray-700 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 hover:text-gray-900
                                @endif">
                                <span class="mr-2 lg:mr-3 text-base lg:text-lg">
                                    @if($locale == 'en') 🇺🇸
                                    @elseif($locale == 'pl') 🇵🇱
                                    @elseif($locale == 'es') 🇪🇸
                                    @elseif($locale == 'fr') 🇫🇷
                                    @elseif($locale == 'ar') 🇸🇦
                                    @elseif($locale == 'zh') 🇨🇳
                                    @elseif($locale == 'hi') 🇮🇳
                                    @elseif($locale == 'ru') 🇷🇺
                                    @elseif($locale == 'pt') 🇵🇹
                                    @else 🌐
                                    @endif
                                </span>
                                <div class="flex flex-col">
                                    <span class="font-medium">{{ strtoupper($locale) }}</span>
                                    <span class="text-xs text-gray-500">
                                        @if($locale == 'en') English
                                        @elseif($locale == 'pl') Polski
                                        @elseif($locale == 'es') Español
                                        @elseif($locale == 'fr') Français
                                        @elseif($locale == 'ar') العربية
                                        @elseif($locale == 'zh') 中文
                                        @elseif($locale == 'hi') हिन्दी
                                        @elseif($locale == 'ru') Русский
                                        @elseif($locale == 'pt') Português
                                        @else {{ ucfirst($locale) }}
                                        @endif
                                    </span>
                                </div>
                                @if(app()->getLocale() == $locale)
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 ml-auto text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Search Form -->
                <form method="GET" action="{{ route('posts.index', app()->getLocale()) }}" 
                      class="flex items-center search-container bg-gray-100 rounded-full px-3 lg:px-4 py-2 hover:bg-gray-200 transition-colors duration-200 min-w-0">
                    <input type="search" name="q" 
                           class="bg-transparent border-none focus:outline-none text-gray-700 placeholder-gray-500 text-sm w-20 lg:w-auto min-w-0" 
                           placeholder="{{ __('Search') }}" 
                           aria-label="{{ __('Search') }}" 
                           value="{{ $q ?? '' }}">
                    <button type="submit" class="ml-2 text-gray-500 hover:text-gray-700 transition-colors duration-200 flex-shrink-0">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </form>

                <!-- User Menu (if authenticated) -->
                @auth
                    <div class="relative dropdown">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-xs lg:text-sm">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="font-medium text-sm lg:text-base hidden lg:inline">{{ auth()->user()->name }}</span>
                        </button>

                        <div class="dropdown-menu absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-20 min-w-max overflow-hidden">
                            @include('layouts.parts.menu')
                        </div>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Enhanced Mobile Menu -->
        <!-- Mobile Menu with Smaller Icons -->
<div class="md:hidden mobile-menu fixed inset-y-0 left-0 z-50 w-80 max-w-[85vw] bg-gradient-to-br from-white/95 to-gray-50/95 backdrop-blur-xl shadow-2xl border-r border-white/20" id="mobileMenu">
    <!-- Menu Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 to-purple-50/30 opacity-60"></div>
    <div class="absolute top-20 right-10 w-32 h-32 bg-blue-200/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-40 left-10 w-24 h-24 bg-purple-200/20 rounded-full blur-2xl"></div>
    
    <div class="relative z-10 h-full flex flex-col">
        <!-- Menu Header -->
        <div class="px-6 py-6 border-b border-gray-200/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center shadow-lg">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Menu</h2>
                        <p class="text-xs text-gray-500">Navigation</p>
                    </div>
                </div>
                <button id="close-menu-btn" class="p-2 rounded-lg hover:bg-white/80 transition-all duration-200 group">
                    <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-800 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Navigation Links -->
        <div class="flex-1 px-4 py-6 overflow-y-auto">
            <nav class="space-y-2">
                <a href="{{ route('index', app()->getLocale()) }}" 
                   class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:text-gray-900 hover:bg-white/80 transition-all duration-200 group">
                    <div class="w-6 h-6 rounded-md bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                        <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ __('Home') }}</span>
                </a>
                
                <!-- Categories with Dropdown -->
                <div class="mobile-dropdown">
                    <button class="flex items-center justify-between w-full px-4 py-3 rounded-lg text-gray-700 hover:text-gray-900 hover:bg-white/80 transition-all duration-200 group" 
                            data-toggle="mobile-categories">
                        <div class="flex items-center">
                            <div class="w-6 h-6 rounded-md bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                <svg class="w-3.5 h-3.5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                </svg>
                            </div>
                            <span class="font-medium">{{ __('Categories') }}</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="mobile-categories" class="mt-2 ml-9 space-y-1 overflow-hidden" style="display: none;">
                        <a href="{{ route('categories.index', app()->getLocale()) }}" 
                           class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-white/60 rounded-md transition-all duration-200 border-l-2 border-transparent hover:border-purple-300">
                            {{ __('All Categories') }}
                        </a>
                        @foreach(App\Models\Category::with('content')->get() as $category)
                            @php $content = $category->content()->first(); @endphp
                            @if(!empty($content))
                                <a href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}" 
                                   class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-white/60 rounded-md transition-all duration-200 border-l-2 border-transparent hover:border-purple-300">
                                    {{ __($content->title) }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <a href="{{ route('posts.index', app()->getLocale()) }}" 
                   class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:text-gray-900 hover:bg-white/80 transition-all duration-200 group">
                    <div class="w-6 h-6 rounded-md bg-green-100 flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                        <svg class="w-3.5 h-3.5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ __('Posts') }}</span>
                </a>
                
                <a href="{{ route('contact', app()->getLocale()) }}" 
                   class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:text-gray-900 hover:bg-white/80 transition-all duration-200 group">
                    <div class="w-6 h-6 rounded-md bg-orange-100 flex items-center justify-center mr-3 group-hover:bg-orange-200 transition-colors">
                        <svg class="w-3.5 h-3.5 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ __('Contact Us') }}</span>
                </a>
            </nav>
        </div>

        <!-- Bottom Section -->
        <div class="px-4 pb-6 space-y-4">
            <!-- Search -->
            <div class="bg-white/60 rounded-lg p-4 backdrop-blur-sm border border-white/40">
                <form method="GET" action="{{ route('posts.index', app()->getLocale()) }}" 
                      class="flex items-center">
                    <div class="w-6 h-6 rounded-md bg-gray-100 flex items-center justify-center mr-3">
                        <svg class="w-3.5 h-3.5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="search" name="q" 
                           class="flex-1 bg-transparent border-none focus:outline-none text-gray-700 placeholder-gray-500" 
                           placeholder="{{ __('Search posts...') }}" 
                           value="{{ $q ?? '' }}">
                    <button type="submit" class="px-3 py-1.5 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-lg text-sm font-medium hover:from-blue-600 hover:to-purple-600 transition-all duration-200">
                        Go
                    </button>
                </form>
            </div>

            <!-- Language Selector -->
            <div class="bg-white/60 rounded-lg backdrop-blur-sm border border-white/40">
                <div class="mobile-dropdown">
                    <button class="flex items-center justify-between w-full px-4 py-3 text-gray-700 hover:text-gray-900 transition-colors duration-200" 
                            data-toggle="mobile-languages">
                        <div class="flex items-center">
                            <div class="w-6 h-6 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                <svg class="w-3.5 h-3.5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="font-medium block">Language</span>
                                <span class="text-xs text-gray-500">{{ strtoupper(app()->getLocale()) }}</span>
                            </div>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="mobile-languages" class="px-4 pb-3 space-y-1 max-h-48 overflow-y-auto" style="display: none;">
                        @foreach (config('blog.available_locales') as $locale)
                            @php
                                $route = request()->route();
                                $params = $route ? $route->parameters() : [];
                                $params['lang'] = $locale;

                                $url = ($route && $route->getName())
                                    ? route($route->getName(), $params)
                                    : route('index', $locale);
                            @endphp

                            <a href="{{ $url }}" class="flex items-center px-3 py-2 text-sm rounded-md transition-all duration-200
                                @if(app()->getLocale() == $locale) 
                                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 font-semibold border border-blue-200
                                @else 
                                    text-gray-600 hover:text-gray-800 hover:bg-white/60
                                @endif">
                                <span class="mr-3 text-base">
                                    @if($locale == 'en') 🇺🇸
                                    @elseif($locale == 'pl') 🇵🇱
                                    @elseif($locale == 'es') 🇪🇸
                                    @elseif($locale == 'fr') 🇫🇷
                                    @elseif($locale == 'ar') 🇸🇦
                                    @elseif($locale == 'zh') 🇨🇳
                                    @elseif($locale == 'hi') 🇮🇳
                                    @elseif($locale == 'ru') 🇷🇺
                                    @elseif($locale == 'pt') 🇵🇹
                                    @else 🌐
                                    @endif
                                </span>
                                <div class="flex-1">
                                    <div class="font-medium">{{ strtoupper($locale) }}</div>
                                    <div class="text-xs opacity-70">
                                        @if($locale == 'en') English
                                        @elseif($locale == 'pl') Polski
                                        @elseif($locale == 'es') Español
                                        @elseif($locale == 'fr') Français
                                        @elseif($locale == 'ar') العربية
                                        @elseif($locale == 'zh') 中文
                                        @elseif($locale == 'hi') हिन्दी
                                        @elseif($locale == 'ru') Русский
                                        @elseif($locale == 'pt') Português
                                        @else {{ ucfirst($locale) }}
                                        @endif
                                    </div>
                                </div>
                                @if(app()->getLocale() == $locale)
                                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced Mobile Menu Styles */
.mobile-menu {
    transform: translateX(-100%);
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.mobile-menu.active {
    transform: translateX(0);
}

/* Smooth dropdown animations */
.mobile-dropdown [id] {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: top;
}

/* Enhanced hover effects */
.mobile-menu a:hover,
.mobile-menu button:hover {
    transform: translateX(2px);
}

/* Icon animations */
.mobile-menu .group:hover svg {
    transform: scale(1.05);
    transition: transform 0.2s ease;
}

/* Scrollbar styling for mobile */
.mobile-menu::-webkit-scrollbar {
    width: 3px;
}

.mobile-menu::-webkit-scrollbar-track {
    background: transparent;
}

.mobile-menu::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

/* Touch-friendly sizing */
@media (max-width: 640px) {
    .mobile-menu {
        width: 90vw;
        max-width: 320px;
    }
}

/* Animation delays for staggered effect */
.mobile-menu nav a:nth-child(1) { animation-delay: 0.1s; }
.mobile-menu nav a:nth-child(2) { animation-delay: 0.15s; }
.mobile-menu nav a:nth-child(3) { animation-delay: 0.2s; }
.mobile-menu nav a:nth-child(4) { animation-delay: 0.25s; }
</style>
    </nav>

    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile dropdown toggles
            const mobileDropdownToggles = document.querySelectorAll('[data-toggle]');
            
            mobileDropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-toggle');
                    const content = document.getElementById(targetId);
                    const arrow = this.querySelector('svg:last-child');
                    
                    if (content.style.display === 'none' || content.style.display === '') {
                        content.style.display = 'block';
                        content.style.opacity = '0';
                        content.style.transform = 'translateY(-10px)';
                        
                        requestAnimationFrame(() => {
                            content.style.transition = 'all 0.3s ease';
                            content.style.opacity = '1';
                            content.style.transform = 'translateY(0)';
                        });
                        
                        if (arrow) arrow.style.transform = 'rotate(180deg)';
                    } else {
                        content.style.opacity = '0';
                        content.style.transform = 'translateY(-10px)';
                        
                        setTimeout(() => {
                            content.style.display = 'none';
                        }, 300);
                        
                        if (arrow) arrow.style.transform = 'rotate(0deg)';
                    }
                });
            });

            // Close mobile dropdowns when menu closes
            const mobileMenu = document.getElementById('mobileMenu');
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        if (!mobileMenu.classList.contains('active')) {
                            // Reset all mobile dropdowns
                            const dropdowns = document.querySelectorAll('[data-toggle]');
                            dropdowns.forEach(dropdown => {
                                const targetId = dropdown.getAttribute('data-toggle');
                                const content = document.getElementById(targetId);
                                const arrow = dropdown.querySelector('svg:last-child');
                                
                                if (content) {
                                    content.style.display = 'none';
                                    content.style.opacity = '0';
                                    content.style.transform = 'translateY(-10px)';
                                }
                                
                                if (arrow) arrow.style.transform = 'rotate(0deg)';
                            });
                        }
                    }
                });
            });

            observer.observe(mobileMenu, { attributes: true, attributeFilter: ['class'] });

            // Auto-close mobile menu on navigation
            const mobileNavLinks = document.querySelectorAll('#mobileMenu a');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', () => {
                    // Close mobile menu after a small delay to allow navigation
                    setTimeout(() => {
                        if (window.initializeMobileMenu) {
                            const hamburgerBtn = document.getElementById('hamburger-btn');
                            if (hamburgerBtn && mobileMenu.classList.contains('active')) {
                                hamburgerBtn.click();
                            }
                        }
                    }, 100);
                });
            });
        });
    </script>

    <style>
        /* Enhanced mobile header styles */
        @media (max-width: 767px) {
            /* Ensure proper mobile spacing */
            .mobile-menu {
                backdrop-filter: blur(20px);
            }
            
            /* Mobile search input focus */
            .mobile-menu input:focus {
                background-color: rgba(243, 244, 246, 0.8);
                border-radius: 0.5rem;
                padding: 0.25rem 0.5rem;
                margin: -0.25rem -0.5rem;
            }
            
            /* Mobile dropdown animations */
            .mobile-dropdown [id] {
                transition: all 0.3s ease;
            }
            
            /* Mobile touch targets */
            .mobile-menu a,
            .mobile-menu button {
                min-height: 44px;
                display: flex;
                align-items: center;
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            /* Tablet optimizations */
            .search-container input {
                width: 120px;
            }
            
            #navbarMainRight .space-x-2 {
                gap: 0.5rem;
            }
        }

        /* Improved responsive breakpoints */
        @media (max-width: 640px) {
            nav {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .mobile-menu {
                width: 85vw;
                max-width: 280px;
            }
        }

        /* Enhanced dropdown hover effects */
        .dropdown-menu {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.95);
        }

        /* Smooth logo scaling */
        header a[itemprop="name"] {
            transform-origin: left center;
        }

        /* Mobile menu backdrop */
        .mobile-menu::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            pointer-events: none;
        }
        
        /* Loading states for mobile navigation */
        .mobile-menu a.loading {
            opacity: 0.6;
            pointer-events: none;
        }
        
        .mobile-menu a.loading::after {
            content: '';
            width: 12px;
            height: 12px;
            border: 2px solid #e5e5e5;
            border-top: 2px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</header>