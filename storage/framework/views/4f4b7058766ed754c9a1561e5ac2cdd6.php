<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="w-full bg-[#f8fafc] min-h-screen py-16 border-t border-gray-100 select-none antialiased flex items-center justify-center">
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-2xl shadow-2xs p-8">
            <div class="text-center mb-8">
                <span class="inline-block h-2 w-10 bg-accent rounded-full mb-3"></span>
                <h1 class="text-lg font-black uppercase tracking-wider text-nav-text">Sign In</h1>
                <p class="text-xs text-gray-500 font-semibold mt-1">Access your account to track quotes and orders.</p>
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

            <?php if(session('status')): ?>
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 text-xs font-bold px-4 py-3 rounded-lg">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('login.attempt')); ?>" method="POST" class="flex flex-col gap-4">
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
                        class="mt-2 w-full bg-accent text-white text-xs font-black uppercase tracking-widest py-3 rounded-lg hover:bg-accent-hover transition-colors">
                    Sign In
                </button>
            </form>

            <p class="text-center text-xs font-semibold text-gray-500 mt-6">
                Don't have an account?
                <a href="<?php echo e(route('register')); ?>" class="text-accent hover:text-accent-hover font-black">Create one</a>
            </p>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/auth/login.blade.php ENDPATH**/ ?>