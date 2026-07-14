<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'id',                // The unique HTML ID anchor linked to the button trigger href
    'title',             // The clear uppercase title header text string
    'actionRoute'        // The dynamic Laravel form POST submit controller route endpoint
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
    'id',                // The unique HTML ID anchor linked to the button trigger href
    'title',             // The clear uppercase title header text string
    'actionRoute'        // The dynamic Laravel form POST submit controller route endpoint
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!-- Master Reusable Target-Based Modal Layer Overlay -->
<style>
    #<?php echo e($id); ?> {
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.2s ease-in-out, visibility 0.2s;
    }
    #<?php echo e($id); ?>:target {
        visibility: visible;
        opacity: 1;
    }
</style>

<div id="<?php echo e($id); ?>" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs select-none antialiased">
    
    <!-- Backdrop Close Anchor Trigger -->
    <a href="#" class="absolute inset-0 w-full h-full cursor-default" title="Close Modal Window"></a>
    
    <!-- ======================================================== -->
    <!-- FIXED: ADDED max-h BOUNDS AND flex-col DISPOSITION TO PREVENT SCREEN DROP -->
    <!-- ======================================================== -->
    <div class="relative w-full max-w-lg max-h-[calc(100vh-2rem)] bg-white border border-gray-200 rounded-2xl shadow-xl overflow-hidden text-left flex flex-col transform scale-100 transition-all duration-200">
        
        <!-- Sticky Modal Header Ribbon Segment -->
        <div class="flex items-center justify-between border-b border-gray-100 pb-4 p-6 bg-white shrink-0 sticky top-0 z-20">
            <h3 class="text-sm font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                <span class="h-4 w-1 bg-accent rounded-full"></span>
                <span><?php echo e($title); ?></span>
            </h3>
            <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </a>
        </div>

        <!-- ======================================================== -->
        <!-- FIXED: ADDED INDEPENDENT SCROLL LAYER TRACK TO INPUTS SLOT -->
        <!-- ======================================================== -->
        <!-- enctype added so any file-upload field placed in the slot (e.g. subcategory image) actually submits -->
        <form action="<?php echo e($actionRoute); ?>" method="POST" enctype="multipart/form-data" class="flex flex-col grow overflow-hidden m-0">
            <?php echo csrf_field(); ?>
            
            <!-- Dynamic Scrollable Form Body Pipeline Section -->
            <div class="flex flex-col gap-4 p-6 pt-2 overflow-y-auto grow pr-4 scrollbar-thin">
                <?php echo e($slot); ?>

            </div>

            <!-- Sticky Modal Footer Button Controls Base Ribbon -->
            <!-- FIXED: Locked to the bottom with absolute background masking panels -->
            <div class="flex items-center gap-3 border-t border-gray-100 p-6 bg-gray-50/50 shrink-0 sticky bottom-0 z-20 justify-end">
                <a href="#" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors px-4 py-2.5 rounded-lg hover:bg-gray-100 inline-flex items-center justify-center">
                    Cancel
                </a>
                
                <?php if(isset($footerActions)): ?>
                    <?php echo e($footerActions); ?>

                <?php else: ?>
                    <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                        Submit
                    </button>
                <?php endif; ?>
            </div>

        </form>

    </div>
</div>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7_3\resources\views/components/admin-modal.blade.php ENDPATH**/ ?>