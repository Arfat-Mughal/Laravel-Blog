@extends('layouts.app')

@section('title', config('app.name') . ' - Contact Us')

@section('description', __('contact.description'))

@push('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "{{ config('app.name') }} - Contact",
  "url": "{{ url()->current() }}",
  "description": "Contact form for {{ config('app.name') }}",
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}",
    "url": "{{ url('/') }}"
  }
}
</script>
@endpush

@section('content')
<!-- Contact Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-slate-900 dark:via-blue-900 dark:to-purple-900 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 via-purple-600/5 to-pink-600/5"></div>
    <div class="absolute top-20 left-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
    
    <div class="relative container mx-auto px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight mb-6 animate-fadeInUp">
                <span class="block bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 dark:from-blue-400 dark:via-purple-400 dark:to-blue-600 bg-clip-text text-transparent">
                    {{ __('contact.get_in_touch') }}
                </span>
            </h1>
            <p class="text-xl sm:text-2xl text-gray-600 dark:text-gray-300 mb-12 leading-relaxed animate-fadeInUp" style="animation-delay: 0.2s;">
                {{ __('contact.hero_text') }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-20 bg-white dark:bg-slate-800">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Contact Form -->
            <div class="animate-on-scroll">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ __('contact.send_message') }}</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8">{{ __('contact.form_intro') }}</p>
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('contact.store', app()->getLocale()) }}" method="POST" class="space-y-4 sm:space-y-6 p-4 sm:p-0" data-loading>
                    @csrf
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('contact.name') }}</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            value="{{ old('name') }}"
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 dark:border-slate-600 rounded-md sm:rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 {{ $errors->has('name') ? 'border-red-500 dark:border-red-500' : '' }}"
                            placeholder="{{ __('contact.your_name') }}"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('contact.email') }}</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            value="{{ old('email') }}"
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 dark:border-slate-600 rounded-md sm:rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 {{ $errors->has('email') ? 'border-red-500 dark:border-red-500' : '' }}"
                            placeholder="{{ __('contact.your_email') }}"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('contact.subject') }}</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            required
                            value="{{ old('subject') }}"
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 dark:border-slate-600 rounded-md sm:rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 {{ $errors->has('subject') ? 'border-red-500 dark:border-red-500' : '' }}"
                            placeholder="{{ __('contact.message_subject') }}"
                        >
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('contact.message') }}</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="4 sm:rows-5"
                            required
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 dark:border-slate-600 rounded-md sm:rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white dark:bg-slate-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 resize-none min-h-[100px] {{ $errors->has('message') ? 'border-red-500 dark:border-red-500' : '' }}"
                            placeholder="{{ __('contact.your_message') }}"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        {{ __('contact.send_message') }}
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-6 sm:space-y-8 animate-on-scroll" style="animation-delay: 0.1s;">
                <div class="text-center lg:text-left">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-2 sm:mb-4">{{ __('contact.contact_information') }}</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">{{ __('contact.info_intro') }}</p>
                </div>
                
                <div class="space-y-4 sm:space-y-6">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm sm:font-semibold text-gray-900 dark:text-white">{{ __('contact.email_label') }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">hello@{{ config('app.name', 'example.com') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('contact.phone_label') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('contact.address_label') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">123 Blog Street<br>Tech City, CA 12345</p>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6 border-t border-gray-200 dark:border-slate-700">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-3">{{ __('contact.follow_us') }}</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 01-1.93.07 4.28 4.28 0 004 2.98 8.521 8.521 0 01-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50 dark:bg-slate-900">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                {{ __('contact.faq_title') }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                {{ __('contact.faq_description') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ __('contact.faq.contribute.question') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('contact.faq.contribute.answer') }}</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ __('contact.faq.topics.question') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('contact.faq.topics.answer') }}</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ __('contact.faq.response_time.question') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('contact.faq.response_time.answer') }}</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-slate-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ __('contact.faq.advertising.question') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('contact.faq.advertising.answer') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection