@php
    // Read ONLY the 'Components' key out of your central layout configuration file
    $componentsCatalog = config('catalog.menu_data.Components', []);
@endphp

<div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-12 flex flex-col gap-8">
        
        <!-- Header Section Info Row -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6">
            <div>
                <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                    <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                    <span class="text-accent">Components</span>
                </h1>
                <p class="text-xs text-gray-500 font-medium tracking-wide mt-1">
                    Select a core classification profile below to explore dynamic operational parts and interchange listings.
                </p>
            </div>
            <div class="text-right shrink-0">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-accent/5 text-accent text-[11px] font-black uppercase tracking-wider border border-accent/10">
                    {{ count($componentsCatalog) }} Main Assemblies Listed
                </span>
            </div>
        </div>

        <!-- High-Density Component Matrix Deck Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($componentsCatalog as $mainCategory => $subCategories)
                <div class="bg-white border border-gray-200/80 rounded-2xl shadow-2xs hover:shadow-sm hover:border-accent/30 transition-all duration-200 flex flex-col overflow-hidden">
                    
                    <div class="bg-[#f8fafc] border-b border-gray-100 px-6 py-4 flex items-center justify-between group">
                        <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors">
                            {{ $mainCategory }}
                        </h3>
                        <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/60 text-gray-500 uppercase tracking-widest">
                            {{ count($subCategories) }} Types
                        </span>
                    </div>

                    <div class="p-5 flex flex-col gap-1.5 grow bg-white">
                        @foreach($subCategories as $subItem)
                            <a href="#" class="group flex items-center justify-between px-3 py-2.5 rounded-lg border border-transparent hover:border-gray-100 hover:bg-[#f8fafc]/60 transition-all duration-150">
                                <div class="flex items-center gap-2 min-w-0">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gray-300 group-hover:bg-accent transition-colors shrink-0"></span>
                                    <span class="text-xs font-bold text-gray-600 group-hover:text-nav-text transition-colors truncate leading-tight">
                                        {{ $subItem }}
                                    </span>
                                </div>
                                <svg class="h-3 w-3 text-gray-300 group-hover:text-accent group-hover:translate-x-0.5 transform transition-all shrink-0 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-50 px-5 py-3.5 bg-gray-50/20 text-left">
                        <a href="#" class="inline-flex items-center gap-1 text-[11px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                            <span>Browse All {{ $mainCategory }}</span>
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>
