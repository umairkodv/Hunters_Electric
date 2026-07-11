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
                        <span class="text-accent">My Quotes</span>
                    </h1>
                    <p class="text-xs text-gray-500 font-semibold tracking-wide mt-1">Track the status of your quote requests.</p>
                </div>
                <a href="<?php echo e(route('account.dashboard')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                    &larr; Back to Account
                </a>
            </div>

            <?php if($quotations->isEmpty()): ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs px-6 py-12 text-center">
                    <p class="text-sm font-bold text-nav-text">No quote requests yet.</p>
                    <p class="text-xs text-gray-500 font-semibold mt-1">Add parts to your cart and request a quote to see it listed here.</p>
                </div>
            <?php else: ?>
                <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-[#f8fafc] border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quote #</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Items</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Status</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Requested</th>
                                <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-[#f8fafc]/60 transition-colors cursor-pointer" onclick="window.location='<?php echo e(route('account.quotations.show', $quotation)); ?>'">
                                    <td class="px-6 py-4 text-xs font-black text-nav-text">
                                        <a href="<?php echo e(route('account.quotations.show', $quotation)); ?>" class="hover:text-accent transition-colors">#<?php echo e($quotation->id); ?></a>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($quotation->items_count); ?></td>
                                    <td class="px-6 py-4">
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
                                    </td>
                                    <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($quotation->created_at->format('M j, Y')); ?></td>
                                    <td class="px-6 py-4 text-xs font-black text-nav-text text-right">
                                        <?php echo e($quotation->quoted_total !== null ? '$'.number_format($quotation->quoted_total, 2) : '—'); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7\resources\views/account/quotations/index.blade.php ENDPATH**/ ?>