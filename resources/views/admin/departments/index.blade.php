<x-admin-layout title="Departments">
    
    <!-- Header Dashboard Tracking Action Row -->
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $departments->count() }} departments</p>
        
        <!-- Open Creation Modal Trigger Anchor -->
        <a href="#new-dept-popup" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Department
        </a>
    </div>

    <!-- Your High-Density Data Table Canvas Grid Frame -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Name</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Slug</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Sort Order</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Main Categories</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($departments as $department)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-bold text-nav-text">{{ $department->name }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $department->slug }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $department->sort_order }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $department->main_categories_count }}</td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            
                            <!-- FIXED CONTROL ROW: Re-integrated your premium micro-button action styling layout -->
                            <div class="flex items-center justify-end gap-2.5">
                                
                                <!-- Retained exact light-accent red block variables anchoring to row edit IDs -->
                                <a href="#edit-dept-{{ $department->id }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>

                                <!-- Retained soft-slate to bold-crimson transition button targeting row delete confirmation sheets -->
                                <a href="#delete-dept-{{ $department->id }}"
                                   class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200">
                                    Delete
                                </a>

                            </div>
                        </td>
                    </tr>

                    <!-- DYNAMIC STANDALONE EDIT COMPONENT SHEET -->
                    <x-admin-edit-modal :model="$department" prefix="edit-dept" title="Edit Department: {{ $department->name }}" :actionRoute="route('admin.departments.update', $department)">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
                            <input type="text" name="name" value="{{ old('name', $department->name) }}" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $department->sort_order) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                    </x-admin-edit-modal>

                    <!-- DYNAMIC STANDALONE DELETE COMPONENT SHEET -->
                    <x-admin-delete-modal :model="$department" prefix="delete-dept" :actionRoute="route('admin.departments.destroy', $department)" :itemName="$department->name" />

                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No departments yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- REUSABLE COMPONENT INJECTION FOR CREATION -->
    <x-admin-modal id="new-dept-popup" title="Create New Department" :actionRoute="route('admin.departments.store')">
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required autocomplete="off" placeholder="e.g., Heavy Electronics" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
            <p class="text-[10px] text-gray-400 font-semibold mt-1">The URL slug is generated automatically from this name.</p>
        </div>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <x-slot:footerActions>
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Department
            </button>
        </x-slot:footerActions>
    </x-admin-modal>

</x-admin-layout>
