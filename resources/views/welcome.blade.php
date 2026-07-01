<x-layout>
    <x-hero-banner/>
    @php
    // High-fidelity industrial 3D product renders matching your exact image layout reference
    $popularComponents = [
        ['name' => 'Armatures', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Armatures-700x700.jpg'],
        ['name' => 'Components', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Components.jpg'],
        ['name' => 'Housings', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Housings-700x700.jpg'],
        ['name' => 'Rectifiers', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Rectifiers-700x700.jpg'],
        ['name' => 'Regulators', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Regulators-700x700.jpg'],
        ['name' => 'Rotors', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Rotors-700x700.jpg'],
        ['name' => 'Solenoids', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Solenoids-700x700.jpg'],
        ['name' => 'Stators', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Stators-700x700.jpg'],
    ];

    // High-fidelity industrial 3D accessory renders matching your second section layout template
    $popularAccessories = [
        ['name' => 'Beacons', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Beacons-700x700.jpg'],
        ['name' => 'Fuses', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Fuses-700x700.jpg'],
        ['name' => 'Lights', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Lights-700x700.jpg'],
        ['name' => 'Paint', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Paint-700x700.jpg'],
        ['name' => 'Relays', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Relays-700x700.jpg'],
        ['name' => 'Shop Supplies', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Shop-Supplies-700x700.jpg'],
        ['name' => 'Switches', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Switches-700x700.jpg'],
        ['name' => 'Terminals', 'image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Terminals-700x700.jpg'],
    ];
@endphp

<!-- Main Content Layout Section Wrapper Grid -->
<div class="w-full bg-white min-h-screen">
    
    <!-- Popular Components (Featured Image: Auto Electrical Array Group Montage) -->
    <x-product-section 
        section-title="Popular Components" 
        featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Components-Main-Image-767x767.jpg" 
        :categories="$popularComponents" 
    />

    <!-- Separation Line Divider Break Block Element -->
    <hr class="max-w-7xl mx-auto border-gray-100" />

    <!-- Popular Accessories (Featured Image: Heavy Automotive Tool Accessories Montage) -->
    <x-product-section 
        section-title="Popular Accessories" 
        featured-image="https://www.jnelectric.com/web-assets/jn_electric/images/home/Accessories-Main-Image-767x767.jpg" 
        :categories="$popularAccessories" 
    />

</div>


</div>

</x-layout>