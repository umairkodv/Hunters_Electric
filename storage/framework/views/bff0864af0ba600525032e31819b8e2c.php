<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['featuredSlides']));

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

foreach (array_filter((['featuredSlides']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    // $navDepartments is supplied by the global view composer in AppServiceProvider
    // (single database-driven source of truth for all navigation).
    $currentRoute = Route::currentRouteName();
?>

<!-- Main Container Base Workspace Grid Canvas Layer -->
<div class="w-full bg-white min-h-screen py-8 select-none">
    <div class="max-w-7xl mx-auto px-6 sm:px-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

        <!-- ======================================================== -->
        <!-- COLUMN 1: LEFT VERTICAL CATALOG SECTOR SIDEBAR            -->
        <!-- ======================================================== -->
        <aside
            class="col-span-1 lg:col-span-3 bg-white border border-gray-200 rounded-2xl p-6 shadow-2xs flex flex-col gap-5 self-start z-20">

            <div class="flex items-center gap-2 border-b border-gray-100 pb-3">
                <span class="h-4 w-1 bg-accent rounded-full"></span>
                <h3 class="text-[10px] font-black uppercase tracking-widest text-nav-text">
                    Browse All Collections
                </h3>
            </div>

            <nav class="flex flex-col gap-3 w-full">
                <?php $__currentLoopData = $navDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title = $department->name;
                        $routeUrl = route('department.show', $department->slug);
                        $isActive = request()->segment(1) === $department->slug;
                    ?>
                    <a href="<?php echo e($routeUrl); ?>"
                        class="group flex items-center gap-3 px-3 py-1.5 border-l-2 transition-all duration-150 <?php echo e($isActive ? 'text-accent border-accent font-black' : 'border-transparent text-nav-subtext hover:text-accent font-bold'); ?>">

                        <!-- High-contrast inline SVGs mapped natively back onto specific taxonomy classes -->
                        <div
                            class="h-4 w-4 shrink-0 flex items-center justify-center text-gray-400 group-hover:text-accent transition-colors">
                            <?php if($title === 'Alternators'): ?>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            <?php elseif($title === 'Starters'): ?>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M21 16v-4a2 2 0 00-2-2h-3l-2.5-4H10" />
                                </svg>
                            <?php elseif($title === 'Motors'): ?>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            <?php elseif($title === 'Generators'): ?>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            <?php elseif($title === 'Components'): ?>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                </svg>
                            <?php else: ?>
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            <?php endif; ?>
                        </div>

                        <span class="text-[11px] uppercase tracking-wider truncate mr-auto">
                            <?php echo e($department->name); ?>

                        </span>

                        <svg class="h-3 w-3 text-gray-300 opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transform transition-all"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>

        </aside>

        <!-- ======================================================== -->
        <!-- COLUMN 2: SOLID DARK / ACCENT INDUSTRIAL HERO SPLICE    -->
        <!-- ======================================================== -->
         <?php if (isset($component)) { $__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-slider','data' => ['slides' => $featuredSlides]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['slides' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($featuredSlides)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8)): ?>
<?php $attributes = $__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8; ?>
<?php unset($__attributesOriginale74ef38c4f718abe5610e24f5e2f3fa8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8)): ?>
<?php $component = $__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8; ?>
<?php unset($__componentOriginale74ef38c4f718abe5610e24f5e2f3fa8); ?>
<?php endif; ?>

    </div>
</div>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase6_2\resources\views/components/hero-banner.blade.php ENDPATH**/ ?>