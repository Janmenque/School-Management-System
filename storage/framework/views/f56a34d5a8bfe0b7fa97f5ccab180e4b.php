<div role="tabpanel" class="tab-pane fade" id="studentFees">

    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="no-search no-paginate no-table-info mb-2">
            <div class="row">
                <div class="col-lg-3">
                    <div class="main-title">
                        <h3 class="mb-10">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php echo e($record->semesterLabel->name); ?> (<?php echo e($record->unSection->section_name); ?>) -
                                <?php echo e(@$record->unAcademic->name); ?>

                            <?php else: ?>
                                <?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>)
                            <?php endif; ?>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6 mb-10">
                    <table class="table school-table-style res_scrol school-table-up-style"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                <th><?php echo app('translator')->get('fees.assigned_date'); ?></th>
                                <th><?php echo app('translator')->get('fees.amount'); ?></th>
                            </tr>
                        </thead>
                        <?php $gt_fees = 0; ?>
                        <tbody>
                            <?php $__currentLoopData = $record->fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $gt_fees += @$assign_fees->feesGroupMaster->amount; ?>
                                <tr>
                                    <td><?php echo e(@$assign_fees->feesGroupMaster->feesTypes->name); ?></td>
                                    <td><?php echo e(dateConvert($assign_fees->created_at)); ?></td>
                                    <td>
                                        <?php echo e(currency_format(@$assign_fees->feesGroupMaster->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <tfoot>
                            <tr>
                                <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                <th></th>
                                <th><?php echo e(currency_format($gt_fees)); ?></th>
                            </tr>
                        </tfoot>

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-3 mb-10">
                    <?php if(moduleStatusCheck('University')): ?>
                        <a class="primary-btn small fix-gr-bg modalLink" data-modal-size="modal-lg"
                            title="<?php echo app('translator')->get('fees.add_fees'); ?>"
                            href="<?php echo e(route('university.un-total-fees-modal', [$record->id])); ?>"> <i
                                class="ti-plus pr-2"> </i> <?php echo app('translator')->get('fees.add_fees'); ?> </a>
                    <?php elseif(directFees()): ?>
                        <a class="primary-btn small fix-gr-bg modalLink" data-modal-size="modal-lg"
                            title="<?php echo app('translator')->get('fees.add_fees'); ?>" href="<?php echo e(route('direct-fees-total-payment', [$record->id])); ?>">
                            <i class="ti-plus pr-2"> </i> <?php echo app('translator')->get('fees.add_fees'); ?> </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="table-responsive">
                <?php if(moduleStatusCheck('University')): ?>
                    <?php if ($__env->exists('university::include.studentFeesTableView')) echo $__env->make('university::include.studentFeesTableView', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif(directFees()): ?>
                    <?php if ($__env->exists('backEnd.feesCollection.directFees.studentDirectFeesTableView')) echo $__env->make('backEnd.feesCollection.directFees.studentDirectFeesTableView', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <table class="table school-table-style res_scrol" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('fees.fees_group'); ?></th>
                                <th><?php echo app('translator')->get('fees.fees_code'); ?></th>
                                <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                                <th><?php echo app('translator')->get('fees.Status'); ?></th>
                                <th><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(@$currency); ?>)</th>
                                <th><?php echo app('translator')->get('fees.payment_ID'); ?></th>
                                <th><?php echo app('translator')->get('fees.mode'); ?></th>
                                <th><?php echo app('translator')->get('common.date'); ?></th>
                                <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(@$currency); ?>)</th>
                                <th><?php echo app('translator')->get('fees.fine'); ?> (<?php echo e(@$currency); ?>)</th>
                                <th><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(@$currency); ?>)</th>
                                <th><?php echo app('translator')->get('fees.balance'); ?> (<?php echo e(@$currency); ?>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                @$grand_total = 0;
                                @$total_fine = 0;
                                @$total_discount = 0;
                                @$total_paid = 0;
                                @$total_grand_paid = 0;
                                @$total_balance = 0;
                            ?>
                            <?php $__currentLoopData = $record->fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($fees_assigned->record_id == $record->id): ?>
                                    <?php
                                        @$grand_total += @$fees_assigned->feesGroupMaster->amount;
                                    ?>
                                    <?php
                                        @$discount_amount = $fees_assigned->applied_discount;
                                        @$total_discount += @$discount_amount;
                                        @$student_id = @$fees_assigned->student_id;
                                    ?>
                                    <?php
                                        @$paid = App\SmFeesAssign::discountSum(@$fees_assigned->student_id, @$fees_assigned->feesGroupMaster->feesTypes->id, 'amount', $fees_assigned->record_id);
                                        @$total_grand_paid += @$paid;
                                    ?>
                                    <?php
                                        @$fine = App\SmFeesAssign::discountSum(@$fees_assigned->student_id, @$fees_assigned->feesGroupMaster->feesTypes->id, 'fine', $fees_assigned->record_id);
                                        @$total_fine += @$fine;
                                    ?>

                                    <?php
                                        @$total_paid = @$discount_amount + @$paid;
                                    ?>
                                    <tr>
                                        <td><?php echo e(@$fees_assigned->feesGroupMaster->feesGroups != '' ? @$fees_assigned->feesGroupMaster->feesGroups->name : ''); ?>

                                        </td>
                                        <td><?php echo e(@$fees_assigned->feesGroupMaster->feesTypes != '' ? @$fees_assigned->feesGroupMaster->feesTypes->name : ''); ?>

                                        </td>
                                        <td>
                                            <?php if(!empty(@$fees_assigned->feesGroupMaster)): ?>
                                                <?php echo e(@$fees_assigned->feesGroupMaster->date != '' ? dateConvert(@$fees_assigned->feesGroupMaster->date) : ''); ?>

                                            <?php endif; ?>
                                        </td>
                                        <?php
                                            $total_payable_amount = $fees_assigned->fees_amount;
                                            $rest_amount = $fees_assigned->feesGroupMaster->amount - $total_paid;
                                            $balance_amount = number_format($rest_amount + $fine, 2, '.', '');
                                            $total_balance += $balance_amount;
                                        ?>
                                        <td>
                                            <?php if($balance_amount == 0): ?>
                                                <button
                                                    class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('fees.paid'); ?></button>
                                            <?php elseif($paid != 0): ?>
                                                <button
                                                    class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('fees.partial'); ?></button>
                                            <?php elseif($paid == 0): ?>
                                                <button
                                                    class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('fees.unpaid'); ?></button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo number_format($fees_assigned->feesGroupMaster->amount, 2, '.', '');
                                            ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php echo e(@$discount_amount); ?> </td>
                                        <td><?php echo e(@$fine); ?></td>
                                        <td><?php echo e(@$paid); ?></td>
                                        <td>
                                            <?php echo @$balance_amount; ?>
                                        </td>
                                    </tr>
                                    <?php
                                        @$payments = App\SmFeesAssign::feesPayment(@$fees_assigned->feesGroupMaster->feesTypes->id, @$fees_assigned->student_id, $fees_assigned->record_id);
                                        $i = 0;
                                    ?>
                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><img
                                                    src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>"></td>
                                            <td>
                                                <?php
                                                    @$created_by = App\User::find(@$payment->created_by);
                                                ?>
                                                <?php if(@$created_by != ''): ?>
                                                    <a href="#" data-toggle="tooltip" data-placement="right"
                                                        title="<?php echo e('Collected By: ' . @$created_by->full_name); ?>"><?php echo e(@$payment->fees_type_id . '/' . @$payment->id); ?></a>
                                            </td>
                                    <?php endif; ?>
                                    <td><?php echo e($payment->payment_mode); ?></td>
                                    <td class="nowrap">
                                        <?php echo e(@$payment->payment_date != '' ? dateConvert(@$payment->payment_date) : ''); ?>

                                    </td>
                                    <td><?php echo e(@$payment->discount_amount); ?></td>
                                    <td>
                                        <?php echo e($payment->fine); ?>

                                        <?php if($payment->fine != 0): ?>
                                            <?php if(strlen($payment->fine_title) > 14): ?>
                                                <span class="text-danger nowrap" title="<?php echo e($payment->fine_title); ?>">
                                                    (<?php echo e(substr($payment->fine_title, 0, 15) . '...'); ?>)
                                                </span>
                                            <?php else: ?>
                                                <?php if($payment->fine_title == ''): ?>
                                                    <?php echo e($payment->fine_title); ?>

                                                <?php else: ?>
                                                    <span class="text-danger nowrap">
                                                        (<?php echo e($payment->fine_title); ?>)
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(@$payment->amount); ?></td>
                                    <td></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(@$currency); ?>)</th>
                        <th></th>
                        <th><?php echo e(@$grand_total); ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php echo e(@$total_discount); ?></th>
                        <th><?php echo e(@$total_fine); ?></th>
                        <th><?php echo e(@$total_grand_paid); ?></th>
                        <th><?php echo e(number_format($total_balance, 2, '.', '')); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
                </table>
    <?php endif; ?>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/inc/_fees_tab.blade.php ENDPATH**/ ?>