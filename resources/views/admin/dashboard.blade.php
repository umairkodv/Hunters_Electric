<x-admin-layout title="Dashboard">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
            $stats = [
                ['label' => 'Departments', 'value' => $departmentCount, 'route' => 'admin.departments.index'],
                ['label' => 'Main Categories', 'value' => $mainCategoryCount, 'route' => 'admin.main-categories.index'],
                ['label' => 'Subcategories', 'value' => $subcategoryCount, 'route' => 'admin.subcategories.index'],
                ['label' => 'Products', 'value' => $productCount, 'route' => 'admin.products.index'],
            ];
        @endphp
        @foreach ($stats as $stat)
            <a href="{{ route($stat['route']) }}" class="bg-white border border-gray-200 rounded-2xl shadow-2xs hover:border-accent/30 hover:shadow-xs transition-all p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">{{ $stat['label'] }}</p>
                <p class="text-3xl font-black text-nav-text mt-2">{{ $stat['value'] }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-8 bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
        <h2 class="text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Catalog Hierarchy</h2>
        <p class="text-xs font-semibold text-gray-500 leading-relaxed">
            Departments &rarr; Main Categories &rarr; Subcategories &rarr; Products. Use the sidebar to manage each level.
            Deleting a record cascades to everything nested beneath it (e.g. deleting a department also deletes its main
            categories, subcategories, and products), so double-check before confirming a delete.
        </p>
    </div>
</x-admin-layout>
