@extends('layouts.backend')
@section('title', $title)

@push('styles')

@endpush

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card border">
                <div class="card-header border-bottom py-2">
                    <h4 class="card-title mb-0 d-flex justify-content-between align-items-center">{{ $title }}
                        <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary create-btn">Create</a>
                    </h4>
                </div>
                <div class="card-body pt-4">
                    <table class="table table-striped table-sm" id="product_datatables">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Feature image</th>
                                <th>name</th>
                                <th>sku</th>
                                <th>qty</th>
                                <th>price</th>
                                <th>is approved</th>
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
        $('table#product_datatables').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu:[
                [20,25,50,100,200],
                [20,25,50,100,200]
            ],
            ajax:{
                url: '{{ route("admin.products.get-data") }}',
                type: 'POST',
                dataType: 'JSON',
                data:{_token:_token}
            },
            columns: [
                {data: 'DT_RowIndex',orderable: false,searchable: false},
                {data: 'feature_image'},
                {data: 'name'},
                {data: 'sku'},
                {data: 'qty'},
                {data: 'price'},
                {data: 'approved',orderable: false,searchable: false},
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
    </script>
@endpush
