<article class="flex flex-col md:flex-row gap-4 my-3 p-4 bg-white rounded-lg shadow-md border" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
    @if(!empty($post->thumbnail_path))
        <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject" class="flex-shrink-0">
            <img itemprop="url" src="{{ $post->thumbnail }}" class="w-36 h-36 object-cover rounded-lg" alt="{{ $content->title }} - {{ config('app.name') }}" width="144" height="144">
        </div>
        <meta itemprop="thumbnailUrl" src="{{ $post->thumbnail }}">
    @else
        <x-no-image :content="$content" />
    @endif
    <div class="flex-1 min-w-0">
        <h5 class="mb-2">
            <a href="{{ route('posts.show', [app()->getLocale(), $content->url]) }}" class="text-xl font-semibold text-gray-900 hover:text-blue-600">
                <span itemprop="name">{{ $content->title }}</span>
            </a>
        </h5>
        <meta itemprop="headline" content="{{ $content->title }}">
        <p class="text-sm text-gray-600 mb-3">
            {{ __('Published At') }}: <span itemprop="sdDatePublished" itemscope="Date">
                <meta itemprop="dateCreated" content="{{ $content->created_at->format(config('blog.timestamp_format')) }}">
                <span itemprop="datePublished">{{ $content->created_at->format(config('blog.timestamp_format')) }}</span>
                <meta itemprop="dateModified" content="{{ $content->updated_at->format(config('blog.timestamp_format')) }}">
            </span><br>
            {{ __('Author') }}: <span itemprop="author" class="font-medium">{{ $post->author->full_name }}</span>
        </p>
        <p class="text-gray-700 mb-4" itemprop="articleBody">{{ $content->description }}</p>
        <p class="mb-0"><a href="{{ route('posts.show', [app()->getLocale(), $content->url]) }}" class="text-blue-600 hover:text-blue-800 font-medium">{{ __('Read More') }} →</a></p>
    </div>
</article>
