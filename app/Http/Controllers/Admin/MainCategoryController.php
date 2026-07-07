<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MainCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $departmentId = $request->query('department_id');

        $mainCategories = MainCategory::with('department')
            ->withCount('subcategories')
            ->when($search !== '', fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->when($departmentId, fn ($query) => $query->where('department_id', $departmentId))
            ->orderBy('department_id')
            ->orderBy('sort_order')
            ->paginate(25)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('admin.main-categories.index', compact('mainCategories', 'departments', 'search', 'departmentId'));
    }

    public function create()
    {
        $departments = Department::orderBy('sort_order')->get();

        return view('admin.main-categories.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => ['required', 'exists:departments,id'],
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        // MainCategory::booted() auto-generates the slug from the name on
        // creation, but (department_id, slug) has its own unique
        // constraint, so it's checked explicitly here for a friendly
        // validation error instead of a raw database constraint failure.
        $slug = Str::slug($validated['name']);

        $collision = MainCategory::where('department_id', $validated['department_id'])
            ->where('slug', $slug)
            ->exists();

        if ($collision) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'name' => 'A main category with a matching URL slug already exists in this department.',
            ]);
        }

        MainCategory::create($validated);

        return redirect()
            ->route('admin.main-categories.index')
            ->with('status', 'Main category created successfully.');
    }

    public function edit(MainCategory $mainCategory)
    {
        $departments = Department::orderBy('sort_order')->get();

        return view('admin.main-categories.edit', compact('mainCategory', 'departments'));
    }

    public function update(Request $request, MainCategory $mainCategory)
    {
        $validated = $request->validate([
            'department_id' => ['required', 'exists:departments,id'],
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        // Regenerated here since MainCategory only auto-slugs on creation
        // (see MainCategory::booted()); keeps the slug in sync if the name
        // or parent department changes.
        $slug = Str::slug($validated['name']);

        $collision = MainCategory::where('department_id', $validated['department_id'])
            ->where('slug', $slug)
            ->where('id', '!=', $mainCategory->id)
            ->exists();

        if ($collision) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'name' => 'A main category with a matching URL slug already exists in this department.',
            ]);
        }

        $validated['slug'] = $slug;

        $mainCategory->update($validated);

        return redirect()
            ->route('admin.main-categories.index')
            ->with('status', 'Main category updated successfully.');
    }

    public function destroy(MainCategory $mainCategory)
    {
        $mainCategory->delete();

        return redirect()
            ->route('admin.main-categories.index')
            ->with('status', 'Main category deleted.');
    }
}
