@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link pagina">@lang('pagination.previous')</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link pagina" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link pagina" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link pagina">@lang('pagination.next')</span>
        </li>
        @endif
    </ul>
</nav>
@endif