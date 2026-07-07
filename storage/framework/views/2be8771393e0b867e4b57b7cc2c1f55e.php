<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'New Product']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'New Product']); ?>
    <div class="max-w-lg bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
        <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" class="flex flex-col gap-4">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Subcategory</label>
                <select name="subcategory_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                    <option value="">Select a subcategory&hellip;</option>
                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subcategory->id); ?>" <?php if(old('subcategory_id') == $subcategory->id): echo 'selected'; endif; ?>>
                            <?php echo e($subcategory->mainCategory->department->name); ?> / <?php echo e($subcategory->mainCategory->name); ?> / <?php echo e($subcategory->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Part Number</label>
                <input type="text" name="part_number" value="<?php echo e(old('part_number')); ?>" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Description</label>
                <input type="text" name="type_description" value="<?php echo e(old('type_description')); ?>" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Specifications</label>
                <textarea name="specifications" rows="4" required
                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent"><?php echo e(old('specifications')); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Warehouse Status</label>
                    <select name="warehouse_status" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                        <?php $__currentLoopData = ['In Stock', 'Low Stock', 'Out of Stock']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>" <?php if(old('warehouse_status', 'In Stock') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Stock Quantity</label>
                    <input type="number" name="stock_qty" min="0" value="<?php echo e(old('stock_qty', 0)); ?>" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Price ($)</label>
                <input type="number" name="price" step="0.01" min="0" value="<?php echo e(old('price', 0)); ?>" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div class="flex items-center gap-3 mt-2">
                <button type="submit" class="bg-accent text-nav-text text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors">
                    Create Product
                </button>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
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
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/admin/products/create.blade.php ENDPATH**/ ?>