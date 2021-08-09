<!DOCTYPE html>
<html lang="en">
<head>
    <title>Finansial | @yield("title")</title>
    @include("components.main.header")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
@include("components.main.preloader")

<!-- Navbar -->
@include("components.main.navbar")
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include("components.main.sidebar")

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield("contentTitle")</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @yield("content")

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@include("components.main.footer")

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

@include("components.main.scripts")
@if(session()->has("error"))
    @include("components.alert.danger", ["message" => session()->get("error")])
@endif
@yield("script")

</body>
</html>
