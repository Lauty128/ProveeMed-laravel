<div class="CardsContainer__pagination" data-current="{{ $paginator->currentPage() }}">
    @if(!$paginator->onFirstPage())
        <a data-page="{{ ($paginator->currentPage() - 1) }}"><</a>
    @endif
    
    @for($i = 2; $i >= 1; $i--)
        @if(($paginator->currentPage() - $i) > 0)
            <a data-page="{{ $paginator->currentPage() - $i }}">{{ $paginator->currentPage() - $i }}</a>
        @endif
    @endfor

    <a style="background-color: var(--green-color)">{{ $paginator->currentPage() }}</a>
    
    @for($i = 1; $i <= 2; $i++)
        @if(($paginator->currentPage() + $i) <= $paginator->lastPage())
            <a data-page="{{ $paginator->currentPage() + $i }}">{{ $paginator->currentPage() + $i }}</a>
        @endif
    @endfor
    
    @if (!$paginator->onLastPage())
        <a data-page="{{ $paginator->currentPage() + 1 }}">></a>
    @endif

    <div class="CardsContainer__information">
        <span>{{ $paginator->perPage() }} elementos por pagina</span>
    </div>
</div>