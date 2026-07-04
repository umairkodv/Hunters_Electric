<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display search results for products and subcategories matching
     * the query string, e.g. /search?q=alternator.
     */
    public function index(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        $products = collect();
        $subcategories = collect();

        if ($query !== '') {
            $products = Product::with('subcategory.mainCategory.department')
                ->where('part_number', 'like', "%{$query}%")
                ->orWhere('type_description', 'like', "%{$query}%")
                ->orderBy('part_number')
                ->limit(50)
                ->get();

            $subcategories = Subcategory::with('mainCategory.department')
                ->where('name', 'like', "%{$query}%")
                ->orderBy('name')
                ->limit(50)
                ->get();
        }

        return view('search', [
            'query' => $query,
            'products' => $products,
            'subcategories' => $subcategories,
        ]);
    }
}
