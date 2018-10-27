@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Successful</div>

                    <div class="card-body">
                        <h5>Congratulations, you have successfully subscribed</h5>
                        <p>
                            Your link: <a href="/subscriber/{{$subscriber->id}}/{{$subscriber->url_key}}">{{url('/subscriber/' . $subscriber->id . '/' . $subscriber->url_key)}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
