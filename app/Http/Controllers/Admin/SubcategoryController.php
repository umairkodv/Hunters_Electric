<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\MainCategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SubcategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $departmentId = $request->query('department_id');
        $mainCategoryId = $request->query('main_category_id');
        $featured = $request->query('featured');

        $subcategories = Subcategory::with('mainCategory.department')
            ->withCount('products')
            ->when($search !== '', fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->when($departmentId, fn ($query) => $query->whereHas(
                'mainCategory',
                fn ($q) => $q->where('department_id', $departmentId)
            ))
            ->when($mainCategoryId, fn ($query) => $query->where('main_category_id', $mainCategoryId))
            ->when($featured === '1', fn ($query) => $query->where('is_featured', true))
            ->when($featured === '0', fn ($query) => $query->where('is_featured', false))
            ->orderBy('main_category_id')
            ->orderBy('sort_order')
            ->paginate(25)
            ->withQueryString();

        $departments = Department::orderBy('sort_order')->get();
        $mainCategories = MainCategory::orderBy('name')->get();

        return view('admin.subcategories.index', compact('subcategories', 'departments', 'mainCategories', 'search', 'departmentId', 'mainCategoryId', 'featured'));
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
        $validated['featured_image_url'] = $this->resolveImageUrl($request);
        unset($validated['featured_image_file'], $validated['remove_image']);

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
        $validated['featured_image_url'] = $this->resolveImageUrl($request, $subcategory);
        unset($validated['featured_image_file'], $validated['remove_image']);

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
            'featured_image_file' => ['nullable', 'image', 'max:4096'],
            'remove_image' => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Resolves the final featured_image_url value from three possible
     * inputs, in priority order:
     *   1. "Remove image" checked -> null (falls back to the placeholder)
     *   2. A file was uploaded -> store it on the public disk, use its URL
     *   3. A URL was pasted into the text field -> use it directly
     *   4. None of the above -> keep the existing value (update) or null (create)
     */
    private function resolveImageUrl(Request $request, ?Subcategory $subcategory = null): ?string
    {
        if ($request->boolean('remove_image')) {
            if ($subcategory?->featured_image_url && Str::startsWith($subcategory->featured_image_url, '/storage/')) {
                Storage::disk('public')->delete(Str::after($subcategory->featured_image_url, '/storage/'));
            }

            return null;
        }

        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('subcategories', 'public');

            return Storage::url($path);
        }

        $pastedUrl = trim((string) $request->input('featured_image_url'));

        if ($pastedUrl !== '') {
            return $pastedUrl;
        }

        return $subcategory?->featured_image_url;
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
