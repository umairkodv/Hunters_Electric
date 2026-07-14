<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Admin']));

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

foreach (array_filter((['title' => 'Admin']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e($title); ?> — Admin — <?php echo e(config('app.name', 'Hunters Electric')); ?></title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />

        <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <?php endif; ?>
    </head>
    <body class="bg-gray-100 antialiased">
        <div class="min-h-screen flex">

            <!-- Sidebar -->
            <style>
    /* Desktop Toggles: Hide state proxy inputs from layout layers */
    #sidebar-desktop-toggle, #sidebar-mobile-toggle {
        display: none !important;
    }

    /* ========================================== */
    /* DESKTOP ENGINE ANIMATION (lg viewports)    */
    /* ========================================== */
    @media (min-width: 1024px) {
        /* FIXED: Completely hide the sidebar track when checked */
        #sidebar-desktop-toggle:checked ~ .unified-admin-sidebar {
            width: 0px !important;
            opacity: 0;
            pointer-events: none;
        }
        
        /* FIXED: Flip the floating toggle arrow 180 degrees when closed */
        #sidebar-desktop-toggle:checked ~ .desktop-floating-toggle-btn .desktop-arrow-icon {
            transform: rotate(180deg);
        }
    }

    /* ========================================== */
    /* MOBILE DRAWER SLIDE ENGINE (Below lg breaks)*/
    /* ========================================== */
    @media (max-width: 1023.98px) {
        .unified-admin-sidebar {
            transform: translateX(-100%);
            position: fixed !important;
            width: 256px !important;
        }
        /* Slide completely into focus view from the left boundary */
        #sidebar-mobile-toggle:checked ~ .unified-admin-sidebar {
            transform: translateX(0) !important;
            opacity: 1 !important;
            pointer-events: auto !important;
        }
        /* Toggle click-away shading overlay masking layer */
        #sidebar-mobile-toggle:checked ~ .responsive-sidebar-backdrop {
            display: block;
        }
    }
</style>

<!-- 1. PURE BACKEND ENGINE INPUT STATE TRACKERS -->
<input type="checkbox" id="sidebar-desktop-toggle" class="hidden" />
<input type="checkbox" id="sidebar-mobile-toggle" class="hidden" />

<!-- 2. TOUCH DISMISSAL MASK (Visible on mobile backdrop clicks) -->
<label for="sidebar-mobile-toggle" class="responsive-sidebar-backdrop fixed inset-0 bg-black/60 backdrop-blur-xs z-40 hidden lg:hidden"></label>

<!-- ======================================================== -->
<!-- FIXED: FLOATING SIDEBAR TOGGLE MECHANICS (OUTSIDE PANEL) -->
<!-- ======================================================== -->
<!-- A. DESKTOP TOGGLE BUTTON (Locks cleanly to the fixed viewport edge) -->
<label for="sidebar-desktop-toggle" class="desktop-floating-toggle-btn hidden lg:flex fixed top-4 left-4 z-50 items-center justify-center h-9 w-9 rounded-lg bg-[#0f172a] border border-gray-800 text-white/70 hover:text-white hover:border-accent/40 cursor-pointer shadow-md transition-all duration-300">
    <svg class="desktop-arrow-icon h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
    </svg>
</label>

<!-- B. MOBILE HAMBURGER BUTTON (Guaranteed visible floating on mobile viewports) -->
<!-- FIXED: Removed 'hidden' attribute constraints so it renders flawlessly on small phone screens -->
<label for="sidebar-mobile-toggle" class="lg:hidden fixed top-4 left-4 z-40 flex items-center justify-center h-9 w-9 rounded-lg bg-[#0f172a] border border-gray-800 text-white/70 hover:text-white cursor-pointer shadow-md transition-all">
    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</label>
<!-- ======================================================== -->


