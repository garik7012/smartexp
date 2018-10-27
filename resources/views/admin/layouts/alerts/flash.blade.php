<div class="messages flash-alerts">
    <?php $alerts = [] ?>

	@foreach (['danger', 'warning', 'success', 'info'] as $flashType)
		@if (session()->has($flashType))
            <?php $alerts[$flashType] = [session($flashType)] ?>
			{{ session()->forget($flashType) }}
		@endif
	@endforeach

    @include('admin.layouts.alerts.alert', [
        'alerts' => $alerts
    ])
</div>