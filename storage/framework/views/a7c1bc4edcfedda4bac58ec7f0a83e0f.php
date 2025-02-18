<div class="container section_padding px-3 px-sm-0">
    <div class="common_data_table">
        <h4 class="text-center mb-5"><?php echo e(pagesetting('academic_calendar_heading')); ?></h4>
        <table class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th><?php echo e(pagesetting('academic_calendar_sl')); ?></th>
                    <th><?php echo e(pagesetting('academic_calendar_title')); ?></th>
                    <th><?php echo e(pagesetting('academic_calendar_date')); ?></th>
                    <th><?php echo e(pagesetting('academic_calendar_action')); ?></th>
                </tr>
            </thead>
            <?php if (isset($component)) { $__componentOriginal595c961124b327633785bbe1bb4655a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal595c961124b327633785bbe1bb4655a5 = $attributes; } ?>
<?php $component = App\View\Components\FrontendAcademicCalendar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend-academic-calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontendAcademicCalendar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal595c961124b327633785bbe1bb4655a5)): ?>
<?php $attributes = $__attributesOriginal595c961124b327633785bbe1bb4655a5; ?>
<?php unset($__attributesOriginal595c961124b327633785bbe1bb4655a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal595c961124b327633785bbe1bb4655a5)): ?>
<?php $component = $__componentOriginal595c961124b327633785bbe1bb4655a5; ?>
<?php unset($__componentOriginal595c961124b327633785bbe1bb4655a5); ?>
<?php endif; ?>
        </table>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/academic-calendar/view.blade.php ENDPATH**/ ?>