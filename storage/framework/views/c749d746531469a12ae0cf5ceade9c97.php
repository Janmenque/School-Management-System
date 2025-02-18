<div class="tesimonials_slider owl-carousel">
    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tesimonials_slider_item"
            data-dot="<button role='button' class='owl-dot'><img src='<?php echo e(file_exists(@$testimonial->image) ? asset($testimonial->image) : asset('public/uploads/staff/demo/staff.jpg')); ?>'/></button>">
            <div class="tesimonials_slider_item_star">
                <?php for($i = 1; $i <= $testimonial->star_rating; $i++): ?>
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="19.021" height="18.09"
                            viewBox="0 0 19.021 18.09">
                            <path id="Path_734" data-name="Path 734"
                                d="M12,17,6.122,20.59l1.6-6.7L2.49,9.41l6.865-.55L12,2.5l2.645,6.36,6.866.55L16.28,13.89l1.6,6.7Z"
                                transform="translate(-2.49 -2.5)" fill="#4068fc" />
                        </svg></i>
                <?php endfor; ?>
                <?php if($testimonial->star_rating != 5): ?>
                    <?php for($i = 1; $i <= 5 - $testimonial->star_rating; $i++): ?>
                        <i class="last-child"><svg xmlns="http://www.w3.org/2000/svg" width="19.021" height="18.09"
                                viewBox="0 0 19.021 18.09">
                                <path id="Path_734" data-name="Path 734"
                                    d="M12,17,6.122,20.59l1.6-6.7L2.49,9.41l6.865-.55L12,2.5l2.645,6.36,6.866.55L16.28,13.89l1.6,6.7Z"
                                    transform="translate(-2.49 -2.5)" fill="#4068fc" />
                            </svg></i>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <h3>“ <?php echo e(mb_strimwidth($testimonial->description, 0, 100, "...")); ?> ”</h3>
            <p><?php echo e($testimonial->name); ?>, <span><?php echo e($testimonial->designation); ?>

                    <?php echo e($testimonial->institution_name); ?></span></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/testimonial.blade.php ENDPATH**/ ?>