@if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            {{-- @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else --}}
                <li>
                    <a href="{{ $paginator->url(1) }}">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            {{-- @endif --}}

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            {{-- @if ($paginator->hasMorePages()) --}}
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            {{-- @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif --}}
        </ul>
@endif
