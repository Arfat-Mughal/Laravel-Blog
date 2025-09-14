@extends('layouts.app')

@section('title', __('footer.help_center'))

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('footer.help_center') }}</h1>
                <p class="text-lg text-gray-600">{{ __('help.description') }}</p>
            </div>

            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('help.getting_started') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('help.getting_started_content') }}</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>{{ __('help.step_1') }}</li>
                        <li>{{ __('help.step_2') }}</li>
                        <li>{{ __('help.step_3') }}</li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('help.troubleshooting') }}</h2>
                    <p class="text-gray-600">{{ __('help.troubleshooting_content') }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('help.contact_support') }}</h2>
                    <p class="text-gray-600">{{ __('help.contact_support_content') }}</p>
                    <a href="{{ route('contact', app()->getLocale()) }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        {{ __('footer.contact_us') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection