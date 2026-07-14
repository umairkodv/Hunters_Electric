<x-admin-layout title="Quotations">
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500">{{ $quotations->total() }} quotations</p>
    </div>

    <!-- Filter / Search Toolbar -->
    <form action="{{ route('admin.quotations.index') }}" method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-4 mb-6 flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="{{ $search }}" placeholder="Customer name or email&hellip;"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
        </div>
        <div class="min-w-[180px] hidden sm:block">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Statuses</option>
                @foreach (['pending' => 'Pending Review', 'quoted' => 'Quoted', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $value => $label)
                    <option value="{{ $value }}" @selected($status === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="bg-nav-text text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-nav-text/90 transition-colors">
                Filter
            </button>
            <a href="{{ route('admin.quotations.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                Reset
            </a>
        </div>
    </form>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left table-fixed min-w-[340px]">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 hidden lg:table-cell">Quote #</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Customer</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 hidden lg:table-cell">Items</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Status</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 hidden sm:table-cell">Requested</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Total</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($quotations as $quotation)
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-black text-nav-text hidden lg:table-cell">#{{ $quotation->id }}</td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-bold text-nav-text">{{ $quotation->user->name }}</p>
                            <p class="text-xs font-semibold text-gray-500">{{ $quotation->user->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500 hidden lg:table-cell">{{ $quotation->items_count }}</td>
                        <td class="px-6 py-4"><x-quotation-status-badge :status="$quotation->status" /></td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500 hidden sm:table-cell">{{ $quotation->created_at->format('M j, Y') }}</td>
                        <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                            {{ $quotation->quoted_total !== null ? '$'.number_format($quotation->quoted_total, 2) : '—' }}
                        </td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            <div class="flex items-center justify-end gap-1.5 xs:gap-2.5">
                                <!-- UPDATE ACTION -->
                                <a href="{{ route('admin.quotations.show', $quotation) }}"
                                    class="inline-flex items-center justify-center h-8 xl:h-auto px-2 xl:px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30"
                                    title="Edit Product">
                                    <span class="hidden xl:inline">Update</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 xl:hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No quotations match these filters.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <x-admin-pagination :paginator="$quotations" />
</x-admin-layout>
