@extends('layouts.app')

@section('title', __('footer.terms_conditions'))

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('footer.terms_conditions') }}</h1>
                <p class="text-lg text-gray-600">{{ __('terms.description') }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 prose max-w-none">
                {!! __('terms.content') !!}
            </div>
        </div>
    </div>
@endsection