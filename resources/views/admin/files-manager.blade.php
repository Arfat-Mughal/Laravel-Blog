@extends('layouts.admin')

@section('title', __('Files Manager'))

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="w-full">
        <iframe src="{{ route('admin.unisharp.lfm.show') }}" class="w-full h-[600px] border-0" style="overflow: hidden;"></iframe>
        <a href="{{ route('admin.unisharp.lfm.show') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:bg-blue-800 shadow-sm transition duration-150 ease-in-out" target="_blank">{{ __('Open in new card') }}</a>
    </div>
</div>
@endsection
