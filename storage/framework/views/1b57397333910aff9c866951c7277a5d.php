<form action="<?php echo e(route('search')); ?>" method="GET" class="mx-auto w-full lg:px-4">
    <!-- REMAPPED: border-red-600 -> border-accent | focus-within:ring-red-500 -> focus-within:ring-accent -->
    <div class="group flex items-center overflow-hidden rounded-xl border border-accent bg-white pl-3 focus-within:ring-2 focus-within:ring-accent">
        
        <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search..."
            class="w-full bg-transparent py-2.5 text-base text-nav-text placeholder-gray-400 outline-none border-none min-w-0" />
        
        <!-- REMAPPED: bg-red-600 -> bg-accent | hover:bg-red-700 -> hover:bg-accent/90 | active:bg-red-800 -> active:bg-accent/80 -->
        <button type="submit"
            class="flex h-11 w-12 shrink-0 items-center justify-center bg-accent text-white transition-colors hover:bg-accent/90 active:bg-accent/80"
            aria-label="Submit search">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('fas-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
        </button>
        
    </div>
</form>
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7\resources\views/components/searchbar.blade.php ENDPATH**/ ?>