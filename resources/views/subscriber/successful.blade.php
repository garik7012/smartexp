@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Successful!</div>

                    <div class="card-body">
                        <h5>Congratulations, {{$subscriber->name}}! Your email {{$subscriber->email}} was successfully subscribed</h5>
                        <p>
                            Your link: <a href="{{route('subscriber-link', [$subscriber->id, $subscriber->url_key])}}">{{route('subscriber-link', [$subscriber->id, $subscriber->url_key])}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
