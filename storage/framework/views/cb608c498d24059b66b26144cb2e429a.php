<div class="container section_padding px-3 px-sm-0">
    <div class="common_data_table">
        <h4 class="text-center mb-5"><?php echo e(pagesetting('front_result_heading')); ?></h4>
        <table class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th><?php echo e(pagesetting('front_result_sl')); ?></th>
                    <th><?php echo e(pagesetting('front_result_title')); ?></th>
                    <th><?php echo e(pagesetting('front_result_date')); ?></th>
                    <th><?php echo e(pagesetting('front_result_action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($component)) { $__componentOriginal0d27f6cefabb0057de8fa2c09aec583e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d27f6cefabb0057de8fa2c09aec583e = $attributes; } ?>
<?php $component = App\View\Components\FrontendResult::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend-result'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontendResult::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d27f6cefabb0057de8fa2c09aec583e)): ?>
<?php $attributes = $__attributesOriginal0d27f6cefabb0057de8fa2c09aec583e; ?>
<?php unset($__attributesOriginal0d27f6cefabb0057de8fa2c09aec583e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d27f6cefabb0057de8fa2c09aec583e)): ?>
<?php $component = $__componentOriginal0d27f6cefabb0057de8fa2c09aec583e; ?>
<?php unset($__componentOriginal0d27f6cefabb0057de8fa2c09aec583e); ?>
<?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/front-result/view.blade.php ENDPATH**/ ?>