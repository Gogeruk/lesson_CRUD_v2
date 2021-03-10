
@php
    $current_data = current(array_slice($__data, 3, 1));
@endphp

<nav aria-label="Page navigation">
    <ul class="pagination mb-4 text-center">
        @if( $current_data->currentPage() == 1 )
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() }}">{{ $current_data->currentPage() }}</a></li>
            @if($current_data->lastPage() >= 2)
                <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() +1 }}">{{ $current_data->currentPage() +1 }}</a></li>
            @endif
            @if($current_data->lastPage() >= 3)
                <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() +2 }}">{{ $current_data->currentPage() +2 }}</a></li>
            @endif
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->lastPage() }}">Last Page</a></li>
            <li class="page-item"><a class="page-link" href="{{ $current_data->nextPageUrl() }}">Next</a></li>
        @elseif( $current_data->currentPage()  == ($current_data->lastPage()))
            <li class="page-item"><a class="page-link" href="{{ $current_data->previousPageUrl() }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page=1">First Page</a></li>
            @if(($current_data->currentPage() -2) > 0)
                <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() -2 }}">{{ $current_data->currentPage() -2 }}</a></li>
            @endif
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() -1 }}">{{ $current_data->currentPage() -1 }}</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() }}">{{ $current_data->currentPage() }}</a></li>
        @else( $current_data->currentPage() >3 )
            <li class="page-item"><a class="page-link" href="{{ $current_data->previousPageUrl() }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page=1">First Page</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() -1 }}">{{ $current_data->currentPage() -1 }}</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() }}">{{ $current_data->currentPage() }}</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->currentPage() +1 }}">{{ $current_data->currentPage() +1 }}</a></li>
            <li class="page-item"><a class="page-link" href="/{{ $__data['pagination_of'] }}?page={{ $current_data->lastPage() }}">Last Page</a></li>
            <li class="page-item"><a class="page-link" href="{{ $current_data->nextPageUrl() }}">Next</a></li>
        @endif
    </ul>
</nav>
