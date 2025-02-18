<div class="row">
    <div class="col-md-12 text-<?php echo e(pagesetting('button_alignment')); ?>">
        <div class="events_loadmore">
            <?php if(!empty(pagesetting('button_items'))): ?>
                <?php $__currentLoopData = pagesetting('button_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a id="<?php echo e($item['button_id']); ?>" href="<?php echo e($item['button_link']); ?>"
                        target="<?php echo e($item['button_link_option']); ?>"
                        class="site_btn <?php echo e($item['button_type']); ?>"
                        style="padding: <?php echo e($item['button_size']); ?>; font-size: <?php echo e($item['button_text_size']); ?>;">
                        <?php echo e($item['button_text']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/button/view.blade.php ENDPATH**/ ?>