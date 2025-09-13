@extends('layouts.app')

@section('title', config('app.name'))
@section('description', __('This is a Laravel-Blog App.'))

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl tracking-tight font-bold text-gray-900">{{ config('app.name') }}</h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">{{ __('This is a Laravel-Blog App.') }}</p>
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
