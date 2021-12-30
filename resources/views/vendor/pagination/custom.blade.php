@if ($paginator->hasPages())
    <ul class="container" style="list-style: none; position: relative;">
        @if ($paginator->onFirstPage())
            <li class="disabled" style="position: relative;"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" style="position: relative;" rel="prev">← Previous</a></li>
        @endif
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active" style="position: relative;"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" style="position: relative;">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" style="position: relative;" rel="next">Next →</a></li>
        @else
            <li class="disabled" style="position: relative;"><span>Next →</span></li>
        @endif
    </ul>
@endif 