<footer class="bg-gray-800 text-white py-4 mt-auto" itemscope itemtype="http://schema.org/WPFooter">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div>
            <ul class="flex space-x-6" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <li class="flex" itemprop="hasPart">
                    <a itemprop="url" class="hover:text-gray-300" href="{{ route('privacy-policy', app()->getLocale()) }}">{{ __('Privacy Policy') }}</a>
                </li>

                <li class="flex" itemprop="hasPart">
                    <a itemprop="url" class="hover:text-gray-300" href="{{ route('about', app()->getLocale()) }}">{{ __('About') }}</a>
                </li>
            </ul>
        </div>
        <div>
            {{ config('app.name') }} &copy; <span itemprop="copyrightYear">{{ now()->year }}</span>
        </div>
    </div>
</footer>
