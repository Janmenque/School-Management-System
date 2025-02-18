<?php if($frontResults->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/front-result')); ?>"><?php echo app('translator')->get('edulia.result'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $frontResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $frontResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($frontResult->title); ?></td>
            <td><?php echo e(date('d/m/Y', strtotime($frontResult->publish_date))); ?></td>
            <?php if($frontResult->result_file): ?>
                <td class="pdf_download_option">
                    <a href="<?php echo e(asset($frontResult->result_file)); ?>">
                        <i class="fas fa-file"></i> <?php echo app('translator')->get('edulia.download'); ?>
                    </a>
                </td>
            <?php endif; ?>
            <?php if($frontResult->link): ?>
                <td class="pdf_download_option">
                    <a href="<?php echo e($frontResult->link); ?>"
                        target="_blank">
                        <i class="fas fa-link"></i> <?php echo app('translator')->get('edulia.link'); ?>
                    </a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-result.blade.php ENDPATH**/ ?>