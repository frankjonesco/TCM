
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-5">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>


        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between font-roboto">


            {{-- "SHOWING RESULTS" TEXT --}}

            <div class="text-sm text-gray-700">

                {!! __('Showing') !!}

                @if ($paginator->firstItem())

                    <span class="font-medium">
                        {{ $paginator->firstItem() }}
                    </span>
                    {!! __('to') !!}
                    <span class="font-medium">
                        {{ $paginator->lastItem() }}
                    </span>

                @else
                    {{ $paginator->count() }}
                @endif

                {!! __('of') !!}

                <span class="font-medium">
                    {{ $paginator->total() }}
                </span>

                {!! __('results') !!}
                
            </div>




            {{-- NEXT/PREV PAGE BUTTONS --}}

            <div>

                <span class="flex shadow-sm">


                    {{-- PREVIOUS PAGE LINK --}}

                    @if ($paginator->onFirstPage())

                        <span 
                            aria-disabled="true"
                            aria-label="{{ __('pagination.previous') }}"
                            class="pagination-btn start inactive"
                        >
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>


                    @else

                        <a 
                            href="{{ $paginator->previousPageUrl() }}"
                            rel="prev"
                            aria-label="{{ __('pagination.previous') }}"
                            class="pagination-btn start"
                        >
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>

                    @endif


                    {{-- PAGE NUMBERS (ELEMENTS) --}}

                    @foreach ($elements as $element)


                        {{-- THREE DOT SEPARATOR --}}

                        @if (is_string($element))

                            <span
                                aria-disabled="true"
                                class="pagination-btn"
                            >
                                <i class="fa fa-ellipsis"></i>
                            </span>

                        @endif


                        {{-- PAGE NUMBERS --}}

                        @if (is_array($element))

                            @foreach ($element as $page => $url)

                                {{-- CURRENT PAGE --}}
                                @if ($page == $paginator->currentPage())

                                    <span 
                                        aria-current="page"
                                        class="pagination-btn current"
                                    >{{ $page }}</span>

                                @else

                                    <a
                                        href="{{ $url }}"
                                        class="pagination-btn"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    >{{ $page }}</a>

                                @endif

                            @endforeach
                        @endif
                        
                    @endforeach


                    {{-- NEXT PAGE LINK --}}

                    @if ($paginator->hasMorePages())

                        <a 
                            href="{{ $paginator->nextPageUrl() }}"
                            rel="next" 
                            aria-label="{{ __('pagination.next') }}"
                            class="pagination-btn end"
                        >
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    @else

                        <span 
                            aria-disabled="true" 
                            aria-label="{{ __('pagination.next') }}"
                            class="pagination-btn end inactive" 
                        >
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>

                    @endif

                </span>
            </div>
        </div>
    </nav>
@endif
