@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="pagination-nav">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="inline-flex pagination-disabled" aria-disabled="true" aria-label="Página anterior">
            <i class="fas fa-chevron-left"></i>
            <span class="sr-only">Anterior</span>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex" aria-label="Página anterior">
            <i class="fas fa-chevron-left"></i>
            <span class="sr-only">Anterior</span>
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="inline-flex pagination-disabled" aria-hidden="true">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page" class="inline-flex pagination-active" aria-label="Página actual, página {{ $page }}">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="inline-flex" aria-label="Ir a la página {{ $page }}">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex" aria-label="Página siguiente">
            <i class="fas fa-chevron-right"></i>
            <span class="sr-only">Siguiente</span>
        </a>
    @else
        <span class="inline-flex pagination-disabled" aria-disabled="true" aria-label="Página siguiente">
            <i class="fas fa-chevron-right"></i>
            <span class="sr-only">Siguiente</span>
        </span>
    @endif
</nav>
@endif
