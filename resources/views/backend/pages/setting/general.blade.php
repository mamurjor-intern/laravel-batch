@extends('layouts.backend')
@section('title', $title)

@push('styles')
    <style>

    </style>
@endpush

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header border-bottom py-2">
                        <h4 class="card-title mb-0">{{ $title }}</h4>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{ route('admin.setting.general.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Header Logo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="header_logo" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Footer Logo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="footer_logo" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Payment Logo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="payment_logo" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="copyright" type="text" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Support Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="support_number" type="text" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Adress</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="address" type="text" id="formFile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Support Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="support_email" type="email" id="formFile">
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Change</button>
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
