<div class="messages">
	@foreach (['danger', 'warning', 'success', 'info'] as $type)
        <div class="alert alert-{{ $type }} alert-dismissible template message-{{ $type }}" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
            <p class="content"></p>
        </div>
	@endforeach
</div>