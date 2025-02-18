<section class="section_padding_off feature">
    <div class="container">
        <div class="row">

            <?php if(!empty(pagesetting('feature_area_items'))): ?>
                <?php
                    $counts = count(pagesetting('feature_area_items'));
                    $column = 12 / $counts;
                ?>
                <?php $__currentLoopData = pagesetting('feature_area_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-<?php echo e($column); ?>">
                        <div class="feature_item">
                            <div class="feature_item_left">
                                <?php if(!empty(gv($item, 'item_image')[0]['thumbnail'])): ?>
                                    <div class="feature_item_icon">
                                        <img style="height: 60px; width:70px"
                                            src="<?php echo e(gv($item, 'item_image')[0]['thumbnail']); ?>"
                                            alt="<?php echo e(__('edulia.Image')); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="feature_item_right">
                                <div class="feature_item_inner">
                                    <h4><?php echo e($item['item_heading']); ?></h4>
                                    <p><?php echo $item['item_description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/feature-area/view.blade.php ENDPATH**/ ?>