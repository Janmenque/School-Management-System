<?php if($frontClassRoutines->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/front-class-routine')); ?>"><?php echo app('translator')->get('edulia.class_routine'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $frontClassRoutines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $frontClassRoutine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($frontClassRoutine->title); ?></td>
            <td><?php echo e(date('d/m/Y', strtotime($frontClassRoutine->publish_date))); ?></td>
            <?php if($frontClassRoutine->result_file): ?>
                <td class="pdf_download_option">
                    <a href="<?php echo e(asset($frontClassRoutine->result_file)); ?>">
                        <i class="fas fa-file"></i> <?php echo app('translator')->get('edulia.download'); ?>
                    </a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-class-routine.blade.php ENDPATH**/ ?>