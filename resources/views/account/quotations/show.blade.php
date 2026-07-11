<x-layout>
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-4xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div>
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">Quote #{{ $quotation->id }}</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Requested {{ $quotation->created_at->format('M j, Y') }}</p>
                </div>
                <a href="{{ route('account.quotations.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    &larr; Back to My Quotes
                </a>
            </div>

            <div class="flex items-center gap-3">
                <x-quotation-status-badge :status="$quotation->status" />
                @if ($quotation->quoted_total !== null)
                    <span class="text-sm font-black text-nav-text">${{ number_format($quotation->quoted_total, 2) }}</span>
                @endif
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#f8fafc] border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quantity</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Unit Price</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Line Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($quotation->items as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $item->product->display_image_url }}" alt="{{ $item->product->part_number }}" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0">
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-wider text-nav-text">{{ $item->product->part_number }}</p>
                                            <p class="text-xs font-semibold text-gray-500 mt-0.5">{{ $item->product->type_description }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                                    {{ $item->unit_price !== null ? '$'.number_format($item->unit_price, 2) : 'Pending' }}
                                </td>
                                <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                                    {{ $item->lineTotal() !== null ? '$'.number_format($item->lineTotal(), 2) : '—' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($quotation->customer_notes)
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Your Notes</p>
                    <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line">{{ $quotation->customer_notes }}</p>
                </div>
            @endif

            @if ($quotation->admin_notes && ! $quotation->isPending())
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Response From Us</p>
                    <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line">{{ $quotation->admin_notes }}</p>
                </div>
            @endif

        </div>
    </div>
</x-layout>
