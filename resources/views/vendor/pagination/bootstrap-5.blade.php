@if ($paginator->hasPages())
    <nav class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div class="text-muted small">
            Menampilkan {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} dari {{ $paginator->total() }} data
        </div>
        <ul class="pagination pagination-sm mb-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link border-0 bg-transparent text-muted">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link border-0 bg-transparent text-secondary">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link border-0 bg-transparent text-muted">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link border-0 rounded-2" style="background:#0ea5e9;border-color:#0ea5e9;">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link border-0 bg-transparent text-secondary">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link border-0 bg-transparent text-secondary">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link border-0 bg-transparent text-muted">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
