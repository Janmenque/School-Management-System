<div class="events_schedule">
    <table>
        <?php if($events->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
            <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
                    href="<?php echo e(URL::to('/event')); ?>"><?php echo app('translator')->get('edulia.add_event'); ?></a></p>
        <?php else: ?>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="events_schedule_date">
                            <h3><?php echo e(date('d', strtotime($event->from_date))); ?></h3>
                            <p><?php echo e(date('M', strtotime($event->from_date))); ?></p>
                        </div>
                    </td>
                    <td><a class="event_title" href="<?php echo e(route('frontend.event-details', $event->id)); ?>">
                            <h4><?php echo e($event->event_title); ?></h4>
                        </a></td>
                    <td>
                        <p>
                            <i class="far fa-clock"></i>
                            <?php echo e(date('d/m/y', strtotime($event->from_date))); ?>-<?php echo e(date('d/m/y', strtotime($event->to_date))); ?>

                        </p>
                    </td>
                    <td>
                        <p><i class="far fa-map-marker-alt"></i><?php echo e($event->event_location); ?></p>
                    </td>
                    <td><a target="_blank" href="<?php echo e(route('frontend.event-details', $event->id)); ?>"><i class="far fa-long-arrow-right"></i></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/event.blade.php ENDPATH**/ ?>