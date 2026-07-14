<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login — <?php echo e(config('app.name', 'Hunters Electric')); ?></title>
        <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <?php endif; ?>
    </head>
    <body class="bg-nav-text min-h-screen flex items-center justify-center antialiased">
        <div class="w-full max-w-sm bg-white rounded-2xl shadow-xl border border-gray-200 p-8">
            <div class="text-center mb-8">
                <span class="inline-block h-2 w-10 bg-accent rounded-full mb-3"></span>
                <h1 class="text-lg font-black uppercase tracking-wider text-nav-text">Admin Login</h1>
                <p class="text-xs text-gray-500 font-semibold mt-1">Sign in to manage the catalog.</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 text-xs font-bold px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.login.attempt')); ?>" method="POST" class="flex flex-col gap-4">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>

                <label class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Remember me
                </label>

                <button type="submit"
                        class="mt-2 w-full bg-accent text-nav-text text-xs font-black uppercase tracking-widest py-3 rounded-lg hover:bg-accent-hover transition-colors">
                    Sign In
                </button>
            </form>
        </div>
    </body>
</html>
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>