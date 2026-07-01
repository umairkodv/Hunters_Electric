@php
    $menuData = [
        'Alternators' => [
            ['Alternators', 'Alternator and Starter Conversion Kits', 'Alternator Conversion Kits', 'American Power Systems Alternators'],
            ['Arrowhead Alternators', 'Balmar Alternators', 'Bosch Alternators', 'C.E. Niehoff Alternators', 'Delco Alternators', 'Denso Alternators'],
            ['Denso High Output Alternators', 'Electrodyne Alternators', 'HD Power Solutions Alternators', 'Hitachi Alternators', 'J&N Alternators', 'JANNCO Alternators'],
            ['Leece Neville Alternators', 'Magneton Alternators', 'Mahle Alternators', 'Marelli Alternators', 'Mitsubishi Alternators', 'Nikko Alternators'],
            ['Sawafuji Alternators', 'Valeo Alternators', 'Wilson Alternators']
        ],
        'Starters' => [
            ['Starters', 'Starter Solenoids', 'Starter Drives', 'Starter Armatures'],
            ['Bosch Starters', 'Delco Starters', 'Denso Starters', 'Hitachi Starters'],
            ['Leece Neville Starters', 'Mitsubishi Starters', 'Nikko Starters', 'Prestolite Starters']
        ],
        'Motors' => [
            ['Motors', 'Air Vent Motors', 'Anchor Motors', 'Axle Shift Motors', 'Gear Motors', 'Hydraulic Liftgate Motors'],
            ['Hydraulic Motors', 'Motor Conversion Kits', 'Power Shift Control Motors', 'Power Steering Motors', 'Pump Motors', 'Reel Motors'],
            ['Reverse Actuator Motors', 'Salt Spreader Motors', 'Siren Motors', 'Snow Plow Lift Motors', 'Tarp Motors', 'Throttle Actuator Motors'],
            ['Tilt/Trim Motors', 'Traction Motors', 'Traction/Drive Motors', 'Vibrator Motors', 'Winch Accessories', 'Winch Motors'],
            ['Winch Parts', 'Windlass Motors', 'Wiper Motors']
        ],
        'Generators' => [
            ['Portable Generators', 'Industrial Generators', 'Inverter Generators'],
            ['Honda Generators', 'Generac Generators', 'Cummins Generators']
        ],
        'Components' => [
            ['Regulators', 'Rectifiers', 'Brushes', 'Bearings'],
            ['Rotors', 'Stators', 'Pulleys', 'Housings']
        ],
        'Accessories' => [
            ['Belts', 'Pulleys', 'Brackets', 'Wiring Harnesses']
        ]
    ];
@endphp

<!-- Main White Header Bar Container Anchor -->
<div class="relative bg-white border-b border-gray-200 w-full px-12 flex items-center justify-between shadow-sm">
    <div class="flex items-center">
        <!-- Main Navigation Bar Flex Grid Links -->
        <nav class="flex items-center gap-8">
            @foreach($menuData as $title => $columns)
                <x-mega-dropdown :title="$title" :items="$columns" />
            @endforeach
        </nav>
    </div>

    <!-- Right Side Help & Support Custom Dropdown Container -->
    <div class="relative inline-block group">
        <!-- Help & Support Hover Trigger -->
        <a href="#" class="text-xs uppercase font-semibold text-gray-600 group-hover:text-red-500 tracking-wider py-5 flex items-center gap-1">
            <span>Help & Support</span>
            <x-fas-angle-down class="h-3 w-3 transform transition-transform duration-200 group-hover:rotate-180 group-hover:text-red-500"/>
        </a>

        <!-- Help & Support Dropdown Card Panel Box (Aligned right) -->
        <div class="absolute right-0 top-full w-[340px] bg-white text-gray-800 shadow-xl border border-gray-200 z-50 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-150 pointer-events-none group-hover:pointer-events-auto p-6">
            
            <!-- Support Call Information Header Box Area -->
            <div class="flex items-start gap-4 mb-4">
                <!-- Red Square Telephone Icon Block Layout Section -->
                <div class="bg-red-600 text-white rounded p-2.5 flex items-center justify-center shadow-sm">
                    <!-- Standard phone icon placeholder using basic svg if icon pack not available -->
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-1C7.22 18 2 12.78 2 6V3z"/>
                    </svg>
                </div>
                <!-- Number Text Elements -->
                <div class="flex flex-col">
                    <a href="tel:8003667100" class="text-xl font-bold text-gray-800 hover:text-red-500 transition-colors tracking-tight">
                        {{ env('APP_PHONE') }}
                    </a>
                    <span class="text-xs text-gray-500 font-medium mt-0.5">
                        Mon-Fri | 8:00am - 6:00pm EST
                    </span>
                </div>
            </div>

            <!-- Divider Line Element Bar Component border separator -->
            <hr class="border-gray-200 my-4" />

            <!-- Sub Navigation Context Action Menu Links -->
            <div class="flex flex-col gap-4 text-left">
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-red-500 transition-colors">Contact Us</a>
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-red-500 transition-colors">Shipping</a>
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-red-500 transition-colors">Returns</a>
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-red-500 transition-colors">Safety Data Sheets</a>
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-red-500 transition-colors">How To Guides</a>
                <a href="#" class="text-sm font-medium text-gray-600 hover:text-red-500 transition-colors">Print Catalogs</a>
            </div>
        </div>
    </div>
</div>
