<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') - Mamurjor Ecommerce</title>

    {{-- meta tag --}}
    <meta name="title" content="@yield('meta_title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/') }}backend/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/') }}backend/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    @toastr_css
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/libs/apex-charts/apex-charts.css" />
    <style>
        .dropify-wrapper > .dropify-message > span > p{
            font-size: 14px;
        }
        .dropify-wrapper {
            border: 2px dotted #dfdfdf !important;
        }
    </style>
    <!-- internal css -->
    @stack('styles')

    <!-- Helpers -->
    <script src="{{ asset('/') }}backend/vendor/js/helpers.js"></script>
    <script src="{{ asset('/') }}backend/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('backend.include.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('backend.include.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('contents')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('backend.include.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Layout wrapper -->
    <script src="{{ asset('/') }}backend/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('/') }}backend/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('/') }}backend/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('/') }}backend/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Vendors JS -->
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}backend/vendor/libs/apex-charts/apexcharts.js"></script>
    @toastr_js
    @toastr_render

    <!-- Main JS -->
    <script src="{{ asset('/') }}backend/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('/') }}backend/js/dashboards-analytics.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        let _token = '{{ csrf_token() }}';

        function deleteData(deleteId){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-'+deleteId).submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }

        function flashMessage(status,message){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            switch (status) {
                case 'success':
                    toastr.success(message, 'Success')
                    break;
                case 'error':
                    toastr.error(message, 'Error')
                    break;
                case 'info':
                    toastr.info(message, 'Info')
                    break;
                case 'warning':
                    toastr.warning(message, 'Warning')
                    break;
            }
        }

        function datatableAction(data,url,method,alertTitle,dataTableId){
            Swal.fire({
            title: alertTitle,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: method,
                        data: {_token:_token,data:data,status:status},
                        dataType: 'JSON',
                        cache: false,
                        success: function(data){
                            $(dataTableId).DataTable().ajax.reload();
                            flashMessage(data.status,data.message);
                        }
                    })
                }
            })
        }

        function statusAction(data,status,url,method,alertTitle,dataTableId){
            Swal.fire({
            title: alertTitle,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: method,
                        data: {_token:_token,data:data,status:status},
                        dataType: 'JSON',
                        cache: false,
                        success: function(data){
                            $(dataTableId).DataTable().ajax.reload();
                            flashMessage(data.status,data.message);
                        }
                    })
                }
            })
        }

        $('.dropify').dropify();
    </script>
    <!-- internal js -->
    @stack('scripts')
</body>

@include('backend.modals.modal-sm')

</html>
