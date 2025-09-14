@extends('layouts.admin')

@php $prefix = empty($article) ? __('Create') : __('Edit'); @endphp
@section('title', $prefix.__('Article'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">{{ __('Posts') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $prefix }}</li>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    @if(!empty($content->url))
        <div class="mb-4 text-right">
            <a href="{{ route('posts.show', [app()->getLocale(), $content->url]) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 active:bg-gray-500 shadow-sm transition duration-150 ease-in-out">
                {{ __('Show') }}
            </a>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md border overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">{{ $prefix }} {{ __('Article') }}</h3>
        </div>
        <div class="p-6">
            <div class="mb-4 text-right">
                <x-choose-lang-admin />
            </div>

            @empty($post)
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @else
                @empty($content)
                    <div class="text-center hidden-form-info">
                        <p>{{ __('There is no data defined for this language.') }}</p>
                        <button type="button" class="hidden-form-toggle inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out" data-toggle="tooltip" title="{{ __('Add data for this language') }}">
                            <i class="fas fa-plus mr-2"></i>
                        </button>
                    </div>
                @endempty

                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="{{ empty($content) ? 'hidden hidden-form' : '' }}">
                @method('PUT')
            @endempty
                @csrf

                <input type="hidden" name="content[lang]" value="{{ app()->getLocale() }}">

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">{{ __('title') }}*</label>
                    <input type="text" id="title" name="content[title]" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('content.title') border-red-500 @enderror" value="{{ $content->title ?? old('content.title') }}" required>
                    @error('content.title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-2">{{ __('url') }}*</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            {{ route('index', app()->getLocale()) }}/posts/
                        </span>
                        <input type="text" id="url" name="content[url]" class="block w-full pl-64 pr-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('content.url') border-red-500 @enderror" value="{{ $content->url ?? old('content.url') }}" required>
                    </div>
                    @error('content.url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">{{ __('content') }}*</label>
                    <textarea id="content" name="content[content]" rows="4" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('content.content') border-red-500 @enderror">{{ $content->content ?? old('content.content') }}</textarea>
                    @error('content.content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @empty($post)
                    <div class="mb-4">
                        <x-input-thumbnail label="thumbnail"></x-input-thumbnail>
                    </div>
                @endempty

                <div class="mb-4">
                    @empty($post)
                        <x-select-categories />
                    @else
                        <x-select-categories :value="Arr::flatten($post->categories()->pluck('id')->values()->toArray()) ?? null" />
                    @endempty
                </div>

                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Tags') }}</label>
                    <input type="text" id="tags" name="tags" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('tags') border-red-500 @enderror" value="{{ $post->tags ?? old('tags') }}">
                    @error('tags')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded @if(!empty($post->is_visible) && $post->is_visible) checked @endif" id="is_visible" name="is_visible">
                        <span class="ml-2 text-sm text-gray-900">{{ __('visible') }}</span>
                    </label>
                </div>

                <div id="release-inputs">
                    <div class="mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-2">
                                <label for="publish_at_date" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Publish At Date') }}</label>
                                <input type="date" id="publish_at_date" name="publish_at_date" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('publish_at_date') border-red-500 @enderror" value="{{ !empty($post->publish_at) ? $post->publish_at->format('Y-m-d') : '' }}">
                                @error('publish_at_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="publish_at_time" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Publish At Time') }}</label>
                                <input type="time" id="publish_at_time" name="publish_at_time" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('publish_at_time') border-red-500 @enderror" value="{{ !empty($post->publish_at) ? $post->publish_at->format('H:i') : '' }}">
                                @error('publish_at_time')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out">
                        {{ $prefix }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(!empty($post))
        <div class="mt-6 bg-white rounded-lg shadow-md border overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Thumbnail') }}</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <form action="{{ route('admin.posts.image.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <x-input-thumbnail label="Thumbnail"></x-input-thumbnail>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out">
                                    {{ __('Set thumbnail') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <div id="holder">
                            @if(!empty($post->thumbnail_path))
                                <form action="{{ route('admin.posts.image.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="mb-4">
                                        <img class="w-full max-w-xs mx-auto rounded-lg" src="{{ $post->thumbnail }}" alt="{{ $content->title ?? '' }}">
                                    </div>

                                    <div class="mb-0">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 active:bg-red-800 shadow-sm transition duration-150 ease-in-out">
                                            {{ __('Delete exists thumbnail') }}
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 bg-white rounded-lg shadow-md border overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Delete') }} {{ __('Article') }}</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">{{ __('Be careful when using this operation.') }}</p>
                <div class="space-x-2">
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 active:bg-red-800 shadow-sm transition duration-150 ease-in-out">
                            {{ __('Delete') }}
                        </button>
                    </form>

                    @if(!empty($content))
                        <form action="{{ route('admin.post-content.destroy', $content->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 active:bg-red-800 shadow-sm transition duration-150 ease-in-out">
                                {{ __('Delete only data for this langauge') }}
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/close.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        
        // Toggle hidden form
        $('.hidden-form-toggle').click(function() {
            $('.hidden-form-info').addClass('hidden');
            $('.hidden-form').removeClass('hidden');
        });
    </script>
@endpush
