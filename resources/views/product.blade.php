<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-5xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Breadcrumb -->
            <nav class="text-[11px] font-bold uppercase tracking-widest text-gray-400 flex items-center gap-2 flex-wrap">
                <a href="{{ route('department.show', $department->slug) }}" class="hover:text-accent transition-colors">{{ $department->name }}</a>
                <span>/</span>
                <a href="{{ route('department.mainCategory', [$department->slug, $mainCategory->slug]) }}" class="hover:text-accent transition-colors">{{ $mainCategory->name }}</a>
                <span>/</span>
                <a href="{{ route('department.subcategory', [$department->slug, $mainCategory->slug, $subcategory->slug]) }}" class="hover:text-accent transition-colors">{{ $subcategory->name }}</a>
                <span>/</span>
                <span class="text-nav-text">{{ $product->part_number }}</span>
            </nav>

            <!-- Product Detail Card -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                <div class="border-b border-gray-100 px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-accent">{{ $subcategory->name }}</span>
                        <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text mt-1">{{ $product->part_number }}</h1>
                        <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">{{ $product->type_description }}</p>
                    </div>
                    <div class="text-left sm:text-right">
                        <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest">
                            {{ $product->warehouse_status }}
                        </span>
                        <p class="text-2xl font-black text-nav-text mt-2">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>

                <div class="px-8 py-6 grid grid-cols-1 sm:grid-cols-3 gap-6 border-b border-gray-100">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Part Number</p>
                        <p class="text-xs font-bold text-nav-text mt-1">{{ $product->part_number }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Stock Quantity</p>
                        <p class="text-xs font-bold text-nav-text mt-1">{{ $product->stock_qty }} units</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Availability</p>
                        <p class="text-xs font-bold text-nav-text mt-1">{{ $product->warehouse_status }}</p>
                    </div>
                </div>

                <div class="px-8 py-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Specifications</p>
                    <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line">{{ $product->specifications }}</p>
                </div>

                <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                    <a href="{{ route('quote.start', $product) }}" class="inline-flex items-center gap-2 bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                        Request a Quote
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layout>
