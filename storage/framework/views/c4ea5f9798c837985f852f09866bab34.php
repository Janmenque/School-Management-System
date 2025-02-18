<div class="container section_padding px-3 px-sm-0">
    <div class="common_data_table">
        <h4 class="text-center mb-5"><?php echo e(pagesetting('heading')); ?></h4>
        <table class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th><?php echo e(pagesetting('form_download_col_1')); ?></th>
                    <th><?php echo e(pagesetting('form_download_col_2')); ?></th>
                    <th><?php echo e(pagesetting('form_download_col_3')); ?></th>
                    <th><?php echo e(pagesetting('form_download_col_4')); ?></th>
                    <th><?php echo e(pagesetting('form_download_col_5')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($component)) { $__componentOriginal11b7b3ad79c262e3100322624f1ba4cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal11b7b3ad79c262e3100322624f1ba4cc = $attributes; } ?>
<?php $component = App\View\Components\FormDownload::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-download'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormDownload::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal11b7b3ad79c262e3100322624f1ba4cc)): ?>
<?php $attributes = $__attributesOriginal11b7b3ad79c262e3100322624f1ba4cc; ?>
<?php unset($__attributesOriginal11b7b3ad79c262e3100322624f1ba4cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal11b7b3ad79c262e3100322624f1ba4cc)): ?>
<?php $component = $__componentOriginal11b7b3ad79c262e3100322624f1ba4cc; ?>
<?php unset($__componentOriginal11b7b3ad79c262e3100322624f1ba4cc); ?>
<?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/form-download/view.blade.php ENDPATH**/ ?>