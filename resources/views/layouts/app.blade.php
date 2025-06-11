<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/quantum/page_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jun 2025 12:04:00 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Quantum | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet"/>
    <!-- ================== END core-css ================== -->

</head>
<body>

<x-includes.loader/>

<!-- BEGIN #app -->
<div id="app" class="app">
    <x-navigation.header/>
    {{ $slot }}
</div>

<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('assets/js/iconify-icon/2.1.0/iconify-icon.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- ================== END core-js ================== -->
<script src="{{ asset('assets/js/demo/sidebar-scrollspy.demo.js') }}"></script>
</body>
</html>
