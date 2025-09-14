<header class="admin-header glass-effect shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button class="lg:hidden text-gray-600 hover:text-gray-800 p-2 rounded-lg hover:bg-gray-100 transition-all duration-200" type="button">
                            <i class="sidebar-toggler-icon fas fa-bars text-xl"></i>
                        </button>

                        <a class="ml-4 text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent hover:scale-105 transition-transform duration-300" href="{{ url('/') }}">
                            {{ config('app.name') }}
                        </a>
                    </div>

                    <div class="flex items-center space-x-6">
                        <!-- Enhanced Language Dropdown -->
                        <div class="relative dropdown">
                            <button class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition-all duration-200 font-medium" id="languageDropdown">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ strtoupper(app()->getLocale()) }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div class="dropdown-menu absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-30 min-w-max overflow-hidden" id="languageDropdownMenu">
                                @foreach (config('blog.available_locales') as $locale)
                                    <a class="flex items-center px-4 py-3 text-sm transition-all duration-200 
                                             @if(app()->getLocale() == $locale) 
                                                 bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 font-semibold border-l-4 border-blue-500
                                             @else 
                                                 text-gray-700 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 hover:text-gray-900
                                             @endif" 
                                       href="{{ route('admin.set-lang', $locale) }}">
                                        <span class="mr-3 text-lg">
                                            @if($locale == 'en') 🇺🇸
                                            @elseif($locale == 'es') 🇪🇸
                                            @elseif($locale == 'fr') 🇫🇷
                                            @elseif($locale == 'de') 🇩🇪
                                            @elseif($locale == 'it') 🇮🇹
                                            @elseif($locale == 'pt') 🇵🇹
                                            @elseif($locale == 'ru') 🇷🇺
                                            @elseif($locale == 'ja') 🇯🇵
                                            @elseif($locale == 'ko') 🇰🇷
                                            @elseif($locale == 'zh') 🇨🇳
                                            @elseif($locale == 'ar') 🇸🇦
                                            @else 🌐
                                            @endif
                                        </span>
                                        <div class="flex flex-col">
                                            <span class="font-medium">{{ strtoupper($locale) }}</span>
                                            <span class="text-xs text-gray-500">
                                                @if($locale == 'en') English
                                                @elseif($locale == 'es') Español
                                                @elseif($locale == 'fr') Français
                                                @elseif($locale == 'de') Deutsch
                                                @elseif($locale == 'it') Italiano
                                                @elseif($locale == 'pt') Português
                                                @elseif($locale == 'ru') Русский
                                                @elseif($locale == 'ja') 日本語
                                                @elseif($locale == 'ko') 한국어
                                                @elseif($locale == 'zh') 中文
                                                @elseif($locale == 'ar') العربية
                                                @else {{ ucfirst($locale) }}
                                                @endif
                                            </span>
                                        </div>
                                        @if(app()->getLocale() == $locale)
                                            <svg class="w-4 h-4 ml-auto text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Enhanced User Dropdown -->
                        <div class="relative dropdown">
                            <button id="navbarDropdown" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 p-2 rounded-lg hover:bg-gray-100 transition-all duration-200" type="button" aria-haspopup="true" aria-expanded="false">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <span class="font-medium">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div class="absolute right-0 bg-white border border-gray-200 rounded-xl shadow-xl mt-2 z-20 min-w-max opacity-0 invisible transition-all duration-300 transform scale-95 origin-top-right overflow-hidden" aria-labelledby="navbarDropdown" id="userDropdownMenu">
                                @include('layouts.parts.menu')
                            </div>
                        </div>
                    </div>
                </div>
            </header>