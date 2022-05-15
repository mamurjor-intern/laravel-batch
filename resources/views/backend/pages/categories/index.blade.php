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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script>

        // category get datatables
        $('#category_datatables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu:[
                [20,25,50,100,200],
                [20,25,50,100,200]
            ],
            ajax:{
                url: '{{ route("admin.category.get-data") }}',
                type: 'POST',
                dataType: 'JSON',
                data:{_token:_token}
            },
            columns: [
                {data: 'DT_RowIndex',orderable: false,searchable: false},
                {data: 'name'},
                {data: 'slug'},
                {data: 'status'},
                {data: 'action', orderable: false,searchable: false}
            ],
            bSort: false,
            pageLength: 20,
            language: {
                processing: '<img src="{{ asset("img/table-loading.svg") }}">',
                lengthMenu: "Display _MENU_ per page",
                zeroRecords: "<span class='text-danger'>No Records Found</span>",
                infoEmpty: "<span class='text-dark'>No Records Found</span>"
            }
        });

        // category create modal
        function categoryModal(modalTitle,buttonText){
            $('form#category-form').find('.is-invalid').removeClass('is-invalid');
            $('form#category-form').find('.error-msg').remove();
            let modals = $('#category-modal');
            modals.modal('show'); // modal show

            $('.category-modal-title').text(modalTitle); // modal title
            $('.save-btn').text(buttonText); // modal save btn text

            $('form#category-form')[0].reset(); // modal form value empty
        }

        // category form submit
        $(document).on('submit', 'form#category-form', function(e){
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.categories.store') }}", // category url
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'JSON',
                cache: false,
                success: function(data){
                    $('form#category-form').find('.is-invalid').removeClass('is-invalid');
                    $('form#category-form').find('.error-msg').remove();

                    $.each(data.errors, function(key, value){
                        $('form#category-form #'+key).addClass('is-invalid');
                        $('form#category-form #'+key).parent().append('<span class="text-danger error-msg">'+value+'</span>');
                    });

                    if (data.status == 'success') {
                        $('#category-modal').modal('hide');
                        $('form#category-form')[0].reset();
                        flashMessage(data.status,data.message);
                        $('#category_datatables').DataTable().ajax.reload();
                    }
                },
                error: function(error){
                    console.log(error);
               }
            })

        });

        $(document).on('click', 'button.delete-btn', function(){
            let dataId = $(this).attr('data-id');
            let url = "{{ route('admin.categories.delete') }}";
            let method = 'POST';
            let alertTitle = 'Are you sure delete?';
            let dataTableId = '#category_datatables';
            datatableAction(dataId,url,method,alertTitle,dataTableId);
        })

        $(document).on('click', 'button.pending-btn', function(){
            let dataId = $(this).attr('data-id');
            let status = $(this).attr('data-status');
            let url = "{{ route('admin.categories.status') }}";
            let method = 'POST';
            let alertTitle = 'Are you sure pending?';
            let dataTableId = '#category_datatables';
            statusAction(dataId,status,url,method,alertTitle,dataTableId);
        })

        $(document).on('click', 'button.published-btn', function(){
            let dataId = $(this).attr('data-id');
            let status = $(this).attr('data-status');
            let url = "{{ route('admin.categories.status') }}";
            let method = 'POST';
            let alertTitle = 'Are you sure published?';
            let dataTableId = '#category_datatables';
            statusAction(dataId,status,url,method,alertTitle,dataTableId);
        })

    </script>
@endpush
