<div class="flex flex-col md:flex-row gap-4 my-3 p-4 bg-white rounded-lg shadow-md border" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <meta itemprop="position" content="{{ $index }}">
    <meta itemprop="url" content="{{ route('categories.show', [app()->getLocale(), $content->url]) }}">
    @if(!empty($category->thumbnail_path))
        <img src="{{ $category->thumbnail }}" class="w-36 h-36 object-cover rounded-lg" alt="{{ $content->title }} - {{ config('app.name') }}" itemprop="image" width="144" height="144">
    @else
        <x-no-image :content="$content" />
    @endif
    <div class="flex-1 min-w-0">
        <h5 class="mb-2">
            <a href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}" class="text-xl font-semibold text-gray-900 hover:text-blue-600">
                <span itemprop="name">{{ $content->title }}</span>
            </a>
        </h5>
        <p class="text-gray-700" itemprop="description">{{ $content->description }}</p>
    </div>
</div>
