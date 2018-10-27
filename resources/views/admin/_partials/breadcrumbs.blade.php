@if(!empty($breadcrumbs))
<ol class="breadcrumb">
    @foreach($breadcrumbs as $page)
    @if(isset($page['active']) && $page['active'])
        <li class="active">{{ $page['name'] ?: ''}}</li>
    @else
        <li>
            <a href="{{ $page['url'] ?: '' }}">{{ $page['name'] ?: ''}}</a>
        </li>
    @endif
    @endforeach
</ol>
@endif