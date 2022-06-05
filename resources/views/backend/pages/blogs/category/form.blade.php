@extends('layouts.backend')
@section('title', $title)

@push('styles')
    <style>

    </style>
@endpush

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-header border-bottom py-2">
                    <h4 class="card-title mb-0">{{ $title }}
                    </h4>
                </div>
                <div class="card-body pt-4">
                    <form action="{{ isset($categoryPost) ? route('admin.blogs.categories.update', $categoryPost->id) : route('admin.blogs.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($categoryPost)
                            @method('PUT')
                        @endisset

                        <x-textbox name="category_name" value="{{ $categoryPost->name ?? old('category_name') }}" labelName="Category Name"/>

                        <x-textbox name="meta_title" value="{{ $categoryPost->meta_title ?? old('meta_title') }}" labelName="Meta Title"/>
                        <x-textarea name="meta_description" rows="3" value="{{ $categoryPost->meta_description ?? old('meta_description') }}" labelName="Meta Description"/>


                        <x-selectbox name="status" labelName="Status">
                            @foreach (STATUS as $key=>$value)
                                <option value="{{ $key }}" @isset($categoryPost) {{ $categoryPost->status == $key ? 'selected' : '' }} @endisset> {{ $value }}</option>
                            @endforeach
                        </x-selectbox>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-sm btn-primary save-btn">
                                @isset($categoryPost)
                                Update
                                @else
                                Create
                                @endisset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
