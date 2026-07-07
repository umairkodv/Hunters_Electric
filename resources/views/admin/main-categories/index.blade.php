<x-admin-layout title="Main Categories">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $mainCategories->total() }} main categories</p>
        
        <!-- Anchors securely straight to the HTML modal target selector window container ID -->
        <a href="#new-cat-popup"
            class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Main Category
        </a>
    </div>

    <!-- Filter / Search Toolbar -->
    <form action="{{ route('admin.main-categories.index') }}" method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-4 mb-6 flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ $search }}" placeholder="Search by name&hellip;"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
        </div>
        <div class="min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Department</label>
            <select name="department_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Departments</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected($departmentId == $department->id)>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="bg-nav-text text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-nav-text/90 transition-colors">
                Filter
            </button>
            <a href="{{ route('admin.main-categories.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                Reset
            </a>
        </div>
    </form>

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
                            
                            <!-- FIXED CONTROL ROW: Maps your exact micro-button styles to individual modal target hashes -->
                            <div class="flex items-center justify-end gap-2.5">
                                
                                <a href="#edit-cat-{{ $mainCategory->id }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>

                                <a href="#delete-cat-{{ $mainCategory->id }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200">
                                    Delete
                                </a>
                                
                            </div>
                        </td>
                    </tr>

                    <!-- DYNAMIC STANDALONE EDIT COMPONENT SHEET -->
                    <x-admin-edit-modal :model="$mainCategory" prefix="edit-cat" title="Edit Main Category: {{ $mainCategory->name }}" :actionRoute="route('admin.main-categories.update', $mainCategory)">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Department</label>
                            <select name="department_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                                @foreach(\App\Models\Department::orderBy('name')->get() as $dept)
                                    <option value="{{ $dept->id }}" @selected(old('department_id', $mainCategory->department_id) == $dept->id)>{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
                            <input type="text" name="name" value="{{ old('name', $mainCategory->name) }}" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $mainCategory->sort_order) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                    </x-admin-edit-modal>

                    <!-- DYNAMIC STANDALONE DELETE COMPONENT SHEET -->
                    <x-admin-delete-modal :model="$mainCategory" prefix="delete-cat" :actionRoute="route('admin.main-categories.destroy', $mainCategory)" :itemName="$mainCategory->name" />

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

    <!-- REUSABLE MODAL COMPONENT INJECTION FOR CREATION -->
    <x-admin-modal id="new-cat-popup" title="Create Main Category" :actionRoute="route('admin.main-categories.store')">
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
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" required 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <x-slot:footerActions>
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Main Category
            </button>
        </x-slot:footerActions>
    </x-admin-modal>

</x-admin-layout>
