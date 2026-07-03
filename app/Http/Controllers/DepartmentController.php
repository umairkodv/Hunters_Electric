<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\MainCategory;
use App\Models\Subcategory;

class DepartmentController extends Controller
{
    /**
     * Display a single department's catalog page
     * (Alternators, Starters, Motors, Generators, Components, Accessories).
     *
     * Resolved dynamically by slug, e.g. /alternators, /starters — no
     * per-department route is registered anymore.
     */
    public function show(string $department)
    {
        $department = Department::with('mainCategories.subcategories')
            ->where('slug', $department)
            ->firstOrFail();

        return view('department', [
            'department' => $department,
        ]);
    }

    /**
     * Display a single main category page within a department,
     * e.g. /alternators/{mainCategory}.
     */
    public function mainCategory(string $department, string $mainCategory)
    {
        $department = Department::where('slug', $department)->firstOrFail();

        $mainCategory = MainCategory::with('subcategories.products')
            ->where('department_id', $department->id)
            ->where('slug', $mainCategory)
            ->firstOrFail();

        return view('main-category', [
            'department' => $department,
            'mainCategory' => $mainCategory,
        ]);
    }

    /**
     * Display a single subcategory page (product listing) within a
     * department and main category, e.g. /alternators/{mainCategory}/{subcategory}.
     */
    public function subcategory(string $department, string $mainCategory, string $subcategory)
    {
        $department = Department::where('slug', $department)->firstOrFail();

        $mainCategory = MainCategory::where('department_id', $department->id)
            ->where('slug', $mainCategory)
            ->firstOrFail();

        $subcategory = Subcategory::with('products')
            ->where('main_category_id', $mainCategory->id)
            ->where('slug', $subcategory)
            ->firstOrFail();

        return view('subcategory', [
            'department' => $department,
            'mainCategory' => $mainCategory,
            'subcategory' => $subcategory,
        ]);
    }
}
