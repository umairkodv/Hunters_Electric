<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['url' => null, 'alt' => '']));

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

foreach (array_filter((['url' => null, 'alt' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if($url): ?>
    <img src="<?php echo e($url); ?>" alt="<?php echo e($alt); ?>" <?php echo e($attributes); ?>>
<?php else: ?>
    
    <span <?php echo e($attributes->merge(['class' => 'inline-flex items-center justify-center'])); ?>>
        <svg class="w-2/3 h-2/3" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="<?php echo e($alt ?: 'No image available'); ?>">
            <rect x="3" y="3" width="18" height="18" rx="2" />
            <circle cx="9" cy="9" r="2" />
            <path d="M21 15l-5-5L5 21" />
        </svg>
    </span>
<?php endif; ?>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7_3\resources\views/components/part-image.blade.php ENDPATH**/ ?>