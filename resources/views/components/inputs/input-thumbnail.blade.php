<label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">{{ __($label) }}</label>
<div class="flex">
    <a id="lfm" data-input="thumbnail" data-preview="holder" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        <i class="fas fa-image mr-2"></i> {{ __('Choose') }}
    </a>
    <input id="thumbnail" class="flex-1 ml-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" type="text" name="thumbnail_path">
</div>
@error('thumbnail_path')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
