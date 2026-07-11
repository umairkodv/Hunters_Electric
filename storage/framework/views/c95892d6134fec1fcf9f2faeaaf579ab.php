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
    <div class="w-full bg-[#f8fafc] min-h-screen py-12 border-t border-gray-100 select-none antialiased">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Breadcrumb -->
            <nav class="text-[11px] font-bold uppercase tracking-widest text-gray-400 flex items-center gap-2">
                <a href="<?php echo e(route('department.show', $department->slug)); ?>" class="hover:text-accent transition-colors"><?php echo e($department->name); ?></a>
                <span>/</span>
                <span class="text-nav-text"><?php echo e($mainCategory->name); ?></span>
            </nav>

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent"><?php echo e($mainCategory->name); ?></span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Browse every subcategory listed underneath <?php echo e($mainCategory->name); ?>.</p>
                </div>
            </div>

            <!-- Subcategory Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch w-full">
                <?php $__currentLoopData = $mainCategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('department.subcategory', [$department->slug, $mainCategory->slug, $subcategory->slug])); ?>"
                       class="group bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden h-full p-6">
                        <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors">
                            <?php echo e($subcategory->name); ?>

                        </h3>
                        <p class="text-[11px] text-gray-400 font-semibold mt-1">
                            <?php echo e($subcategory->products->count()); ?> <?php echo e(\Illuminate\Support\Str::plural('part', $subcategory->products->count())); ?>

                        </p>
                        <span class="mt-4 inline-flex items-center gap-1 text-[11px] font-black uppercase tracking-widest text-accent">
                            View Parts &rarr;
                        </span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

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
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/main-category.blade.php ENDPATH**/ ?>