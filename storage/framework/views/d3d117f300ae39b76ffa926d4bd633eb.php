<section class="section_padding gallery">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="section_title">
                    <span class="section_title_meta"><?php echo e(pagesetting('photo_gallery_sub_title')); ?></span>
                    <h2><?php echo e(pagesetting('photo_gallery_title')); ?></h2>
                </div>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginal34bfeb738a9333ee1e99213ed2facf2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal34bfeb738a9333ee1e99213ed2facf2f = $attributes; } ?>
<?php $component = App\View\Components\PhotoGallery::resolve(['column' => pagesetting('photo_gallery_column'),'count' => pagesetting('photo_gallery_count')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('photo-gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PhotoGallery::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal34bfeb738a9333ee1e99213ed2facf2f)): ?>
<?php $attributes = $__attributesOriginal34bfeb738a9333ee1e99213ed2facf2f; ?>
<?php unset($__attributesOriginal34bfeb738a9333ee1e99213ed2facf2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal34bfeb738a9333ee1e99213ed2facf2f)): ?>
<?php $component = $__componentOriginal34bfeb738a9333ee1e99213ed2facf2f; ?>
<?php unset($__componentOriginal34bfeb738a9333ee1e99213ed2facf2f); ?>
<?php endif; ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/photo-gallery/view.blade.php ENDPATH**/ ?>