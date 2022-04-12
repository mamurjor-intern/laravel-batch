@extends('layouts.backend')
@section('title', 'Categories')

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-header border-bottom py-2">
                    <h4 class="card-title mb-0 d-flex justify-content-between align-items-center">Categories
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">Create</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
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
                                @forelse ($category as $key=>$value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->slug }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit',$value->id) }}" class="btn btn-sm btn-info">Edit</a>

                                            <a href="{{ route('admin.categories.destroy',$value->id) }}" class="btn btn-sm btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
