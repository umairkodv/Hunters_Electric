<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a single department's catalog page
     * (Alternators, Starters, Motors, Generators, Components, Accessories).
     *
     * The $title parameter is supplied per-route via Route::defaults()
     * in routes/web.php, so the existing static URLs (/alternators,
     * /starters, etc.) are preserved for now. Dynamic slug-based
     * routing is planned for a later phase.
     */
    public function show(string $title)
    {
        $department = Department::with('mainCategories.subcategories')
            ->where('name', $title)
            ->first();

        if (! $department) {
            abort(404);
        }

        return view('department', [
            'department' => $department,
        ]);
    }
}
