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
        <div class="max-w-4xl mx-auto px-6 sm:px-12 flex flex-col gap-8">

            <div class="border-b border-gray-200 pb-6 w-full">
                <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                    <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                    <span class="text-accent">Your Cart</span>
                </h1>
                <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Add one or more parts, then request a quote for everything at once.</p>
            </div>

            <?php if($items->isEmpty()): ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs px-6 py-12 text-center">
                    <p class="text-sm font-bold text-nav-text">Your cart is empty.</p>
                    <p class="text-xs text-gray-500 font-semibold mt-1">Browse the catalog and add a part to get started.</p>
                    <a href="<?php echo e(route('home')); ?>" class="inline-block mt-4 text-xs font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                        &larr; Back to Catalog
                    </a>
                </div>
            <?php else: ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-[#f8fafc] border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quantity</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Catalog Price</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $product = $item['product']; ?>
                                <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <?php if (isset($component)) { $__componentOriginalb82e45963896605379b9ebd57e3a9e31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb82e45963896605379b9ebd57e3a9e31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.part-image','data' => ['url' => $product->image_url,'alt' => $product->part_number,'class' => 'h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('part-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->image_url),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->part_number),'class' => 'h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0']); ?>
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
                                            <div>
                                                <p class="text-xs font-black uppercase tracking-wider text-nav-text"><?php echo e($product->part_number); ?></p>
                                                <p class="text-xs font-semibold text-gray-500 mt-0.5"><?php echo e($product->type_description); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="<?php echo e(route('cart.update', $product)); ?>" method="POST" class="flex items-center gap-2">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1"
                                                   class="w-16 border border-gray-300 rounded-lg px-2 py-1.5 text-xs font-bold text-nav-text outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                                            <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-accent hover:text-accent-hover transition-colors">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-black text-nav-text text-right">$<?php echo e(number_format($product->price, 2)); ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="<?php echo e(route('cart.remove', $product)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-red-500 hover:text-red-700 transition-colors">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <?php if(auth()->guard()->check()): ?>
                        <form action="<?php echo e(route('quotations.store')); ?>" method="POST" class="flex flex-col gap-4">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Notes (optional)</label>
                                <textarea name="customer_notes" rows="3" placeholder="Anything we should know about this request?"
                                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent"><?php echo e(old('customer_notes')); ?></textarea>
                            </div>
                            <button type="submit" class="self-start bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                                Request a Quote
                            </button>
                        </form>
                    <?php else: ?>
                        <p class="text-xs font-semibold text-gray-500 mb-3">Sign in to request a quote for the items in your cart. Your cart will still be here after you log in.</p>
                        <a href="<?php echo e(route('login')); ?>" class="inline-block bg-accent text-white text-xs font-black uppercase tracking-widest px-6 py-3 rounded-lg hover:bg-accent-hover transition-colors">
                            Sign In to Continue
                        </a>
                    <?php endif; ?>
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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7_3\resources\views/cart.blade.php ENDPATH**/ ?>