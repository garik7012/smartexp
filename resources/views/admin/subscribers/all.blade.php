@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>All subscribers</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Subscribers', 'active' => true]
       ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Subscribers table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            <tbody>
                            @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{$subscriber->id}}</td>
                                <td>{{$subscriber->name}}</td>
                                <td>{{$subscriber->email}}</td>
                                <td>@if($subscriber->is_subscribe)<span class="label label-success">Subscribed</span>
                                    @else <span class="label label-danger">not subscribed</span> @endif
                                </td>
                                <td>{{$subscriber->created_at->format('d.m.Y')}}</td>
                                <td>
                                    <a href="{{route('subscriber-link', [$subscriber->id, $subscriber->url_key])}}" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('admin.subscribers.edit', $subscriber->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('admin.subscribers.delete', $subscriber->id)}}" method="post" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{$subscribers->links()}}
                    </div>
                </div>
                <!-- /.box -->
                <a href="{{route('admin.subscribers.create')}}" class="btn btn-success">Create a subscriber</a>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection