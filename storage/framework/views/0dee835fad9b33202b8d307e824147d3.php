<section class="section_padding facilities">
    <div class="container">
        <?php if(pagesetting('facilities_image_align') == 'right'): ?>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="facilities_inner_text">
                        <h3><?php echo e(pagesetting('facilities_heading')); ?></h3>
                        <?php echo pagesetting('facilities_description'); ?>

                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6">
                    <?php if(pagesetting('facilities_image_upload')): ?>
                        <div class="facilities_img">
                            <img src="<?php echo e(pagesetting('facilities_image_upload')[0]['thumbnail']); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="row align-items-center mobile-column-reverse">
                <div class="col-md-6">
                    <?php if(pagesetting('facilities_image_upload')): ?>
                        <div class="facilities_img">
                            <img src="<?php echo e(pagesetting('facilities_image_upload')[0]['thumbnail']); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="facilities_inner_text facilities_inner_right">
                        <h3><?php echo e(pagesetting('facilities_heading')); ?></h3>
                        <?php echo pagesetting('facilities_description'); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/facilities/view.blade.php ENDPATH**/ ?>