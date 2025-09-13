@extends('layouts.admin')

@section('title', __('Admin Panel'))

@section('content')
@if (!auth()->user()->two_factor_secret)
    <div class="max-w-4xl mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow-md border">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Two Factor Authentication') }}</h3>
            </div>
            <div class="p-6">
                <x-two-factor-manage />
            </div>
        </div>
    </div>
@endif

<div class="max-w-4xl mx-auto px-4 py-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md border p-6 h-full">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-1">{{ __('Posts') }}</div>
                    <h4 class="text-3xl font-bold text-gray-800 mb-0">{{ App\Models\Post::count() }}</h4>
                </div>
                <div class="ml-4">
                    <i class="fas fa-cubes text-3xl text-blue-500"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md border p-6 h-full">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-1">{{ __('Categories') }}</div>
                    <h4 class="text-3xl font-bold text-gray-800 mb-0">{{ App\Models\Category::count() }}</h4>
                </div>
                <div class="ml-4">
                    <i class="fas fa-book text-3xl text-blue-500"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
