<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Quotation #'.e($quotation->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Quotation #'.e($quotation->id).'']); ?>

    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="text-xs font-bold text-nav-text"><?php echo e($quotation->user->name); ?> &middot; <?php echo e($quotation->user->email); ?></p>
            <p class="text-xs font-semibold text-gray-500 mt-0.5">Requested <?php echo e($quotation->created_at->format('M j, Y g:i A')); ?></p>
        </div>
        <a href="<?php echo e(route('admin.quotations.index')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
            &larr; Back to Quotations
        </a>
    </div>

    <form action="<?php echo e(route('admin.quotations.update', $quotation)); ?>" method="POST" class="flex flex-col gap-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-[#f8fafc] border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quantity</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Catalog Price</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Quoted Unit Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__currentLoopData = $quotation->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <?php if (isset($component)) { $__componentOriginalb82e45963896605379b9ebd57e3a9e31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb82e45963896605379b9ebd57e3a9e31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.part-image','data' => ['url' => $item->product->image_url,'alt' => $item->product->part_number,'class' => 'h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('part-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->product->image_url),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->product->part_number),'class' => 'h-10 w-10 object-contain bg-gray-50 border border-gray-200 rounded-lg p-1 shrink-0']); ?>
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
                                        <p class="text-xs font-black uppercase tracking-wider text-nav-text"><?php echo e($item->product->part_number); ?></p>
                                        <p class="text-xs font-semibold text-gray-500 mt-0.5"><?php echo e($item->product->type_description); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($item->quantity); ?></td>
                            <td class="px-6 py-4 text-xs font-semibold text-gray-500">$<?php echo e(number_format($item->product->price, 2)); ?></td>
                            <td class="px-6 py-4">
                                <input type="number" name="items[<?php echo e($item->id); ?>][unit_price]" value="<?php echo e(old("items.{$item->id}.unit_price", $item->unit_price)); ?>"
                                       step="0.01" min="0" placeholder="0.00"
                                       class="w-32 border border-gray-300 rounded-lg px-3 py-2 text-sm font-bold text-nav-text outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php if($quotation->customer_notes): ?>
            <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6">
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Customer Notes</p>
                <p class="text-xs font-semibold text-gray-600 leading-relaxed whitespace-pre-line"><?php echo e($quotation->customer_notes); ?></p>
            </div>
        <?php endif; ?>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-6 flex flex-col gap-4">
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Status</label>
                <select name="status" required class="w-full max-w-xs border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text">
                    <?php $__currentLoopData = ['pending' => 'Pending Review', 'quoted' => 'Quoted', 'approved' => 'Approved', 'rejected' => 'Rejected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php if(old('status', $quotation->status) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p class="text-[10px] text-gray-400 font-semibold mt-1">Approval is manual — set unit prices above, then choose "Approved" once you're ready for the customer to see a final quote.</p>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Note to Customer</label>
                <textarea name="admin_notes" rows="3" placeholder="Visible to the customer once the status isn't Pending Review."
                          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent"><?php echo e(old('admin_notes', $quotation->admin_notes)); ?></textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                    Save Quotation
                </button>
            </div>
        </div>
    </form>

    <!-- Deliberately outside the update form above — a nested <form> is
         invalid HTML and caused the browser to hoist this form's hidden
         _method=DELETE input into the outer form, so clicking "Save
         Quotation" was silently submitting as a DELETE instead of a PUT. -->
    <form action="<?php echo e(route('admin.quotations.destroy', $quotation)); ?>" method="POST" onsubmit="return confirm('Delete this quotation? This cannot be undone.');" class="mt-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="text-xs font-black uppercase tracking-widest text-red-500 hover:text-red-700 transition-colors">
            Delete Quotation
        </button>
    </form>

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
<?php /**PATH C:\Laravel\Hunters_Electric\resources\views/admin/quotations/show.blade.php ENDPATH**/ ?>