<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo e(isset($h1) ? $h1 : ''); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <?php if(isset($bgPages)): ?>
                    <?php $__currentLoopData = $bgPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $page; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <a href="#"><?php echo e(isset($h1) ? $h1 : ''); ?></a>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/bread-crumb-component.blade.php ENDPATH**/ ?>