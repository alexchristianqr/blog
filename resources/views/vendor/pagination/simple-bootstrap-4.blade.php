@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link text-right"><i class="fa fa-angle-left mr-3 ml-3"></i>@lang('pagination.previous')</span></li>
        @else
            <li class="page-item"><a class="page-link text-right" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left mr-3 ml-3"></i>@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')<i class="fa fa-angle-right ml-3 mr-3"></i></a></li>
        @else
            <li class="page-item disabled"><span class="page-link">@lang('pagination.next')<i class="fa fa-angle-right ml-3 mr-3"></i></span></li>
        @endif
    </ul>
@endif
