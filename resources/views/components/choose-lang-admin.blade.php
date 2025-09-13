@foreach (config('blog.available_locales') as $locale)
    <a class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium @if (app()->getLocale() == $locale) bg-blue-500 text-white cursor-not-allowed @else bg-gray-200 text-gray-700 hover:bg-gray-300 @endif m-1" href="{{ route('admin.set-lang', $locale) }}">{{ strtoupper($locale) }}</a>
@endforeach
