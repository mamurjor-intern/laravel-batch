@extends('layouts.backend')
@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/image-uploader.css') }}">
@endpush

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card border">
                    <div class="card-header card-header border-bottom py-2">
                        <h4 class="card-title mb-0 ">{{ $title }}</h4>
                    </div>
                    <div class="card-body pt-4">
                        <x-textbox name="product_name" labelName="Product Name" errorName="product_name"/>
                        <x-textbox name="sku" labelName="SKU" errorName="sku"/>
                        <x-textarea name="short_description" labelName="Short Description" errorName="short_description"/>

                        <x-textarea name="long_description" labelName="Long Description" errorName="long_description"/>

                        <x-textbox type="number" name="quantity" labelName="Quantity" errorName="quantity"/>
                        <x-textbox type="number" name="price" labelName="Price" errorName="price"/>
                        <x-textbox type="number" name="discount_price" labelName="Discount Price" errorName="discount_price"/>

                        <x-selectbox name="color" labelName="Color" errorName="color">

                        </x-selectbox>

                        <x-selectbox name="size" labelName="Size" errorName="size">

                        </x-selectbox>
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

                        <x-selectbox name="approved" labelName="Approved" errorName="approved">

                        </x-selectbox>

                        <div class="mb-3">
                            <label for="">Feature image</label>
                            <input type="file" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" name="feature_image" class="form-control form-control-sm" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label class="active">Photos</label>
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
        $('.image-uploader').imageUploader();
    </script>
@endpush
