<?php
    $generalSetting = generalSetting();
?>
<div class="footer-item">
    <?php if(pagesetting('footer_menu_image')): ?>
    <a href='<?php echo e(url('/')); ?>' class="footer-item-logo">
        <img src="<?php echo e(file_exists(pagesetting('footer_menu_image')[0]['thumbnail']) ? pagesetting('footer_menu_image')[0]['thumbnail'] : defaultLogo($generalSetting->logo)); ?>"
            alt="">
    </a>
    <?php endif; ?> 
    <p style="color: <?php echo e(pagesetting('footer-content-bg-color')); ?>">
        <?php echo pagesetting('footer-right-content-text'); ?>

    </p>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/footer-content/view.blade.php ENDPATH**/ ?>