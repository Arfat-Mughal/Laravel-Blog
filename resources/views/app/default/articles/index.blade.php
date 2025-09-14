@extends('layouts.app')

@section('title', __('Articles'))
@section('description', __('Articles').' '.__('in').' '.config('app.name'))

@section('content')
<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">{{ __('Articles') }}</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" itemscope itemtype="http://schema.org/Blog">
            @foreach($articles as $article)
                <x-article-item :article="$article" />
            @endforeach
        </div>
        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
