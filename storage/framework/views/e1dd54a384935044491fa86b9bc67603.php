<tbody>
    <?php if($frontAcademicCalendars->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
        <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
                href="<?php echo e(URL::to('/front-academic-calendar')); ?>"><?php echo app('translator')->get('edulia.frontend_academic_calendar'); ?></a></p>
    <?php else: ?>
        <?php $__currentLoopData = $frontAcademicCalendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key + 1); ?></td>
                <td><?php echo e($data->title); ?></td>
                <td><?php echo e(date('d/m/Y', strtotime($data->publish_date))); ?></td>
                <?php if($data->calendar_file): ?>
                    <td class="pdf_download_option">
                        <a href="<?php echo e(asset($data->calendar_file)); ?>">
                            <i class="fas fa-download"></i> <?php echo app('translator')->get('edulia.download'); ?>
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</tbody>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-academic-calendar.blade.php ENDPATH**/ ?>