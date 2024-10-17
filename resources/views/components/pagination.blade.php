@if ($paginator->hasPages())
    <div class="page_wrap">
        <ul class="paging_btn">
            <li class="side_left">
                @if ($paginator->onFirstPage())
                    <a><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                @else
                    <a href="{{ $paginator->url(1) }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                @endif
            </li>

            <li>
                @if ($paginator->onFirstPage())
                    <a><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                @endif
            </li>

            @foreach (range(1, $paginator->lastPage()) as $page)
                @if ($page == $paginator->currentPage())
                    <li><a class="on">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endforeach

            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                @else
                    <a><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                @endif
            </li>

            <li class="side_right">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->url($paginator->lastPage()) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                @else
                    <a><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                @endif
            </li>
        </ul>
    </div>
@endif
