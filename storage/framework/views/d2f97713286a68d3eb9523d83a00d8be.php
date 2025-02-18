
<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.notice_details')); ?> <span><a
                                    href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /
                                <?php echo e(__('edulia.notice_details')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_padding noticeboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="noticeboard_details">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="noticeboard_details_wrapper">
                                    <h4><?php echo e($notice_detail->notice_title); ?>

                                        <span><?php echo e(date('d M, Y', strtotime($notice_detail->notice_date))); ?></span>
                                    </h4>
                                    <p><?php echo e($notice_detail->notice_message); ?></p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="noticeboard_inner">
                                    <div class="noticeboard_inner_head">
                                        <h5><?php echo e(__('edulia.noticeboard')); ?></h5>
                                    </div>
                                    <div class='noticeboard_inner_wrapper'>
                                        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="noticeboard_inner_item">
                                                <a href="<?php echo e(route('frontend.notice-details', $notice->id)); ?>"
                                                    class="noticeboard_inner_item_title"><?php echo e($notice->notice_title); ?></a>
                                                <p><?php echo e(__('edulia.published')); ?>:
                                                    <?php echo e(date('d M, Y', strtotime($notice->notice_date))); ?></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('d04d1a10-939a-4002-ace7-de8fc182e7ec')): $__env->markAsRenderedOnce('d04d1a10-939a-4002-ace7-de8fc182e7ec');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.newsReplyBtn', function(e) {
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                $('.replyDiv_' + commentId).slideToggle();
                $('.normalComment').slideToggle();
                $('.replyDiv_' + commentId).find('.parentId').val(commentId);
            })
        })
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/frontEnd/theme/edulia/notice/single_notice.blade.php ENDPATH**/ ?>