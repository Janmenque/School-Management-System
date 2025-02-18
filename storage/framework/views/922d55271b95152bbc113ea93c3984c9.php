<div class="mt-md-5 px-4">
    <?php if(!empty(pagesetting('speech_heading'))): ?>
        <h1 class="text-center mb-3 mb-md-5 mt-5 speech-title"><?php echo e(pagesetting('speech_heading')); ?></h1>
    <?php endif; ?>
    <div class="row align-items-center single-speech">
        <div class="col-md-12">
            <?php if(!empty(pagesetting('speech_user_image'))): ?>
                <div class="about_us_img">
                    <div style="width: 40%; height: 100%;" class="about_us_img_inner">
                        <img src="<?php echo e(pagesetting('speech_user_image')[0]['thumbnail']); ?>"
                            alt="<?php echo e(pagesetting('speech_user_name')); ?>">
                    </div>
                </div>
            <?php endif; ?>
            <div class="speech_of mb-4">
                <?php if(!empty(pagesetting('speech_heading'))): ?>
                    <h3 class="text-center"><?php echo e(pagesetting('speech_user_name')); ?></h3>
                <?php endif; ?>
                <?php if(!empty(pagesetting('speech_user_designation'))): ?>
                    <p class="text-center"><?php echo e(pagesetting('speech_user_designation')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="speech_inner">
                <?php if(!empty(pagesetting('speech_description'))): ?>
                    <p class="mb-4"><?php echo pagesetting('speech_description'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/speech/view.blade.php ENDPATH**/ ?>