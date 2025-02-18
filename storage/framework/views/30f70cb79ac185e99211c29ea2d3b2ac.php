<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-<?php echo e($column); ?>">
        <div class="events_item">
            <?php if(file_exists(asset($event->uplad_image_file))): ?>
                <div class="events_item_img">
                    <img src="<?php echo e(asset($event->uplad_image_file)); ?>" alt="<?php echo e($event->event_title); ?>">
                </div>
            <?php endif; ?>
            <div class="events_item_inner">
                <div class="events_item_inner_meta">
                    <?php if($dateshow == 1): ?>
                        <span><i class="fal fa-clock"></i>
                            <?php echo e(dateConvert($event->from_date).' '.__('common.to').' '.dateConvert($event->to_date)); ?>

                        </span>
                    <?php endif; ?>
                    <?php if($enevtlocation == 1): ?>
                        <span>
                            <i class="fal fa-map-marker-alt"></i>
                            <?php echo e($event->event_location); ?>

                        </span>
                    <?php endif; ?>
                </div>
                <?php if($event->event_title): ?>
                    <a href="<?php echo e(route('frontend.event-details', $event->id)); ?>" class="events_item_inner_title">
                        <?php echo e($event->event_title); ?>

                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('frontend.event-details', $event->id)); ?>"><i class="fa fa-plus-circle"></i><?php echo e($button); ?></a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/event-gallery.blade.php ENDPATH**/ ?>