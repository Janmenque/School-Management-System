<div class="row">
    <?php if($staffs->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
        <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
                href="<?php echo e(route('expert-teacher')); ?>"><?php echo app('translator')->get('edulia.expert_staff'); ?></a></p>
    <?php else: ?>
        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-<?php echo e($column); ?>">
                <a target="_blank" href='<?php echo e(route('frontend.staff-details', $staff->staff->id)); ?>' class="teacher_wrapper">
                    <div class="teacher_wrapper_img">
                            <?php if(config('app.app_sync')): ?>
                            <img
                                src="<?php echo e(asset('public/uploads/expert_teacher/teacher-'.($key+1).'.jpg')); ?>"
                            alt="">
                            <?php else: ?> 
                            <img
                                src="<?php echo e(@$staff->staff->staff_photo ? asset(@$staff->staff->staff_photo) : asset('public/uploads/expert_teacher/teacher-1.jpg')); ?>"
                                alt="">
                            
                            <?php endif; ?>
                        </div>
                    <h4><?php echo e(@$staff->staff->full_name); ?></h4>
                    <p><?php echo e(@$staff->staff->designations->title); ?></p>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/teacher-list.blade.php ENDPATH**/ ?>