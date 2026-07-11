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
    <!-- Master Dashboard Hero Workspace Section -->
    <?php if (isset($component)) { $__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-banner','data' => ['featuredSlides' => $featuredSlides]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['featured-slides' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($featuredSlides)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5)): ?>
<?php $attributes = $__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5; ?>
<?php unset($__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5)): ?>
<?php $component = $__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5; ?>
<?php unset($__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seperator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('seperator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470)): ?>
<?php $attributes = $__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470; ?>
<?php unset($__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470)): ?>
<?php $component = $__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470; ?>
<?php unset($__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470); ?>
<?php endif; ?>

    <!-- Main Content Layout Section Wrapper Grid -->
    <div class="w-full bg-white min-h-screen flex flex-col antialiased">
        
        <!-- Popular Components Section -->
        <!-- Data now supplied by HomeController@index instead of an inline query -->
        <?php if (isset($component)) { $__componentOriginal29cde30777e80a6de1b3f7542525e376 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29cde30777e80a6de1b3f7542525e376 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-section','data' => ['sectionTitle' => 'Popular Components','featuredImage' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Components-Main-Image-767x767.jpg','categories' => $componentCategories]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['section-title' => 'Popular Components','featured-image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Components-Main-Image-767x767.jpg','categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($componentCategories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29cde30777e80a6de1b3f7542525e376)): ?>
<?php $attributes = $__attributesOriginal29cde30777e80a6de1b3f7542525e376; ?>
<?php unset($__attributesOriginal29cde30777e80a6de1b3f7542525e376); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29cde30777e80a6de1b3f7542525e376)): ?>
<?php $component = $__componentOriginal29cde30777e80a6de1b3f7542525e376; ?>
<?php unset($__componentOriginal29cde30777e80a6de1b3f7542525e376); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seperator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('seperator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470)): ?>
<?php $attributes = $__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470; ?>
<?php unset($__attributesOriginalc6a62f9fff7c6dc19f4514e80aef8470); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470)): ?>
<?php $component = $__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470; ?>
<?php unset($__componentOriginalc6a62f9fff7c6dc19f4514e80aef8470); ?>
<?php endif; ?>

        <!-- Popular Accessories Section -->
        <!-- Data now supplied by HomeController@index instead of an inline query -->
        <?php if (isset($component)) { $__componentOriginal29cde30777e80a6de1b3f7542525e376 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29cde30777e80a6de1b3f7542525e376 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-section','data' => ['sectionTitle' => 'Popular Accessories','featuredImage' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Accessories-Main-Image-767x767.jpg','categories' => $accessoryCategories]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['section-title' => 'Popular Accessories','featured-image' => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Accessories-Main-Image-767x767.jpg','categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($accessoryCategories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29cde30777e80a6de1b3f7542525e376)): ?>
<?php $attributes = $__attributesOriginal29cde30777e80a6de1b3f7542525e376; ?>
<?php unset($__attributesOriginal29cde30777e80a6de1b3f7542525e376); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29cde30777e80a6de1b3f7542525e376)): ?>
<?php $component = $__componentOriginal29cde30777e80a6de1b3f7542525e376; ?>
<?php unset($__componentOriginal29cde30777e80a6de1b3f7542525e376); ?>
<?php endif; ?>

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
<?php /**PATH C:\Users\kk\Downloads\Hunters_Electric_Phase7_3\resources\views/welcome.blade.php ENDPATH**/ ?>