<form method="GET" role="search">
    <div class="relative">
        <input type="search" name="q" autocomplete="off" class="block w-full pr-10 pl-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="{{ __($placeholder) }}" aria-label="{{ __($placeholder) }}" value="{{ $q }}">
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <input type="submit" value="{{ __($placeholder) }}" class="h-10 w-10 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        </div>
    </div>
</form>
