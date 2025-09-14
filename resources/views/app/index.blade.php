@extends('layouts.app')

@section('title', config('app.name') . ' - Modern Blog Platform')
@section('description', 'Discover insightful articles, tutorials, and stories on our modern blog platform. Better than WordPress, powered by Laravel with cutting-edge technology.')
@section('keywords', 'Laravel Blog, Modern Blog, Tech Articles, Tutorials, Web Development, Programming, Better than WordPress')

@push('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "{{ config('app.name') }}",
  "description": "Modern blog platform with insightful articles and tutorials",
  "url": "{{ url('/') }}",
  "author": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}",
    "url": "{{ url('/') }}"
  }
}
</script>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-slate-900 dark:via-blue-900 dark:to-purple-900 py-20 sm:py-28">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-600/5 via-purple-600/5 to-pink-600/5"></div>
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-128 h-128 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-400 rounded-full animate-ping" style="animation-delay: 0s;"></div>
        <div class="absolute top-1/3 right-1/4 w-1 h-1 bg-purple-400 rounded-full animate-ping" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-1/3 left-1/3 w-1.5 h-1.5 bg-pink-400 rounded-full animate-ping" style="animation-delay: 4s;"></div>
    </div>
    
    <div class="relative container mx-auto px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight mb-8 animate-fadeInUp">
                <span class="block bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 dark:from-blue-400 dark:via-purple-400 dark:to-blue-600 bg-clip-text text-transparent">
                    {{ __('welcome_to') }}
                </span>
                <span class="block mt-2 bg-gradient-to-r from-slate-900 via-blue-900 to-purple-900 dark:from-white dark:via-blue-100 dark:to-purple-100 bg-clip-text text-transparent">
                    {{ config('app.name') }}
                </span>
            </h1>
            
            <p class="text-xl sm:text-2xl text-gray-600 dark:text-gray-300 mb-12 leading-relaxed animate-fadeInUp" style="animation-delay: 0.2s;">
                Discover insightful articles, cutting-edge tutorials, and inspiring stories. 
                <span class="font-semibold text-blue-600 dark:text-blue-400">Better than WordPress</span>, 
                powered by modern technology.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fadeInUp" style="animation-delay: 0.4s;">
                <a href="#featured-posts" class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    Explore Articles
                    <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="#categories" class="inline-flex items-center px-8 py-4 bg-white dark:bg-slate-800 text-gray-900 dark:text-white font-semibold rounded-full border-2 border-gray-200 dark:border-slate-600 hover:border-blue-300 dark:hover:border-blue-500 transform hover:scale-105 transition-all duration-300 shadow-sm hover:shadow-lg">
                    Browse Categories
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-slate-700">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="animate-on-scroll">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">{{ $posts->count() ?? '50' }}+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Articles</div>
            </div>
            <div class="animate-on-scroll" style="animation-delay: 0.1s;">
                <div class="text-3xl md:text-4xl font-bold text-purple-600 dark:text-purple-400 mb-2">{{ $categories->count() ?? '10' }}+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Categories</div>
            </div>
            <div class="animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="text-3xl md:text-4xl font-bold text-green-600 dark:text-green-400 mb-2">10K+</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Readers</div>
            </div>
            <div class="animate-on-scroll" style="animation-delay: 0.3s;">
                <div class="text-3xl md:text-4xl font-bold text-pink-600 dark:text-pink-400 mb-2">24/7</div>
                <div class="text-gray-600 dark:text-gray-300 font-medium">Updates</div>
            </div>
        </div>
    </div>
</section>

@if($posts->count() > 0)
<!-- Featured Posts Section -->
<section id="featured-posts" class="py-20 bg-gray-50 dark:bg-slate-900" itemscope itemtype="https://schema.org/Blog">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Featured <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Articles</span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Discover our latest insights, tutorials, and stories curated just for you
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($posts as $index => $post)
                <x-post-item :post="$post" :featured="$index < 3" :class="'animate-on-scroll'" :style="'animation-delay: ' . ($index * 0.1) . 's;'" />
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('posts.index', app()->getLocale()) }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                View All Articles
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

@if($categories->count() > 0)
<!-- Categories Section -->
<section id="categories" class="py-20 bg-white dark:bg-slate-800" itemscope itemtype="https://schema.org/ItemList">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Explore <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Categories</span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Browse through our carefully organized content categories to find exactly what you're looking for
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-600 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <meta itemprop="numberOfItems" content="{{ $categories->count() }}">
        <meta itemprop="itemListOrder" content="https://schema.org/ItemListUnordered">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($categories as $index => $category)
                <x-category-item :category="$category" :index="$index + 1" :class="'animate-on-scroll'" :style="'animation-delay: ' . ($index * 0.1) . 's;'" />
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('categories.index', app()->getLocale()) }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                View All Categories
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Newsletter Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white/5 via-transparent to-white/5"></div>
    </div>
    
    <div class="relative container mx-auto px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Stay Updated
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Subscribe to our newsletter and never miss our latest articles, tutorials, and insights
            </p>
            
            <form class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto" data-loading>
                <input 
                    type="email" 
                    placeholder="Enter your email" 
                    class="flex-1 px-6 py-4 rounded-full border-0 text-gray-900 placeholder-gray-500 focus:ring-4 focus:ring-white/30 focus:outline-none"
                    required
                >
                <button 
                    type="submit" 
                    class="px-8 py-4 bg-white text-blue-600 font-semibold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl whitespace-nowrap"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50 dark:bg-slate-900">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Why Choose <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Our Platform</span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Experience the future of blogging with our modern, fast, and SEO-optimized platform
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Lightning Fast</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Built with modern Laravel and optimized for speed. Your content loads instantly, keeping readers engaged.</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.1s;">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">SEO Optimized</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Advanced SEO features and structured data ensure your content ranks well in search engines.</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Mobile First</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Responsive design ensures perfect experience across all devices and screen sizes.</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.3s;">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Secure & Reliable</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Enterprise-grade security with regular updates and reliable hosting infrastructure.</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.4s;">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Rich Content</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Support for multimedia content, code highlighting, and interactive elements.</p>
            </div>
            
            <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll" style="animation-delay: 0.5s;">
                <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-red-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Community Focused</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Built-in commenting system and social sharing to engage with your audience.</p>
            </div>
        </div>
    </div>
</section>
@endsection