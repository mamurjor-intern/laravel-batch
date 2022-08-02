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
                    <h4 class="card-title mb-0 d-flex justify-content-between align-items-center">{{ $title }}
                        <a href="{{ route('admin.blogs.categories.create') }}" class="btn btn-sm btn-primary ">Create</a>
                    </h4>
                </div>
                <div class="card-body pt-4">
                    <table class="table table-striped table-sm" id="category_datatables">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($categoryPosts as $value)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->slug }}</td>
                                    <td>
                                        {!! status($value->status) !!}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="dropdown-toggle border-0 bg-white hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.blogs.categories.edit',$value->id) }}" class="dropdown-item border-0">Edit</a></li>

                                                <li><button type="button" class="dropdown-item border-0 delete-btn" data-id="'.$product->id.'">Delete</button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"><span class="text-danger">Data not found!</span></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
