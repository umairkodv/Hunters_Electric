<?php

namespace App\Http\Controllers;

use App\Models\Product;

class QuoteController extends Controller
{
    /**
     * Entry point for "Request a Quote" from a product page.
     *
     * This route sits behind the 'auth' middleware, so a guest is sent to
     * login first (and returned here afterward via Laravel's normal
     * intended-URL redirect) — quote requests require an account. Full
     * quote-cart functionality is built in a later phase; for now this
     * just confirms the login gate works end-to-end instead of leaving
     * the button as a dead link.
     */
    public function start(Product $product)
    {
        $product->loadMissing('subcategory.mainCategory.department');
        $subcategory = $product->subcategory;
        $mainCategory = $subcategory->mainCategory;
        $department = $mainCategory->department;

        return redirect()
            ->route('product.show', [$department->slug, $mainCategory->slug, $subcategory->slug, $product->part_number])
            ->with('status', "Quote requests aren't available quite yet — we're actively building this feature. Thanks for your interest in {$product->part_number}!");
    }
}
