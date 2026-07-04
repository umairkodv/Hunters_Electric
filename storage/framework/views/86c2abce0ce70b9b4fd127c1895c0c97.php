<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'items' => []]));

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

foreach (array_filter((['title', 'items' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $departmentSlug = \Illuminate\Support\Str::slug($title);
    $routeUrl = route('department.show', $departmentSlug);

    // ACTIVE STATE TRACKING: Match current route context against string taxonomy attributes
    $isActive = (request()->segment(1) === $departmentSlug);

    // $items is already a list of columns, each column a list of
    // ['label' => ..., 'url' => ...] pairs built in subheader.blade.php
    // from real database slugs, so no re-slugifying happens here.
    $columns = $items;

    $columnCount = count($columns);
    $wrapperClass = $columnCount <= 2 ? "relative inline-block group" : "static inline-block group";
    $panelClass = $columnCount <= 2 ? "absolute left-0 mt-0 w-max min-w-[240px] max-w-md bg-white rounded-b-md shadow-xl border border-gray-200" : "absolute left-0 right-0 top-full w-full bg-white shadow-xl border-t border-gray-200";

    // FIXED: Upgraded container width constraints from max-w-7xl to xl:max-w-[90rem] to maximize horizontal grid track clearance
    $gridClass = $columnCount <= 2 ? ($columnCount === 1 ? 'grid-cols-1 p-6' : 'grid-cols-2 gap-8 p-6') : "max-w-7xl xl:max-w-[90rem] mx-auto px-12 py-10 grid grid-cols-5 gap-x-10 gap-y-3";
?>

<div class="<?php echo e($wrapperClass); ?>">
    <!-- MODIFIED: Injected dynamic $isActive color variables and base underline layout anchors directly onto this link element -->
    <a href="<?php echo e($routeUrl); ?>" class="flex items-center gap-1 text-xs tracking-wider uppercase transition-all py-5 whitespace-nowrap border-b-2 <?php echo e($isActive ? 'text-accent border-accent font-black' : 'border-transparent font-semibold text-nav-text group-hover:text-accent'); ?>">
        <span><?php echo e($title); ?></span>
        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('fas-angle-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-3 w-3 transform transition-transform duration-200 group-hover:rotate-180 '.e($isActive ? 'text-accent' : 'group-hover:text-accent').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
    </a>

    <!-- Dropdown Panel Layer -->
    <div class="<?php echo e($panelClass); ?> top-full z-50 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-150 pointer-events-none group-hover:pointer-events-auto">
        <div class="grid text-left <?php echo e($gridClass); ?>">
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col gap-1">
                    <?php $__currentLoopData = $column; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- FIXED: Shifted from whitespace-nowrap to normal wrapping physics with precise vertical padding gutters -->
                        <a href="<?php echo e($item['url']); ?>" class="text-[13px] font-semibold text-nav-subtext hover:text-accent transition-colors leading-snug whitespace-normal block py-1 pr-2">
                            <?php echo e($item['label']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase3\resources\views/components/mega-dropdown.blade.php ENDPATH**/ ?>