<div>
{{--    prev --}}
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </button>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>
{{--            end prev--}}

{{--            numbers--}}
            @foreach($elements as $element)
                <div class="flex">
                @foreach($element as $page=>$url)
                    @if($page==$paginator->currentPage())

                            <button  class="relative inline-flex items-center px-4 py-2 text-sm font-medium
                             text-white bg-primary border border-gray-300 leading-5 rounded-md hover:text-gray-500
                             focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100
                              active:text-gray-700 transition ease-in-out duration-150">{{$page}}</button>

                    @else
                        <button  class="relative inline-flex items-center px-4 py-2 text-sm font-medium
                             text-gray-700 bg-white border border-gray-300 leading-5 rounded hover:text-gray-500
                             focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100
                              active:text-gray-700 transition ease-in-out duration-150" wire:click="gotoPage({{$page}})">{{$page}}</button>
                    @endif
                @endforeach
                </div>
            @endforeach
{{--           end numbers--}}



{{--            next--}}
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.next') !!}
                    </button>
                @endif
            </span>
        </nav>
    @endif
{{--    end next--}}
</div>
