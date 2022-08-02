@extends('layouts.backend')
@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/image-uploader.css') }}">
    <style>
        .sub-category{
            list-style: none;
        }
    </style>
@endpush

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card border">
                    <div class="card-header card-header border-bottom py-2">
                        <h4 class="card-title mb-0">{{ $title }}</h4>
                    </div>
                    <div class="card-body pt-4">
                        <x-textbox name="product_name" required="required" labelName="Product Name" errorName="product_name"/>
                        <x-textbox name="sku" labelName="SKU" required="required" errorName="sku"/>
                        <x-textarea name="short_description" labelName="Short Description" errorName="short_description"/>

                        <x-textarea name="long_description" required="required" labelName="Long Description" errorName="long_description"/>

                        <x-textbox type="number" name="quantity" required="required" labelName="Quantity" errorName="quantity"/>
                        <x-textbox type="number" name="price" required="required" labelName="Price" errorName="price"/>
                        <x-textbox type="number" name="discount_price" required="required" labelName="Discount Price" errorName="discount_price"/>

                        <div class="mb-3">
                            <label for="color" class="required">Color</label>
                            <input type="text" name="color" id="color" class="form-control w-100" data-role="tagsinput" >
                        </div>

                        <div class="">
                            <label for="size" class="required">Size</label>
                            <input type="text" name="size" id="size" class="form-control w-100" data-role="tagsinput" >
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save or Edit</button>
                        </div>

                        <x-selectbox name="approved" required="required" inputClass="select-2" labelName="Approved" errorName="approved">
                            <option value="0">Pending</option>
                            <option value="1">Published</option>
                        </x-selectbox>

                        <div class="mb-3">
                            <label for="" class="required">Categories</label>
                            <div class="card border p-3 rounded-0">
                                @if (!$categories->isEmpty())
                                    <ul class="m-0 p-0 list-unstyled">
                                        @foreach ($categories as $category)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="category[]" type="checkbox" value="{{ $category->id }}" id="category-{{ $category->id }}">
                                                    <label class="form-check-label" for="category-{{ $category->id }}"> {{ $category->name }} </label>
                                                </div>
                                                @if (!$category->childCategory->isEmpty())
                                                    <ul class="m-0 pl-4 sub-category">
                                                        @foreach ($category->childCategory as $value)
                                                            <li>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="category[]" type="checkbox" value="{{ $value->id }}" id="category-{{ $value->id }}">
                                                                    <label class="form-check-label" for="category-{{ $value->id }}">{{ $value->name }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="required">Feature image</label>
                            <input type="file" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" name="feature_image" class="form-control form-control-sm" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label class="required">Photos</label>
                            <div class="image-uploader" style="padding-top: .5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('backend/js/image-uploader.js') }}"></script>
    <script>
        $('.image-uploader').imageUploader({
            imagesInputName: 'gallery_image',
        });

        CKEDITOR.replace('long_description');
    </script>
@endpush
