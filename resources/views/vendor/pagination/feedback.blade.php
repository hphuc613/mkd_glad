@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            <li class="page-item">
                @if ($paginator->onFirstPage())
                    <a href="javascript:" class="page-link disabled">
                        <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
                    </a>
                @else
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
                    </a>
                @endif
            </li>
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><a class="page-link" href="#"><span>{{ $element }}</span></a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li class="page-item active">
                                <a class="page-link" href="javascript:"><span>{{ $page }}</span></a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link disabled" href="javascript:">
                        <span aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
