@extends('layouts.app')

@section('title', $user->full_name)
@section('description', $content->description ?? '')

@section('content')
<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-6">
            @if(!empty($user->thumbnail_path))
                <img src="{{ $user->avatar }}" alt="{{ $user->full_name }} - {{ config('app.name') }}" itemprop="image" class="w-32 h-32 object-cover rounded-full flex-shrink-0" width="144" height="144">
            @endif
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $user->full_name }}</h1>
                <div class="prose prose-lg text-gray-700 max-w-none">
                    {{ $content->content ?? '' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
