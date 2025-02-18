<section class="section_padding_bottom index noticeboard">
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="section_title">
                <h2><?php echo e(pagesetting('opening_hour_heading')); ?></h2>
                <p><?php echo pagesetting('opening_hour_description'); ?></p>
            </div>
            <div class="noticeboard_inner">
                <?php if(!empty(pagesetting('opening_hour_items'))): ?>
                    <?php $__currentLoopData = pagesetting('opening_hour_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class='noticeboard_inner_weekinfo'>
                            <li><span><?php echo e($item['opening_hour_item_day']); ?><label>:</label></span>
                                <span><?php echo e($item['opening_hour_start']); ?> <?php echo e(gv($item, 'opening_hour_end') ? '- '.gv($item, 'opening_hour_end') : ''); ?></span>
                            </li>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/opening-hour/view.blade.php ENDPATH**/ ?>