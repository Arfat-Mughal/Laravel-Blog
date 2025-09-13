<div class="py-1" role="none">
    <a href="{{ route('index', app()->getLocale()) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200 group" role="menuitem">
        <i class="fas fa-home w-5 text-gray-400 group-hover:text-gray-600 transition-colors duration-200"></i>
        <span class="ml-3">{{ __('Main Page') }}</span>
    </a>

    <a href="{{ route('admin.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200 group" role="menuitem">
        <i class="fas fa-desktop w-5 text-gray-400 group-hover:text-gray-600 transition-colors duration-200"></i>
        <span class="ml-3">{{ __('Admin Panel') }}</span>
    </a>

    <a href="{{ route('admin.user-panel.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200 group" role="menuitem">
        <i class="fas fa-user-cog w-5 text-gray-400 group-hover:text-gray-600 transition-colors duration-200"></i>
        <span class="ml-3">{{ __('User Panel') }}</span>
    </a>

    <a href="{{ route('admin.posts.create') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200 group" role="menuitem">
        <i class="fas fa-plus w-5 text-gray-400 group-hover:text-gray-600 transition-colors duration-200"></i>
        <span class="ml-3">{{ __('Add Post') }}</span>
    </a>

    <div class="border-t border-gray-200 my-1" role="separator"></div>

    <a href="{{ route('logout', app()->getLocale()) }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-200 group" 
       role="menuitem">
        <i class="fas fa-sign-out-alt w-5 text-gray-400 group-hover:text-gray-600 transition-colors duration-200"></i>
        <span class="ml-3">{{ __('Logout') }}</span>
    </a>

    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" class="hidden">
        @csrf
    </form>
</div>