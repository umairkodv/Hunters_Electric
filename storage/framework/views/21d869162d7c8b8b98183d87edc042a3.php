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
            <nav class="text-[11px] font-bold uppercase tracking-widest text-gray-400 flex items-center gap-2 flex-wrap">
                <a href="<?php echo e(route('department.show', $department->slug)); ?>" class="hover:text-accent transition-colors"><?php echo e($department->name); ?></a>
                <span>/</span>
                <a href="<?php echo e(route('department.mainCategory', [$department->slug, $mainCategory->slug])); ?>" class="hover:text-accent transition-colors"><?php echo e($mainCategory->name); ?></a>
                <span>/</span>
                <span class="text-nav-text"><?php echo e($subcategory->name); ?></span>
            </nav>

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent"><?php echo e($subcategory->name); ?></span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1"><?php echo e($subcategory->products->count()); ?> parts listed in this subcategory.</p>
                </div>
            </div>

            <!-- Product Listing Table -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#f8fafc] border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Description</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Availability</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__empty_1 = true; $__currentLoopData = $subcategory->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                                <td class="px-6 py-4">
                                    <a href="<?php echo e(route('product.show', [$department->slug, $mainCategory->slug, $subcategory->slug, $product->part_number])); ?>"
                                       class="text-xs font-black uppercase tracking-wider text-accent hover:text-accent-hover transition-colors">
                                        <?php echo e($product->part_number); ?>

                                    </a>
                                </td>
                                <td class="px-6 py-4 text-xs font-semibold text-gray-600"><?php echo e($product->type_description); ?></td>
                                <td class="px-6 py-4">
                                    <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest">
                                        <?php echo e($product->warehouse_status); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs font-black text-nav-text text-right">$<?php echo e(number_format($product->price, 2)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No parts are currently listed in this subcategory.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase4\resources\views/subcategory.blade.php ENDPATH**/ ?>