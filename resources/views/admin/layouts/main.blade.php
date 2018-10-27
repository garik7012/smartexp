<!DOCTYPE html>
<html>
<head>
    @include('admin._partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin._partials.header')
    @include('admin._partials.left-aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.layouts.alerts.flash')
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('admin._partials.footer')
</div>
<!-- ./wrapper -->
@include('admin._partials.scripts')
</body>
</html>