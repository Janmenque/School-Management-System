<!-- cta area start -->
<section class="section_padding_off cta_area"
    <?php if(!empty(pagesetting('counter_image'))): ?> style="background-image: url('<?php echo e(pagesetting('counter_image')[0]['thumbnail']); ?>')" <?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section_title">
                    <h2><?php echo e(pagesetting('counter_heading')); ?></h2>
                    <p><?php echo pagesetting('counter_description'); ?></p>
                </div>
                <div class="cta_area_inner">
                    <a href="#" class="boxed_btn"><i
                            class="fa fa-plus-circle"></i><?php echo e(pagesetting('view_course_button')); ?></a>
                    <a href="#" class="boxed_btn"><i
                            class="fa fa-user-plus"></i><?php echo e(pagesetting('contact_us_button')); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cta area end -->

<!-- funfact area start -->
<section class="section_padding_off funfact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row text-center" id='counters'>
                    <?php if(!empty(pagesetting('counter_list_items'))): ?>
                        <?php $__currentLoopData = pagesetting('counter_list_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="funfact_item">
                                    <h3><span class="counter" data-TargetNum="<?php echo e($item['item_number']); ?>"
                                            data-Speed="2000"><?php echo e($item['item_number']); ?></span>
                                    </h3>
                                    <p><?php echo e($item['item_heading']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (! $__env->hasRenderedOnce('9efe8049-52b9-4b9d-8d45-496e21d35d71')): $__env->markAsRenderedOnce('9efe8049-52b9-4b9d-8d45-496e21d35d71');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/edulia/packages/animate-number/multi-animated-counter.min.js')); ?>"></script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/counter/view.blade.php ENDPATH**/ ?>