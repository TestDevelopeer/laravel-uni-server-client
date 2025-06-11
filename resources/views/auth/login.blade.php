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
<div id="app" class="app app-full-height app-without-header">
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1 class="text-center">Авторизация</h1>
                <div class="text-body text-opacity-50 text-center mb-5">
                    АСП UniServer
                </div>
                <div class="mb-4">
                    <label for="name" class="form-label">Логин</label>
                    <div class="input-group">
                        <input id="name" name="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Пароль</label>
                    <div class="input-group">
                        <input id="password" name="password" type="password"
                               class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <button type="submit" class="btn btn-theme btn-lg d-block w-100 mb-3">ВОЙТИ</button>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
</div>
<!-- END #app -->

<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('assets/js/iconify-icon/2.1.0/iconify-icon.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- ================== END core-js ================== -->
</body>
</html>
