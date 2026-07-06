<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard']); ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
            $stats = [
                ['label' => 'Departments', 'value' => $departmentCount, 'route' => 'admin.departments.index'],
                ['label' => 'Main Categories', 'value' => $mainCategoryCount, 'route' => 'admin.main-categories.index'],
                ['label' => 'Subcategories', 'value' => $subcategoryCount, 'route' => 'admin.subcategories.index'],
                ['label' => 'Products', 'value' => $productCount, 'route' => 'admin.products.index'],
            ];
        ?>
        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($stat['route'])); ?>" class="bg-white border border-gray-200 rounded-2xl shadow-2xs hover:border-accent/30 hover:shadow-xs transition-all p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400"><?php echo e($stat['label']); ?></p>
                <p class="text-3xl font-black text-nav-text mt-2"><?php echo e($stat['value']); ?></p>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-8 bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
        <h2 class="text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Catalog Hierarchy</h2>
        <p class="text-xs font-semibold text-gray-500 leading-relaxed">
            Departments &rarr; Main Categories &rarr; Subcategories &rarr; Products. Use the sidebar to manage each level.
            Deleting a record cascades to everything nested beneath it (e.g. deleting a department also deletes its main
            categories, subcategories, and products), so double-check before confirming a delete.
        </p>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>