
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('communicate.add_notice'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('communicate.add_notice'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.communicate'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.add_notice'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor">
        <?php if(userPermission('add-notice')): ?>
            <div class="container-fluid p-0">
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'save-notice-data', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-5">
                                    <div class="main-title mt-0">
                                        <h3 class="mb-15"><?php echo app('translator')->get('communicate.add_notice'); ?></h3>
                                    </div>
                                </div>
                                <div class="ml-auto col-lg-8 text-right col-md-6 col-7">
                                    <a href="<?php echo e(route('notice-list')); ?>" class="primary-btn small fix-gr-bg">
                                        <?php echo app('translator')->get('communicate.notice_board'); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.title'); ?>
                                                <span class="text-danger"> *</span> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('notice_title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="notice_title" autocomplete="off"
                                                value="<?php echo e(isset($leave_type) ? $leave_type->type : ''); ?>">


                                            <?php if($errors->has('notice_title')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('notice_title')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="primary_input mt-0">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.notice'); ?>
                                                <span></span> </label>
                                            <textarea class="primary_input_field form-control" cols="0" rows="5" name="notice_message"
                                                id="article-ckeditor"></textarea>


                                        </div>


                                        <div class="primary_input mt-15">
                                            <input type="checkbox" id="is_published" class="common-checkbox" value="1"
                                                name="is_published">
                                            <label for="is_published"><?php echo app('translator')->get('communicate.is_published_web_site'); ?></label>
                                        </div>


                                    </div>


                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-15">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.notice_date'); ?>
                                                        <span class="text-danger"> *</span> </label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input
                                                                        class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('notice_date') ? ' is-invalid' : ''); ?>"
                                                                        id="notice_date" type="text" autocomplete="off"
                                                                        name="notice_date" value="<?php echo e(date('m/d/Y')); ?>">
                                                                </div>
                                                            </div>
                                                            <button class="btn-date" data-id="#notice_date" type="button">
                                                                <label class="m-0 p-0" for="notice_date">
                                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php if($errors->has('notice_date')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('notice_date')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-15">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.publish_on'); ?>
                                                        <span class="text-danger"> *</span> </label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input
                                                                        class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('publish_on') ? ' is-invalid' : ''); ?>"
                                                                        id="publish_on" type="text" autocomplete="off"
                                                                        name="publish_on" value="<?php echo e(date('m/d/Y')); ?>">
                                                                </div>
                                                            </div>
                                                            <button class="btn-date" data-id="#notice_date" type="button">
                                                                <label class="m-0 p-0" for="publish_on">
                                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                                </label>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php if($errors->has('publish_on')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('publish_on')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('communicate.message_to'); ?></label>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="">
                                                        <input type="checkbox" id="role_<?php echo e(@$role->id); ?>"
                                                            class="common-checkbox" value="<?php echo e(@$role->id); ?>"
                                                            name="role[]">
                                                        <label for="role_<?php echo e(@$role->id); ?>"><?php echo e(@$role->name); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($errors->has('role')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('role')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg submit">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('communicate.save_content'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        CKEDITOR.replace('notice_message');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/communicate/sendMessage.blade.php ENDPATH**/ ?>