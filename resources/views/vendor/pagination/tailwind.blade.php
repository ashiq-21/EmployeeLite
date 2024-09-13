@if ($paginator->hasPages())
    <nav class="flex items-center justify-between mt-4">
        <div class="flex-1 flex justify-between md:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="disabled"><span>&laquo;</span></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class="disabled"><span>&raquo;</span></span>
            @endif
        </div>

        <div class="hidden md:flex md:items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="disabled"><span>&laquo;</span></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="mr-3">&laquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $startPage = max(1, $currentPage - 2);
                $endPage = min($lastPage, $currentPage + 2);
                $showEllipsis = false;
            @endphp

            @if ($startPage > 1)
                <a href="{{ $paginator->url(1) }}" class="mr-2">1</a>
                @if ($startPage > 2)
                    <span class="mr-2">...</span>
                    @php $showEllipsis = true; @endphp
                @endif
            @endif

            @for ($i = $startPage; $i <= $endPage; $i++)
                @if ($i == $currentPage)
                    <span class="font-bold mr-2">{{ $i }}</span>
                @else
                    <a href="{{ $paginator->url($i) }}" class="mr-2">{{ $i }}</a>
                @endif
            @endfor

            @if ($endPage < $lastPage)
                @if ($showEllipsis)
                    <span class="mr-2">...</span>
                @endif
                <a href="{{ $paginator->url($lastPage) }}" class="mr-2">{{ $lastPage }}</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class="disabled"><span>&raquo;</span></span>
            @endif
        </div>
    </nav>
@endif
