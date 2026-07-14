<x-admin-layout title="Products">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $products->total() }} products</p>
         <a href="#new-product-popup" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Product
        </a>
    </div>

    <!-- Filter / Search Toolbar -->
    <form action="{{ route('admin.products.index') }}" method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-4 mb-6 flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ $search }}" placeholder="Part number or description&hellip;"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
        </div>
        <div class="min-w-[220px] hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Subcategory</label>
            <select name="subcategory_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Subcategories</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @selected($subcategoryId == $subcategory->id)>{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="min-w-[180px] hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Status</label>
            <select name="warehouse_status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Statuses</option>
                @foreach (['In Stock', 'Low Stock', 'Out of Stock'] as $statusOption)
                    <option value="{{ $statusOption }}" @selected($status === $statusOption)>{{ $statusOption }}</option>
                @endforeach
            </select>
        </div>
         <div class="w-28 hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Min Price ($)</label>
            <input type="number" name="min_price" value="{{ request('min_price') }}" step="0.01" min="0" placeholder="0.00"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <div class="w-28 hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Max Price ($)</label>
            <input type="number" name="max_price" value="{{ request('max_price') }}" step="0.01" min="0" placeholder="9999"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="bg-nav-text text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-nav-text/90 transition-colors">
                Filter
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                Reset
            </a>
        </div>
    </form>
    
    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-x-auto m-0.5">
        <!-- Responsive Table Structure -->
        <table class="w-full text-left table-fixed min-w-[340px]">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                    <th class="hidden md:table-cell px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 w-1/3 md:w-2/5">Description</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 w-28">Status</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Price</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($products as $product)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-black text-nav-text truncate">{{ $product->part_number }}</td>
                        <td class="hidden md:table-cell px-6 py-4 text-xs font-semibold text-gray-500 break-words">{{ $product->type_description }}</td>
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest whitespace-nowrap">{{ $product->warehouse_status }}</span>
                        </td>
                        <td class="px-6 py-4 text-xs font-black text-nav-text text-right whitespace-nowrap">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            <div class="flex items-center justify-end gap-1.5 xs:gap-2.5">
                                <!-- EDIT ACTION -->
                                <a href="#edit-prod-{{ $product->id }}"
                                    class="inline-flex items-center justify-center h-8 xl:h-auto px-2 xl:px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30"
                                    title="Edit Product">
                                    <span class="hidden xl:inline">Edit</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 xl:hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <!-- DELETE ACTION -->
                                <a href="#delete-prod-{{ $product->id }}"
                                    class="inline-flex items-center justify-center h-8 xl:h-auto px-2 xl:px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200"
                                    title="Delete Product">
                                    <span class="hidden xl:inline">Delete</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 xl:hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- EDIT MODAL COMPONENT -->
                    <x-admin-edit-modal :model="$product" prefix="edit-prod" title="Edit Product: {{ $product->part_number }}" :actionRoute="route('admin.products.update', $product)">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Subcategory</label>
                            <select name="subcategory_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                                @foreach (\App\Models\Subcategory::with('mainCategory.department')->get() as $sub)
                                    <option value="{{ $sub->id }}" @selected(old('subcategory_id', $product->subcategory_id) == $sub->id)>
                                        {{ $sub->mainCategory->department->name }} / {{ $sub->mainCategory->name }} / {{ $sub->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Part Number</label>
                            <input type="text" name="part_number" value="{{ old('part_number', $product->part_number) }}" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>

                        <div class="border border-gray-200 rounded-lg p-3 flex flex-col gap-3">
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-500">Product Image</p>
                            <div class="flex items-center gap-3">
                                <x-part-image :url="$product->image_url" :alt="$product->part_number" class="h-14 w-14 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1" />
                                <p class="text-[10px] text-gray-400 font-semibold">
                                    {{ $product->image_url ? 'Current image' : 'No image set — showing placeholder' }}
                                </p>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 mb-1">Upload a new file</label>
                                <input type="file" name="image_file" accept="image/*"
                                       class="w-full text-xs text-gray-600 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-accent file:text-white hover:file:bg-accent-hover" />
                            </div>
                            <p class="text-center text-[10px] font-black uppercase tracking-widest text-gray-300">&mdash; or &mdash;</p>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 mb-1">Paste an image URL</label>
                                <input type="text" name="image_url" value="{{ old('image_url', $product->image_url) }}" placeholder="https://..." autocomplete="off"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
                            </div>
                            @if ($product->image_url)
                                <label class="flex items-center gap-2 text-xs font-semibold text-red-600">
                                    <input type="checkbox" name="remove_image" value="1" class="rounded border-gray-300">
                                    Remove current image (fall back to placeholder)
                                </label>
                            @endif
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Description</label>
                            <input type="text" name="type_description" value="{{ old('type_description', $product->type_description) }}" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Specifications</label>
                            <textarea name="specifications" rows="4" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text resize-none">{{ old('specifications', $product->specifications) }}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Warehouse Status</label>
                                <select name="warehouse_status" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                                    @foreach (['In Stock', 'Low Stock', 'Out of Stock'] as $status)
                                        <option value="{{ $status }}" @selected(old('warehouse_status', $product->warehouse_status) === $status)>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Stock Quantity</label>
                                <input type="number" name="stock_qty" min="0" value="{{ old('stock_qty', $product->stock_qty) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Price ($)</label>
                            <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                    </x-admin-edit-modal>

                    <!-- DELETE MODAL COMPONENT -->
                    <x-admin-delete-modal :model="$product" prefix="delete-prod" :actionRoute="route('admin.products.destroy', $product)" :itemName="$product->part_number" />

                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No products yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <x-admin-pagination :paginator="$products" />

     <!-- NEW PRODUCT POPUP MODAL -->
     <x-admin-modal id="new-product-popup" title="Create New Product" :actionRoute="route('admin.products.store')">
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Subcategory</label>
            <select name="subcategory_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                <option value="" disabled selected class="text-gray-400">Select a subcategory...</option>
                @foreach (\App\Models\Subcategory::with('mainCategory.department')->get() as $subcategory)
                    <option value="{{ $subcategory->id }}" @selected(old('subcategory_id') == $subcategory->id)>
                        {{ $subcategory->mainCategory->department->name }} / {{ $subcategory->mainCategory->name }} / {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Part Number</label>
            <input type="text" name="part_number" value="{{ old('part_number') }}" required autocomplete="off" placeholder="e.g., JN-1240"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
        </div>
        <div class="border border-gray-200 rounded-lg p-3 flex flex-col gap-3">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-500">Product Image</p>
            <div>
                <label class="block text-[10px] font-bold text-gray-500 mb-1">Upload a file</label>
                <input type="file" name="image_file" accept="image/*"
                       class="w-full text-xs text-gray-600 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wider file:bg-accent file:text-white hover:file:bg-accent-hover" />
            </div>
            <p class="text-center text-[10px] font-black uppercase tracking-widest text-gray-300">&mdash; or &mdash;</p>
            <div>
                <label class="block text-[10px] font-bold text-gray-500 mb-1">Paste an image URL</label>
                <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://..." autocomplete="off"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
            </div>
            <p class="text-[10px] text-gray-400 font-semibold">If neither is provided, a placeholder image is shown instead.</p>
        </div>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Description</label>
            <input type="text" name="type_description" value="{{ old('type_description') }}" required autocomplete="off" placeholder="e.g., 12V Heavy Duty Unit"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
        </div>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Specifications</label>
            <textarea name="specifications" rows="4" required placeholder="Enter unit specifications..."
                      class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400 resize-none">{{ old('specifications') }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Warehouse Status</label>
                <select name="warehouse_status" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                    @foreach (['In Stock', 'Low Stock', 'Out of Stock'] as $status)
                        <option value="{{ $status }}" @selected(old('warehouse_status', 'In Stock') === $status)>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Stock Quantity</label>
                <input type="number" name="stock_qty" min="0" value="{{ old('stock_qty', 0) }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
            </div>
        </div>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Price ($)</label>
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price', 0) }}" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <x-slot:footerActions>
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Product
            </button>
        </x-slot:footerActions>
    </x-admin-modal>
</x-admin-layout>