@extends('layouts.app')

@section('title', __('app_name'))
@section('description', __('This is a Laravel-Blog App.'))

@section('content')
<div class="relative overflow-hidden">
    <div class="absolute inset-0 gradient-bg opacity-5"></div>
    <div class="relative py-12 sm:py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center animate-fadeInUp">
           <h3 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl tracking-tight bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 bg-clip-text text-transparent mb-8">
            {{ __('welcome_to') }} {{ __('app_name') }}
</h3>
            {{-- <p class="mt-8 max-w-4xl mx-auto text-xl md:text-2xl text-gray-600 leading-relaxed font-light">
                {{ __('This is a Laravel-Blog App.') }}
            </p> --}}
            
            <!-- CTA Buttons -->
            {{-- <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center items-center animate-fadeInUp" style="animation-delay: 0.3s;">
                <a href="{{ route('posts.index', app()->getLocale()) }}" 
                   class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Explore Posts') }}
                </a>
                <a href="{{ route('categories.index', app()->getLocale()) }}" 
                   class="inline-flex items-center px-8 py-4 text-lg font-semibold text-gray-700 bg-white border-2 border-gray-300 rounded-full hover:border-blue-500 hover:text-blue-600 transform hover:scale-105 transition-all duration-300 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Browse Categories') }}
                </a>
            </div> --}}
        </div>
    </div>
</div>
@if($posts->count() > 0)
    <div class="mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" itemscope itemtype="http://schema.org/Blog">
            <h3 class="text-3xl font-bold text-gray-900 text-center mb-8">{{ __('Random') }} {{ __('Posts') }}</h3>
            @foreach($posts as $post)
                <x-post-item :post="$post" />
            @endforeach
        </div>
    </div>
@endif
@if($categories->count() > 0)
    <div class="mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" itemscope itemtype="https://schema.org/ItemList">
            <h3 class="text-3xl font-bold text-gray-900 text-center mb-8">{{ __('Random') }} {{ __('Categories') }}</h3>
            @foreach($categories as $category)
                <meta itemprop="numberOfItems" content="{{$categories->count()}}">
                <meta itemprop="itemListOrder" content="Unordered">
                <x-category-item :category="$category" :index="$loop->index" />
            @endforeach
        </div>
    </div>
@endif
@endsection

