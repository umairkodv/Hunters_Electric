<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['department']));

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

foreach (array_filter((['department']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
    <?php if($department): ?>
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent"><?php echo e($department->name); ?></span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Explore specialized collections and inventory parts listings underneath this division.</p>
                </div>
            </div>

            <!-- High-Density Component Matrix Card Deck Layout Grid -->
            <!-- MODIFIED: Changed items-start to items-stretch to force row height alignment -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch w-full">
                <?php $__currentLoopData = $department->mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- MODIFIED: Added h-full to fill grid row heights uniformly -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden h-full">

                        <!-- Card Header Group Title -->
                        <div class="bg-[#f8fafc] border-b border-gray-100 px-6 py-4 flex items-center justify-between group shrink-0">
                            <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors truncate max-w-[220px]">
                                <?php echo e($mainCategory->name); ?>

                            </h3>
                            <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest shrink-0">
                                <?php echo e($mainCategory->subcategories->count()); ?> Types
                            </span>
                        </div>

                        <!-- Inner Child Subcategory Item Link Layout Rows -->
                        <!-- MODIFIED: Added flex-1 to allow this section to grow and push the footer to the bottom -->
                        <div class="p-5 flex flex-col gap-1 bg-white flex-1">
                            <?php $__currentLoopData = $mainCategory->subcategories->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('department.subcategory', [$department->slug, $mainCategory->slug, $subcategory->slug])); ?>" 
                                   class="group flex items-center justify-between px-3 py-2 rounded-lg border border-transparent hover:border-gray-100/80 hover:bg-[#f8fafc]/50 transition-all duration-100">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <span class="h-1.5 w-1.5 rounded-full bg-gray-300 group-hover:bg-accent transition-colors shrink-0"></span>
                                        <span class="text-xs font-bold text-gray-600 group-hover:text-nav-text transition-colors truncate leading-tight">
                                            <?php echo e($subcategory->name); ?>

                                        </span>
                                    </div>
                                    <svg class="h-3 w-3 text-gray-300 group-hover:text-accent group-hover:translate-x-0.5 transform transition-all shrink-0 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Card Interactive View Action Footer Callout Link -->
                        <div class="border-t border-gray-100 px-5 py-3.5 bg-gray-50/30 text-left shrink-0">
                            <a href="<?php echo e(route('department.mainCategory', [$department->slug, $mainCategory->slug])); ?>" class="inline-flex items-center gap-1 text-[11px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                                <span>Browse All <?php echo e($mainCategory->name); ?> &rarr;</span>
                            </a>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase3\resources\views/components/departments-catalog.blade.php ENDPATH**/ ?>