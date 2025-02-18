<?php if($courses->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/course-list')); ?>"><?php echo app('translator')->get('edulia.add_course'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $color = '';
            if ($key % 4 == 1) {
                $color = 'sunset-orange';
            } elseif ($key % 4 == 2) {
                $color = 'green';
            } elseif ($key % 4 == 3) {
                $color = 'blue';
            } else {
                $color = 'orange';
            }
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
            <a href='<?php echo e(route('frontend.course-details', $course->id)); ?>' class="course_item">
                <div class="course_item_img">
                    <div class="course_item_img_inner">
                        <img src="<?php echo e(asset($course->image)); ?>" alt="<?php echo e($course->courseCategory->category_name); ?>">
                    </div>
                    <span
                        class="course_item_img_status <?php echo e($color); ?>"><?php echo e($course->courseCategory->category_name ?? 'InfixEdu'); ?>

                    </span>
                </div>
                <div class="course_item_inner">
                    <h4><?php echo e($course->title); ?></h4>
                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/course.blade.php ENDPATH**/ ?>