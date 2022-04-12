@extends('layouts.backend')
@section('title', 'Categories')

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-header border-bottom py-2">
                    <h4 class="card-title mb-0 d-flex justify-content-between align-items-center">
                        @isset($category)
                            {{ $category->name }} - Edit
                        @else
                        New Category Create
                        @endisset

                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger">Back</a>
                    </h4>
                </div>
                <div class="card-body py-3">
                    <form action="{{ isset($category) ? route('admin.categories.update',$category->id) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($category)
                            @method('PUT')
                            <input type="hidden" name="update_id" value="{{ $category->id }}">
                        @endisset
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Category Name</label>
                            <input type="text" class="form-control form-control-sm" name="category_name" id="category-name" value="{{ $category->name ?? old('category_name') }}">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category-icon" class="form-label">Category icon</label>
                            <input type="file" class="form-control form-control-sm" name="category_icon" id="category-icon" >
                            @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control form-control-sm" name="status" id="status">
                                <option value="">Select Please</option>
                                <option value="0" @isset($category){{ $category->status == 0 ? 'selected' : '' }}@endisset>Pending</option>
                                <option value="1" @isset($category){{ $category->status == 1 ? 'selected' : '' }}@endisset>Publish</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
