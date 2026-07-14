@props([
    'sectionTitle', 
    'featuredImage', 
    'categories' => [],
    'side' => 'left' // Options: 'left' or 'right'
])

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
        
        <!-- ======================================================== -->
        <!-- LEFT SIDE SHOWCASE (Rendered only if side is left)       -->
        <!-- ======================================================== -->
        @if($side === 'left')
            <div class="lg:col-span-5 relative group overflow-hidden rounded-xl border border-gray-200/80 shadow-sm bg-[#e5e7eb] flex items-center justify-center min-h-[380px]">
                <img src="{{ $featuredImage }}" alt="{{ $sectionTitle }} Showcase" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
            </div>
        @endif

        <!-- Right Side: Sub-Category Flex Wrap Stream (centers incomplete rows instead of leaving a gap) -->
        <div class="lg:col-span-7 flex flex-wrap justify-center gap-4">
            @foreach($categories as $category)
                @php
                    $isObj = !is_array($category);
                    
                    $name = $isObj ? $category->name : $category['name'];
                    $imageUrl = $isObj ? $category->featured_image_url : ($category['image'] ?? null);
                    
                    $slug = $isObj ? $category->slug : \Illuminate\Support\Str::slug($name);
                    $mainCatSlug = $isObj ? ($category->mainCategory->slug ?? 'group') : 'group';
                    $deptSlug = $isObj ? ($category->mainCategory->department->slug ?? 'catalog') : 'components';
                @endphp
                
                <!-- Dynamic nested routing links compile cleanly as /components/main-category/subcategory -->
                <a href="{{ url($deptSlug . '/' . $mainCatSlug . '/' . $slug) }}" 
                   class="group bg-white border border-gray-200/80 shadow-sm rounded-xl p-4 flex flex-col items-center justify-center text-center transition-all duration-200 hover:shadow-md hover:border-accent/30 min-h-[180px] w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    
                    <!-- Category Item Thumbnail Box -->
                    <div class="h-24 w-full flex items-center justify-center p-1 overflow-hidden">
                        <x-part-image :url="$imageUrl" :alt="$name" class="max-h-full max-w-full object-contain transform transition-transform duration-200 group-hover:scale-105" />
                    </div>
                    
                    <!-- Category String Name Text Identifier Link -->
                    <span class="text-[10px] font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors mt-4 line-clamp-2 leading-tight px-1">
                        {{ $name }}
                    </span>
                    
                </a>
            @endforeach
        </div>

        <!-- ======================================================== -->
        <!-- RIGHT SIDE SHOWCASE (Rendered only if side is right)     -->
        <!-- ======================================================== -->
        <!-- FIXED: Moves seamlessly to the right side on desktop grids while maintaining vertical stack order on mobile -->
        @if($side === 'right')
            <div class="lg:col-span-5 relative group overflow-hidden rounded-xl border border-gray-200/80 shadow-sm bg-[#e5e7eb] flex items-center justify-center min-h-[380px]">
                <img src="{{ $featuredImage }}" alt="{{ $sectionTitle }} Showcase" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
            </div>
        @endif

    </div>
</section>
