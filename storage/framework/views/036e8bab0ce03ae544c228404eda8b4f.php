<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['status']));

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

foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $styles = [
        'pending' => 'bg-gray-200/50 text-gray-500',
        'quoted' => 'bg-blue-100 text-blue-700',
        'approved' => 'bg-green-100 text-green-700',
        'rejected' => 'bg-red-100 text-red-700',
    ];

    $labels = [
        'pending' => 'Pending Review',
        'quoted' => 'Quoted',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ];

    $style = $styles[$status] ?? 'bg-gray-200/50 text-gray-500';
    $label = $labels[$status] ?? ucfirst($status);
?>

<span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md uppercase tracking-widest <?php echo e($style); ?>">
    <?php echo e($label); ?>

</span>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7_3\resources\views/components/quotation-status-badge.blade.php ENDPATH**/ ?>