@if ($paginator->hasPages())
    <div class="flex items-center ml-3 sm:ml-0">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="rounded-l rounded-sm border border-brand-light px-3 py-2 cursor-not-allowed no-underline text-gray-400 bg-gray-200">&laquo;</span>
        @else
            <a
                class="rounded-l rounded-sm border-t border-b border-l border-brand-light px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                &laquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="border-t border-b border-l border-brand-light px-3 py-2 cursor-not-allowed no-underline">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="border-t border-b border-l border-brand-light px-3 py-2 bg-brand-light no-underline text-white bg-blue-400">{{ $page }}</span>
                    @else
                        <a class="border-t border-b border-l border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <span class="rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed text-gray-400 bg-gray-200">&raquo;</span>
        @endif
    </div>
@endif