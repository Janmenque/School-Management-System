<div class="container section_padding px-3 px-sm-0">
    <div class="user_list_container">
        <div class="common_data_table profile_list">
            <table class="user_list_table table display nowrap" style="width:100%">
                <thead class="text-nowrap">
                    <tr>
                        <th><?php echo e(pagesetting('donor_col_1')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_2')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_3')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_4')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_5')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_6')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_7')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_8')); ?></th>
                        <th><?php echo e(pagesetting('donor_col_9')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($component)) { $__componentOriginal099c7dd5e74a289ba160c3c043634c70 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal099c7dd5e74a289ba160c3c043634c70 = $attributes; } ?>
<?php $component = App\View\Components\Donor::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('donor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Donor::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal099c7dd5e74a289ba160c3c043634c70)): ?>
<?php $attributes = $__attributesOriginal099c7dd5e74a289ba160c3c043634c70; ?>
<?php unset($__attributesOriginal099c7dd5e74a289ba160c3c043634c70); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal099c7dd5e74a289ba160c3c043634c70)): ?>
<?php $component = $__componentOriginal099c7dd5e74a289ba160c3c043634c70; ?>
<?php unset($__componentOriginal099c7dd5e74a289ba160c3c043634c70); ?>
<?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/donor/view.blade.php ENDPATH**/ ?>