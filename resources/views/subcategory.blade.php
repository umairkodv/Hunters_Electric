<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Breadcrumb -->
            <nav class="text-[11px] font-bold uppercase tracking-widest text-gray-400 flex items-center gap-2 flex-wrap">
                <a href="{{ route('department.show', $department->slug) }}" class="hover:text-accent transition-colors">{{ $department->name }}</a>
                <span>/</span>
                <a href="{{ route('department.mainCategory', [$department->slug, $mainCategory->slug]) }}" class="hover:text-accent transition-colors">{{ $mainCategory->name }}</a>
                <span>/</span>
                <span class="text-nav-text">{{ $subcategory->name }}</span>
            </nav>

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">{{ $subcategory->name }}</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">{{ $subcategory->products->count() }} parts listed in this subcategory.</p>
                </div>
            </div>

            <!-- Product Listing Table -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#f8fafc] border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500"></th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Description</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Availability</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($subcategory->products as $product)
                            <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                                <td class="px-6 py-4 w-16">
                                    <a href="{{ route('product.show', [$department->slug, $mainCategory->slug, $subcategory->slug, $product->part_number]) }}">
                                        <img src="{{ $product->display_image_url }}" alt="{{ $product->part_number }}" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1">
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('product.show', [$department->slug, $mainCategory->slug, $subcategory->slug, $product->part_number]) }}"
                                       class="text-xs font-black uppercase tracking-wider text-accent hover:text-accent-hover transition-colors">
                                        {{ $product->part_number }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-xs font-semibold text-gray-600">{{ $product->type_description }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest">
                                        {{ $product->warehouse_status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs font-black text-nav-text text-right">${{ number_format($product->price, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No parts are currently listed in this subcategory.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-layout>
