<div class="col-lg-12 text-<?php echo e(pagesetting('icon_alignment')); ?> display-6">
    <nav>
        <ul>
            <li>
                <?php if(!empty(pagesetting('icon_items'))): ?>
                    <?php $__currentLoopData = pagesetting('icon_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $size = '';
                            if ($item['icon_size'] == 5) {
                                $size = '25px';
                            } elseif ($item['icon_size'] == 15) {
                                $size = '77px';
                            } elseif ($item['icon_size'] == 30) {
                                $size = '154px';
                            } elseif ($item['icon_size'] == 45) {
                                $size = '230px';
                            } else {
                                $size = '307px';
                            }
                        ?>
                        <?php if(!empty($item['icon_class'])): ?>
                            <a href="<?php echo e($item['icon_link']); ?>"
                                target='<?php echo e($item['icon_link_option']); ?>'>
                                <i style="font-size: <?php echo e($size); ?>" class="<?php echo e($item['icon_class']); ?>"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($item['icon_svg'])): ?>
                            <a href="<?php echo e($item['icon_link']); ?>"
                                target='<?php echo e($item['icon_link_option']); ?>'>
                                <img style="max-width: <?php echo e($item['icon_size']); ?>%;"
                                    src="<?php echo e($item['icon_svg'][0]['thumbnail']); ?>"
                                    alt="<?php echo e(__('edulia.SVG')); ?>">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/icon/view.blade.php ENDPATH**/ ?>