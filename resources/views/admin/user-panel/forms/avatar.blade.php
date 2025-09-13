<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-md border overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">{{ __('Avatar') }}</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <form action="{{ route('admin.user-panel.image.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-thumbnail label="Avatar"></x-input-thumbnail>
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
                        @if(!empty($user->thumbnail_path))
                            <img class="w-full max-w-xs mx-auto rounded-lg" src="{{ $user->thumbnail }}" alt="{{ __('Avatar') }}">
                        @endif

                        @if(!empty($user->thumbnail_path))
                            <form action="{{ route('admin.user-panel.image.destroy', $user->id) }}" method="POST" id="delete-thumbnail-form">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 active:bg-red-800 shadow-sm transition duration-150 ease-in-out">
                                    {{ __('Delete exists thumbnail') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
