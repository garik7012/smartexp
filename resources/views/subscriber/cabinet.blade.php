@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    @if($subscriber->is_subscribe)
                    <strong>Congratulation!</strong> You have subscribe again.
                    @else
                        You have unsubscribed
                    @endif
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">Subscription management</div>
                    <div class="card-body">
                        <h5>Hello, {{$subscriber->name}}! Your email is {{$subscriber->email}}</h5>
                        <p></p>
                        <p>Your file is <a href="{{route('subscriber-file', [$subscriber->id, $subscriber->file_link])}}" target="_blank">Here</a></p>
                        <p></p>
                        @if($subscriber->is_subscribe)
                        <p>If you want to unsubscribe, just click <a href="{{route('subscribe-toggle', [$subscriber->id, $subscriber->url_key])}}" class="btn btn-dark btn-sm">Unsubscribe</a></p>
                        @else
                        <p>If you want to subscribe again, just click <a href="{{route('subscribe-toggle', [$subscriber->id, $subscriber->url_key])}}" class="btn btn-dark btn-sm">Subscribe</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection