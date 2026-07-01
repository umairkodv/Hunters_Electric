@props(['title', 'items' => []])

@php
    $columnCount = count($items);

    if ($columnCount <= 2) {
        $wrapperClass = "relative inline-block group";
        $panelClass = "absolute left-0 mt-0 w-max min-w-[240px] max-w-md bg-white rounded-b-md shadow-xl border border-gray-200";
        $gridClass = $columnCount === 1 ? 'grid-cols-1 p-6' : 'grid-cols-2 gap-8 p-6';
    } else {
        $wrapperClass = "static inline-block group";
        $panelClass = "absolute left-0 right-0 top-full w-full bg-white shadow-xl border-t border-gray-200";
        $gridClass = "max-w-7xl mx-auto px-12 py-10 grid grid-cols-5 gap-8";
    }
@endphp

<div class="{{ $wrapperClass }}">
    <a href="#" class="flex items-center gap-1 font-semibold text-xs tracking-wider uppercase transition-colors text-gray-800 group-hover:text-red-500 py-5">
        <span>{{ $title }}</span>
        <x-fas-angle-down class="h-3 w-3 transform transition-transform duration-200 group-hover:rotate-180 group-hover:text-red-500"/>
    </a>

    <div class="{{ $panelClass }} top-full z-50 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-150 pointer-events-none group-hover:pointer-events-auto">
        <div class="grid text-left {{ $gridClass }}">
            @foreach($items as $column)
                <div class="flex flex-col gap-3">
                    @foreach($column as $subItem)
                        <a href="#" class="text-sm text-gray-600 hover:text-red-500 transition-colors leading-tight whitespace-nowrap">
                            {{ $subItem }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
