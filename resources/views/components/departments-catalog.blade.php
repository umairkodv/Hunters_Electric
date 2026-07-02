@props(['title' => 'Components'])

@php
    // Read clean relational information straight out of our database based on the active prop title
    $department = \App\Models\Department::with('mainCategories.subcategories')
        ->where('name', $title)
        ->first();
@endphp

<div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
    @if($department)
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">{{ $department->name }}</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Explore specialized collections and inventory parts listings underneath this division.</p>
                </div>
            </div>

            <!-- High-Density Component Matrix Card Deck Layout Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start w-full">
                @foreach ($department->mainCategories as $mainCategory)
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden">

                        <!-- Card Header Group Title -->
                        <div class="bg-[#f8fafc] border-b border-gray-100 px-6 py-4 flex items-center justify-between group shrink-0">
                            <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors truncate max-w-[220px]">
                                {{ $mainCategory->name }}
                            </h3>
                            <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest shrink-0">
                                {{ $mainCategory->subcategories->count() }} Types
                            </span>
                        </div>

                        <!-- Inner Child Subcategory Item Link Layout Rows -->
                        <div class="p-5 flex flex-col gap-1 bg-white">
                            @foreach ($mainCategory->subcategories as $subcategory)
                                <a href="{{ url($department->slug . '/' . $mainCategory->slug . '/' . $subcategory->slug) }}" 
                                   class="group flex items-center justify-between px-3 py-2 rounded-lg border border-transparent hover:border-gray-100/80 hover:bg-[#f8fafc]/50 transition-all duration-100">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <span class="h-1.5 w-1.5 rounded-full bg-gray-300 group-hover:bg-accent transition-colors shrink-0"></span>
                                        <span class="text-xs font-bold text-gray-600 group-hover:text-nav-text transition-colors truncate leading-tight">
                                            {{ $subcategory->name }}
                                        </span>
                                    </div>
                                    <svg class="h-3 w-3 text-gray-300 group-hover:text-accent group-hover:translate-x-0.5 transform transition-all shrink-0 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>

                        <!-- Card Interactive View Action Footer Callout Link -->
                        <div class="border-t border-gray-100 px-5 py-3.5 bg-gray-50/30 text-left shrink-0">
                            <a href="{{ url($department->slug . '/' . $mainCategory->slug) }}" class="inline-flex items-center gap-1 text-[11px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                                <span>Browse All {{ $mainCategory->name }} &rarr;</span>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    @endif
</div>
