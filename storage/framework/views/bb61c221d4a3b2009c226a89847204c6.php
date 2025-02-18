
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('communicate.calendar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('communicate.calendar'); ?></h1>
                <div class="bc-pages">
                    <input type="hidden" id="system_url" value="<?php echo e(url('/')); ?>">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.communicate'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.calendar'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-40 sms-accordion">
        <div class="container-fluid p-0">
            <div>
                <?php echo $__env->make('backEnd.communicate.commonAcademicCalendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.communicate.academic_calendar_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/communicate/academicCalendar.blade.php ENDPATH**/ ?>