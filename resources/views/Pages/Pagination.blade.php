<!-- resources/views/Admin/Partials/Pagination.blade.php -->
@if ($paginator->hasPages())
    <nav class="flex-column flex flex-wrap items-center justify-between pt-4 md:flex-row" aria-label="Table navigation">
        <span class="mb-4 block w-full text-sm font-normal text-gray-500 dark:text-gray-400 md:mb-0 md:inline md:w-auto">
            Showing
            <span class="font-semibold text-gray-900 dark:text-white">
                @if ($paginator->firstItem())
                    {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}
                @else
                    {{ $paginator->count() }}
                @endif
            </span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
        </span>
        <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <li>
                    <span class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
            @endif

            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                @if (is_string($element))
                    <li>
                        <span class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">{{ $element }}</span>
                    </li>
                @endif

                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == 1 || $page == $paginator->lastPage() || $page == $paginator->currentPage() || $page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="flex h-8 items-center justify-center border border-gray-300 bg-blue-50 px-3 text-blue-600 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            @else
                <li>
                    <span class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
