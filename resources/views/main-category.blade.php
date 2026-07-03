<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Breadcrumb -->
            <nav class="text-[11px] font-bold uppercase tracking-widest text-gray-400 flex items-center gap-2">
                <a href="{{ route('department.show', $department->slug) }}" class="hover:text-accent transition-colors">{{ $department->name }}</a>
                <span>/</span>
                <span class="text-nav-text">{{ $mainCategory->name }}</span>
            </nav>

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">{{ $mainCategory->name }}</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Browse every subcategory listed underneath {{ $mainCategory->name }}.</p>
                </div>
            </div>

            <!-- Subcategory Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch w-full">
                @foreach ($mainCategory->subcategories as $subcategory)
                    <a href="{{ route('department.subcategory', [$department->slug, $mainCategory->slug, $subcategory->slug]) }}"
                       class="group bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden h-full p-6">
                        <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors">
                            {{ $subcategory->name }}
                        </h3>
                        <p class="text-[11px] text-gray-400 font-semibold mt-1">
                            {{ $subcategory->products->count() }} {{ \Illuminate\Support\Str::plural('part', $subcategory->products->count()) }}
                        </p>
                        <span class="mt-4 inline-flex items-center gap-1 text-[11px] font-black uppercase tracking-widest text-accent">
                            View Parts &rarr;
                        </span>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</x-layout>
