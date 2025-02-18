<section class="section_padding events">
    <div class="container">
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd = $attributes; } ?>
<?php $component = App\View\Components\EventGallery::resolve(['column' => pagesetting('event_gallery_area_column'),'sorting' => pagesetting('event_gallery_sorting'),'count' => pagesetting('event_gallery_count'),'button' => pagesetting('event_gallery_read_more_btn'),'dateshow' => pagesetting('event_gallery_show_date'),'enevtlocation' => pagesetting('event_gallery_show_location')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('event-gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\EventGallery::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd)): ?>
<?php $attributes = $__attributesOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd; ?>
<?php unset($__attributesOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd)): ?>
<?php $component = $__componentOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd; ?>
<?php unset($__componentOriginal31bada9b88ec1d7ba61a7ce8cc6a13bd); ?>
<?php endif; ?>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/event-gallery/view.blade.php ENDPATH**/ ?>