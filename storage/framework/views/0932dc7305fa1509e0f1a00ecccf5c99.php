<?php if($formDownloads->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/form-download')); ?>"><?php echo app('translator')->get('edulia.form_download'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $formDownloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td><?php echo e($data->title); ?></td>
            <td><?php echo e($data->short_description); ?></td>
            <td><?php echo e(date('d/m/Y', strtotime($data->publish_date))); ?></td>
            <?php if($data->file): ?>
                <td class="pdf_download_option">
                    <a href="<?php echo e(asset($data->file)); ?>">
                        <i class="fas fa-file"></i> <?php echo app('translator')->get('edulia.download'); ?>
                    </a>
                </td>
            <?php endif; ?>
            <?php if($data->link): ?>
                <td class="pdf_download_option">
                    <a href="<?php echo e($data->link); ?>"
                        target="_blank">
                        <i class="fas fa-link"></i> <?php echo app('translator')->get('edulia.link'); ?>
                    </a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/form-download.blade.php ENDPATH**/ ?>