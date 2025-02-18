<!-- about area start -->
<section class="section_padding about_us">
    <div class="container">
        <div class="row align-items-center <?php echo e(pagesetting('alignment_left_right')); ?>">
            <div class="col-xxl-6 col-md-6">
                <div class="about_us_img">
                    <div class="about_us_img_flex">
                        <?php if(!empty(pagesetting('about_area_img_1'))): ?>
                            <div class="about_us_img_item">
                                <div class="about_us_img_item_img large-img">
                                    <img src="<?php echo e(pagesetting('about_area_img_1')[0]['thumbnail']); ?>"
                                        alt="<?php echo e(__('edulia.Image')); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 offset-xxl-1 col-md-6">
                <div class="about_us_inner">
                    <h3><?php echo e(pagesetting('about_area_heading')); ?></h3>
                    <p><?php echo pagesetting('about_area_description'); ?></p>
                    <?php if(!empty(pagesetting('about_area_list_items'))): ?>
                        <div class="about_us_inner_list">
                            <?php $__currentLoopData = pagesetting('about_area_list_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="about_us_inner_list_item">
                                    <?php if(!empty($item['item_image'])): ?>
                                        <div class="about_us_inner_list_item_left">
                                            <div class="about_us_inner_list_item_icon">
                                                <img src="<?php echo e($item['item_image'][0]['thumbnail']); ?>" alt="">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="about_us_inner_list_item_right">
                                        <div class="about_us_inner_list_item_inner">
                                            <h4><?php echo e($item['item_heading']); ?></h4>
                                            <p><?php echo e($item['item_description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area end -->
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/about-section/view.blade.php ENDPATH**/ ?>