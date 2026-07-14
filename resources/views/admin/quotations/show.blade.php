<x-admin-layout title="Quotation #{{ $quotation->id }}">

    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="text-xs font-bold text-nav-text">{{ $quotation->user->name }} &middot; {{ $quotation->user->email }}</p>
            <p class="text-xs font-semibold text-gray-500 mt-0.5">Requested {{ $quotation->created_at->format('M j, Y g:i A') }}</p>
        </div>
        <a href="{{ route('admin.quotations.index') }}" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
            &larr; Back to Quotations
        </a>
    </div>

    <form action="{{ route('admin.quotations.update', $quotation) }}" method="POST" class="flex flex-col gap-6">
        @csrf
        @method('PUT')

        <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-[#f8fafc] border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quantity</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Catalog Price</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quoted Unit Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($quotation->items as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <x-part-image :url="$item->product->image_url" :alt="$item->product->part_number" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0" />
                                    <div>
                                        <p class="text-xs font-black uppercase tracking-wider text-nav-text">{{ $item->product->part_number }}</p>
                                        <p class="text-xs font-semibold text-gray-500 mt-0.5">{{ $item->product->type_description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs font-semibold text-gray-500">{{ $item->quantity }}</td>
                            <td class="px-6 py-4 text-xs font-semibold text-gray-500">${{ number_format($item->product->price, 2) }}</td>
                            <td class="px-6 py-4">
                                <input type="number" name="items[{{ $item->id }}][unit_price]" value="{{ old("items.{$item->id}.unit_price", $item->unit_price) }}"
                                       step="0.01" min="0" placeholder="0.00"
                                       class="w-32 border border-gray-300 rounded-lg px-3 py-2 text-sm font-bold text-nav-text outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($quotation->customer_notes)
            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Customer Notes</p>
                <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line">{{ $quotation->customer_notes }}</p>
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6 flex flex-col gap-4">
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Status</label>
                <select name="status" required class="w-full max-w-xs border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text">
                    @foreach (['pending' => 'Pending Review', 'quoted' => 'Quoted', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('status', $quotation->status) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                <p class="text-[10px] text-gray-400 font-semibold mt-1">Approval is manual — set unit prices above, then choose "Approved" once you're ready for the customer to see a final quote.</p>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Note to Customer</label>
                <textarea name="admin_notes" rows="3" placeholder="Visible to the customer once the status isn't Pending Review."
                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">{{ old('admin_notes', $quotation->admin_notes) }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                    Save Quotation
                </button>
            </div>
        </div>
    </form>

    <!-- Deliberately outside the update form above — a nested <form> is
         invalid HTML and caused the browser to hoist this form's hidden
         _method=DELETE input into the outer form, so clicking "Save
         Quotation" was silently submitting as a DELETE instead of a PUT. -->
    <form action="{{ route('admin.quotations.destroy', $quotation) }}" method="POST" onsubmit="return confirm('Delete this quotation? This cannot be undone.');" class="mt-6">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-xs font-black uppercase tracking-widest text-red-500 hover:text-red-700 transition-colors">
            Delete Quotation
        </button>
    </form>

</x-admin-layout>
