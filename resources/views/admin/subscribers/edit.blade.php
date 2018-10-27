@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit subscriber</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Subscribers', 'url' => route('admin.subscribers.all')],
           ['name' => 'edit', 'active' => true],
       ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit subscriber {{$subscriber->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.subscribers.edit', $subscriber->id)}}" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input id="exampleInputEmail1" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ?: $subscriber->email }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">First name</label>
                                <input id="inputName" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?: $subscriber->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="is_subscribe" value="0">
                                    <input type="checkbox" name="is_subscribe" value="1" {{$subscriber->is_subscribe ? 'checked' : ''}}> Is subscribed
                                </label>
                            </div>
                            @csrf
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{route('admin.subscribers.all')}}" type="submit" class="btn btn-default">Back to subscribers</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection