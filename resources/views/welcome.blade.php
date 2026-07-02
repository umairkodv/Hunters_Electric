<x-layout>
    <!-- Master Dashboard Hero Workspace Section -->
    <x-hero-banner/>

     <x-seperator/>

    <!-- Main Content Layout Section Wrapper Grid -->
    <div class="w-full bg-white min-h-screen flex flex-col antialiased">
        
        <!-- Popular Components Section (Sourced directly from centralized config file memory) -->
        <x-product-section 
            section-title="Popular Components" 
            featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Components-Main-Image-767x767.jpg" 
            :categories="config('catalog.popular_components', [])" 
        />

        <x-seperator/>

        <!-- Popular Accessories Section (Sourced directly from centralized config file memory) -->
        <x-product-section 
            section-title="Popular Accessories" 
            featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Accessories-Main-Image-767x767.jpg" 
            :categories="config('catalog.popular_accessories', [])" 
        />

    </div>
</x-layout>
