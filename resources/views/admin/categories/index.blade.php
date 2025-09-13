@extends('layouts.admin')

@section('title', __('Categories'))

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Categories') }}</li>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-4">
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out">
            {{ __('Add Category') }}
        </a>
    </div>
    <div class="bg-white rounded-lg shadow-md border overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">{{ __('Categories') }}</h3>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <x-search :q="$q" />
            </div>

            @if ($categories->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('ID') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('thumbnail') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('title') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('description') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                                @php $content = $category->content()->first(); @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if(!empty($category->thumbnail_path))
                                            <img class="w-36 h-36 object-cover rounded" src="{{ $category->thumbnail }}" alt="{{ $content->title ?? '' }}" width="144" height="144">
                                        @else
                                            <span class="text-gray-500 text-sm">{{ __('No image') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $content->title ?? '' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 max-w-xs prose prose-sm">{!! $content->description ?? '' !!}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="relative inline-block text-left">
                                            <button class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="menu-button-{{ $loop->iteration }}" aria-expanded="false" aria-haspopup="true">
                                                {{ __('Action') }}
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-{{ $loop->iteration }}" tabindex="-1">
                                                <div class="py-1" role="none">
                                                    @isset($content->url)
                                                        <a href="{{ route('categories.show', [app()->getLocale(), $content->url]) }}" target="_blank" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">{{ __('Show') }}</a>
                                                    @endisset
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">{{ __('Edit') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <h5 class="text-gray-500">{{ __('No categories.') }}</h5>
                </div>
            @endif
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
