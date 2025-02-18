<?php if($donors->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-center text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/donor')); ?>"><?php echo app('translator')->get('edulia.donor'); ?></a></p>
<?php else: ?>
    <?php $__currentLoopData = $donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($key + 1); ?>

            </td>
            <td><img src="<?php echo e(asset($data->photo)); ?>" class="user_img" alt=""></td>
            <td><a href="<?php echo e(route('frontend.donor-details', $data->id)); ?>"
                    class="link_to_details"><b><?php echo e($data->full_name); ?></b></a></td>
            <td><?php echo e($data->profession); ?></td>
            <td><?php echo e($data->email); ?></td>
            <td><?php echo e($data->mobile); ?></td>
            <td><?php echo e($data->religion->base_setup_name); ?></td>
            <td><?php echo e($data->gender->base_setup_name); ?></td>
            <td class="blood_group"><?php echo e($data->bloodGroup->base_setup_name); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/donor.blade.php ENDPATH**/ ?>