<table class="user_list_table table display nowrap" style="width:100%">
    <thead class="text-nowrap">
        <tr>
            <th><?php echo e(__('edulia.sl')); ?></th>
            <th><?php echo e(__('edulia.image')); ?></th>
            <th><?php echo e(__('edulia.name')); ?></th>
            <th><?php echo e(__('edulia.role')); ?></th>
            <th><?php echo e(__('edulia.department')); ?></th>
            <th><?php echo e(__('edulia.designation')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key+1); ?></td>
                <td><img src="<?php echo e(defaultUserLogo($teacher->staff_photo)); ?>" class="user_img" alt="<?php echo e($teacher->full_name); ?>"></td>
                <td><a href="<?php echo e(route('frontend.staff-details',$teacher->id)); ?>" class="link_to_details"><?php echo e($teacher->full_name); ?></a></td>
                <td><?php echo e($teacher->roles->name); ?></td>
                <td><?php echo e($teacher->departments->name); ?></td>
                <td><?php echo e($teacher->designations->title); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-teacher-list.blade.php ENDPATH**/ ?>