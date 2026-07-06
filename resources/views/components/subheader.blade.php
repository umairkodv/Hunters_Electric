@php
    // Built from $navDepartments (supplied by the global view composer in
    // AppServiceProvider) instead of running a separate database query here.
    //
    // Each column entry is a ['label' => ..., 'url' => ...] pair with the
    // URL built here from real slugs, rather than passing raw names down to
    // mega-dropdown.blade.php to re-slugify (that approach lost track of
    // which main category a subcategory belonged to and produced broken
    // links for every department except Components).
    $menuData = $navDepartments->mapWithKeys(function ($department) {

        if ($department->name === 'Components') {
            // Links go to the main category page (Armatures and Parts, Bolts and Screws, etc.)
            $mainCategoryLinks = $department->mainCategories->map(function ($mainCategory) use ($department) {
                return [
                    'label' => $mainCategory->name,
                    'url' => route('department.mainCategory', [$department->slug, $mainCategory->slug]),
                ];
            })->toArray();

            // Chunk the parent categories into 5 clean, even vertical list columns
            $columnArrays = array_chunk($mainCategoryLinks, ceil(count($mainCategoryLinks) / 5));
        } else {
            // Alternators, Starters, Motors, Generators, Accessories: one column
            // per main category, links go to the subcategory (product listing) page
            $columnArrays = $department->mainCategories->map(function ($mainCategory) use ($department) {
                return $mainCategory->subcategories->map(function ($subcategory) use ($department, $mainCategory) {
                    return [
                        'label' => $subcategory->name,
                        'url' => route('department.subcategory', [$department->slug, $mainCategory->slug, $subcategory->slug]),
                    ];
                })->toArray();
            })->toArray();
        }

        return [$department->name => $columnArrays];
    })
        ->toArray();
@endphp

<!-- Main White Header Bar Container Anchor -->
<div class="relative bg-white border-b border-gray-200 px-12 hidden lg:flex items-center justify-center lg:justify-between shadow-sm z-40">
    <div class="flex items-center">
        <!-- Main Navigation Bar Flex Grid Links -->
        <nav class="flex items-center gap-4 lg:gap-8">
            @foreach($menuData as $title => $columns)
                <x-mega-dropdown :title="$title" :items="$columns" />
            @endforeach
        </nav>
    </div>

    <!-- Right Side Help & Support Custom Dropdown Container -->
    <div class="relative inline-block group">
        <!-- Help & Support Hover Trigger -->
        <a href="#" class="text-xs uppercase font-semibold text-nav-text group-hover:text-accent tracking-wider py-5 flex items-center gap-1">
            <span>Help & Support</span>
            <x-fas-angle-down class="h-3 w-3 transform transition-transform duration-200 group-hover:rotate-180 group-hover:text-accent"/>
        </a>

        <!-- Help & Support Dropdown Card Panel Box (Aligned right) -->
        <div class="absolute right-0 top-full w-[340px] bg-white text-nav-text shadow-xl border border-gray-200 z-50 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-150 pointer-events-none group-hover:pointer-events-auto p-6">
            
            <!-- Support Call Information Header Box Area -->
            <div class="flex items-start gap-4 mb-4">
                <div class="bg-accent text-white rounded p-2.5 flex items-center justify-center shadow-sm">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-1C7.22 18 2 12.78 2 6V3z"/>
                    </svg>
                </div>
                <div class="flex flex-col text-left">
                    <a href="tel:8003667100" class="text-xl font-bold text-nav-text hover:text-accent transition-colors tracking-tight">
                        {{ config('app.phone') }}
                    </a>
                    <span class="text-xs text-gray-500 font-medium mt-0.5">
                        Mon-Fri | 8:00am - 6:00pm EST
                    </span>
                </div>
            </div>

            <hr class="border-gray-200 my-4" />

            <!-- Sub Navigation Context Action Menu Links -->
            <div class="flex flex-col gap-4 text-left">
                <a href="#" class="text-sm font-medium text-nav-subtext hover:text-accent transition-colors">Contact Us</a>
                <a href="#" class="text-sm font-medium text-nav-subtext hover:text-accent transition-colors">Shipping</a>
                <a href="#" class="text-sm font-medium text-nav-subtext hover:text-accent transition-colors">Returns</a>
                <a href="#" class="text-sm font-medium text-nav-subtext hover:text-accent transition-colors">Safety Data Sheets</a>
                <a href="#" class="text-sm font-medium text-nav-subtext hover:text-accent transition-colors">How To Guides</a>
                <a href="#" class="text-sm font-medium text-nav-subtext hover:text-accent transition-colors">Print Catalogs</a>
            </div>
        </div>
    </div>
</div>
