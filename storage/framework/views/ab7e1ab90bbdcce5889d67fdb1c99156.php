<div class="container section_padding px-3 px-sm-0">
    <div class="common_data_table">
        <h4 class="text-center mb-5"><?php echo e(pagesetting('front_class_routine_heading')); ?></h4>
        <table class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th><?php echo e(pagesetting('front_class_routine_sl')); ?></th>
                    <th><?php echo e(pagesetting('front_class_routine_title')); ?></th>
                    <th><?php echo e(pagesetting('front_class_routine_date')); ?></th>
                    <th><?php echo e(pagesetting('front_class_routine_action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($component)) { $__componentOriginala7bad96ee5ff592fd0557920ab63af31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7bad96ee5ff592fd0557920ab63af31 = $attributes; } ?>
<?php $component = App\View\Components\FrontendClassRoutine::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend-class-routine'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontendClassRoutine::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala7bad96ee5ff592fd0557920ab63af31)): ?>
<?php $attributes = $__attributesOriginala7bad96ee5ff592fd0557920ab63af31; ?>
<?php unset($__attributesOriginala7bad96ee5ff592fd0557920ab63af31); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7bad96ee5ff592fd0557920ab63af31)): ?>
<?php $component = $__componentOriginala7bad96ee5ff592fd0557920ab63af31; ?>
<?php unset($__componentOriginala7bad96ee5ff592fd0557920ab63af31); ?>
<?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/front-class-routine/view.blade.php ENDPATH**/ ?>