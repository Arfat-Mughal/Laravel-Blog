@extends('layouts.app')

@section('title', __('Posts'))
@section('description', __('Posts').' '.__('in').' '.config('app.name'))

@section('content')
<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">{{ __('Posts') }}</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" itemscope itemtype="http://schema.org/Blog">
            @foreach($posts as $post)
                <x-post-item :post="$post" />
            @endforeach
        </div>
        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
