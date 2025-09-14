<header class="glass-effect shadow-lg relative z-50 animate-fadeInUp" itemscope itemtype="http://schema.org/WPHeader">
    <div class="absolute inset-0 gradient-bg opacity-5"></div>
    <nav class="flex flex-wrap items-center justify-between px-6 py-4 mx-auto max-w-7xl relative z-10">
        <a class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent hover:scale-105 transition-transform duration-300" 
           href="{{ url('/') }}" itemprop="name">
            {{ __('app_name') }}
        </a>
        
        <button class="md:hidden text-gray-600 hover:text-gray-800 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200" 
                type="button" onclick="toggleMobileMenu()" aria-label="{{ __('Toggle navigation') }}">
            <svg class="w-6 h-6 transform transition-transform duration-200" id="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div class="hidden md:flex md:flex-grow md:justify-start ml-5 animate-slideInRight" id="navbarMain">
            <ul class="flex space-x-8" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li class="nav-item" itemprop="hasPart">
                    <a class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200"
                       itemprop="url" href="{{ route('index', app()->getLocale()) }}">{{ __('Home') }}</a>
                </li>

                <li class="relative nav-item dropdown" itemprop="hasPart">
                    <a class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium flex items-center" 
                       href="#" role="button">
                        {{ __('Categories') }}
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>

                    <div class="dropdown-menu absolute bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-20 min-w-max overflow-hidden">
                        <a itemprop="url" class="block px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-gray-900 transition-all duration-200" 
                           href="{{ route('categories.index', app()->getLocale()) }}">
                            {{ __('All') }}
                        </a>

                        @foreach(App\Models\Category::with('content')->get() as $category)
                            @php $content = $category->content()->first(); @endphp
                            @if(!empty($content))
                                <span itemprop="hasPart">
                                    <a itemprop="url" class="block px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-gray-900 transition-all duration-200 border-t border-gray-100" 
                                       href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}">
                                        {{ __($content->title) }}
                                    </a>
                                </span>
                            @endif
                        @endforeach
                    </div>
                </li>

                <li class="nav-item" itemprop="hasPart">
                    <a itemprop="url" class="nav-item-hover text-gray-700 hover:text-gray-900 font-medium transition-colors duration-200" 
                       href="{{ route('posts.index', app()->getLocale()) }}">{{ __('Posts') }}</a>
                </li>
            </ul>
        </div>

        <div class="hidden md:flex md:flex-grow md:justify-end animate-slideInRight" id="navbarMain">
            <div class="flex items-center space-x-4 ml-8">
                <div class="relative dropdown">
                    <button class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition-all duration-200 font-medium">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.020.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
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

                            <a href="{{ $url }}" class="flex items-center px-4 py-3 text-sm transition-all duration-200
                                @if(app()->getLocale() == $locale) 
                                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 font-semibold border-l-4 border-blue-500
                                @else 
                                    text-gray-700 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 hover:text-gray-900
                                @endif">
                                {{-- Flag and text as before --}}
                                <span class="mr-3 text-lg">
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
                                    <svg class="w-4 h-4 ml-auto text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <form method="GET" action="{{ route('posts.index', app()->getLocale()) }}" 
                      class="flex items-center search-container bg-gray-100 rounded-full px-4 py-2 hover:bg-gray-200 transition-colors duration-200">
                    <input type="search" name="q" 
                           class="bg-transparent border-none focus:outline-none text-gray-700 placeholder-gray-500" 
                           placeholder="{{ __('Search') }}" 
                           aria-label="{{ __('Search') }}" 
                           value="{{ $q ?? '' }}">
                    <button type="submit" class="ml-2 text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </form>

                @auth
                    <div class="relative dropdown">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="font-medium">{{ auth()->user()->name }}</span>
                        </button>

                        <div class="dropdown-menu absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-20 min-w-max overflow-hidden">
                            @include('layouts.parts.menu')
                        </div>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden mobile-menu fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl" id="mobileMenu">
            <div class="p-6">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-xl font-bold text-gray-800">{{ __('Menu') }}</h2>
                    <button onclick="toggleMobileMenu()" class="p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                
                <nav class="space-y-4">
                    <a href="{{ route('index', app()->getLocale()) }}" class="block py-2 px-4 rounded-lg hover:bg-gray-100 transition-colors duration-200">{{ __('Home') }}</a>
                    <a href="{{ route('categories.index', app()->getLocale()) }}" class="block py-2 px-4 rounded-lg hover:bg-gray-100 transition-colors duration-200">{{ __('Categories') }}</a>
                    <a href="{{ route('posts.index', app()->getLocale()) }}" class="block py-2 px-4 rounded-lg hover:bg-gray-100 transition-colors duration-200">{{ __('Posts') }}</a>
                </nav>
            </div>
        </div>
    </nav>
</header>