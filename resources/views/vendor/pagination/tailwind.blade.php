<div class="pagination flex text-xs items-center space-x-1 py-2">
    <!-- First Button -->
    @if ($paginator->onFirstPage())
    <span class="disabled text-gray-500 cursor-not-allowed px-4 py-2 rounded-md">First</span>
    @else
    <a href="{{ $paginator->url(1) }}" class="text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-md">First</a>
    @endif

    <!-- Previous Button -->
    @if ($paginator->onFirstPage())
    <span class="disabled text-gray-500 cursor-not-allowed px-4 py-2 rounded-md">Prev</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
        class="text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-md">Prev</a>
    @endif

    <!-- Pagination Links -->
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="bg-indigo-600 text-white px-4 py-2 rounded-md">{{ $page }}</span>
    @else
    <a href="{{ $url }}"
        class="text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-md">{{ $page }}</a>
    @endif
    @endforeach

    <!-- Next Button -->
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-md">Next</a>
    @else
    <span class="disabled text-gray-500 cursor-not-allowed px-4 py-2 rounded-md">Next</span>
    @endif

    <!-- Last Button -->
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->url($paginator->lastPage()) }}"
        class="text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-md">Last</a>
    @else
    <span class="disabled text-gray-500 cursor-not-allowed px-4 py-2 rounded-md">Last</span>
    @endif
</div>