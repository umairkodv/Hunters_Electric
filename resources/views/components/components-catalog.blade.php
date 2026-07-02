@php
    // DYNAMIC ENTRY: Adapts automatically to whichever department page triggers it
    $departmentTitle = $title ?? 'Components';
    $departmentSlug = \Illuminate\Support\Str::slug($departmentTitle);
    
    // Read the unified associative list map from system memory
    $catalogDeck = config("catalog.menu_data.{$departmentTitle}", []);
@endphp

<div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

        <!-- Header Section Info Row -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6">
            <div>
                <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                    <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                    <span class="text-accent">{{ $departmentTitle }}</span>
                </h1>
                <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">
                    Select a core classification profile below to explore dynamic operational parts and interchange listings.
                </p>
            </div>
            <div class="text-right shrink-0">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-accent/5 text-accent text-[11px] font-black uppercase tracking-wider border border-accent/10">
                    {{ count($catalogDeck) }} Active Assembly Profiles Listed
                </span>
            </div>
        </div>

        <!-- High-Density Component Matrix Card Deck Layout Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
            @foreach ($catalogDeck as $mainCategoryName => $subCategories)
                @php
                    $slugifiedMainCategory = \Illuminate\Support\Str::slug($mainCategoryName);
                @endphp
                
                <!-- Individual Reusable Component Card Frame Block -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden">

                    <!-- FIXED: Top Card Header displaying real textual group names instead of array positions -->
                    <div class="bg-[#f8fafc] border-b border-gray-100 px-6 py-4 flex items-center justify-between group">
                        <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors truncate max-w-[220px]">
                            {{ $mainCategoryName }}
                        </h3>
                        <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest shrink-0">
                            {{ count($subCategories) }} Types
                        </span>
                    </div>

                    <!-- Inner Child Subcategory Item Link Layout Rows -->
                    <div class="p-4 flex flex-col gap-1 grow bg-white">
                        @foreach ($subCategories as $subItem)
                            @php
                                $slugifiedSubItem = \Illuminate\Support\Str::slug($subItem);
                            @endphp
                            <!-- FIXED: Formatted anchor routes pointing directly to /components/mainCategory/subCategory -->
                            <a href="{{ url($departmentSlug . '/' . $slugifiedMainCategory . '/' . $slugifiedSubItem) }}" 
                               class="group flex items-center justify-between px-3 py-2 rounded-lg border border-transparent hover:border-gray-100/80 hover:bg-[#f8fafc]/50 transition-all duration-100">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gray-300 group-hover:bg-accent transition-colors shrink-0"></span>
                                    <span class="text-xs font-bold text-gray-600 group-hover:text-nav-text transition-colors truncate leading-tight">
                                        {{ $subItem }}
                                    </span>
                                </div>
                                <svg class="h-3 w-3 text-gray-300 group-hover:text-accent group-hover:translate-x-0.5 transform transition-all shrink-0 ml-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endforeach
                    </div>

                    <!-- Card Interactive View Action Footer Callout Link -->
                    <!-- FIXED: Formatted Browse All links pointing directly to /components/mainCategory -->
                    <div class="border-t border-gray-100 px-5 py-3.5 bg-gray-50/30 text-left">
                        <a href="{{ url($departmentSlug . '/' . $slugifiedMainCategory) }}"
                           class="inline-flex items-center gap-1 text-[11px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                            <span>Browse All {{ $mainCategoryName }} &rarr;</span>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>
