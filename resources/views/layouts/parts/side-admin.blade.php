<!-- Enhanced Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white shrink-0 shadow-2xl animate-slideInLeft">
            <div class="relative overflow-hidden">
                <div class="absolute inset-0 gradient-bg opacity-5"></div>
                <ul class="py-6 relative z-10">
                    <li class="px-6 py-4 text-center">
                        <h2 class="text-sm font-bold text-gray-300 uppercase tracking-wider">
                            {{ __('Dashboard') }}
                        </h2>
                        <div class="sidebar-brand text-lg font-bold mt-1">
                            {{ config('app.name') }}
                        </div>
                    </li>

                    <li class="mt-8">
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 mr-3">
                                <i class="fas fa-home text-sm"></i>
                            </div>
                            <span class="font-medium">Start</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.users.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-green-500 to-green-600 mr-3">
                                <i class="fas fa-users text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Users') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.posts.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-purple-500 to-purple-600 mr-3">
                                <i class="fas fa-cubes text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Posts') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.categories.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 mr-3">
                                <i class="fas fa-book text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Categories') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.contacts.index') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-teal-500 to-teal-600 mr-3">
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Contacts') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="sidebar-item flex items-center px-6 py-3 text-gray-300 hover:text-white transition-all duration-300" href="{{ route('admin.files-manager') }}">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gradient-to-br from-red-500 to-red-600 mr-3">
                                <i class="fas fa-folder-open text-sm"></i>
                            </div>
                            <span class="font-medium">{{ __('Files Manager') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <button class="absolute top-6 right-6 p-2 text-gray-400 hover:text-white transition-all duration-200 hover:bg-gray-700 rounded-lg" type="button">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                </svg>
            </button>
        </aside>