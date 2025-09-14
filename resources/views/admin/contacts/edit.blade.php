@extends('layouts.admin')

@section('title', __('Edit Contact') . ' - ' . $contact->name)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium" 
           href="{{ route('admin.contacts.index') }}">
            <i class="fas fa-envelope mr-1"></i>
            {{ __('Contacts') }}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium" 
           href="{{ route('admin.contacts.show', $contact) }}">
            {{ $contact->name }}
        </a>
    </li>
    <li class="breadcrumb-item">
        <span class="text-gray-500">{{ __('Edit') }}</span>
    </li>
@endsection

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md border">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">
                {{ __('Edit Contact') }} - {{ $contact->name }}
            </h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.contacts.show', $contact) }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent 
                          rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                          hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                          focus:ring-gray-500 active:bg-gray-800 shadow-sm transition duration-150 ease-in-out">
                    <i class="fas fa-eye mr-1"></i> {{ __('View') }}
                </a>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                      onsubmit="return confirm('{{ __('Be careful when using this operation.') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent 
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                               hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                               focus:ring-red-500 active:bg-red-800 shadow-sm transition duration-150 ease-in-out">
                        <i class="fas fa-trash mr-1"></i> {{ __('Delete') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name', $contact->name) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                  focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email"
                           value="{{ old('email', $contact->email) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                  focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">{{ __('Subject') }}</label>
                    <input type="text" name="subject" id="subject"
                           value="{{ old('subject', $contact->subject) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                  focus:border-blue-500 focus:ring-blue-500 @error('subject') border-red-500 @enderror">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">{{ __('Message') }}</label>
                    <textarea name="message" id="message" rows="6" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                     focus:border-blue-500 focus:ring-blue-500 @error('message') border-red-500 @enderror">{{ old('message', $contact->message) }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                    <select name="status" id="status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                   focus:border-blue-500 focus:ring-blue-500 @error('status') border-red-500 @enderror">
                        <option value="pending" {{ old('status', $contact->status) == 'pending' ? 'selected' : '' }}>
                            {{ __('Pending') }}
                        </option>
                        <option value="read" {{ old('status', $contact->status) == 'read' ? 'selected' : '' }}>
                            {{ __('Read') }}
                        </option>
                        <option value="responded" {{ old('status', $contact->status) == 'responded' ? 'selected' : '' }}>
                            {{ __('Responded') }}
                        </option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.contacts.index') }}"
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                              rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 
                              focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent 
                                   rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 
                                   focus:ring-offset-2 focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
