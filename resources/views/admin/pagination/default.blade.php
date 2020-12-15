@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pull-right ">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span><i class="fa fa-angle-double-left" style="font-size: 30px; line-height: 35px;padding: 3px;"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                    <span><i class="fa fa-angle-double-left" style="font-size: 30px; line-height: 35px;padding: 3px;"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item"><span class="page-link">{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled"><span><i class="fa fa-ellipsis-h" style="padding: 4px;line-height: 2;color: cornflowerblue;"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span><i class="fa fa-angle-double-right" style="font-size: 30px; line-height: 35px;padding: 3px;"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span><i class="fa fa-angle-double-right" style="font-size: 30px; line-height: 35px;padding: 3px;"></i></span>
                </li>
            @endif
        </ul>
    </div>
    <!-- Pagination -->
@endif










