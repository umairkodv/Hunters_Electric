<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * Data that was previously queried inline inside welcome.blade.php
     * is now fetched here and passed down to the view.
     */
    public function index()
    {
        $featuredSlides = Subcategory::where('is_featured', true)
            ->orderBy('sort_order')
            ->get();

        $componentCategories = Subcategory::where('is_featured', true)
            ->whereHas('mainCategory.department', function ($query) {
                $query->where('name', 'Components');
            })
            ->orderBy('sort_order')
            ->get();

        $accessoryCategories = Subcategory::where('is_featured', true)
            ->whereHas('mainCategory.department', function ($query) {
                $query->where('name', 'Accessories');
            })
            ->orderBy('sort_order')
            ->get();

        return view('welcome', [
            'featuredSlides' => $featuredSlides,
            'componentCategories' => $componentCategories,
            'accessoryCategories' => $accessoryCategories,
        ]);
    }
}
