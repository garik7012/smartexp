@if (is_array($messages) && count($messages))
    @include('layouts._partials.alerts.alert', [
        'alerts' => [
            'danger' => collect($messages)->collapse()->all(),
        ]
    ])
@endif