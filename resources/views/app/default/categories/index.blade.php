@extends('layouts.app')

@section('title', __('Categories'))
@section('description', __('Categories').' '.__('in').' '.config('app.name'))

@section('content')
<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">{{ __('Categories') }}</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" itemscope itemtype="https://schema.org/ItemList">
            <meta itemprop="numberOfItems" content="{{$categories->total()}}">
            <meta itemprop="itemListOrder" content="Unordered">
            @foreach($categories as $category)
                <x-category-item :category="$category" :index="$loop->index" />
            @endforeach
        </div>
        <div class="text-center">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
