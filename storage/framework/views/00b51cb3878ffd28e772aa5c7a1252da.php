<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'model',             // The specific Eloquent database row instance object
    'prefix',            // Unique name tracking token identifier prefix (e.g., 'delete-dept', 'delete-product')
    'actionRoute',       // The dynamic Laravel form DELETE destroy controller endpoint route string
    'itemName'           // The explicit text name of the element being deleted to print inside the alert text
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
    'model',             // The specific Eloquent database row instance object
    'prefix',            // Unique name tracking token identifier prefix (e.g., 'delete-dept', 'delete-product')
    'actionRoute',       // The dynamic Laravel form DELETE destroy controller endpoint route string
    'itemName'           // The explicit text name of the element being deleted to print inside the alert text
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $modalId = $prefix . '-' . $model->id;
?>

<!-- Master Reusable CSS Target-Based Delete Modal Layer -->
<style>
    #<?php echo e($modalId); ?> {
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.2s ease-in-out, visibility 0.2s;
    }
    #<?php echo e($modalId); ?>:target {
        visibility: visible;
        opacity: 1;
    }
</style>

<div id="<?php echo e($modalId); ?>" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs select-none antialiased">
    
    <!-- Backdrop Close Anchor Trigger -->
    <a href="#" class="absolute inset-0 w-full h-full cursor-default" title="Close Modal Window"></a>
    
    <div class="relative w-full max-w-md bg-white border border-gray-200 rounded-2xl shadow-xl p-6 overflow-hidden text-center flex flex-col transform scale-100 transition-all duration-200 items-center justify-center">
        
        <div class="h-12 w-12 rounded-full bg-red-50 flex items-center justify-center text-red-500 mb-3 mt-2 shrink-0">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>

        <h4 class="text-sm font-black uppercase tracking-wider text-nav-text select-none">Are you completely sure?</h4>
        <p class="text-xs font-semibold text-gray-500 max-w-sm leading-relaxed mt-1.5 px-2">
            You are about to permanently delete <span class="font-black text-nav-text">"<?php echo e($itemName); ?>"</span> and all underlying items synced beneath it. This action cannot be undone.
        </p>

        <!-- Core Submission Pipeline Form Entry Box -->
        <form action="<?php echo e($actionRoute); ?>" method="POST" class="w-full flex items-center gap-3 mt-6 border-t border-gray-100 pt-4 justify-end select-none m-0">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            
            <a href="#" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors px-4 py-2.5 rounded-lg hover:bg-gray-50 inline-flex items-center justify-center">
                Cancel
            </a>
            <button type="submit" class="bg-red-600 text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-red-700 transition-colors shadow-2xs cursor-pointer">
                Permanently Delete
            </button>
        </form>

    </div>
</div>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase5\resources\views/components/admin-delete-modal.blade.php ENDPATH**/ ?>