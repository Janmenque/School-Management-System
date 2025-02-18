<?php if($frontExamRoutines->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/front-exam-routine')); ?>"><?php echo app('translator')->get('edulia.exam_routine'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $frontExamRoutines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $frontExamRoutine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($frontExamRoutine->title); ?></td>
            <td><?php echo e(date('d/m/Y', strtotime($frontExamRoutine->publish_date))); ?></td>
            <?php if($frontExamRoutine->result_file): ?>
                <td class="pdf_download_option">
                    <a href="<?php echo e(asset($frontExamRoutine->result_file)); ?>">
                        <i class="fas fa-file"></i> <?php echo app('translator')->get('edulia.download'); ?>
                    </a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-exam-routine.blade.php ENDPATH**/ ?>