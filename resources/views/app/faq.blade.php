@extends('layouts.app')

@section('title', __('footer.faq'))

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('footer.faq') }}</h1>
                <p class="text-lg text-gray-600">{{ __('faq.description') }}</p>
            </div>

            <div class="space-y-6">
                @foreach(__('footer.faq_items') as $item)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $item['question'] }}</h2>
                        <p class="text-gray-600">{{ $item['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection