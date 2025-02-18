
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('rolepermission::role.role_permission'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/Modules/RolePermission/public/css/style.css')); ?>">
    <style type="text/css">
        .erp_role_permission_area {
            display: block !important;
        }

        .single_permission {
            margin-bottom: 20px;
        }

        .erp_role_permission_area .single_permission .permission_body>ul>li ul {
            display: grid;
            margin-left: 25px;
            grid-template-columns: repeat(2, 1fr);
        }

        .erp_role_permission_area .single_permission .permission_body>ul>li ul li {
            margin-right: 20px;
        }

        /* overlapping fixed by arif vai */
        .erp_role_permission_area .single_permission .permission_body>ul>li ul>li {
            /* margin-top: 30px; */
        }

        .erp_role_permission_area .single_permission .permission_header label {
            top: 10px;
        }
    </style>

    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.role_permission'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.role_permission'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <div class="role_permission_wrap">
        <div class="permission_title">
            <h4>Assign Permission (<?php echo e(@$role->name); ?>)</h4>
        </div>
    </div>
    <div class="erp_role_permission_area">



        <!-- single_permission  -->

        <?php echo e(Form::open([
            'class' => 'form-horizontal',
            'files' => true,
            'route' => 'rolepermission/role-permission-assign',
            'method' => 'POST',
        ])); ?>


        <input type="hidden" name="role_id" value="<?php echo e(@$role->id); ?>">

        <div class="row">

            <?php $__currentLoopData = $all_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="single_permission" id="<?php echo e($permission->id); ?>">

                        <div class="permission_header d-flex align-items-center justify-content-between">

                            <div>
                                <input type="checkbox" name="module_id[]" value="<?php echo e($permission->id); ?>"
                                    id="Main_Module_<?php echo e($permission->id); ?>"
                                    class="common-radio permission-checkAll main_module_id_<?php echo e($permission->id); ?>"
                                    <?php echo e(in_array($permission->id, $already_assigned) ? 'checked' : ''); ?>>
                                <label
                                    for="Main_Module_<?php echo e($permission->id); ?>"><?php echo e(__('rolepermission::permissions.' . $permission->name)); ?></label>
                            </div>

                            <div>

                            </div>

                        </div>

                        <div class="permission_body">
                            <ul>
                                <?php
                                    $submodules = $permission->subModule;
                                    if(moduleStatusCheck('OnlineExam')){
                                        $submodules =  $submodules->where('alternate_module', '!=','OnlineExam');
                                    }
                                ?> 
                              
                                <?php $__currentLoopData = $submodules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <li>
                                        <div class="submodule">
                                            <input id="Sub_Module_<?php echo e($row2->id); ?>" name="module_id[]"
                                                value="<?php echo e($row2->id); ?>"
                                                class="infix_csk common-radio  module_id_<?php echo e($permission->id); ?> module_link"
                                                type="checkbox" <?php echo e(in_array($row2->id, $already_assigned) ? 'checked' : ''); ?>>
                                            <label
                                                for="Sub_Module_<?php echo e($row2->id); ?>"><?php echo e(__('rolepermission::permissions.' . $row2->name)); ?>

                                            </label>
                                            <br>
                                        </div>

                                        <ul class="option mt-20">

                                            <?php $__currentLoopData = $row2->subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="module_link_option_div" id="<?php echo e($row2->id); ?>">
                                                        <input id="Option_<?php echo e($row3->id); ?>" name="module_id[]"
                                                            value="<?php echo e($row3->id); ?>"
                                                            class="infix_csk common-radio    module_id_<?php echo e($permission->id); ?> module_option_<?php echo e($permission->id); ?>_<?php echo e($row2->id); ?> module_link_option"
                                                            type="checkbox"
                                                            <?php echo e(in_array($row3->id, $already_assigned) ? 'checked' : ''); ?>>
                                                        <label
                                                            for="Option_<?php echo e($row3->id); ?>"><?php echo e(__('rolepermission::permissions.' . $row3->name)); ?>

                                                        </label>
                                                        <br>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>


        <div class="row mt-40">
            <div class="col-lg-12 text-center">
                <button class="primary-btn fix-gr-bg">
                    <span class="ti-check"></span>
                    <?php echo app('translator')->get('submit'); ?>

                </button>
            </div>
        </div>

        <?php echo e(Form::close()); ?>



    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        // Fees Assign
        $('.permission-checkAll').on('click', function() {

            //$('.module_id_'+$(this).val()).prop('checked', this.checked);


            if ($(this).is(":checked")) {
                $('.module_id_' + $(this).val()).each(function() {
                    $(this).prop('checked', true);
                });
            } else {
                $('.module_id_' + $(this).val()).each(function() {
                    $(this).prop('checked', false);
                });
            }
        });



        $('.module_link').on('click', function() {

            var module_id = $(this).parents('.single_permission').attr("id");
            var module_link_id = $(this).val();


            if ($(this).is(":checked")) {
                $(".module_option_" + module_id + '_' + module_link_id).prop('checked', true);
            } else {
                $(".module_option_" + module_id + '_' + module_link_id).prop('checked', false);
            }

            var checked = 0;
            $('.module_id_' + module_id).each(function() {
                if ($(this).is(":checked")) {
                    checked++;
                }
            });

            if (checked > 0) {
                $(".main_module_id_" + module_id).prop('checked', true);
            } else {
                $(".main_module_id_" + module_id).prop('checked', false);
            }
        });




        $('.module_link_option').on('click', function() {

            var module_id = $(this).parents('.single_permission').attr("id");
            var module_link = $(this).parents('.module_link_option_div').attr("id");



            // module link check

            var link_checked = 0;

            $('.module_option_' + module_id + '_' + module_link).each(function() {
                if ($(this).is(":checked")) {
                    link_checked++;
                }
            });

            if (link_checked > 0) {
                $("#Sub_Module_" + module_link).prop('checked', true);
            } else {
                $("#Sub_Module_" + module_link).prop('checked', false);
            }

            // module check
            var checked = 0;

            $('.module_id_' + module_id).each(function() {
                if ($(this).is(":checked")) {
                    checked++;
                }
            });

            if (checked > 0) {
                $(".main_module_id_" + module_id).prop('checked', true);
            } else {
                $(".main_module_id_" + module_id).prop('checked', false);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/RolePermission\Resources/views/role_permission_student.blade.php ENDPATH**/ ?>