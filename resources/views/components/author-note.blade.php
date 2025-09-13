<div class="bg-white rounded-lg shadow-md border p-6" itemprop="author" itemscope itemtype="http://schema.org/Person">
    <div class="flex items-center space-x-4">
        <div class="flex-shrink-0">
            @if(!empty($author->thumbnail_path))
                <img src="{{ $author->avatar }}" alt="{{ $author->full_name }} - {{ config('app.name') }}" itemprop="image" class="w-32 h-32 object-cover rounded-full" width="144" height="144">
            @endif
        </div>
        <div class="flex-1 min-w-0">
            <h5 class="text-xl font-bold text-gray-900 mb-1" itemprop="name">{{ $author->full_name }}</h5>
            <p class="text-gray-600 mb-4" itemprop="description">{{ $content->description ?? '' }}</p>
            <p class="mb-0"><a href="{{ route('author', [app()->getLocale(), $author->url]) }}" class="text-blue-600 hover:text-blue-800 font-medium">{{ __('Read More about author') }}</a></p>
        </div>
    </div>

    @if (!empty($author->website))
        <div class="mt-4 pt-4 border-t">
            <p class="text-sm text-gray-600">{{ __('Author\'s website') }}: <a href="{{ $author->website }}" itemprop="url" class="text-blue-600 hover:text-blue-800">link</a></p>
        </div>
    @endif
</div>
<span class="hidden" itemprop="publisher" itemscope itemtype="http://schema.org/Person">
    <meta itemprop="name" content="{{ $author->full_name }}">
    <span itemprop="description">{{ $content->description ?? '' }}</span>
</span>
