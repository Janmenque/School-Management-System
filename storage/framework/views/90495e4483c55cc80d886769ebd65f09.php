<div class="video-gallery">
    <div class="row">
        <?php if($videoGalleries->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
            <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
                    href="<?php echo e(URL::to('/video-gallery')); ?>"><?php echo app('translator')->get('edulia.video_gallery'); ?></a></p>
        <?php else: ?>
            <?php $__currentLoopData = $videoGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $videoGallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $variable = substr($videoGallery->video_link, 32, 11);
                ?>
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
                    <div class="single-video-item">
                        <a href='https://www.youtube.com/watch?v=<?php echo e($variable); ?>' class="gallery_item video">
                            <div class="gallery_item_img">
                                <img src="https://img.youtube.com/vi/<?php echo e($variable); ?>/maxresdefault.jpg"
                                    alt="video thumbnail">
                            </div>
                            <div class="gallery_item_inner">
                                <h4><?php echo e(mb_strimwidth($videoGallery->name, 0, 50, '...')); ?></h4>
                                <p><?php echo e(mb_strimwidth($videoGallery->description, 0, 150, '...')); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/video-gallery.blade.php ENDPATH**/ ?>