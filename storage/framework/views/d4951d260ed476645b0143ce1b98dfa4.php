<?php if($notices->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/notice-list')); ?>"><?php echo app('translator')->get('edulia.notice_list'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="noticeboard_inner_item">
            <a href="<?php echo e(route('frontend.notice-details', $notice->id)); ?>"
                class='noticeboard_inner_item_title'><?php echo e($notice->notice_title); ?></a>
            <p><?php echo e(__('edulia.published')); ?>: <?php echo e(date('d M, Y', strtotime($notice->notice_date))); ?></p>
            <a href="<?php echo e(route('frontend.notice-details', $notice->id)); ?>" class="site_btn_border"><i
                    class="fa fa-plus-circle"></i> <?php echo e(__('edulia.read_more')); ?></a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/notice.blade.php ENDPATH**/ ?>