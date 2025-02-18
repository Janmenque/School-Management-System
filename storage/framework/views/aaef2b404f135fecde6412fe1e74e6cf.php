
<style>
    /* for toastr dynamic start*/
    .toast-success {
        background-color: !important;
    }

    .toast-message {
        color: ;
    }

    .toast-title {
        color: ;

    }

    .toast {
        color: ;
    }

    .toast-error {
        background-color: !important;
    }

    .toast-warning {
        background-color: !important;
    }
</style>
<style>
    :root {
        --base_font : <?php echo e(in_array(session()->get('locale', Config::get('app.locale')), ['ar']) ?  'Cairo,' : ''); ?>Poppins, sans-serif;
        --box_shadow : <?php echo e($color_theme->box_shadow ? 'var(--box_shadow)':'none'); ?>;
        <?php $__currentLoopData = $color_theme->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        --<?php echo e($color->name); ?>: <?php echo e($color->pivot->value); ?>;
                    <?php if(in_array($color->name, ['success', 'danger'])): ?>
        --<?php echo e($color->name); ?>_with_opacity: <?php echo e($color->pivot->value); ?>23;
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }
</style><?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/root-css.blade.php ENDPATH**/ ?>