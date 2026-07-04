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

            <!-- Header Section Info Row -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div class="text-left">
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">Search Results</span>
                    </h1>
                    <?php if($query !== ''): ?>
                        <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">
                            Showing results for &ldquo;<?php echo e($query); ?>&rdquo;
                        </p>
                    <?php else: ?>
                        <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">
                            Enter a part number, description, or category name above to search.
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($query !== '' && $products->isEmpty() && $subcategories->isEmpty()): ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs px-6 py-10 text-center">
                    <p class="text-sm font-bold text-nav-text">No results found for &ldquo;<?php echo e($query); ?>&rdquo;.</p>
                    <p class="text-xs text-gray-500 font-semibold mt-1">Try a different part number, description, or category name.</p>
                </div>
            <?php endif; ?>

            <!-- Matching Categories -->
            <?php if($subcategories->isNotEmpty()): ?>
                <div class="flex flex-col gap-4">
                    <h2 class="text-xs font-black uppercase tracking-widest text-gray-500">Matching Categories</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('department.subcategory', [$subcategory->mainCategory->department->slug, $subcategory->mainCategory->slug, $subcategory->slug])); ?>"
                               class="group bg-white border border-gray-200 rounded-2xl shadow-2xs hover:shadow-xs hover:border-accent/30 transition-all duration-150 flex flex-col overflow-hidden h-full p-6">
                                <span class="text-[10px] font-black uppercase tracking-widest text-accent"><?php echo e($subcategory->mainCategory->department->name); ?> / <?php echo e($subcategory->mainCategory->name); ?></span>
                                <h3 class="text-xs font-black uppercase tracking-wider text-nav-text group-hover:text-accent transition-colors mt-1">
                                    <?php echo e($subcategory->name); ?>

                                </h3>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Matching Products -->
            <?php if($products->isNotEmpty()): ?>
                <div class="flex flex-col gap-4">
                    <h2 class="text-xs font-black uppercase tracking-widest text-gray-500">Matching Parts</h2>
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                        <table class="w-full text-left">
                            <thead class="bg-[#f8fafc] border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Description</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Category</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                                        <td class="px-6 py-4">
                                            <a href="<?php echo e(route('product.show', [$product->subcategory->mainCategory->department->slug, $product->subcategory->mainCategory->slug, $product->subcategory->slug, $product->part_number])); ?>"
                                               class="text-xs font-black uppercase tracking-wider text-accent hover:text-accent-hover transition-colors">
                                                <?php echo e($product->part_number); ?>

                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-xs font-semibold text-gray-600"><?php echo e($product->type_description); ?></td>
                                        <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($product->subcategory->name); ?></td>
                                        <td class="px-6 py-4 text-xs font-black text-nav-text text-right">$<?php echo e(number_format($product->price, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase3\resources\views/search.blade.php ENDPATH**/ ?>