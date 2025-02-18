<div role="tabpanel" class="tab-pane fade" id="leaves">
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table school-table-style" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="nowrap"><?php echo app('translator')->get('leave.leave_type'); ?></th>
                                <th class="nowrap"><?php echo app('translator')->get('leave.leave_from'); ?> </th>
                                <th class="nowrap"><?php echo app('translator')->get('leave.leave_to'); ?></th>
                                <th class="nowrap"><?php echo app('translator')->get('leave.apply_date'); ?></th>
                                <th class="nowrap"><?php echo app('translator')->get('common.status'); ?></th>
                                <th class="nowrap"><?php echo app('translator')->get('common.action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $diff = ''; ?>
                            <?php if(isset($student_detail)): ?>
                                <?php if(count($student_detail->studentLeave) > 0): ?>
                                    <?php $__currentLoopData = $student_detail->studentLeave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="nowrap"><?php echo e(@$value->leaveType->type); ?></td>
                                            <td class="nowrap">
                                                <?php echo e($value->leave_from != '' ? dateConvert($value->leave_from) : ''); ?></td>
                                            <td class="nowrap">
                                                <?php echo e($value->leave_to != '' ? dateConvert($value->leave_to) : ''); ?></td>
                                            <td class="nowrap">
                                                <?php echo e($value->apply_date != '' ? dateConvert($value->apply_date) : ''); ?></td>
                                            <td class="nowrap">
                                                <?php if($value->approve_status == 'P'): ?>
                                                    <button class="primary-btn small bg-warning text-white border-0">
                                                        <?php echo app('translator')->get('student.pending'); ?></button>
                                                <?php endif; ?>

                                                <?php if($value->approve_status == 'A'): ?>
                                                    <button class="primary-btn small bg-success text-white border-0">
                                                        <?php echo app('translator')->get('student.approved'); ?></button>
                                                <?php endif; ?>

                                                <?php if($value->approve_status == 'C'): ?>
                                                    <button class="primary-btn small bg-danger text-white border-0">
                                                        <?php echo app('translator')->get('common.cancelled'); ?></button>
                                                <?php endif; ?>
                                            </td>
                                            <td class="nowrap">
                                                <a class="modalLink" data-modal-size="modal-md"
                                                    title="<?php echo app('translator')->get('student.view'); ?> <?php echo app('translator')->get('student.leave'); ?> <?php echo app('translator')->get('student.details'); ?>"
                                                    href="<?php echo e(url('view-leave-details-apply', $value->id)); ?>"><button
                                                        class="primary-btn small tr-bg"> <?php echo app('translator')->get('student.view'); ?> </button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo app('translator')->get('student.not_leaves_data'); ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/inc/_leave_tab.blade.php ENDPATH**/ ?>