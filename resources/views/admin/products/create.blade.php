<x-admin-layout title="New Product">
    <div class="max-w-lg bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
        <form action="{{ route('admin.products.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Subcategory</label>
                <select name="subcategory_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                    <option value="">Select a subcategory&hellip;</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" @selected(old('subcategory_id') == $subcategory->id)>
                            {{ $subcategory->mainCategory->department->name }} / {{ $subcategory->mainCategory->name }} / {{ $subcategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Part Number</label>
                <input type="text" name="part_number" value="{{ old('part_number') }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Description</label>
                <input type="text" name="type_description" value="{{ old('type_description') }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Specifications</label>
                <textarea name="specifications" rows="4" required
                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">{{ old('specifications') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Warehouse Status</label>
                    <select name="warehouse_status" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                        @foreach (['In Stock', 'Low Stock', 'Out of Stock'] as $status)
                            <option value="{{ $status }}" @selected(old('warehouse_status', 'In Stock') === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Stock Quantity</label>
                    <input type="number" name="stock_qty" min="0" value="{{ old('stock_qty', 0) }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Price ($)</label>
                <input type="number" name="price" step="0.01" min="0" value="{{ old('price', 0) }}" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div class="flex items-center gap-3 mt-2">
                <button type="submit" class="bg-accent text-nav-text text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors">
                    Create Product
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
