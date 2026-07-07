<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $departments = Department::withCount('mainCategories')
            ->when($search !== '', fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->orderBy('sort_order')
            ->paginate(25)
            ->withQueryString();

        return view('admin.departments.index', compact('departments', 'search'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments,name'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        // Department::booted() auto-generates the slug from the name on
        // creation, but the slug itself has its own global unique
        // constraint (two different names can slugify to the same value),
        // so it's checked explicitly here for a friendly validation error
        // instead of a raw database constraint failure.
        $slug = Str::slug($validated['name']);

        if (Department::where('slug', $slug)->exists()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'name' => 'A department with a matching URL slug already exists.',
            ]);
        }

        Department::create($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('status', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('departments', 'name')->ignore($department->id)],
            'sort_order' => ['nullable', 'integer'],
        ]);

        // The Department model only auto-generates the slug on creation
        // (see Department::booted()), so it's regenerated here on update
        // too, to keep it in sync with the name if the name changes.
        $slug = Str::slug($validated['name']);

        if (Department::where('slug', $slug)->where('id', '!=', $department->id)->exists()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'name' => 'A department with a matching URL slug already exists.',
            ]);
        }

        $validated['slug'] = $slug;

        $department->update($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('status', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()
            ->route('admin.departments.index')
            ->with('status', 'Department deleted.');
    }
}
