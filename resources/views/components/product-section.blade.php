@props(['sectionTitle', 'featuredImage', 'categories' => []])

<section class="max-w-7xl mx-auto px-12 py-16">
    <!-- Section Headline Grid Info Row -->
    <div class="text-left mb-8">
        <h2 class="text-2xl font-black uppercase tracking-wider text-nav-text">
            {{ $sectionTitle }}
        </h2>
        <a href="#" class="inline-block text-xs font-bold uppercase tracking-widest text-accent hover:underline mt-1">
            View All Categories
        </a>
    </div>

    <!-- Main Dynamic Content Canvas Grids Section Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
        
        <!-- Left Side: Large Featured Category Canvas Product Card Showcase -->
        <div class="lg:col-span-5 relative group overflow-hidden rounded-xl border border-gray-200/80 shadow-sm bg-[#e5e7eb] flex items-center justify-center min-h-[380px]">
            <img src="{{ $featuredImage }}" alt="{{ $sectionTitle }} Showcase" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
            <!-- Bottom Right Accent Callout Tag -->
            {{-- <div class="absolute bottom-6 right-6 text-right max-w-[180px] select-none pointer-events-none">
                <span class="text-[10px] font-black uppercase tracking-wider text-nav-text/80 leading-none">Explore Essential</span>
                <p class="text-xs font-black uppercase tracking-tight text-nav-text leading-none mt-0.5">Auto Electricals</p>
            </div> --}}
        </div>

        <!-- Right Side: 8-Item Sub-Category Array Mapping Stream -->
        <!-- Enforces a standard, predictable 4-column layout landscape shape -->
        <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach($categories as $category)
                <a href="#" class="group bg-white border border-gray-200/80 shadow-sm rounded-xl p-4 flex flex-col items-center justify-center text-center transition-all duration-200 hover:shadow-md hover:border-accent/30 min-h-[180px]">
                    
                    <!-- Category Item Thumbnail Box -->
                    <div class="h-24 w-full flex items-center justify-center p-1 overflow-hidden">
                        <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}" class="max-h-full max-w-full object-contain transform transition-transform duration-200 group-hover:scale-105" />
                    </div>
                    
                    <!-- Category String Name Text Identifier Link -->
                    <span class="text-[10px] font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors mt-4 line-clamp-2 leading-tight px-1">
                        {{ $category['name'] }}
                    </span>
                    
                </a>
            @endforeach
        </div>

    </div>
</section>
