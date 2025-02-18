<section class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12">
                <div class="tmp-services">
                    <div class="tmp-sectiontitle-two">
                        <h2><?php echo e(pagesetting('heading')); ?></h2>
                        <p><?php echo pagesetting('paragraph'); ?></p>
                    </div>
                    <ul class="tmp-services-list">
                        <?php if(!empty(pagesetting('service_details'))): ?>
                            <?php $__currentLoopData = pagesetting('service_details'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="tmp-services-items">
                                        <div class="tmp-services-content">
                                            <h2><?php echo e($service['heading']); ?></h2>
                                            <p><?php echo $service['paragraph']; ?></p>
                                        </div>
                                        <a class="tmp-btn"
                                            href="<?php echo e($service['cta-url']); ?>"><?php echo e($service['cta-text']); ?></a>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/services/view.blade.php ENDPATH**/ ?>