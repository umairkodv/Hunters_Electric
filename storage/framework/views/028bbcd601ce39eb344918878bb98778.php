<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Edit Subcategory']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Subcategory']); ?>
    <div class="max-w-lg bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
        <form action="<?php echo e(route('admin.subcategories.update', $subcategory)); ?>" method="POST" class="flex flex-col gap-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Main Category</label>
                <select name="main_category_id" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                    <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mainCategory->id); ?>" <?php if(old('main_category_id', $subcategory->main_category_id) == $mainCategory->id): echo 'selected'; endif; ?>>
                            <?php echo e($mainCategory->department->name); ?> / <?php echo e($mainCategory->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
                <input type="text" name="name" value="<?php echo e(old('name', $subcategory->name)); ?>" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                <p class="text-[10px] text-gray-400 font-semibold mt-1">Current slug: <span class="font-mono"><?php echo e($subcategory->slug); ?></span>. Changing the name regenerates it, which changes this subcategory's URL.</p>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Featured Image URL</label>
                <input type="text" name="featured_image_url" value="<?php echo e(old('featured_image_url', $subcategory->featured_image_url)); ?>" placeholder="https://..."
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                <p class="text-[10px] text-gray-400 font-semibold mt-1">Used on the homepage hero slider when this subcategory is featured.</p>
            </div>

            <label class="flex items-center gap-2 text-xs font-semibold text-gray-600">
                <input type="checkbox" name="is_featured" value="1" <?php if(old('is_featured', $subcategory->is_featured)): echo 'checked'; endif; ?> class="rounded border-gray-300">
                Show on homepage as a featured category
            </label>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $subcategory->sort_order)); ?>"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
            </div>

            <div class="flex items-center gap-3 mt-2">
                <button type="submit" class="bg-accent text-nav-text text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors">
                    Save Changes
                </button>
                <a href="<?php echo e(route('admin.subcategories.index')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
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
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/admin/subcategories/edit.blade.php ENDPATH**/ ?>