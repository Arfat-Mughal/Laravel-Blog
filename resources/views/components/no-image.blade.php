<svg class="no-image w-36 h-36 flex-shrink-0 mr-4 rounded" @if($width) width="{{ $width }}" style="min-width: {{ $width }}px;" @endif @if($height) height="{{ $height }}" @endif xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: {{ $content->title }}" preserveAspectRatio="xMidYMid slice" role="img">
    <title>{{ $content->title }}</title>
    <rect width="100%" height="100%" fill="{{ $background ?? config('blog.no-image.background') }}"/>
    <text x="50%" y="50%" dy=".3em" fill="{{ $color ?? config('blog.no-image.color') }}" text-anchor="middle">{{ strtoupper($content->title[0]) }}</text>
</svg>
