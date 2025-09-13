@extends('layouts.admin')

@php 
    $prefix = empty($category) ? __('Create') : __('Edit');
    $contentTitle = !empty($content) ? $content->title : old('content.title');
    $contentUrl = !empty($content) ? $content->url : old('content.url');
    $contentContent = !empty($content) ? $content->content : old('content.content');
@endphp

@section('title', $prefix.__('Category'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">{{ __('Categories') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $prefix }}</li>
@endsection

@section('content')
<div class="row justify-content-center">
    @if(!empty($category) && !empty($content) && !empty($content->url))
        <div class="col-lg-10 mb-3 text-right">
            <a href="{{ route('categories.show', [app()->getLocale(), $content->url]) }} " class="btn btn-secondary" target="_blank">{{ __('Show') }}</a>
        </div>
    @endif

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <span class="card-title h5">{{ $prefix }} {{ __('Category') }}</span>
            </div>
            <div class="card-body">
                <div class="mb-2 text-right">
                    <x-choose-lang-admin />
                </div>

                @empty($category)
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @else
                    @empty($content)
                        <div class="text-center hidden-form-info">
                            <p>{{ __('There is no data defined for this language.') }}</p>
                            <button type="button" class="btn btn-lg btn-primary fas fa-2x fa-plus hidden-form-toggle" data-toggle="tooltip" title="{{ __('Add data for this language') }}"></button>
                        </div>
                    @endempty

                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="{{ empty($content) ? 'd-none hidden-form' : '' }}" enctype="multipart/form-data">
                    @method('PUT')
                @endempty
                    @csrf

                    <input type="hidden" name="content[lang]" value="{{ app()->getLocale() }}">

                    <div class="form-group">
                        <label for="title">{{ __('title') }}*</label>
                        <input type="text" id="title" name="content[title]" class="form-control @error('content.title') is-invalid @enderror" value="{{ $contentTitle }}" required>
                        @error('content.title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="url">{{ __('url') }}*</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ route('index', app()->getLocale()) }}/categories/</span>
                            </div>
                            <input type="text" id="url" name="content[url]" class="form-control @error('content.url') is-invalid @enderror" value="{{ $contentUrl }}" required>
                            @error('content.url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">{{ __('content') }}*</label>
                        <textarea id="content" name="content[content]" class="form-control @error('content.content') is-invalid @enderror">{{ $contentContent }}</textarea>
                        @error('content.content')
                            <span class="form-text text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @empty($category)
                        <div class="form-group">
                            <x-input-thumbnail label="thumbnail"></x-input-thumbnail>
                        </div>
                    @endempty

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ $prefix }}</button>
                    </div>
                </form>
            </div>
        </div>

        @if(!empty($category))
            <div class="card mt-4">
                <div class="card-header">
                    <span class="card-title h5">{{ __('Thumbnail') }}</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('admin.categories.image.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <x-input-thumbnail label="Thumbnail"></x-input-thumbnail>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Set thumbnail') }}</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <div id="holder">
                                @if(!empty($category->thumbnail_path))
                                    <form action="{{ route('admin.categories.image.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <div class="form-group">
                                            <img class="img-fluid my-1" src="{{ $category->thumbnail }}" alt="{{ !empty($content) ? $content->title : '' }}">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">{{ __('Delete exists thumbnail') }}</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <span class="card-title h5">{{ __('Delete') }} {{ __('Category') }}</span>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ __('Be careful when using this operation.') }}</p>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline pr-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>

                    @if(!empty($content))
                        <form action="{{ route('admin.content.destroy', $content->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Delete only data for this langauge') }}</button>
                        </form>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/close.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        
        // Toggle hidden form
        $('.hidden-form-toggle').click(function() {
            $('.hidden-form-info').addClass('d-none');
            $('.hidden-form').removeClass('d-none');
        });
    </script>
@endpush