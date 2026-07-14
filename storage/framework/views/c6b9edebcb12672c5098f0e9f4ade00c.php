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
        <div class="max-w-5xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <!-- Breadcrumb -->
            <nav class="text-[11px] font-bold uppercase tracking-widest text-gray-400 flex items-center gap-2 flex-wrap">
                <a href="<?php echo e(route('department.show', $department->slug)); ?>" class="hover:text-accent transition-colors"><?php echo e($department->name); ?></a>
                <span>/</span>
                <a href="<?php echo e(route('department.mainCategory', [$department->slug, $mainCategory->slug])); ?>" class="hover:text-accent transition-colors"><?php echo e($mainCategory->name); ?></a>
                <span>/</span>
                <a href="<?php echo e(route('department.subcategory', [$department->slug, $mainCategory->slug, $subcategory->slug])); ?>" class="hover:text-accent transition-colors"><?php echo e($subcategory->name); ?></a>
                <span>/</span>
                <span class="text-nav-text"><?php echo e($product->part_number); ?></span>
            </nav>

            <!-- Product Detail Card -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                <div class="border-b border-gray-100 px-8 py-6 flex flex-col sm:flex-row gap-6">
                    <div class="w-full sm:w-48 h-48 shrink-0 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center p-4 overflow-hidden">
                        <?php if (isset($component)) { $__componentOriginalb82e45963896605379b9ebd57e3a9e31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb82e45963896605379b9ebd57e3a9e31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.part-image','data' => ['url' => $product->image_url,'alt' => $product->part_number,'class' => 'max-h-full max-w-full object-contain']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('part-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->image_url),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->part_number),'class' => 'max-h-full max-w-full object-contain']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb82e45963896605379b9ebd57e3a9e31)): ?>
<?php $attributes = $__attributesOriginalb82e45963896605379b9ebd57e3a9e31; ?>
<?php unset($__attributesOriginalb82e45963896605379b9ebd57e3a9e31); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb82e45963896605379b9ebd57e3a9e31)): ?>
<?php $component = $__componentOriginalb82e45963896605379b9ebd57e3a9e31; ?>
<?php unset($__componentOriginalb82e45963896605379b9ebd57e3a9e31); ?>
<?php endif; ?>
                    </div>

                    <div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-accent"><?php echo e($subcategory->name); ?></span>
                            <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text mt-1"><?php echo e($product->part_number); ?></h1>
                            <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1"><?php echo e($product->type_description); ?></p>
                        </div>
                        <div class="text-left sm:text-right">
                            <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest">
                                <?php echo e($product->warehouse_status); ?>

                            </span>
                            <p class="text-2xl font-black text-nav-text mt-2">$<?php echo e(number_format($product->price, 2)); ?></p>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-6 grid grid-cols-1 sm:grid-cols-3 gap-6 border-b border-gray-100">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Part Number</p>
                        <p class="text-xs font-bold text-nav-text mt-1"><?php echo e($product->part_number); ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Stock Quantity</p>
                        <p class="text-xs font-bold text-nav-text mt-1"><?php echo e($product->stock_qty); ?> units</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Availability</p>
                        <p class="text-xs font-bold text-nav-text mt-1"><?php echo e($product->warehouse_status); ?></p>
                    </div>
                </div>

                <div class="px-8 py-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Specifications</p>
                    <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line"><?php echo e($product->specifications); ?></p>
                </div>

                <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                    <?php if($product->warehouse_status === 'Out of Stock'): ?>
                        <button type="button" disabled class="inline-flex items-center gap-2 bg-gray-200 text-gray-500 text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg cursor-not-allowed">
                            Currently Out of Stock
                        </button>
                    <?php elseif($inCart): ?>
                        <form action="<?php echo e(route('cart.remove', $product)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="inline-flex items-center gap-2 bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                Added to Cart
                            </button>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('cart.add', $product)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="inline-flex items-center gap-2 bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                                Add to Cart
                            </button>
                        </form>
                    <?php endif; ?>
                    <p class="text-[10px] text-gray-400 font-semibold mt-2">Add parts to your cart, then request a quote for one or more items at once.</p>
                </div>
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
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/product.blade.php ENDPATH**/ ?>