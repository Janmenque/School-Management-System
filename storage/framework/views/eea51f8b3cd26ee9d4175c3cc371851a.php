<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button"
        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"> <?php echo e(__('common.select')); ?>

    </button>
    <div class="dropdown-menu dropdown-menu-right"
        aria-labelledby="dropdownMenu2">
        <?php if(isset($routeList)): ?>
            <?php $__currentLoopData = $routeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $item; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/drop-down-action-component.blade.php ENDPATH**/ ?>