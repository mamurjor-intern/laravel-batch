@extends('layouts.backend')
@section('title', $title)

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-header border-bottom py-2">
                    <h4 class="card-title mb-0 d-flex justify-content-between align-items-center">
                        @isset($category)
                            {{ $category->name }} - {{ $title }}
                        @else
                            {{ $title }}
                        @endisset

                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger">Back</a>
                    </h4>
                </div>
                <div class="card-body py-3">
                    @if (Session::has('success'))
                    <span class="alert alert-success">{{ Session::get('success') }}</span>
                    @endif
                    <form action="{{ isset($category) ? route('admin.categories.update',$category->id) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($category)
                            @method('PUT')
                            <input type="hidden" name="update_id" value="{{ $category->id }}">
                        @endisset

                        <x-textbox name="category_name" labelName="Category Name" errorName="category_name" value="{{ $category->name ?? old('category_name') }}" />
                        
                        <x-textbox type="file" name="category_icon" labelName="Category icon" errorName="category_icon" />

                        <x-selectbox type="file" name="status" labelName="Status" errorName="status">
                            <option value="">Select Please</option>
                            @foreach (STATUS as $key=>$value)
                                <option value="{{ $key }}"
                                    @isset($category){{ $category->status == $key ? 'selected' : '' }}@endisset> {{ $value }}
                                </option>
                            @endforeach
                        </x-selectbox>

                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
