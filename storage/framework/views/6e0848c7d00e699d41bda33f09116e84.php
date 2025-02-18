<?php $__env->startPush('css'); ?>
<style>
    .table-responsive .table-alignment tr th, .table-responsive .table-alignment tr td{
        min-width: 150px;
    }
</style>
<?php $__env->stopPush(); ?>

<div role="tabpanel" class="tab-pane fade" id="studentBehaviourRecord">
    <div>
        <div class="table-responsive">
            <table class="table table-alignment" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th width="15%"><?php echo app('translator')->get('behaviourRecords.title'); ?></th>
                    <th width="10%"><?php echo app('translator')->get('behaviourRecords.point'); ?></th>
                    <th width="10%"><?php echo app('translator')->get('behaviourRecords.date'); ?></th>
                    <th width="45%"><?php echo app('translator')->get('behaviourRecords.description'); ?></th>
                    <th width="10%"><?php echo app('translator')->get('behaviourRecords.assigned_by'); ?></th>
                    <th width="10%"><?php echo app('translator')->get('behaviourRecords.actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $studentBehaviourRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td width="15%"><?php echo e($data->incident->title); ?></td>
                        <td width="10%"><?php echo e($data->incident->point); ?></td>
                        <td width="10%"><?php echo e(dateconvert($data->incident->created_at)); ?></td>
                        <td width="45%"><?php echo e($data->incident->description); ?></td>
                        <td width="10%"><?php echo e($data->user->full_name); ?></td>
                        <td width="10%">
                            <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if(auth()->user()->role_id == 1): ?>
                                    <a class="dropdown-item"
                                        href="<?php echo e(route('behaviour_records.incident_comment', [$data->id])); ?>"><?php echo app('translator')->get('behaviourRecords.comment'); ?></a>
                                <?php elseif(auth()->user()->role_id == 2): ?>
                                    <?php if($behaviourRecordSetting->student_comment == 1): ?>
                                        <a class="dropdown-item"
                                            href="<?php echo e(route('behaviour_records.incident_comment', [$data->id])); ?>"><?php echo app('translator')->get('behaviourRecords.comment'); ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($behaviourRecordSetting->parent_comment == 1): ?>
                                        <a class="dropdown-item"
                                            href="<?php echo e(route('behaviour_records.incident_comment', [$data->id])); ?>"><?php echo app('translator')->get('behaviourRecords.comment'); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/inc/_student_behaviour_record_tab.blade.php ENDPATH**/ ?>