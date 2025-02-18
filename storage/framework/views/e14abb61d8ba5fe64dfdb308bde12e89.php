<div class="col-lg-12">
    <div class="d-flex <?php echo e(pagesetting('upload_image_alignment') ? (pagesetting('upload_image_alignment') == 'center' ? 'justify-content-center' : (pagesetting('upload_image_alignment') == 'left' ? 'justify-content-start' : 'justify-content-end')) : ''); ?>">
        <?php if(pagesetting('upload_image_file')): ?>
            <a href="<?php echo e(pagesetting('upload_image_link')); ?>">
                <img src="<?php echo e(pagesetting('upload_image_file')[0]['thumbnail']); ?>" alt="" width="<?php echo e(pagesetting('upload_image_width_percent')); ?>%">
            </a>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/upload-image/view.blade.php ENDPATH**/ ?>