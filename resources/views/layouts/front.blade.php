<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="title" content="@yield('meta_title')">
	<meta name="description" content="@yield('meta_description')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="author" content="wokiee">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @toastr_css
	<link rel="stylesheet" href="{{ asset('css') }}/theme.css">
    {{-- internal css  --}}
    @stack('styles')
</head>
<body>
    {{-- <div id="loader-wrapper">
        <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div> --}}

    {{-- header --}}
    @include('frontend.include.header')

    @if (!Request::is('/') && !Request::is('email/verify') && !Request::is('password/reset*'))
        {{-- breadcrumb --}}
        <x-breadcrumb :breadcrumb="$breadcrumb"/>
    @endif


    {{-- front contents  --}}
    @yield('contents')

    {{-- footer --}}
    @include('frontend.include.footer')

    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/slick.min.js"></script>
    <script src="{{ asset('js') }}/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('js') }}/panelmenu.js"></script>
    <script src="{{ asset('js') }}/instafeed.min.js"></script>
    <script src="{{ asset('js') }}/jquery.themepunch.tools.min.js"></script>
    <script src="{{ asset('js') }}/jquery.themepunch.revolution.min.js"></script>
    <script src="{{ asset('js') }}/jquery.plugin.min.js"></script>
    <script src="{{ asset('js') }}/jquery.countdown.min.js"></script>
    <script src="{{ asset('js') }}/lazyload.min.js"></script>
    <script src="{{ asset('js')  }}/main.js"></script>
    @toastr_js
    @toastr_render
    <!-- form validation and sending to mail -->
    <script src="{{ asset('js') }}/jquery.form.js"></script>
    <script src="{{ asset('js') }}/jquery.validate.min.js"></script>
    <script src="{{ asset('js') }}/jquery.form-init.js"></script>
    <script>
        let _token = '{{ csrf_token() }}';

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

        function miniCarts(){
            // ajax
            $.ajax({
                url: '{{ route("frontend.product.mini-cart.data") }}',
                type: 'GET',
                data: {_token:_token},
                dataType: 'JSON',
                cache: false,
                success: function(data){
                    $('#mini-carts').html('');
                    $('#mini-cart-count').text('');
                    $('#sub-total').text('');
                    if (data) {
                        $('#mini-cart-count').text(data.cartCount);
                        $('#mini-carts').append(data.cart);
                        $('#sub-total').text('TK '+data.subTotal);
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        miniCarts();

        $(document).on('click', 'a.product-remove', function(){
            let productId = $(this).data('id');
            $.ajax({
                url: '{{ route("frontend.product.cart.remove") }}',
                type: 'POST',
                data: {_token:_token,product_id:productId},
                dataType: 'JSON',
                cache: false,
                success: function(data){
                    if (data.status == 'success') {
                        miniCarts();
                        cartProducts();
                        flashMessage(data.status,data.message);
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    </script>
    {{-- internal js --}}
    @stack('scripts')
</body>
</html>

@include('frontend.modal.product-view')