<!-- ======================================================== -->
<!-- THE UNIFIED ADJUSTABLE SIDEBAR LAYOUT CANVAS ARRAYS      -->
<!-- ======================================================== -->
<!-- FIXED: Removed layout visibility hidden blocks so responsive transitions fire correctly -->
<aside class="unified-admin-sidebar w-64 h-screen shrink-0 bg-[#0f172a] text-white flex flex-col fixed lg:sticky top-0 left-0 z-50 lg:z-30 overflow-y-hidden select-none transition-all duration-300 ease-in-out shadow-xl">
    
    <!-- Branding Ribbon Header Segment Panel Row -->
    <div class="px-5 py-5 border-b border-white/10 shrink-0 flex items-center justify-between min-h-[65px] lg:pl-14">
        <span class="admin-logo-text text-sm font-black uppercase tracking-widest truncate">Admin Panel</span>
        
        <!-- Mobile View Close Button (Inside drawer menu sheet) -->
        <label for="sidebar-mobile-toggle" class="lg:hidden flex items-center justify-center h-7 w-7 rounded-lg bg-white/5 border border-white/10 text-white/70 hover:text-white cursor-pointer transition-all shrink-0">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </label>
    </div>
    
    <!-- Navigation Links Scroll Container -->
    <nav class="flex-1 px-3 py-4 flex flex-col gap-1 overflow-y-auto pr-1 lg:pl-4 scrollbar-none">
        <?php
            $navItems = [
                [
                    'label' => 'Live Site', 'url' => url('/'), 'external' => true,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>'
                ],
                [
                    'label' => 'Dashboard', 'route' => 'admin.dashboard', 'external' => false,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" /></svg>'
                ],
                [
                    'label' => 'Departments', 'route' => 'admin.departments.index', 'external' => false,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>'
                ],
                [
                    'label' => 'Main Categories', 'route' => 'admin.main-categories.index', 'external' => false,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2zM3 7h18M3 12h18" /></svg>'
                ],
                [
                    'label' => 'Subcategories', 'route' => 'admin.subcategories.index', 'external' => false,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>'
                ],
                [
                    'label' => 'Products', 'route' => 'admin.products.index', 'external' => false,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>'
                ],
                [
                    'label' => 'Quotations', 'route' => 'admin.quotations.index', 'external' => false,
                    'icon' => '<svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                ],
            ];
        ?>
        <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $active = !$item['external'] && (request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route'])));
                $linkHref = $item['external'] ? $item['url'] : route($item['route']);
            ?>
            <a href="<?php echo e($linkHref); ?>" <?php if($item['external']): ?> target="_blank" <?php endif; ?> title="<?php echo e($item['label']); ?>"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-all duration-150 <?php echo e($active ? 'bg-accent text-nav-text shadow-2xs' : 'text-white/70 hover:bg-white/10 hover:text-white'); ?>">
                <?php echo $item['icon']; ?>

                <span class="truncate"><?php echo e($item['label']); ?></span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </nav>
    
    <!-- Logout Base Action Footer Ribbon -->
    <div class="px-3 py-4 border-t border-white/10 shrink-0">
        <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="m-0">
            <?php echo csrf_field(); ?>
            <button type="submit" title="Logout Session" class="w-full text-left px-3 py-2 rounded-lg text-xs font-bold uppercase tracking-wider text-white/70 hover:bg-white/10 hover:text-white transition-all flex items-center gap-3 cursor-pointer">
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                <span class="logout-text truncate">Logout</span>
            </button>
        </form>
    </div>
</aside>


            <!-- Main content -->
            <div class="flex-1 flex flex-col min-w-0">
                <header class="bg-white border-b border-gray-200 px-8 py-5 flex items-center justify-between">
                    <h1 class="text-lg font-black uppercase tracking-wider text-nav-text"><?php echo e($title); ?></h1>
                    
                    <div class="flex items-center gap-4">
                        <a href="<?php echo e(url('/')); ?>" target="_blank" class="text-xs font-semibold text-gray-400 hover:text-accent transition-colors flex items-center gap-1">
                            <span>Live Site</span>
                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                        <span class="h-4 w-px bg-gray-200"></span>
                        
                        <?php if(auth()->guard('admin')->check()): ?>
                            <span class="text-xs font-semibold text-gray-500"><?php echo e(auth('admin')->user()->name); ?></span>
                        <?php else: ?>
                            <span class="text-xs font-semibold text-gray-500">Site Administrator</span>
                        <?php endif; ?>
                    </div>
                </header>

                <main class="flex-1 p-8">
                    <?php if(session('quotation_notice')): ?>
                        <div class="mb-6 bg-accent/10 border border-accent/30 text-nav-text text-xs font-bold px-4 py-3 rounded-lg flex items-center gap-2">
                            <svg class="h-4 w-4 text-accent shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                            <span><?php echo e(session('quotation_notice')); ?></span>
                            <a href="<?php echo e(route('admin.quotations.index')); ?>" class="ml-auto text-accent hover:text-accent-hover font-black uppercase tracking-widest text-[10px] shrink-0">Review Now &rarr;</a>
                        </div>
                    <?php endif; ?>

                    <?php if(session('status')): ?>
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 text-xs font-bold px-4 py-3 rounded-lg">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 text-xs font-bold px-4 py-3 rounded-lg">
                            <ul class="list-disc list-inside space-y-1">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo e($slot); ?>

                </main>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/components/admin-layout.blade.php ENDPATH**/ ?>