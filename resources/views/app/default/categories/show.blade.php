@extends('layouts.app')

@section('title', $content->title)
@section('description', $content->description)

@section('content')
<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4" itemprop="name">{{ $content->title }}</h1>
            @if(!empty($category->thumbnail_path))
                <div class="flex justify-center mb-8">
                    <img class="w-64 h-64 object-cover rounded-lg shadow-lg" src="{{ $category->thumbnail }}" alt="{{ $content->title }}" itemprop="image">
                </div>
            @endif
            <div class="max-w-2xl mx-auto text-gray-700 mb-12" itemprop="description">
                {!! Helper::stripTags($content->content) !!}
            </div>
        </div>
        <div class="mb-8" itemscope itemtype="http://schema.org/Blog">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <x-post-item :post="$post" />
                @endforeach
            </div>
        </div>
        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection

