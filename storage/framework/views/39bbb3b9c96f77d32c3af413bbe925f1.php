<div class="row mb-minus-24">
    <?php if($photoGalleries->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
        <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
                href="<?php echo e(URL::to('/photo-gallery')); ?>"><?php echo app('translator')->get('edulia.photo_gallery'); ?></a></p>
    <?php else: ?>
        <?php $__currentLoopData = $photoGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photoGallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-<?php echo e($column); ?> 
            <?php if($column == '12' ): ?>
                col-md-12
                <?php elseif($column == '6'): ?>
                col-md-12
                <?php elseif($column == '4'): ?>
                col-md-6 col-sm-12
                <?php elseif($column == '3'): ?>
                col-md-4 col-sm-6
                <?php elseif($column == '2'): ?>
                col-md-3 col-sm-4 col-6
                <?php elseif($column == '1'): ?>
                col-md-2 col-sm-3 col-6
            <?php endif; ?>
            ">
                <a href='<?php echo e(route('frontend.gallery-details', $photoGallery->id)); ?>' class="gallery_item">
                    <div class="gallery_item_img"><img src="<?php echo e(asset($photoGallery->feature_image)); ?>" alt="">
                    </div>
                    <div class="gallery_item_inner">
                        <h4><?php echo e($photoGallery->name); ?></h4>
                        <p><?php echo e($photoGallery->description); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/photo-gallery.blade.php ENDPATH**/ ?>