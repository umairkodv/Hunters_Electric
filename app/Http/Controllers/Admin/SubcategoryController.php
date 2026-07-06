<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('mainCategory.department')
            ->withCount('products')
            ->orderBy('main_category_id')
            ->orderBy('sort_order')
            ->paginate(25);

        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $mainCategories = MainCategory::with('department')
            ->orderBy('department_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.subcategories.create', compact('mainCategories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        $slug = Str::slug($validated['name']);
        $this->guardAgainstSlugCollision($validated['main_category_id'], $slug);

        $validated['is_featured'] = $request->boolean('is_featured');

        Subcategory::create($validated);

        return redirect()
            ->route('admin.subcategories.index')
            ->with('status', 'Subcategory created successfully.');
    }

    public function edit(Subcategory $subcategory)
    {
        $mainCategories = MainCategory::with('department')
            ->orderBy('department_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.subcategories.edit', compact('subcategory', 'mainCategories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $validated = $this->validated($request);

        $slug = Str::slug($validated['name']);
        $this->guardAgainstSlugCollision($validated['main_category_id'], $slug, $subcategory->id);

        $validated['slug'] = $slug;
        $validated['is_featured'] = $request->boolean('is_featured');

        $subcategory->update($validated);

        return redirect()
            ->route('admin.subcategories.index')
            ->with('status', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()
            ->route('admin.subcategories.index')
            ->with('status', 'Subcategory deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'main_category_id' => ['required', 'exists:main_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'featured_image_url' => ['nullable', 'string', 'max:2048'],
        ]);
    }

    /**
     * Subcategory::booted() only auto-generates the slug on creation, and
     * (main_category_id, slug) has its own unique constraint, so collisions
     * are checked explicitly here for a friendly validation error instead
     * of a raw database constraint failure.
     */
    private function guardAgainstSlugCollision(int $mainCategoryId, string $slug, ?int $ignoreId = null): void
    {
        $collision = Subcategory::where('main_category_id', $mainCategoryId)
            ->where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists();

        if ($collision) {
            throw ValidationException::withMessages([
                'name' => 'A subcategory with a matching URL slug already exists in this main category.',
            ]);
        }
    }
}
