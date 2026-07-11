<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Services\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::where('user_id', Auth::id())
            ->withCount('items')
            ->orderByDesc('created_at')
            ->get();

        return view('account.quotations.index', compact('quotations'));
    }

    public function show(Quotation $quotation)
    {
        abort_unless($quotation->user_id === Auth::id(), 403);

        $quotation->load('items.product');

        return view('account.quotations.show', compact('quotation'));
    }

    public function store(Request $request, Cart $cart)
    {
        $request->validate([
            'customer_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $items = $cart->items();

        if ($items->isEmpty()) {
            return redirect()
                ->route('cart.show')
                ->with('status', 'Your cart is empty — add a part before requesting a quote.');
        }

        $quotation = DB::transaction(function () use ($items, $request) {
            $quotation = Quotation::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'customer_notes' => $request->input('customer_notes'),
            ]);

            foreach ($items as $item) {
                QuotationItem::create([
                    'quotation_id' => $quotation->id,
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                ]);
            }

            return $quotation;
        });

        $cart->clear();

        return redirect()
            ->route('account.quotations.show', $quotation)
            ->with('status', 'Your quote request has been submitted. We\'ll review it and get back to you.');
    }
}
