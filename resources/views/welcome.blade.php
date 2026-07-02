<x-layout>
    <!-- Master Dashboard Hero Workspace Section -->
    <x-hero-banner/>

    <x-seperator/>

    <!-- Main Content Layout Section Wrapper Grid -->
    <div class="w-full bg-white min-h-screen flex flex-col antialiased">
        
        <!-- Popular Components Section -->
        <!-- FIXED: Synchronised the variable scoping inside the query string container block -->
        <x-product-section 
            section-title="Popular Components" 
            featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Components-Main-Image-767x767.jpg" 
            :categories="\App\Models\Subcategory::where('is_featured', true)
                ->whereHas('mainCategory.department', function($query) {
                    $query->where('name', 'Components');
                })
                ->orderBy('sort_order')
                ->get()" 
        />

        <x-seperator/>

        <!-- Popular Accessories Section -->
        <!-- FIXED: Synchronised the variable scoping inside the query string container block -->
        <x-product-section 
            section-title="Popular Accessories" 
            featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Accessories-Main-Image-767x767.jpg" 
            :categories="\App\Models\Subcategory::where('is_featured', true)
                ->whereHas('mainCategory.department', function($query) {
                    $query->where('name', 'Accessories');
                })
                ->orderBy('sort_order')
                ->get()" 
        />

    </div>
</x-layout>
