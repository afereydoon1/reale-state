@if ($paginator->hasPages())
<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <ul>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span >&lsaquo;</span>
                    </li>
                @else
                    <li ><a href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li ><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li ><span >{{ $page }}</span></li>
                            @else
                                <li ><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li >
                        <a href="{{ $paginator->nextPageUrl() }}"  >&rsaquo;</a>
                    </li>
                @else
                    <li>
                        <span>&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endif


