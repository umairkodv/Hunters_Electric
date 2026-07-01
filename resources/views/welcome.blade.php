<x-layout>
    <x-hero-banner/>
    @php
    // High-fidelity industrial 3D product renders matching your exact image layout reference
    $popularComponents = [
        ['name' => 'Armatures', 'image' => 'https://r2.dev'],
        ['name' => 'General Components', 'image' => 'https://r2.dev'],
        ['name' => 'Housings', 'image' => 'https://r2.dev'],
        ['name' => 'Rectifiers', 'image' => 'https://r2.dev'],
        ['name' => 'Regulators', 'image' => 'https://r2.dev'],
        ['name' => 'Rotors', 'image' => 'https://r2.dev'],
        ['name' => 'Solenoids', 'image' => 'https://r2.dev'],
        ['name' => 'Stators', 'image' => 'https://r2.dev'],
    ];

    // High-fidelity industrial 3D accessory renders matching your second section layout template
    $popularAccessories = [
        ['name' => 'Beacons', 'image' => 'https://r2.dev'],
        ['name' => 'Fuses', 'image' => 'https://r2.dev'],
        ['name' => 'Lights', 'image' => 'https://r2.dev'],
        ['name' => 'Paint', 'image' => 'https://r2.dev'],
        ['name' => 'Relays', 'image' => 'https://r2.dev'],
        ['name' => 'Shop Supplies', 'image' => 'https://r2.dev'],
        ['name' => 'Switches', 'image' => 'https://r2.dev'],
        ['name' => 'Terminals', 'image' => 'https://r2.dev'],
    ];
@endphp

<!-- Main Content Layout Section Wrapper Grid -->
<div class="w-full bg-white min-h-screen">
    
    <!-- Popular Components (Featured Image: Auto Electrical Array Group Montage) -->
    <x-product-section 
        section-title="Popular Components" 
        featured-image="https://r2.dev" 
        :categories="$popularComponents" 
    />

    <!-- Separation Line Divider Break Block Element -->
    <hr class="max-w-7xl mx-auto border-gray-100" />

    <!-- Popular Accessories (Featured Image: Heavy Automotive Tool Accessories Montage) -->
    <x-product-section 
        section-title="Popular Accessories" 
        featured-image="https://r2.dev" 
        :categories="$popularAccessories" 
    />

</div>


</div>

</x-layout>