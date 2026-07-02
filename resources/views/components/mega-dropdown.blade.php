@props(['title', 'items' => []])

@php
    $routeName = strtolower($title);
    $routeUrl = Route::has($routeName) ? route($routeName) : '#';

    // Check if the current collection utilizes associative string headers (like the new Components directory)
    $isAssociativeTree = (bool) count(array_filter(array_keys($items), 'is_string'));

    if ($isAssociativeTree) {
        // Extract just the parent names (e.g. Armatures and Parts, Bolts and Screws)
        $rawKeys = array_keys($items);
        // Automatically partition the 49 elements into 5 neat vertical columns of 10 items max each
        $columns = array_chunk($rawKeys, ceil(count($rawKeys) / 5));
    } else {
        $columns = $items;
    }

    $columnCount = count($columns);
    $wrapperClass = $columnCount <= 2 ? "relative inline-block group" : "static inline-block group";
    $panelClass = $columnCount <= 2 ? "absolute left-0 mt-0 w-max min-w-[240px] max-w-md bg-white rounded-b-md shadow-xl border border-gray-200" : "absolute left-0 right-0 top-full w-full bg-white shadow-xl border-t border-gray-200";
    
    // FIXED: Upgraded container width constraints from max-w-7xl to xl:max-w-[90rem] to maximize horizontal grid track clearance
    $gridClass = $columnCount <= 2 ? ($columnCount === 1 ? 'grid-cols-1 p-6' : 'grid-cols-2 gap-8 p-6') : "max-w-7xl xl:max-w-[90rem] mx-auto px-12 py-10 grid grid-cols-5 gap-x-10 gap-y-3";
@endphp

<div class="{{ $wrapperClass }}">
    <a href="{{ $routeUrl }}" class="flex items-center gap-1 font-semibold text-xs tracking-wider uppercase transition-colors text-nav-text group-hover:text-accent py-5 whitespace-nowrap">
        <span>{{ $title }}</span>
        <x-fas-angle-down class="h-3 w-3 transform transition-transform duration-200 group-hover:rotate-180 group-hover:text-accent"/>
    </a>

    <!-- Dropdown Panel Layer -->
    <div class="{{ $panelClass }} top-full z-50 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-150 pointer-events-none group-hover:pointer-events-auto">
        <div class="grid text-left {{ $gridClass }}">
            @foreach($columns as $column)
                <div class="flex flex-col gap-1">
                    @foreach($column as $item)
                        @if(is_array($item))
                            @foreach($item as $nestedString)
                                @php $slug = \Illuminate\Support\Str::slug($nestedString); @endphp
                                <!-- FIXED: Shifted from whitespace-nowrap to normal wrapping physics with precise vertical padding gutters -->
                                <a href="{{ url($routeName . '/' . $slug) }}" class="text-[13px] font-semibold text-nav-subtext hover:text-accent transition-colors leading-snug whitespace-normal block py-1 pr-2">
                                    {{ $nestedString }}
                                </a>
                            @endforeach
                        @else
                            @php $slug = \Illuminate\Support\Str::slug($item); @endphp
                            <!-- FIXED: Shifted from whitespace-nowrap to normal wrapping physics with precise vertical padding gutters -->
                            <a href="{{ url($routeName . '/' . $slug) }}" class="text-[13px] font-semibold text-nav-subtext hover:text-accent transition-colors leading-snug whitespace-normal block py-1 pr-2">
                                {{ $item }}
                            </a>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
