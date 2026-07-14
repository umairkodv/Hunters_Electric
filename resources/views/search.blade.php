<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">Search Results</span>
                    </h1>
                    @if ($query !== '')
                        <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">
                            Showing results for &ldquo;{{ $query }}&rdquo;
                        </p>
                    @else
                        <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">
                            Enter a part number, description, or category name above to search.
                        </p>
                    @endif
                </div>
            </div>

            @if ($query !== '' && $products->isEmpty() && $subcategories->isEmpty())
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs px-6 py-10 text-center">
                    <p class="text-sm font-bold text-nav-text">No results found for &ldquo;{{ $query }}&rdquo;.</p>
                    <p class="text-xs text-gray-500 font-semibold mt-1">Try a different part number, description, or category name.</p>
                </div>
            @endif

            <!-- Matching Categories -->
            @if ($subcategories->isNotEmpty())
                <div class="flex flex-col gap-4">
                    <h2 class="text-xs font-black uppercase tracking-widest text-gray-500">Matching Categories</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($subcategories as $subcategory)
                            <a href="{{ route('department.subcategory', [$subcategory->mainCategory->department->slug, $subcategory->mainCategory->slug, $subcategory->slug]) }}"
                               class="group bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden h-full p-6">
                                <span class="text-[10px] font-black uppercase tracking-widest text-accent">{{ $subcategory->mainCategory->department->name }} / {{ $subcategory->mainCategory->name }}</span>
                                <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors mt-1">
                                    {{ $subcategory->name }}
                                </h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Matching Products -->
            @if ($products->isNotEmpty())
                <div class="flex flex-col gap-4">
                    <h2 class="text-xs font-black uppercase tracking-widest text-gray-500">Matching Parts</h2>
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                        <table class="w-full text-left table-fixed">
                            <thead class="bg-[#f8fafc] border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 w-24"></th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Description</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Category</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Price</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right w-36"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                                        <td class="px-6 py-4 w-24">
                                            <a href="{{ route('product.show', [$product->subcategory->mainCategory->department->slug, $product->subcategory->mainCategory->slug, $product->subcategory->slug, $product->part_number]) }}" class="inline-block">
                                                <x-part-image :url="$product->image_url" :alt="$product->part_number" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1" />
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('product.show', [$product->subcategory->mainCategory->department->slug, $product->subcategory->mainCategory->slug, $product->subcategory->slug, $product->part_number]) }}"
                                               class="text-xs font-black uppercase tracking-wider text-accent hover:text-accent-hover transition-colors">
                                                {{ $product->part_number }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-xs font-semibold text-gray-600">{{ $product->type_description }}</td>
                                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $product->subcategory->name }}</td>
                                        <td class="px-6 py-4 text-xs font-black text-nav-text text-right">${{ number_format($product->price, 2) }}</td>
                                        <td class="px-6 py-4 text-right">
                                            @if ($product->warehouse_status === 'Out of Stock')
                                                <span class="text-[10px] font-black uppercase tracking-widest text-gray-300">Out of Stock</span>
                                            @else
                                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                                                        + Add to Cart
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-layout>
