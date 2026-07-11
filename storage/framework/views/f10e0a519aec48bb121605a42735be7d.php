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

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-6 w-full">
                <div>
                    <h1 class="text-2xl font-black uppercase tracking-wider text-nav-text flex items-center gap-2">
                        <span class="h-6 w-1.5 bg-accent rounded-full"></span>
                        <span class="text-accent">Quote #<?php echo e($quotation->id); ?></span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Requested <?php echo e($quotation->created_at->format('M j, Y')); ?></p>
                </div>
                <a href="<?php echo e(route('account.quotations.index')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    &larr; Back to My Quotes
                </a>
            </div>

            <div class="flex items-center gap-3">
                <?php if (isset($component)) { $__componentOriginala69ac7ced36e416882844b3812f4be61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala69ac7ced36e416882844b3812f4be61 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.quotation-status-badge','data' => ['status' => $quotation->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('quotation-status-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($quotation->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala69ac7ced36e416882844b3812f4be61)): ?>
<?php $attributes = $__attributesOriginala69ac7ced36e416882844b3812f4be61; ?>
<?php unset($__attributesOriginala69ac7ced36e416882844b3812f4be61); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala69ac7ced36e416882844b3812f4be61)): ?>
<?php $component = $__componentOriginala69ac7ced36e416882844b3812f4be61; ?>
<?php unset($__componentOriginala69ac7ced36e416882844b3812f4be61); ?>
<?php endif; ?>
                <?php if($quotation->quoted_total !== null): ?>
                    <span class="text-sm font-black text-nav-text">$<?php echo e(number_format($quotation->quoted_total, 2)); ?></span>
                <?php endif; ?>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-[#f8fafc] border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quantity</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Unit Price</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Line Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $quotation->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="<?php echo e($item->product->display_image_url); ?>" alt="<?php echo e($item->product->part_number); ?>" class="h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0">
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-wider text-nav-text"><?php echo e($item->product->part_number); ?></p>
                                            <p class="text-xs font-semibold text-gray-500 mt-0.5"><?php echo e($item->product->type_description); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($item->quantity); ?></td>
                                <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                                    <?php echo e($item->unit_price !== null ? '$'.number_format($item->unit_price, 2) : 'Pending'); ?>

                                </td>
                                <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                                    <?php echo e($item->lineTotal() !== null ? '$'.number_format($item->lineTotal(), 2) : '—'); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <?php if($quotation->customer_notes): ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Your Notes</p>
                    <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line"><?php echo e($quotation->customer_notes); ?></p>
                </div>
            <?php endif; ?>

            <?php if($quotation->admin_notes && ! $quotation->isPending()): ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Response From Us</p>
                    <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line"><?php echo e($quotation->admin_notes); ?></p>
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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7_3\resources\views/account/quotations/show.blade.php ENDPATH**/ ?>