<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'sectionTitle', 
    'featuredImage', 
    'categories' => [],
    'side' => 'left' // Options: 'left' or 'right'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'sectionTitle', 
    'featuredImage', 
    'categories' => [],
    'side' => 'left' // Options: 'left' or 'right'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="max-w-7xl mx-auto px-12 py-16">
    <!-- Section Headline Grid Info Row -->
    <div class="text-left mb-8">
        <h2 class="text-2xl font-black uppercase tracking-wider text-nav-text">
            <?php echo e($sectionTitle); ?>

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
        <?php if($side === 'left'): ?>
            <div class="lg:col-span-5 relative group overflow-hidden rounded-xl border border-gray-200/80 shadow-sm bg-[#e5e7eb] flex items-center justify-center min-h-[380px]">
                <img src="<?php echo e($featuredImage); ?>" alt="<?php echo e($sectionTitle); ?> Showcase" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
            </div>
        <?php endif; ?>

        <!-- Right Side: 8-Item Sub-Category Array Mapping Stream -->
        <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-4 gap-4">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $isObj = !is_array($category);
                    
                    $name = $isObj ? $category->name : $category['name'];
                    $image = $isObj ? $category->display_image_url : ($category['image'] ?: asset('images/category-placeholder.svg'));
                    
                    $slug = $isObj ? $category->slug : \Illuminate\Support\Str::slug($name);
                    $mainCatSlug = $isObj ? ($category->mainCategory->slug ?? 'group') : 'group';
                    $deptSlug = $isObj ? ($category->mainCategory->department->slug ?? 'catalog') : 'components';
                ?>
                
                <!-- Dynamic nested routing links compile cleanly as /components/main-category/subcategory -->
                <a href="<?php echo e(url($deptSlug . '/' . $mainCatSlug . '/' . $slug)); ?>" 
                   class="group bg-white border border-gray-200/80 shadow-sm rounded-xl p-4 flex flex-col items-center justify-center text-center transition-all duration-200 hover:shadow-md hover:border-accent/30 min-h-[180px]">
                    
                    <!-- Category Item Thumbnail Box -->
                    <div class="h-24 w-full flex items-center justify-center p-1 overflow-hidden">
                        <img src="<?php echo e($image); ?>" alt="<?php echo e($name); ?>" class="max-h-full max-w-full object-contain transform transition-transform duration-200 group-hover:scale-105" />
                    </div>
                    
                    <!-- Category String Name Text Identifier Link -->
                    <span class="text-[10px] font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors mt-4 line-clamp-2 leading-tight px-1">
                        <?php echo e($name); ?>

                    </span>
                    
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- ======================================================== -->
        <!-- RIGHT SIDE SHOWCASE (Rendered only if side is right)     -->
        <!-- ======================================================== -->
        <!-- FIXED: Moves seamlessly to the right side on desktop grids while maintaining vertical stack order on mobile -->
        <?php if($side === 'right'): ?>
            <div class="lg:col-span-5 relative group overflow-hidden rounded-xl border border-gray-200/80 shadow-sm bg-[#e5e7eb] flex items-center justify-center min-h-[380px]">
                <img src="<?php echo e($featuredImage); ?>" alt="<?php echo e($sectionTitle); ?> Showcase" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]" />
            </div>
        <?php endif; ?>

    </div>
</section>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7\resources\views/components/product-section.blade.php ENDPATH**/ ?>