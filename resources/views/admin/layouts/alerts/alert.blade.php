@foreach ($alerts as $type => $messages)
    <div class="alert alert-{{ $type }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="{{ trans('buttons.close') }}" role="button"><span aria-hidden="true">&#10005;</span></button>
        @foreach ($messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endforeach