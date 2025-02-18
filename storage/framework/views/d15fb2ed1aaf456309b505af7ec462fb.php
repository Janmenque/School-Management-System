

<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo $headerMenu; ?>

<?php echo $pageSections; ?>

<?php echo $footerMenu; ?>

<?php $__env->stopSection(); ?>

<?php if(moduleStatusCheck('WhatsappSupport')): ?>
     <?php echo $__env->make('whatsappsupport::partials._popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?> 

<?php echo $__env->make(config('pagebuilder.site_layout'),['page' => $page, 'edit' => false ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\packages\larabuild\pagebuilder\src/../resources/views/page.blade.php ENDPATH**/ ?>