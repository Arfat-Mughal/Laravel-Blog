<!-- Enhanced Footer Component -->
<footer class="bg-gradient-to-br from-slate-900 via-blue-900 to-purple-900 text-white relative overflow-hidden" itemscope itemtype="https://schema.org/WPFooter">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-600/10 via-purple-600/10 to-pink-600/10"></div>
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Floating particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-1 h-1 bg-blue-400/30 rounded-full animate-ping"></div>
        <div class="absolute top-1/2 right-1/3 w-1.5 h-1.5 bg-purple-400/30 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/3 left-1/3 w-1 h-1 bg-pink-400/30 rounded-full animate-ping"></div>
        <div class="absolute top-3/4 right-1/4 w-1 h-1 bg-cyan-400/30 rounded-full animate-ping"></div>
    </div>

    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                
                <!-- Brand Column -->
                <div class="lg:col-span-1">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                                {{ config('app.name') }}
                            </h3>
                            <p class="text-blue-200 text-sm">Modern Blog Platform</p>
                        </div>
                    </div>
                    
                    <p class="text-blue-100 leading-relaxed mb-6">
                        {{ __('footer.discover') }}
                    </p>
                    
                    <!-- Social Links -->
                    <div class="flex space-x-4">
                        <!-- Twitter / X -->
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="Twitter">
                            <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.25 4.25 0 001.85-2.34 8.48 8.48 0 01-2.69 1.03A4.22 4.22 0 0015.5 4c-2.35 0-4.25 1.9-4.25 4.25 0 .33.04.65.1.96A12.01 12.01 0 013 5.1a4.22 4.22 0 001.31 5.66 4.19 4.19 0 01-1.92-.53v.05c0 2.07 1.47 3.8 3.42 4.2a4.3 4.3 0 01-1.91.07 4.23 4.23 0 003.95 2.94A8.47 8.47 0 012 19.54a11.94 11.94 0 006.29 1.84c7.55 0 11.68-6.26 11.68-11.68l-.01-.53A8.18 8.18 0 0022.46 6z"/>
                            </svg>
                        </a>
                        <!-- Facebook -->
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="Facebook">
                            <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12a10 10 0 10-11.5 9.95v-7.05h-2.2V12h2.2V9.8c0-2.2 1.3-3.4 3.3-3.4.95 0 1.9.17 1.9.17v2.1h-1.1c-1.1 0-1.5.68-1.5 1.38V12h2.6l-.42 2.9h-2.18V22A10 10 0 0022 12z"/>
                            </svg>
                        </a>
                        <!-- LinkedIn -->
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="LinkedIn">
                            <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3A2 2 0 0121 5V19A2 2 0 0119 21H5A2 2 0 013 19V5A2 2 0 015 3H19M8.09 17V10.5H5.77V17H8.09M6.93 9.29C7.77 9.29 8.41 8.65 8.41 7.82C8.41 6.99 7.77 6.35 6.93 6.35C6.09 6.35 5.45 6.99 5.45 7.82C5.45 8.65 6.09 9.29 6.93 9.29M18.23 17V13.4C18.23 11.24 17.05 10.21 15.38 10.21C14.23 10.21 13.55 10.87 13.27 11.39H13.23V10.5H10.91V17H13.23V13.76C13.23 12.8 13.77 12.2 14.65 12.2C15.47 12.2 15.89 12.73 15.89 13.74V17H18.23Z"/>
                            </svg>
                        </a>
                        <!-- GitHub -->
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="GitHub">
                            <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0a12 12 0 00-3.8 23.4c.6.1.8-.3.8-.6v-2c-3.3.7-4-1.6-4-1.6-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 .1.6 2 .6 2 .9 1.7 2.7 1.2 3.4.9.1-.7.4-1.2.7-1.5-2.7-.3-5.6-1.4-5.6-6 0-1.3.5-2.3 1.2-3.2-.1-.3-.5-1.5.1-3.2 0 0 1-.3 3.3 1.2a11.3 11.3 0 016 0c2.2-1.5 3.3-1.2 3.3-1.2.6 1.7.2 2.9.1 3.2.7.9 1.2 2 1.2 3.2 0 4.6-2.9 5.7-5.6 6 .4.3.8 1 8.4.2"/>
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group" aria-label="Instagram">
                            <svg class="w-5 h-5 text-blue-200 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7m10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10m-5 3a5 5 0 100 10 5 5 0 000-10m0 2a3 3 0 110 6 3 3 0 010-6m4.8-2.3a1.1 1.1 0 100 2.2 1.1 1.1 0 000-2.2"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">{{ __('footer.quick_links') }}</h4>
                    <ul class="space-y-3 text-blue-100">
                        <li><a href="{{ route('index', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.home') }}</a></li>
                        <li><a href="{{ route('about', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.about_us') }}</a></li>
                        <li><a href="{{ route('posts.index', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.blog') }}</a></li>
                        <li><a href="{{ route('contact', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.contact_us') }}</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">{{ __('footer.resources') }}</h4>
                    <ul class="space-y-3 text-blue-100">
                        <li><a href="{{ route('help', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.help_center') }}</a></li>
                        <li><a href="{{ route('privacy-policy', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.privacy_policy') }}</a></li>
                        <li><a href="{{ route('terms', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.terms_conditions') }}</a></li>
                        <li><a href="{{ route('faq', app()->getLocale()) }}" class="hover:text-white transition-colors">{{ __('footer.faq') }}</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">{{ __('footer.contact') }}</h4>
                    <ul class="space-y-3 text-blue-100">
                        <li><i class="fas fa-map-marker-alt mr-2"></i> {{ __('footer.address') }}</li>
                        <li><i class="fas fa-envelope mr-2"></i> info@example.com</li>
                        <li><i class="fas fa-phone mr-2"></i> +92 300 1234567</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-white/10 py-6 text-center text-blue-200 text-sm">
            © {{ date('Y') }} {{ config('app.name') }}. {{ __('footer.copyright') }}
        </div>
    </div>
</footer>
