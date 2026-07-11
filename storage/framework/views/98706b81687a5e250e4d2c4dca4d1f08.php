<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['paginator']));

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

foreach (array_filter((['paginator']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if($paginator && $paginator->hasPages()): ?>
    <div class="mt-6 flex justify-center select-none">
        <!-- Main Dark Horizontal Segment Track Box Container -->
        <nav class="inline-flex rounded-xl bg-[#1e293b] border border-gray-800 divide-x divide-gray-800 shadow-sm overflow-hidden items-stretch h-10">
            
            <!-- 1. PREVIOUS PAGE CONTROL BUTTON -->
            <?php if($paginator->onFirstPage()): ?>
                <span class="px-4 flex items-center justify-center text-gray-600 cursor-not-allowed text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="px-4 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800/40 transition-colors text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </span>
            <?php endif; ?>

            <!-- 2. DYNAMIC ELLIPSIS SMART RANGE GENERATION ENGINE -->
            <?php
                $curPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $sideRadius = 1; // Controls the padding size width of links surrounding the active block
            ?>

            <?php $__currentLoopData = range(1, $lastPage); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($page == 1 || $page == 2 || $page == $lastPage || $page == $lastPage - 1 || ($page >= $curPage - $sideRadius && $page <= $curPage + $sideRadius)): ?>
                    
                    <?php if($page == $curPage): ?>
                        <!-- Active Selected State Highlight Box -->
                        <span class="px-4 h-full flex items-center justify-center text-white bg-[#2d3748] font-black text-xs min-w-[40px]">
                            <?php echo e($page); ?>

                        </span>
                    <?php else: ?>
                        <!-- Inactive Link Items -->
                        <a href="<?php echo e($paginator->url($page)); ?>" class="px-4 h-full flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800/40 font-bold text-xs transition-colors min-w-[40px]">
                            <?php echo e($page); ?>

                        </a>
                    <?php endif; ?>

                
                <?php elseif($page == 3 && $curPage > 4): ?>
                    <span class="px-3 h-full flex items-center justify-center text-gray-600 font-bold text-xs min-w-[36px]">...</span>
                <?php elseif($page == $lastPage - 2 && $curPage < $lastPage - 3): ?>
                    <span class="px-3 h-full flex items-center justify-center text-gray-600 font-bold text-xs min-w-[36px]">...</span>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- 3. NEXT PAGE CONTROL BUTTON -->
            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="px-4 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800/40 transition-colors text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            <?php else: ?>
                <span class="px-4 flex items-center justify-center text-gray-600 cursor-not-allowed text-xs">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </span>
            <?php endif; ?>

        </nav>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7\resources\views/components/admin-pagination.blade.php ENDPATH**/ ?>