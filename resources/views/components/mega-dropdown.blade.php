@props(['title', 'items' => []])

@php
    $departmentSlug = \Illuminate\Support\Str::slug($title);
    $routeUrl = route('department.show', $departmentSlug);

    // ACTIVE STATE TRACKING: Match current route context against string taxonomy attributes
    $isActive = (request()->segment(1) === $departmentSlug);

    // $items is already a list of columns, each column a list of
    // ['label' => ..., 'url' => ...] pairs built in subheader.blade.php
    // from real database slugs, so no re-slugifying happens here.
    $columns = $items;

    $columnCount = count($columns);
    $wrapperClass = $columnCount <= 2 ? "relative inline-block group" : "static inline-block group";
    $panelClass = $columnCount <= 2 ? "absolute left-0 mt-0 w-max min-w-[240px] max-w-md bg-white rounded-b-md shadow-xl border border-gray-200" : "absolute left-0 right-0 top-full w-full bg-white shadow-xl border-t border-gray-200";

    // FIXED: Upgraded container width constraints from max-w-7xl to xl:max-w-[90rem] to maximize horizontal grid track clearance
    $gridClass = $columnCount <= 2 ? ($columnCount === 1 ? 'grid-cols-1 p-6' : 'grid-cols-2 gap-8 p-6') : "max-w-7xl xl:max-w-[90rem] mx-auto px-12 py-10 grid grid-cols-5 gap-x-10 gap-y-3";
@endphp

<div class="{{ $wrapperClass }}">
    <!-- MODIFIED: Injected dynamic $isActive color variables and base underline layout anchors directly onto this link element -->
    <a href="{{ $routeUrl }}" class="flex items-center gap-1 text-xs tracking-wider uppercase transition-all py-5 whitespace-nowrap border-b-2 {{ $isActive ? 'text-accent border-accent font-black' : 'border-transparent font-semibold text-nav-text group-hover:text-accent' }}">
        <span>{{ $title }}</span>
        <x-fas-angle-down class="h-3 w-3 transform transition-transform duration-200 group-hover:rotate-180 {{ $isActive ? 'text-accent' : 'group-hover:text-accent' }}"/>
    </a>

    <!-- Dropdown Panel Layer -->
    <div class="{{ $panelClass }} top-full z-50 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-150 pointer-events-none group-hover:pointer-events-auto">
        <div class="grid text-left {{ $gridClass }}">
            @foreach($columns as $column)
                <div class="flex flex-col gap-1">
                    @foreach($column as $item)
                        <!-- FIXED: Shifted from whitespace-nowrap to normal wrapping physics with precise vertical padding gutters -->
                        <a href="{{ $item['url'] }}" class="text-[13px] font-semibold text-nav-subtext hover:text-accent transition-colors leading-snug whitespace-normal block py-1 pr-2">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
