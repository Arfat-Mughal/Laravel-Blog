@extends('layouts.admin')

@section('title', __('View Contact') . ' - ' . $contact->name)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium" 
           href="{{ route('admin.contacts.index') }}">
            <i class="fas fa-envelope mr-1"></i>
            {{ __('Contacts') }}
        </a>
    </li>
    <li class="breadcrumb-item">
        <span class="text-gray-500">{{ $contact->name }}</span>
    </li>
@endsection

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md border">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-gray-900">
                    {{ __('View Contact') }}
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $contact->subject }}
                </p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.contacts.edit', $contact) }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent 
                          rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                          hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                          focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out">
                    <i class="fas fa-edit mr-1"></i> {{ __('Edit') }}
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
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700">{{ __('Name') }}</h4>
                    <p class="text-gray-900">{{ $contact->name }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-700">{{ __('Email') }}</h4>
                    <p class="text-gray-900">{{ $contact->email }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-700">{{ __('Subject') }}</h4>
                    <p class="text-gray-900">{{ $contact->subject }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-700">{{ __('Status') }}</h4>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        {{ $contact->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                           ($contact->status == 'read' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                        {{ ucfirst($contact->status) }}
                    </span>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-700">{{ __('IP Address') }}</h4>
                    <p class="text-gray-900">{{ $contact->ip_address ?? 'N/A' }}</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-700">{{ __('Created At') }}</h4>
                    <p class="text-gray-900">{{ $contact->created_at->format('M d, Y H:i') }}</p>
                </div>
            </div>

            <div>
                <h4 class="text-sm font-medium text-gray-700">{{ __('Message') }}</h4>
                <div class="bg-gray-50 p-4 rounded-md">
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
            <a href="{{ route('admin.contacts.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                      rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 
                      focus:ring-offset-2 focus:ring-blue-500">
                {{ __('Back to List') }}
            </a>
        </div>
    </div>
</div>
@endsection
