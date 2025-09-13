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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @auth <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}"> @endauth
    @stack('styles')
    @include('feed::links')
</head>
<body itemscope itemtype="http://schema.org/WebPage">
    <div id="app" class="min-h-screen bg-gray-100">
        <header class="bg-white shadow" itemscope itemtype="http://schema.org/WPHeader">
            <nav class="flex flex-wrap items-center justify-between px-4 py-3 mx-auto max-w-7xl">
                <a class="text-xl font-bold text-gray-800" href="{{ url('/') }}" itemprop="name">
                    {{ config('app.name') }}
                </a>
                <button class="md:hidden text-gray-600 focus:outline-none" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>

                <div class="hidden md:flex md:flex-grow md:justify-end" id="navbarMain">
                    <ul class="flex space-x-6" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                        <li class="nav-item" itemprop="hasPart">
                            <a class="text-gray-700 hover:text-gray-900" itemprop="url" href="{{ route('index', app()->getLocale()) }}">Start</a>
                        </li>

                        <li class="relative nav-item" itemprop="hasPart">
                            <a id="categoriesDropdown" class="text-gray-700 hover:text-gray-900" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Categories') }}
                            </a>

                            <div class="absolute hidden bg-white border rounded-md shadow-lg mt-2 z-10 min-w-max" aria-labelledby="categoriesDropdown">
                                <a itemprop="url" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('categories.index', app()->getLocale()) }}">
                                    {{ __('All') }}
                                </a>

                                @foreach(App\Models\Category::with('content')->get() as $category)
                                    @php $content = $category->content()->first(); @endphp
                                    @if(!empty($content))
                                        <span itemprop="hasPart">
                                            <a itemprop="url" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}">
                                                {{ __($content->title) }}
                                            </a>
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </li>

                        <li class="nav-item" itemprop="hasPart">
                            <a itemprop="url" class="text-gray-700 hover:text-gray-900" href="{{ route('posts.index', app()->getLocale()) }}">{{ __('Posts') }}</a>
                        </li>
                    </ul>

                    <ul class="flex items-center space-x-4 ml-6">
                        @foreach (config('blog.available_locales') as $locale)
                            <li class="nav-item">
                                <a class="text-sm text-gray-700 @if(app()->getLocale() == $locale) font-bold text-gray-900 cursor-not-allowed @endif" href="{{ route('index', $locale) }}">{{ strtoupper($locale) }}</a>
                            </li>
                        @endforeach

                        <form method="GET" action="{{ route('posts.index', app()->getLocale()) }}" class="flex ml-6">
                            <input type="search" name="q" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="{{ __('Search') }}" aria-label="{{ __('Search') }}" value="{{ $q ?? '' }}">
                            <button type="submit" class="ml-2 px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                {{ __('Search') }}
                            </button>
                        </form>

                        @auth
                            <li class="relative nav-item">
                                <a id="navbarDropdown" class="text-gray-700 hover:text-gray-900" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>

                                <div class="absolute right-0 bg-white border rounded-md shadow-lg mt-2 z-10 min-w-max" aria-labelledby="navbarDropdown">
                                    @include('layouts.parts.menu')
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </header>

        <main class="flex-grow">
            <div class="@yield('container', 'px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8')">
                @include('components.alert')
                @yield('content')
            </div>
        </main>

        @include('components.noscript')
        @include('layouts.parts.footer')
    </div>
</body>
</html>
