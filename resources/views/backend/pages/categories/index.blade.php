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
                        <button type="button" class="btn btn-sm btn-primary create-btn" onclick="categoryModal('New Category Create','Save')">Create</a>
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
                                    <tr>
                                        <td colspan="5" class="text-danger text-center">No data found.</td>
                                    </tr>
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

@push('scripts')
    
    <script>
        function categoryModal(modalTitle,buttonText){
            
            let modals = $('#category-modal');
            modals.modal('show');

            $('.category-modal-title').text(modalTitle);
            $('.save-btn').text(buttonText);

            $('.category-modal-title')[0].reset();
        }

        $(document).on('submit', 'form#category-form', function(e){
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.categories.store') }}",
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'JSON',
                cache: false,
                success: function(data){
                    if (data.status == 'success') {
                        $('#category-modal').modal('hide');
                        $(this)[0].reset();

                        console.log(data);
                    }
                },
                error: function(error){
                    console.log(error);
               }
            })
            
        });
    </script>
@endpush
