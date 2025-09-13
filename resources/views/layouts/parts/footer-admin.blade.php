<footer class="mt-auto bg-white border-t border-gray-200 py-4 px-6" itemscope itemtype="http://schema.org/WPFooter">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
        <div class="flex items-center space-x-6">
            <nav class="flex space-x-4" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <a itemprop="url" class="text-gray-600 hover:text-gray-900 transition-colors duration-200 text-sm font-medium" href="{{ route('privacy-policy', app()->getLocale()) }}">
                    {{ __('Privacy Policy') }}
                </a>
                <a itemprop="url" class="text-gray-600 hover:text-gray-900 transition-colors duration-200 text-sm font-medium" href="{{ route('about', app()->getLocale()) }}">
                    {{ __('About') }}
                </a>
            </nav>
        </div>
        
        <div class="text-gray-600 text-sm">
            {{ config('app.name') }} &copy; <span itemprop="copyrightYear" class="font-medium">{{ now()->year }}</span>
        </div>
    </div>
</footer>