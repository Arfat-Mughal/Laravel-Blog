{{-- Enhanced Category Item Component --}}
@php
    $content = $category->contents->first();
    $colors = ['blue', 'purple', 'green', 'pink', 'indigo', 'yellow', 'red', 'cyan'];
    $color = $colors[($index - 1) % count($colors)];
    $postCount = $category->posts->count() ?? rand(5, 25);
@endphp

<div 
    class="group bg-white dark:bg-slate-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden border border-gray-100 dark:border-slate-700 {{ $class ?? '' }}"
    style="{{ $style ?? '' }}"
    itemprop="itemListElement" 
    itemscope 
    itemtype="https://schema.org/ListItem"
>
    <meta itemprop="position" content="{{ $index }}">
    <meta itemprop="url" content="{{ route('categories.show', [app()->getLocale(), $content->url]) }}">
    
    <!-- Image/Icon Container -->
    <div class="relative h-48 overflow-hidden">
        @if(!empty($category->thumbnail_path))
            <img 
                src="{{ $category->thumbnail }}" 
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                alt="{{ $content->title }} - {{ config('app.name') }}" 
                itemprop="image" 
                width="400" 
                height="200"
                loading="lazy"
            >
            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-{{ $color }}-900/80 via-transparent to-transparent"></div>
        @else
            <!-- Default gradient background with icon -->
            <div class="h-full bg-gradient-to-br from-{{ $color }}-400 via-{{ $color }}-500 to-{{ $color }}-600 flex items-center justify-center relative overflow-hidden">
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100">
                        <defs>
                            <pattern id="grid-{{ $index }}" width="10" height="10" patternUnits="userSpaceOnUse">
                                <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="0.5"/>
                            </pattern>
                        </defs>
                        <rect width="100" height="100" fill="url(#grid-{{ $index }})"/>
                    </svg>
                </div>
                
                <!-- Category icon -->
                <div class="text-white text-6xl relative z-10">
                    @switch($color)
                        @case('blue')
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            @break
                        @case('purple')
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            @break
                        @case('green')
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V7h10v2z"/>
                            </svg>
                            @break
                        @default
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                    @endswitch
                </div>
                
                <!-- Floating elements -->
                <div class="absolute top-4 left-4 w-2 h-2 bg-white/30 rounded-full animate-ping" style="animation-delay: 0s;"></div>
                <div class="absolute bottom-6 right-6 w-1 h-1 bg-white/30 rounded-full animate-ping" style="animation-delay: 2s;"></div>
            </div>
        @endif
        
        <!-- Post count badge -->
        <div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm text-{{ $color }}-600 dark:text-{{ $color }}-400 px-3 py-1 rounded-full text-sm font-semibold">
            {{ $postCount }} {{ $postCount === 1 ? 'post' : 'posts' }}
        </div>
        
        <!-- Trending badge (random) -->
        @if($index <= 3)
            <div class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/>
                </svg>
                Trending
            </div>
        @endif
    </div>

    <!-- Content Container -->
    <div class="p-6">
        <!-- Title -->
        <h3 class="mb-3">
            <a 
                href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}" 
                class="block text-xl font-bold text-gray-900 dark:text-white hover:text-{{ $color }}-600 dark:hover:text-{{ $color }}-400 transition-colors duration-300 group-hover:text-{{ $color }}-600 dark:group-hover:text-{{ $color }}-400"
            >
                <span itemprop="name">{{ $content->title }}</span>
            </a>
        </h3>

        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed line-clamp-2" itemprop="description">
            {{ Str::limit($content->description, 100) }}
        </p>

        <!-- Stats and CTA -->
        <div class="flex items-center justify-between">
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 space-x-4">
                <!-- Articles count -->
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>{{ $postCount }}</span>
                </div>
                
                <!-- Views (mock data) -->
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span>{{ number_format(rand(100, 5000)) }}</span>
                </div>
            </div>
            
            <!-- Explore button -->
            <a 
                href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}" 
                class="group inline-flex items-center text-{{ $color }}-600 dark:text-{{ $color }}-400 hover:text-{{ $color }}-700 dark:hover:text-{{ $color }}-300 font-semibold text-sm transition-all duration-300"
            >
                Explore
                <svg class="ml-1 w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
        
        <!-- Progress bar showing activity -->
        <div class="mt-4 bg-gray-200 dark:bg-slate-700 rounded-full h-2 overflow-hidden">
            <div 
                class="h-full bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-600 rounded-full transition-all duration-1000 ease-out"
                style="width: {{ rand(30, 95) }}%"
            ></div>
        </div>
        
        <!-- Tags (if available) -->
        @if($category->tags ?? false)
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach(collect(['Tech', 'Tutorial', 'Guide'])->take(rand(1, 3)) as $tag)
                    <span class="px-2 py-1 bg-{{ $color }}-100 dark:bg-{{ $color }}-900/30 text-{{ $color }}-700 dark:text-{{ $color }}-300 text-xs rounded-full">
                        #{{ strtolower($tag) }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
    
    <!-- Hover effect overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-{{ $color }}-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
</div>