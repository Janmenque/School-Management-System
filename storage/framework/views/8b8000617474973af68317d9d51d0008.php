<div class="owl-carousel">
    <?php if($speechSliders->isNotEmpty()): ?>
        <?php $__currentLoopData = $speechSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speechSlider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="single_speech_item">
                <div class="speaker_photo">
                    <img src="<?php echo e(asset(@$speechSlider->image)); ?>" alt="photo">
                </div>
                <div class="speaker_info"><?php echo e(@$speechSlider->designation); ?><?php echo app('translator')->get('edulia.\'s_speech'); ?></div>

                <div class="speech">
                    <?php echo e(mb_strimwidth(@$speechSlider->speech, 0, 50, "...")); ?>

                </div>

                <a href="<?php echo e(route('frontend.speech-slider', $speechSlider->id)); ?>" class="speech_details"><?php echo app('translator')->get('edulia.details'); ?></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/sm-speech-slider.blade.php ENDPATH**/ ?>