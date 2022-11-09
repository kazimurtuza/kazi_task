<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$common_data->title ?? 'Dashboard'}} | {{ config('sitedata.company_information')['title'] }}" />
    <meta property="og:title" content="{{$common_data->title ?? 'Dashboard'}} | {{ config('sitedata.company_information')['title'] }}" />
    <meta property="og:description" content="{{$common_data->title ?? 'Dashboard'}} | {{ config('sitedata.company_information')['title'] }}" />
    <meta property="og:image" content="{{ asset('logo/logo.png') }}" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>{{$common_data->title ?? 'Login'}} | {{ config('sitedata.company_information')['title'] }}</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/favicon.png') }}" />
    <link href="{{ asset('assets/backend/css/button.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">

    @yield('page_css')

</head>

<body class="vh-100">
<div class="authincation">
    <div class="container">
        <div class="row justify-content-center h-100 align-items-center mobile-mt-m80px">
            <div class="col-md-6 register">
                <div class="text-center mb-3">
                    <a href="/"><img src="{{ asset('logo/logo.png') }}" alt="" style="width: 200px;"></a>
                </div>
                @yield('main_content')
                @yield('footer_bottom_btn')
                <div class="text-center mt-3">
                    <p>Developed By <a href="https://retinasoft.com.bd/" target="_blank"><strong>Retina Soft</strong></a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('assets/backend/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ asset('assets/backend/js/deznav-init.js') }}"></script>
<script src="{{ asset('assets/backend/js/alert.js') }}"></script>
<script src="{{ asset('assets/backend/js/button.js') }}"></script>
@include('common.sweetalert-msg')
@yield('js')
</body>
</html>
