{{-- Enhanced Article Item Component --}}
@php
    $content = $post->contents->first();
    $featured = $featured ?? false;
    $cardClass = $featured ? 'lg:col-span-2' : '';
@endphp

<article 
    class="group bg-white dark:bg-slate-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden border border-gray-100 dark:border-slate-700 {{ $cardClass }} {{ $class ?? '' }}"
    style="{{ $style ?? '' }}"
    itemscope 
    itemtype="https://schema.org/BlogPosting"
    itemprop="blogPost"
>
    <!-- Image Container -->
    <div class="relative overflow-hidden {{ $featured ? 'h-64 md:h-80' : 'h-48 md:h-56' }}">
        @if(!empty($post->thumbnail_path))
            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="relative h-full">
                <img 
                    itemprop="url" 
                    src="{{ $post->thumbnail }}" 
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                    alt="{{ $content->title }} - {{ config('app.name') }}" 
                    width="{{ $featured ? '800' : '600' }}" 
                    height="{{ $featured ? '400' : '300' }}"
                    loading="lazy"
                >
                <meta itemprop="width" content="{{ $featured ? '800' : '600' }}">
                <meta itemprop="height" content="{{ $featured ? '400' : '300' }}">
                <meta itemprop="thumbnailUrl" content="{{ $post->thumbnail }}">
                
                <!-- Gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Featured badge -->
                @if($featured)
                    <div class="absolute top-4 left-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Featured
                    </div>
                @endif
                
                <!-- Reading time badge -->
                <div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm text-gray-700 dark:text-gray-300 px-3 py-1 rounded-full text-sm font-medium">
                    {{ rand(3, 8) }} min read
                </div>
            </div>
        @else
            <div class="h-full bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 flex items-center justify-center relative">
                <div class="text-white text-6xl opacity-20">
                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    </svg>
                </div>
                @if($featured)
                    <div class="absolute top-4 left-4 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Featured
                    </div>
                @endif
                <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                    {{ rand(3, 8) }} min read
                </div>
            </div>
        @endif
    </div>

    <!-- Content Container -->
    <div class="p-6 {{ $featured ? 'md:p-8' : '' }}">
        <!-- Category and Date -->
        <div class="flex items-center gap-4 mb-4 text-sm">
            @if($post->categories->first())
                <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 px-3 py-1 rounded-full font-medium">
                    {{ $post->categories->first()->contents->first()->title }}
                </span>
            @endif
            <time 
                class="text-gray-500 dark:text-gray-400 flex items-center"
                itemprop="datePublished"
                datetime="{{ $content->created_at->toISOString() }}"
            >
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $content->created_at->format('M d, Y') }}
            </time>
        </div>

        <!-- Title -->
        <h3 class="mb-4">
            <a 
                href="{{ route('posts.show', [app()->getLocale(), $content->url]) }}" 
                class="block {{ $featured ? 'text-2xl md:text-3xl' : 'text-xl' }} font-bold text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 line-clamp-2"
            >
                <span itemprop="headline name">{{ $content->title }}</span>
            </a>
        </h3>
        
        <!-- Hidden metadata for SEO -->
        <meta itemprop="dateCreated" content="{{ $content->created_at->toISOString() }}">
        <meta itemprop="dateModified" content="{{ $content->updated_at->toISOString() }}">
        <meta itemprop="url" content="{{ route('posts.show', [app()->getLocale(), $content->url]) }}">
        
        <!-- Author -->
        <div itemprop="author" itemscope itemtype="https://schema.org/Person" class="mb-4">
            <meta itemprop="name" content="{{ $post->author->full_name }}">
            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold mr-2">
                    {{ substr($post->author->full_name, 0, 1) }}
                </div>
                <span class="font-medium">{{ $post->author->full_name }}</span>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed {{ $featured ? 'text-lg' : '' }} line-clamp-3" itemprop="description articleBody">
            {{ Str::limit($content->description, $featured ? 200 : 120) }}
        </p>

        <!-- Footer -->
        <div class="flex items-center justify-between">
            <a 
                href="{{ route('posts.show', [app()->getLocale(), $content->url]) }}" 
                class="group inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-semibold transition-colors duration-300"
            >
                {{ __('Read More') }}
                <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            
            <!-- Social actions -->
            <div class="flex items-center space-x-3">
                <button class="p-2 text-gray-400 hover:text-red-500 transition-colors duration-300 hover:scale-110 transform" aria-label="Like post">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </button>
                <button class="p-2 text-gray-400 hover:text-blue-500 transition-colors duration-300 hover:scale-110 transform" aria-label="Share post">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Publisher information for SEO -->
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style="display: none;">
        <meta itemprop="name" content="{{ config('app.name') }}">
        <meta itemprop="url" content="{{ url('/') }}">
    </div>
</article>