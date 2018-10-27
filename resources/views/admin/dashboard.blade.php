@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Dashboard', 'active' => true]
       ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <!--------------------------
              | Your Page Content Here |
              -------------------------->
    </section>
    <!-- /.content -->
@endsection