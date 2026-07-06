<x-admin-layout title="Subcategories">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $subcategories->total() }} subcategories</p>
        <a href="{{ route('admin.subcategories.create') }}"
            class="bg-accent text-nav-text text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors">
            + New Subcategory
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Name</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Main Category
                    </th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Department</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Featured</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Products</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($subcategories as $subcategory)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-bold text-nav-text">{{ $subcategory->name }}</td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $subcategory->mainCategory->name }}
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">
                            {{ $subcategory->mainCategory->department->name }}</td>
                        <td class="px-6 py-4">
                            @if ($subcategory->is_featured)
                                <span
                                    class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-accent/20 text-accent-hover uppercase tracking-widest">Featured</span>
                            @else
                                <span class="text-[10px] text-gray-300 font-semibold">&mdash;</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $subcategory->products_count }}
                        </td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            <div class="flex items-center justify-end gap-2.5">

                                <!-- UPGRADED EDIT TRIGGER: Dynamically binds to your new red --color-accent tokens -->
                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>

                                <!-- UPGRADED DELETE TRIGGER: Minimalist slate base that alerts with sharp Red contrast on hover -->
                                <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Delete this subcategory and all its products? This cannot be undone.');">
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
                        <td colspan="6" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No
                            subcategories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <x-admin-pagination :paginator="$subcategories" />
</x-admin-layout>
