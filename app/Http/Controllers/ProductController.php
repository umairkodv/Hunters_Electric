<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Services\Cart;

class ProductController extends Controller
{
    /**
     * Display a single product detail page,
     * e.g. /alternators/{mainCategory}/{subcategory}/{product}.
     *
     * The product is identified by its unique part_number in the URL.
     * The full hierarchy is still validated so a product can't be
     * reached through a department/category it doesn't belong to.
     */
    public function show(string $department, string $mainCategory, string $subcategory, string $product, Cart $cart)
    {
        $department = Department::where('slug', $department)->firstOrFail();

        $mainCategory = MainCategory::where('department_id', $department->id)
            ->where('slug', $mainCategory)
            ->firstOrFail();

        $subcategory = Subcategory::where('main_category_id', $mainCategory->id)
            ->where('slug', $subcategory)
            ->firstOrFail();

        $product = Product::where('subcategory_id', $subcategory->id)
            ->where('part_number', $product)
            ->firstOrFail();

        return view('product', [
            'department' => $department,
            'mainCategory' => $mainCategory,
            'subcategory' => $subcategory,
            'product' => $product,
            'inCart' => $cart->has($product->id),
        ]);
    }
}
