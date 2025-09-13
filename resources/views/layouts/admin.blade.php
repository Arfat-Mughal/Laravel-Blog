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

    <link rel="icon shortcut" href="{{ asset('favicon.ico') }}">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div id="app" class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <ul class="py-6">
                <li class="px-4 py-2 text-center text-sm font-semibold text-gray-300">{{ __('Dashboard') }} {{ config('app.name') }}</li>

                <li class="mt-6">
                    <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white" href="{{ route('admin.index') }}">
                        <i class="mr-3 fas fa-home"></i> Start
                    </a>
                </li>

                <li>
                    <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white" href="{{ route('admin.users.index') }}">
                        <i class="mr-3 fas fa-users"></i> {{ __('Users') }}
                    </a>
                </li>

                <li>
                    <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white" href="{{ route('admin.posts.index') }}">
                        <i class="mr-3 fas fa-cubes"></i> {{ __('Posts') }}
                    </a>
                </li>

                <li>
                    <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white" href="{{ route('admin.categories.index') }}">
                        <i class="mr-3 fas fa-book"></i> {{ __('Categories') }}
                    </a>
                </li>

                <li>
                    <a class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white" href="{{ route('admin.files-manager') }}">
                        <i class="mr-3 fas fa-folder-open"></i> {{ __('Files Manager') }}
                    </a>
                </li>
            </ul>
            <button class="absolute top-4 right-4 text-gray-500 hover:text-white" type="button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
            </button>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <button class="lg:hidden text-gray-600 focus:outline-none" type="button">
                        <i class="sidebar-toggler-icon fas fa-bars text-xl"></i>
                    </button>

                    <a class="ml-4 text-xl font-bold text-gray-800" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>

                    <ul class="flex items-center space-x-4">
                        @foreach (config('blog.available_locales') as $locale)
                            <li>
                                <a class="px-2 py-1 text-sm text-gray-700 @if (app()->getLocale() == $locale) font-bold text-gray-900 cursor-not-allowed @endif" href="{{ route('admin.set-lang', $locale) }}">{{ strtoupper($locale) }}</a>
                            </li>
                        @endforeach

                        <li class="relative">
                            <a id="navbarDropdown" class="text-gray-700 hover:text-gray-900" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>

                            <div class="absolute right-0 bg-white border rounded-md shadow-lg mt-2 z-10 min-w-max" aria-labelledby="navbarDropdown">
                                @include('layouts.parts.menu')
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <div class="flex-grow overflow-y-auto">
                <!-- Breadcrumb -->
                <nav class="px-4 py-2 bg-white border-b" aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-sm text-gray-600">
                        <li>
                            <a class="hover:text-gray-900" href="{{ route('admin.index') }}">Admin</a>
                        </li>
                        @yield('breadcrumbs')
                    </ol>
                </nav>

                <!-- Main Content -->
                <main>
                    <div class="@yield('container-fluid', 'px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8')">
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
</body>
</html>
