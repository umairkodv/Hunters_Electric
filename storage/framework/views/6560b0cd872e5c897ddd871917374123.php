<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Products']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Products']); ?>
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500"><?php echo e($products->total()); ?> products</p>
         <a href="#new-product-popup" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Product
        </a>
    </div>

    <!-- Filter / Search Toolbar -->
    <form action="<?php echo e(route('admin.products.index')); ?>" method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-4 mb-6 flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Part number or description&hellip;"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
        </div>
        <div class="min-w-[220px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Subcategory</label>
            <select name="subcategory_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Subcategories</option>
                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subcategory->id); ?>" <?php if($subcategoryId == $subcategory->id): echo 'selected'; endif; ?>><?php echo e($subcategory->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="min-w-[180px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Status</label>
            <select name="warehouse_status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                <option value="">All Statuses</option>
                <?php $__currentLoopData = ['In Stock', 'Low Stock', 'Out of Stock']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($statusOption); ?>" <?php if($status === $statusOption): echo 'selected'; endif; ?>><?php echo e($statusOption); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
         <div class="w-28">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Min Price ($)</label>
            <input type="number" name="min_price" value="<?php echo e(request('min_price')); ?>" step="0.01" min="0" placeholder="0.00"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <div class="w-28">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Max Price ($)</label>
            <input type="number" name="max_price" value="<?php echo e(request('max_price')); ?>" step="0.01" min="0" placeholder="9999"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="bg-nav-text text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-nav-text/90 transition-colors">
                Filter
            </button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                Reset
            </a>
        </div>
    </form>
    
    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Part Number</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Description</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Subcategory</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Status</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Price</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-black text-nav-text"><?php echo e($product->part_number); ?></td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($product->type_description); ?></td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($product->subcategory->name); ?></td>
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md bg-gray-200/50 text-gray-500 uppercase tracking-widest"><?php echo e($product->warehouse_status); ?></span>
                        </td>
                        <td class="px-6 py-4 text-xs font-black text-nav-text text-right">$<?php echo e(number_format($product->price, 2)); ?></td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            
                            <!-- FIXED CONTROL ROW: Re-integrated your exact button layouts mapping onto row target IDs -->
                            <div class="flex items-center justify-end gap-2.5">
                                
                                <a href="#edit-prod-<?php echo e($product->id); ?>"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>

                                <a href="#delete-prod-<?php echo e($product->id); ?>"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200">
                                    Delete
                                </a>

                            </div>
                        </td>
                    </tr>

                    <!-- DYNAMIC STANDALONE EDIT COMPONENT SHEET -->
                    <?php if (isset($component)) { $__componentOriginal4b2e327611a3596977278fa06a22b35b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b2e327611a3596977278fa06a22b35b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-edit-modal','data' => ['model' => $product,'prefix' => 'edit-prod','title' => 'Edit Product: '.e($product->part_number).'','actionRoute' => route('admin.products.update', $product)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-edit-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'prefix' => 'edit-prod','title' => 'Edit Product: '.e($product->part_number).'','actionRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.products.update', $product))]); ?>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Subcategory</label>
                            <select name="subcategory_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                                <?php $__currentLoopData = \App\Models\Subcategory::with('mainCategory.department')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sub->id); ?>" <?php if(old('subcategory_id', $product->subcategory_id) == $sub->id): echo 'selected'; endif; ?>>
                                        <?php echo e($sub->mainCategory->department->name); ?> / <?php echo e($sub->mainCategory->name); ?> / <?php echo e($sub->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Part Number</label>
                            <input type="text" name="part_number" value="<?php echo e(old('part_number', $product->part_number)); ?>" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Description</label>
                            <input type="text" name="type_description" value="<?php echo e(old('type_description', $product->type_description)); ?>" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Specifications</label>
                            <textarea name="specifications" rows="4" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text resize-none"><?php echo e(old('specifications', $product->specifications)); ?></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Warehouse Status</label>
                                <select name="warehouse_status" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                                    <?php $__currentLoopData = ['In Stock', 'Low Stock', 'Out of Stock']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status); ?>" <?php if(old('warehouse_status', $product->warehouse_status) === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Stock Quantity</label>
                                <input type="number" name="stock_qty" min="0" value="<?php echo e(old('stock_qty', $product->stock_qty)); ?>" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Price ($)</label>
                            <input type="number" name="price" step="0.01" min="0" value="<?php echo e(old('price', $product->price)); ?>" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b2e327611a3596977278fa06a22b35b)): ?>
