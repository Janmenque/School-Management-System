<div class="footer-item">
    <h5 style="color: <?php echo e(pagesetting('footer-widget-bg-color')); ?>"><?php echo e(pagesetting('footer-widget-heading')); ?></h5>
    <ul class="footer-item-links">
        <?php if(!empty(pagesetting('footer-widget-links'))): ?>
            <?php $__currentLoopData = pagesetting('footer-widget-links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(gv($link, 'footer-widget-url')); ?>" <?php echo e(gv($link, 'footer-widget-open-url') == 'new_tab' ? 'target="_blank"' : ''); ?> style="color: <?php echo e(pagesetting('footer-widget-bg-color')); ?>"><?php echo e(gv($link, 'footer-widget-label')); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/footer-widget/view.blade.php ENDPATH**/ ?>