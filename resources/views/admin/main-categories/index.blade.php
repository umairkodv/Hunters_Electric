<x-admin-layout title="Main Categories">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $mainCategories->total() }} main categories</p>
        
        <!-- FIXED: Anchors directly to the reusable modal ID anchor hash -->
        <a href="#new-cat-popup"
            class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Main Category
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Name</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Department</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Slug</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Subcategories</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($mainCategories as $mainCategory)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-bold text-nav-text">{{ $mainCategory->name }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $mainCategory->department->name }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $mainCategory->slug }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $mainCategory->subcategories_count }}</td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            <div class="flex items-center justify-end gap-2.5">
                                <a href="{{ route('admin.main-categories.edit', $mainCategory) }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>
                                <form action="{{ route('admin.main-categories.destroy', $mainCategory) }}"
                                    method="POST" class="inline"
                                    onsubmit="return confirm('Delete this main category and everything under it? This cannot be undone.');">
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
                        <td colspan="5" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No main categories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <x-admin-pagination :paginator="$mainCategories" />

    <!-- ======================================================== -->
    <!-- REUSABLE MODAL COMPONENT INJECTION FOR MAIN CATEGORIES    -->
    <!-- ======================================================== -->
    <x-admin-modal id="new-cat-popup" title="Create Main Category" :actionRoute="route('admin.main-categories.store')">
        
        <!-- 1. Parent Department Relational Dropdown Input -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Department</label>
            <select name="department_id" required 
                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                <option value="" disabled selected class="text-gray-400">Select a Department...</option>
                @foreach(\App\Models\Department::orderBy('name')->get() as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required autocomplete="off" placeholder="e.g., Electrical & Rotational" 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
            <p class="text-[10px] text-gray-400 font-semibold mt-1 select-none">The URL slug is generated automatically from this name.</p>
        </div>

        <!-- 3. Stacking Sort Index Order Counter Input -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" required 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>

        <!-- Footers Action Slot Override Button Configuration -->
        <x-slot:footerActions>
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Main Category
            </button>
        </x-slot:footerActions>

    </x-admin-modal>
    <!-- ======================================================== -->

</x-admin-layout>
