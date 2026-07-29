@if ($paginator->hasPages())
    <nav class="flex items-center justify-center gap-1">
        @if ($paginator->onFirstPage())
            <span class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-300 cursor-not-allowed">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-500 hover:bg-primary-50 hover:text-primary-600 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-400 text-sm">...</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary-500 text-white font-semibold text-sm shadow-md shadow-primary-500/30">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-600 hover:bg-primary-50 hover:text-primary-600 font-medium text-sm transition-all duration-200">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-500 hover:bg-primary-50 hover:text-primary-600 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        @else
            <span class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-300 cursor-not-allowed">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </span>
        @endif
    </nav>
@endif
