<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Departments']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Departments']); ?>
    
    <!-- Header Dashboard Tracking Action Row -->
    <div class="flex items-center justify-between mb-6">
        <p class="text-xs font-semibold text-gray-500"><?php echo e($departments->total()); ?> departments</p>
        
        <!-- Open Creation Modal Trigger Anchor -->
        <a href="#new-dept-popup" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs">
            + New Department
        </a>
    </div>

    <!-- Search Toolbar -->
    <form action="<?php echo e(route('admin.departments.index')); ?>" method="GET" class="bg-white border border-gray-200 rounded-2xl shadow-2xs p-4 mb-6 flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Search</label>
            <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Search by name&hellip;"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-accent focus:border-accent" />
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="bg-nav-text text-white text-xs font-black uppercase tracking-widest px-4 py-2.5 rounded-lg hover:bg-nav-text/90 transition-colors">
                Search
            </button>
            <a href="<?php echo e(route('admin.departments.index')); ?>" class="text-xs font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors">
                Reset
            </a>
        </div>
    </form>

    <!-- Your High-Density Data Table Canvas Grid Frame -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-2xs overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#f8fafc] border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Name</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Slug</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Sort Order</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Main Categories</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-[#f8fafc]/60 transition-colors">
                        <td class="px-6 py-4 text-xs font-bold text-nav-text"><?php echo e($department->name); ?></td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($department->slug); ?></td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($department->sort_order); ?></td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-500"><?php echo e($department->main_categories_count); ?></td>
                        <td class="px-6 py-4 text-right align-middle select-none">
                            
                            <!-- FIXED CONTROL ROW: Re-integrated your premium micro-button action styling layout -->
                            <div class="flex items-center justify-end gap-2.5">
                                
                                <!-- Retained exact light-accent red block variables anchoring to row edit IDs -->
                                <a href="#edit-dept-<?php echo e($department->id); ?>"
                                    class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-accent/10 hover:bg-accent text-accent hover:text-white text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs focus:outline-none focus:ring-2 focus:ring-accent/30">
                                    Edit
                                </a>

                                <!-- Retained soft-slate to bold-crimson transition button targeting row delete confirmation sheets -->
                                <a href="#delete-dept-<?php echo e($department->id); ?>"
                                   class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-gray-50 hover:bg-red-50 text-gray-500 hover:text-red-600 border border-gray-100 hover:border-red-200 text-[11px] font-black uppercase tracking-wider transition-all duration-150 shadow-2xs cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-200">
                                    Delete
                                </a>

                            </div>
                        </td>
                    </tr>

                    <!-- DYNAMIC STANDALONE EDIT COMPONENT SHEET -->
                    <?php if (isset($component)) { $__componentOriginal4b2e327611a3596977278fa06a22b35b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b2e327611a3596977278fa06a22b35b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-edit-modal','data' => ['model' => $department,'prefix' => 'edit-dept','title' => 'Edit Department: '.e($department->name).'','actionRoute' => route('admin.departments.update', $department)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-edit-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($department),'prefix' => 'edit-dept','title' => 'Edit Department: '.e($department->name).'','actionRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.departments.update', $department))]); ?>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
                            <input type="text" name="name" value="<?php echo e(old('name', $department->name)); ?>" required autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="<?php echo e(old('sort_order', $department->sort_order)); ?>" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-delete-modal','data' => ['model' => $department,'prefix' => 'delete-dept','actionRoute' => route('admin.departments.destroy', $department),'itemName' => $department->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-delete-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($department),'prefix' => 'delete-dept','actionRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.departments.destroy', $department)),'itemName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($department->name)]); ?>
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
                        <td colspan="5" class="px-6 py-8 text-center text-xs font-semibold text-gray-400">No departments match this search.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($component)) { $__componentOriginalb4534500178914cf875c0a7bed23e80a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb4534500178914cf875c0a7bed23e80a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pagination','data' => ['paginator' => $departments]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paginator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($departments)]); ?>
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

    <!-- REUSABLE COMPONENT INJECTION FOR CREATION -->
    <?php if (isset($component)) { $__componentOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal374a8b4f0d20c1f5f1a223240a48bd27 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-modal','data' => ['id' => 'new-dept-popup','title' => 'Create New Department','actionRoute' => route('admin.departments.store')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'new-dept-popup','title' => 'Create New Department','actionRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.departments.store'))]); ?>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Name</label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="off" placeholder="e.g., Heavy Electronics" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text placeholder-gray-400" />
            <p class="text-[10px] text-gray-400 font-semibold mt-1">The URL slug is generated automatically from this name.</p>
        </div>
        <div>
            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-500 mb-1">Sort Order</label>
            <input type="number" name="sort_order" value="<?php echo e(old('sort_order', 0)); ?>" required class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm outline-none bg-gray-50/40 focus:bg-white transition-all focus:ring-2 focus:ring-accent focus:border-accent font-semibold text-nav-text" />
        </div>
         <?php $__env->slot('footerActions', null, []); ?> 
            <button type="submit" class="bg-accent text-white text-xs font-black uppercase tracking-widest px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-2xs cursor-pointer">
                Create Department
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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase5\resources\views/admin/departments/index.blade.php ENDPATH**/ ?>