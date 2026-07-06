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
            <aside class="w-64 shrink-0 bg-nav-text text-white flex flex-col">
                <div class="px-6 py-5 border-b border-white/10">
                    <span class="text-sm font-black uppercase tracking-widest">Admin Panel</span>
                </div>
                <nav class="flex-1 px-3 py-4 flex flex-col gap-1">
                    <?php
                        $navItems = [
                            ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
                            ['label' => 'Departments', 'route' => 'admin.departments.index'],
                            ['label' => 'Main Categories', 'route' => 'admin.main-categories.index'],
                            ['label' => 'Subcategories', 'route' => 'admin.subcategories.index'],
                            ['label' => 'Products', 'route' => 'admin.products.index'],
                        ];
                    ?>
                    <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $active = request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route']));
                        ?>
                        <a href="<?php echo e(route($item['route'])); ?>"
                           class="px-3 py-2 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors <?php echo e($active ? 'bg-accent text-nav-text' : 'text-white/70 hover:bg-white/10 hover:text-white'); ?>">
                            <?php echo e($item['label']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
                <div class="px-3 py-4 border-t border-white/10">
                    <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-xs font-bold uppercase tracking-wider text-white/70 hover:bg-white/10 hover:text-white transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main content -->
            <div class="flex-1 flex flex-col min-w-0">
                <header class="bg-white border-b border-gray-200 px-8 py-5 flex items-center justify-between">
                    <h1 class="text-lg font-black uppercase tracking-wider text-nav-text"><?php echo e($title); ?></h1>
                    <?php if(auth()->guard('admin')->check()): ?>
                        <span class="text-xs font-semibold text-gray-500"><?php echo e(auth('admin')->user()->name); ?></span>
                    <?php endif; ?>
                </header>

                <main class="flex-1 p-8">
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