<?php $attributes = $__attributesOriginal4b2e327611a3596977278fa06a22b35b; ?>
<?php unset($__attributesOriginal4b2e327611a3596977278fa06a22b35b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b2e327611a3596977278fa06a22b35b)): ?>
<?php $component = $__componentOriginal4b2e327611a3596977278fa06a22b35b; ?>
<?php unset($__componentOriginal4b2e327611a3596977278fa06a22b35b); ?>
<?php endif; ?>

                    <!-- DYNAMIC STANDALONE DELETE COMPONENT SHEET -->
                    <?php if (isset($component)) { $__componentOriginalb8f4050824973e6011a79a3597155a78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8f4050824973e6011a79a3597155a78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-delete-modal','data' => ['model' => $product,'prefix' => 'delete-prod','actionRoute' => route('admin.products.destroy', $product),'itemName' => $product->part_number]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-delete-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'prefix' => 'delete-prod','actionRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.products.destroy', $product)),'itemName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->part_number)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb8f4050824973e6011a79a3597155a78)): ?>
<?php $attributes = $__attributesOriginalb8f4050824973e6011a79a3597155a78; ?>
<?php unset($__attributesOriginalb8f4050824973e6011a79a3597155a78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8f4050824973e6011a79a3597155a78)): ?>
<?php $component = $__componentOriginalb8f4050824973e6011a79a3597155a78; ?>
<?php unset($__componentOriginalb8f4050824973e6011a79a3597155a78); ?>
<?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No products yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    
    <?php if (isset($component)) { $__componentOriginalb4534500178914cf875c0a7bed23e80a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4534500178914cf875c0a7bed23e80a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pagination','data' => ['paginator' => $products]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paginator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($products)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb4534500178914cf875c0a7bed23e80a)): ?>
<?php $attributes = $__attributesOriginalb4534500178914cf875c0a7bed23e80a; ?>
<?php unset($__attributesOriginalb4534500178914cf875c0a7bed23e80a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb4534500178914cf875c0a7bed23e80a)): ?>
<?php $component = $__componentOriginalb4534500178914cf875c0a7bed23e80a; ?>
<?php unset($__componentOriginalb4534500178914cf875c0a7bed23e80a); ?>
<?php endif; ?>

     <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['id' => 'new-product-popup','title' => 'Create New Product','actionRoute' => route('admin.products.store')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'new-product-popup','title' => 'Create New Product','actionRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.products.store'))]); ?>
        
        <!-- 1. Deep Relational Taxonomy Parent Selection Dropdown -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Subcategory</label>
            <select name="subcategory_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                <option value="" disabled selected class="text-gray-400">Select a subcategory...</option>
                <?php $__currentLoopData = \App\Models\Subcategory::with('mainCategory.department')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subcategory->id); ?>" <?php if(old('subcategory_id') == $subcategory->id): echo 'selected'; endif; ?>>
                        <?php echo e($subcategory->mainCategory->department->name); ?> / <?php echo e($subcategory->mainCategory->name); ?> / <?php echo e($subcategory->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- 2. Part Number Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Part Number</label>
            <input type="text" name="part_number" value="<?php echo e(old('part_number')); ?>" required autocomplete="off" placeholder="e.g., JN-1240"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
        </div>

        <!-- 3. Type Description Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Description</label>
            <input type="text" name="type_description" value="<?php echo e(old('type_description')); ?>" required autocomplete="off" placeholder="e.g., 12V Heavy Duty Unit"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
        </div>

        <!-- 4. Textarea Specifications Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Specifications</label>
            <textarea name="specifications" rows="4" required placeholder="Enter unit specifications..."
                      class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400 resize-none"><?php echo e(old('specifications')); ?></textarea>
        </div>

        <!-- 5. Warehouse Status and Quantity Columns Grid Set -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Warehouse Status</label>
                <select name="warehouse_status" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-gray-50/40 focus:bg-white outline-none transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text cursor-pointer">
                    <?php $__currentLoopData = ['In Stock', 'Low Stock', 'Out of Stock']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status); ?>" <?php if(old('warehouse_status', 'In Stock') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Stock Quantity</label>
                <input type="number" name="stock_qty" min="0" value="<?php echo e(old('stock_qty', 0)); ?>" required
                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
            </div>
        </div>

        <!-- 6. Item Pricing Field -->
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1 select-none">Price ($)</label>
            <input type="number" name="price" step="0.01" min="0" value="<?php echo e(old('price', 0)); ?>" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>

        <!-- Custom Modal Footer Buttons Action Slot -->
         <?php $__env->slot('footerActions', null, []); ?> 
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Product
            </button>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $attributes = $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27)): ?>
<?php $component = $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27; ?>
<?php unset($__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27); ?>
<?php endif; ?>

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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase5\resources\views/admin/products/index.blade.php ENDPATH**/ ?>