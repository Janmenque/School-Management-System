<div class="white-box">
    <?php if(@$my_leaves): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title mb-15">
                        <h3><?php echo app('translator')->get('leave.leave_types'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <table id="table_id" class="leave_table table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('common.type'); ?></th>
                                    <th><?php echo app('translator')->get('leave.remaining_days'); ?></th>
                                    <th><?php echo app('translator')->get('leave.extra_taken'); ?></th>
                                    <th><?php echo app('translator')->get('leave.leave_taken'); ?></th>
                                    <th><?php echo app('translator')->get('leave.leave_days'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $my_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $approved_leaves = App\SmLeaveRequest::approvedLeave($my_leave->id);
                                        $remaining_days = $my_leave->days - $approved_leaves;
                                        $extra_days = $remaining_days < 0 ? $approved_leaves - $my_leave->days : 0;
                                    ?>
                                    <tr>
                                        <td><?php echo e($my_leave->leaveType != '' ? $my_leave->leaveType->type : ''); ?></td>
                                        <td><?php echo e($remaining_days >= 0 ? $remaining_days : 0); ?></td>

                                        <td><?php echo e($remaining_days < 0 ? $approved_leaves - $my_leave->days : 0); ?></td>
                                        <td><?php echo e($approved_leaves); ?></td>
                                        <td><?php echo e($my_leave->days); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/inc/_leave_type.blade.php ENDPATH**/ ?>