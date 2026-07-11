<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private Cart $cart)
    {
    }

    public function show()
    {
        return view('cart', [
            'items' => $this->cart->items(),
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        $this->cart->add($product->id, $quantity);

        return redirect()
            ->back()
            ->with('status', "Added {$product->part_number} to your cart.");
    }

    public function update(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1);

        $this->cart->update($product->id, $quantity);

        return redirect()->back();
    }

    public function remove(Product $product)
    {
        $this->cart->remove($product->id);

        return redirect()
            ->back()
            ->with('status', 'Item removed from your cart.');
    }
}
