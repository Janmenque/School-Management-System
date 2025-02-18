<div class="container section_padding px-3 px-sm-0">
    <div class="common_data_table">
        <h4 class="text-center mb-5"><?php echo e(pagesetting('front_exam_routine_heading')); ?></h4>
        <table class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th><?php echo e(pagesetting('front_exam_routine_sl')); ?></th>
                    <th><?php echo e(pagesetting('front_exam_routine_title')); ?></th>
                    <th><?php echo e(pagesetting('front_exam_routine_date')); ?></th>
                    <th><?php echo e(pagesetting('front_exam_routine_action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($component)) { $__componentOriginal13c0836cf34e808cb93920a1128eaf69 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13c0836cf34e808cb93920a1128eaf69 = $attributes; } ?>
<?php $component = App\View\Components\FrontendExamRoutine::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend-exam-routine'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontendExamRoutine::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13c0836cf34e808cb93920a1128eaf69)): ?>
<?php $attributes = $__attributesOriginal13c0836cf34e808cb93920a1128eaf69; ?>
<?php unset($__attributesOriginal13c0836cf34e808cb93920a1128eaf69); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13c0836cf34e808cb93920a1128eaf69)): ?>
<?php $component = $__componentOriginal13c0836cf34e808cb93920a1128eaf69; ?>
<?php unset($__componentOriginal13c0836cf34e808cb93920a1128eaf69); ?>
<?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/front-exam-routine/view.blade.php ENDPATH**/ ?>