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
                    <div class="text-nowrap">
                        <table class="table" id="category_datatables">
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
                lengthMenu: 'Displey _MENU_ per page',
                zeroRecords: '<span class="text-danger">No Records Found</span>',
                infoRecords: '<span class="text-dark">No Records Found</span>',
            }
        });


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
                    $('form#category-form').find('.is-invalid').removeClass('is-invalid');
                    $('form#category-form').find('.error-msg').remove();
                    $.each(data.errors, function(key,value){
                        $('form#category-form #'+key).addClass('is-invalid');
                        $('form#category-form #'+key).parent().append('<span class="text-danger error-msg">'+value+'</span>');
                    });
                    if (data.status == 'success') {
                        $('#category-modal').modal('hide');
                        flashMessage(data.status,data.message)
                        $('#category_datatables').DataTable().ajax.reload();
                        $(this)[0].reset();
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

    </script>
@endpush
