<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = trim((string) $request->query('search', ''));

        $quotations = Quotation::with('user')
            ->withCount('items')
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($search !== '', fn ($query) => $query->whereHas(
                'user',
                fn ($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")
            ))
            ->orderByDesc('created_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.quotations.index', compact('quotations', 'status', 'search'));
    }

    public function show(Quotation $quotation)
    {
        $quotation->load('user', 'items.product');

        return view('admin.quotations.show', compact('quotation'));
    }

    public function update(Request $request, Quotation $quotation)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['pending', 'quoted', 'approved', 'rejected'])],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
            'items' => ['required', 'array'],
            'items.*.unit_price' => ['nullable', 'numeric', 'min:0'],
        ]);

        DB::transaction(function () use ($quotation, $validated) {
            $total = 0;

            foreach ($validated['items'] as $itemId => $itemData) {
                $unitPrice = $itemData['unit_price'] !== null && $itemData['unit_price'] !== ''
                    ? (float) $itemData['unit_price']
                    : null;

                $item = $quotation->items()->whereKey($itemId)->first();

                if (! $item) {
                    continue;
                }

                $item->update(['unit_price' => $unitPrice]);

                if ($unitPrice !== null) {
                    $total += $unitPrice * $item->quantity;
                }
            }

            $quotation->update([
                'status' => $validated['status'],
                'admin_notes' => $validated['admin_notes'],
                'quoted_total' => $total > 0 ? $total : null,
            ]);
        });

        return redirect()
            ->route('admin.quotations.show', $quotation)
            ->with('status', 'Quotation updated.');
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return redirect()
            ->route('admin.quotations.index')
            ->with('status', 'Quotation deleted.');
    }
}
