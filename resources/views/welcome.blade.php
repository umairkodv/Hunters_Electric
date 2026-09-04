<x-layout>
    <!-- Master Dashboard Hero Workspace Section -->
    <x-hero-banner :featured-slides="$featuredSlides"/>

    <x-seperator/>

    <!-- Main Content Layout Section Wrapper Grid -->
    <div class="w-full bg-white min-h-screen flex flex-col antialiased">
        
        <!-- Popular Components Section -->
        <!-- Data now supplied by HomeController@index instead of an inline query -->
        <x-product-section 
            section-title="Popular Components" 
            featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Components-Main-Image-767x767.jpg" 
            :categories="$componentCategories" 
        />

        <x-seperator/>

        <!-- Popular Accessories Section -->
        <!-- Data now supplied by HomeController@index instead of an inline query -->
        <x-product-section 
            section-title="Popular Accessories" 
            featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Accessories-Main-Image-767x767.jpg" 
            :categories="$accessoryCategories" 
        />

    </div>
</x-layout>
