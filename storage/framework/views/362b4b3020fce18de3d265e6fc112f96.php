<?php if($noticeBoards->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-light"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a class="text-warning" target="_blank"
            href="<?php echo e(URL::to('/notice-list')); ?>"><?php echo app('translator')->get('edulia.homepage_noticeboard'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $noticeBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="noticeboard_inner_item">
                <p><span><?php echo e(__('edulia.published')); ?>:</span> <?php echo e(dateConvert($notice->notice_date)); ?></p>
                <a href="<?php echo e(route('frontend.notice-details',$notice->id )); ?>" class='noticeboard_inner_item_title'>
                    <?php echo e($notice->notice_title); ?>

                </a>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/home-page-noticeboard.blade.php ENDPATH**/ ?>