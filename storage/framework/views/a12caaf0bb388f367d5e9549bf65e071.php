<div class="row">
    <div class="col-lg-12 no-gutters d-flex align-items-center justify-content-between">
        <div class="main-title">
            <h3 class="mb-15"><?php echo app('translator')->get('fees.fees'); ?>
            </h3>
        </div>
    </div>
    <div class="col-lg-12 student-details up_admin_visitor">
        <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">
            <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item mb-0">
                    <a class="nav-link mb-0 <?php if($key == 0): ?> active <?php endif; ?> "
                        href="#feesTab<?php echo e($record->id); ?>" role="tab"
                        data-toggle="tab"><?php echo e(moduleStatusCheck('University') ? $record->unSemesterLabel->name : $record->class->class_name); ?>

                        (<?php echo e($record->section->section_name); ?>)
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content">
            <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div role="tabpanel"
                    class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                    id="feesTab<?php echo e($record->id); ?>">
                    <?php if(generalSetting()->fees_status == 0): ?>
                        <?php if ($__env->exists('backEnd.studentPanel.inc._student_direct_fees')) echo $__env->make('backEnd.studentPanel.inc._student_direct_fees', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
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
                                <table id="default_table" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('common.student'); ?></th>
                                            <th><?php echo app('translator')->get('student.class_section'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                            <th><?php echo app('translator')->get('fees::feesModule.waiver'); ?></th>
                                            <th><?php echo app('translator')->get('fees.fine'); ?></th>
                                            <th><?php echo app('translator')->get('fees.paid'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.balance'); ?></th>
                                            <th><?php echo app('translator')->get('common.status'); ?></th>
                                            <th><?php echo app('translator')->get('common.date'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $record->feesInvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $studentInvoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $amount = $studentInvoice->Tamount;
                                                $weaver = $studentInvoice->Tweaver;
                                                $fine = $studentInvoice->Tfine;
                                                $paid_amount = $studentInvoice->Tpaidamount;
                                                $sub_total = $studentInvoice->Tsubtotal;
                                                $balance = $amount + $fine - ($paid_amount + $weaver);
                                            ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view'])); ?>"
                                                        target="_blank">
                                                        <?php echo e(@$student_detail->full_name); ?>

                                                    </a>
                                                </td>
                                                <td><?php echo e(@$record->class->class_name); ?>

                                                    (<?php echo e(@$record->section->section_name); ?>)
                                                </td>
                                                <td><?php echo e($currency); ?><?php echo e($amount); ?></td>
                                                <td><?php echo e($currency); ?><?php echo e($weaver); ?></td>
                                                <td><?php echo e($currency); ?><?php echo e($fine); ?></td>
                                                <td><?php echo e($currency); ?><?php echo e($paid_amount); ?></td>
                                                <td><?php echo e($currency); ?><?php echo e($balance); ?></td>
                                                <td>
                                                    <?php if($balance == 0): ?>
                                                        <button
                                                            class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('fees.paid'); ?></button>
                                                    <?php else: ?>
                                                        <?php if($paid_amount > 0): ?>
                                                            <button
                                                                class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('fees.partial'); ?></button>
                                                        <?php else: ?>
                                                            <button
                                                                class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('fees.unpaid'); ?></button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(dateConvert($studentInvoice->create_date)); ?></td>
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
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/inc/_fees_info.blade.php ENDPATH**/ ?>