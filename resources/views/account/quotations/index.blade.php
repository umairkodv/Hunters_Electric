<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-4xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div>
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">My Quotes</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Track the status of your quote requests.</p>
                </div>
                <a href="{{ route('account.dashboard') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    &larr; Back to Account
                </a>
            </div>

            @if ($quotations->isEmpty())
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs px-6 py-12 text-center">
                    <p class="text-sm font-bold text-nav-text">No quote requests yet.</p>
                    <p class="text-xs text-gray-500 font-semibold mt-1">Add parts to your cart and request a quote to see it listed here.</p>
                </div>
            @else
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-[#f8fafc] border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quote #</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Items</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Status</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Requested</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($quotations as $quotation)
                                <tr class="hover:bg-[#f8fafc]/60 transition-colors cursor-pointer" onclick="window.location='{{ route('account.quotations.show', $quotation) }}'">
                                    <td class="px-6 py-4 text-xs font-black text-nav-text">
                                        <a href="{{ route('account.quotations.show', $quotation) }}" class="hover:text-accent transition-colors">#{{ $quotation->id }}</a>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $quotation->items_count }}</td>
                                    <td class="px-6 py-4">
                                        <x-quotation-status-badge :status="$quotation->status" />
                                    </td>
                                    <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $quotation->created_at->format('M j, Y') }}</td>
                                    <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                                        {{ $quotation->quoted_total !== null ? '$'.number_format($quotation->quoted_total, 2) : '—' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-layout>
