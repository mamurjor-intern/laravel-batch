<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="title" content="@yield('meta_title')">
	<meta name="description" content="@yield('meta_description')">
	<meta name="author" content="wokiee">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    @if (!Request::is('/'))
        {{-- breadcrumb --}}
        <x-breadcrumb :breadcrumb="$breadcrumb"/>
    @endif

    <div id="tt-pageContent">
        {{-- slider --}}
        @include('frontend.include.slider')

        {{-- front contents  --}}
        @yield('contents')

    </div>

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
    <!-- form validation and sending to mail -->
    <script src="{{ asset('js') }}/jquery.form.js"></script>
    <script src="{{ asset('js') }}/jquery.validate.min.js"></script>
    <script src="{{ asset('js') }}/jquery.form-init.js"></script>

    {{-- internal js --}}
    @stack('scripts')
</body>
</html>
