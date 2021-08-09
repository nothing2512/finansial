<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finansial | login</title>
    <link rel="icon" href="{{ adminlte(LOGO) }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ adminlte('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ adminlte('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ adminlte('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ adminlte('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center row">
            <img src="{{ adminlte(LOGO) }}" class="col-4"/>
            <div class="col-8">
                <a href="#" class="h1"><b>Finansial</b></a>
                <a href="#" class="h2"><b>Login</b></a>
            </div>
        </div>
        <div class="card-body">
            <p class="login-box-msg"></p>

            <form action="{{ route("api.login") }}" method="post" autocomplete="off">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4 ml-auto">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<script src="{{ adminlte('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

@if(session()->has("error"))
    @include("components.alert.danger", ["message" => session()->get("error")])
@endif

<!-- jQuery -->
<script src="{{ adminlte('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ adminlte('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ adminlte('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
