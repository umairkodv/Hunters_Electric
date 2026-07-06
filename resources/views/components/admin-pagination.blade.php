@props(['paginator'])

@if ($paginator && $paginator->hasPages())
    <div class="mt-6 flex justify-center select-none">
        <!-- Main Dark Horizontal Segment Track Box Container -->
        <nav class="inline-flex rounded-xl bg-[#1e293b] border border-gray-800 divide-x divide-gray-800 shadow-sm overflow-hidden items-stretch h-10">
            
            <!-- 1. PREVIOUS PAGE CONTROL BUTTON -->
            @if ($paginator->onFirstPage())
                <span class="px-4 flex items-center justify-center text-gray-600 cursor-not-allowed text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800/40 transition-colors text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </span>
            @endif

            <!-- 2. DYNAMIC ELLIPSIS SMART RANGE GENERATION ENGINE -->
            @php
                $curPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $sideRadius = 1; // Controls the padding size width of links surrounding the active block
            @endphp

            @foreach (range(1, $lastPage) as $page)
                {{-- Always show page 1, 2, the final pages, and any page directly next to the active item --}}
                @if ($page == 1 || $page == 2 || $page == $lastPage || $page == $lastPage - 1 || ($page >= $curPage - $sideRadius && $page <= $curPage + $sideRadius))
                    
                    @if ($page == $curPage)
                        <!-- Active Selected State Highlight Box -->
                        <span class="px-4 h-full flex items-center justify-center text-white bg-[#2d3748] font-black text-xs min-w-[40px]">
                            {{ $page }}
                        </span>
                    @else
                        <!-- Inactive Link Items -->
                        <a href="{{ $paginator->url($page) }}" class="px-4 h-full flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800/40 font-bold text-xs transition-colors min-w-[40px]">
                            {{ $page }}
                        </a>
                    @endif

                {{-- Break and fold long page rows into elegant dots --}}
                @elseif ($page == 3 && $curPage > 4)
                    <span class="px-3 h-full flex items-center justify-center text-gray-600 font-bold text-xs min-w-[36px]">...</span>
                @elseif ($page == $lastPage - 2 && $curPage < $lastPage - 3)
                    <span class="px-3 h-full flex items-center justify-center text-gray-600 font-bold text-xs min-w-[36px]">...</span>
                @endif
            @endforeach

            <!-- 3. NEXT PAGE CONTROL BUTTON -->
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800/40 transition-colors text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span class="px-4 flex items-center justify-center text-gray-600 cursor-not-allowed text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif

        </nav>
    </div>
@endif
