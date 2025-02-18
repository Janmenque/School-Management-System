<?php if(isset($complaints)): ?>
    <div class="white-box">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-15"><?php echo app('translator')->get('admin.complaint'); ?> <?php echo app('translator')->get('admin.list'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
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
                    <div class="table-responsive">
                        <table id="table_id" class="table data-table Crm_table_active3" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                    <th><?php echo app('translator')->get('admin.complaint_by'); ?></th>
                                    <th><?php echo app('translator')->get('admin.complaint_type'); ?></th>
                                    <th><?php echo app('translator')->get('admin.source'); ?></th>
                                    <th><?php echo app('translator')->get('admin.phone'); ?></th>
                                    <th><?php echo app('translator')->get('admin.date'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = @$complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e(@$complaint->complaint_by); ?></td>
                                        <td><?php echo e(isset($complaint->complaint_type) ? @$complaint->complaintType->name : ''); ?>

                                        </td>
                                        <td><?php echo e(isset($complaint->complaint_source) ? @$complaint->complaintSource->name : ''); ?>

                                        </td>
        
                                        <td><?php echo e($complaint->phone); ?></td>
                                        <td data-sort="<?php echo e(strtotime(@$complaint->date)); ?>">
                                            <?php echo e(!empty(@$complaint->date) ? dateConvert(@$complaint->date) : ''); ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/inc/_complaint_list_tab.blade.php ENDPATH**/ ?>