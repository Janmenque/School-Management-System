<?php if (isset($component)) { $__componentOriginal288b082e3ae37093a10c3d78895b4c0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal288b082e3ae37093a10c3d78895b4c0d = $attributes; } ?>
<?php $component = App\View\Components\SidebarComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal288b082e3ae37093a10c3d78895b4c0d)): ?>
<?php $attributes = $__attributesOriginal288b082e3ae37093a10c3d78895b4c0d; ?>
<?php unset($__attributesOriginal288b082e3ae37093a10c3d78895b4c0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal288b082e3ae37093a10c3d78895b4c0d)): ?>
<?php $component = $__componentOriginal288b082e3ae37093a10c3d78895b4c0d; ?>
<?php unset($__componentOriginal288b082e3ae37093a10c3d78895b4c0d); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/partials/sidebar.blade.php ENDPATH**/ ?>