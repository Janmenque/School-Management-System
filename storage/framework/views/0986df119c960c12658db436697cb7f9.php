<div class="download_app_section">
    <div class="row">
        <?php if(!empty(pagesetting('app_banner_image'))): ?>
            <div class="col-xxl-4 col-4 col-sm-5 download_app_container">
                <img src="<?php echo e(pagesetting('app_banner_image')[0]['thumbnail']); ?>" class="download_app_image"
                    alt="<?php echo e(__('edulia.Image')); ?>">
            </div>
        <?php endif; ?>
        <div class="col-xxl-8 col-8 col-sm-7 download_links_container">
            <div class="app_download_title"><?php echo e(pagesetting('app_banner_heading')); ?></div>
            <div class="feature_list">
                <?php if(!empty(pagesetting('app_banner_items'))): ?>
                    <ul class="d-flex flex-wrap">
                        <?php $__currentLoopData = pagesetting('app_banner_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php if(!empty($item['item_icon'])): ?>
                                    <img src="<?php echo e($item['item_icon'][0]['thumbnail']); ?>"
                                        alt="<?php echo e(__('edulia.Image')); ?>">
                                <?php endif; ?>
                                <?php echo e($item['item_heading']); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php if(!empty(pagesetting('app_download_items'))): ?>
                <div class="download_links d-flex flex-wrap row_gap">
                    <?php $__currentLoopData = pagesetting('app_download_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item['item_link']); ?>" target="_blank">
                            <?php if(!empty($item['item_image'])): ?>
                                <img src="<?php echo e($item['item_image'][0]['thumbnail']); ?>" alt="<?php echo e(__('edulia.Image')); ?>">
                            <?php endif; ?>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/app-banner/view.blade.php ENDPATH**/ ?>