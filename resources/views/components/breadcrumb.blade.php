@php
    $breadcrumb;
@endphp

<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{ url('/') }}">Home</a></li>
            @foreach ($breadcrumb as $key=>$url)
                <li>
                    @if ($loop->last)
                        {{ $key }}
                    @else
                        <a href="{{ $url }}">{{ $key }}</a>
                    @endif
                </li>
            @endforeach
		</ul>
	</div>
</div>
