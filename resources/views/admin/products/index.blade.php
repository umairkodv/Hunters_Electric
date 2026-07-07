<x-admin-layout title="Products">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $products->total() }} products</p>
         <a href="#new-product-popup" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Product
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Description</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Subcategory
                    </th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Status</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">
                        Price</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($products as $product)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-black text-nav-text">{{ $product->part_number }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $product->type_description }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $product->subcategory->name }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest">{{ $product->warehouse_status }}</span>
                        </td>
                        <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                            ${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            <div class="flex items-center justify-end gap-2.5">

                                <!-- UPGRADED EDIT TRIGGER: Dynamically binds to your new red --color-accent tokens -->
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>

                                <!-- UPGRADED DELETE TRIGGER: Minimalist slate base that alerts with sharp Red contrast on hover -->
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Delete this product? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No products
                            yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <x-admin-pagination :paginator="$products" />

     <x-admin-modal id="new-product-popup" title="Create New Product" :actionRoute="route('admin.products.store')">
        
        <!-- 1. Deep Relational Taxonomy Parent Selection Dropdown -->
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

        <!-- 2. Part Number Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Part Number</label>
            <input type="text" name="part_number" value="{{ old('part_number') }}" required autocomplete="off" placeholder="e.g., JN-1240"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
        </div>

        <!-- 3. Type Description Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Description</label>
            <input type="text" name="type_description" value="{{ old('type_description') }}" required autocomplete="off" placeholder="e.g., 12V Heavy Duty Unit"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
        </div>

        <!-- 4. Textarea Specifications Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Specifications</label>
            <textarea name="specifications" rows="4" required placeholder="Enter unit specifications..."
                      class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400 resize-none">{{ old('specifications') }}</textarea>
        </div>

        <!-- 5. Warehouse Status and Quantity Columns Grid Set -->
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

        <!-- 6. Item Pricing Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Price ($)</label>
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price', 0) }}" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>

        <!-- Custom Modal Footer Buttons Action Slot -->
        <x-slot:footerActions>
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Product
            </button>
        </x-slot:footerActions>

    </x-admin-modal>

</x-admin-layout>
