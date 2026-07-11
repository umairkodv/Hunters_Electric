<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $subcategoryId = $request->query('subcategory_id');
        $status = $request->query('warehouse_status');

        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');

        $products = Product::with('subcategory.mainCategory.department')
            ->when($search !== '', fn ($query) => $query->where(function ($q) use ($search) {
                $q->where('part_number', 'like', "%{$search}%")
                    ->orWhere('type_description', 'like', "%{$search}%");
            }))
            ->when($subcategoryId, fn ($query) => $query->where('subcategory_id', $subcategoryId))
            ->when($status, fn ($query) => $query->where('warehouse_status', $status))
            ->when($minPrice !== null && $minPrice !== '', function ($query) use ($minPrice) {
                $query->where('price', '>=', (float) $minPrice);
            })
            // FIXED: Apply conditional maximum threshold checking filters onto active database queries
            ->when($maxPrice !== null && $maxPrice !== '', function ($query) use ($maxPrice) {
                $query->where('price', '<=', (float) $maxPrice);
            })
            ->orderBy('part_number')
            ->paginate(25)
            ->withQueryString();

        $subcategories = Subcategory::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'subcategories', 'search', 'subcategoryId', 'status', 'minPrice', 'maxPrice'));
    }

    public function create()
    {
        $subcategories = Subcategory::with('mainCategory.department')
            ->orderBy('main_category_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.products.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        $validated['image_url'] = $this->resolveImageUrl($request);
        unset($validated['image_file'], $validated['remove_image']);

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $subcategories = Subcategory::with('mainCategory.department')
            ->orderBy('main_category_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.products.edit', compact('product', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validated($request, $product);

        $validated['image_url'] = $this->resolveImageUrl($request, $product);
        unset($validated['image_file'], $validated['remove_image']);

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product deleted.');
    }

    private function validated(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'subcategory_id' => ['required', 'exists:subcategories,id'],
            'part_number' => [
                'required', 'string', 'max:255',
                Rule::unique('products', 'part_number')->ignore($product?->id),
            ],
            'type_description' => ['required', 'string', 'max:255'],
            'specifications' => ['required', 'string'],
            'warehouse_status' => ['required', Rule::in(['In Stock', 'Low Stock', 'Out of Stock'])],
            'stock_qty' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'image_url' => ['nullable', 'string', 'max:2048'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'remove_image' => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Same upload-or-paste-or-keep-existing pattern used for subcategory
     * images (see Admin\SubcategoryController::resolveImageUrl).
     */
    private function resolveImageUrl(Request $request, ?Product $product = null): ?string
    {
        if ($request->boolean('remove_image')) {
            if ($product?->image_url && Str::startsWith($product->image_url, '/storage/')) {
                Storage::disk('public')->delete(Str::after($product->image_url, '/storage/'));
            }

            return null;
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('products', 'public');

            return Storage::url($path);
        }

        $pastedUrl = trim((string) $request->input('image_url'));

        if ($pastedUrl !== '') {
            return $pastedUrl;
        }

        return $product?->image_url;
    }
}
