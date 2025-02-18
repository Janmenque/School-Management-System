
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.admin_setup'); ?>
<?php $__env->stopSection(); ?>


<link rel="stylesheet" href="<?php echo e(asset('/Modules/RolePermission/public/css/style.css')); ?>">
<style type="text/css">
    .erp_role_permission_area {
        display: block !important;
        width: 100%;
        background: #ffffff;
        padding: 30px 30px;
        border-radius: 5px;
        box-shadow: var(--box_shadow);
        margin: 0 auto;
        clear: both;
        border-collapse: separate;
        border-spacing: 0;
    }


    .single_permission {
        margin-bottom: 0px;
    }

    .erp_role_permission_area .single_permission .permission_body>ul>li ul {
        display: grid;
        margin-left: 25px;
        grid-template-columns: repeat(3, 1fr);
        /* grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); */
    }

    .erp_role_permission_area .single_permission .permission_body>ul>li ul li {
        margin-right: 20px;

    }

    .mesonary_role_header {
        column-count: 2;
        column-gap: 30px;
    }

    .single_role_blocks {
        display: inline-block;
        background: #fff;
        box-sizing: border-box;
        width: 100%;
        margin: 0 0 5px;
    }

    .erp_role_permission_area .single_permission .permission_body>ul>li {
        padding: 15px 25px 12px 25px;
    }

    .erp_role_permission_area .single_permission .permission_header {
        padding: 20px 25px 11px 25px;
        position: relative;
    }

    @media (min-width: 320px) and (max-width: 1199.98px) {
        .mesonary_role_header {
            column-count: 1;
            column-gap: 30px;
        }
    }

    @media (min-width: 320px) and (max-width: 767.98px) {
        .erp_role_permission_area .single_permission .permission_body>ul>li ul {
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px
                /* grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); */
        }
    }




    .permission_header {
        position: relative;
    }

    .arrow::after {
        position: absolute;
        content: "\e622";
        top: 50%;
        right: 12px;
        height: auto;
        font-family: 'themify';
        color: #fff;
        font-size: 18px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 22px;
    }

    .arrow.collapsed::after {
        content: "\e61a";
        color: #fff;
        font-size: 18px;
    }

    .erp_role_permission_area .single_permission .permission_header div {
        position: relative;
        top: -5px;
        position: relative;
        z-index: 999;
    }

    .erp_role_permission_area .single_permission .permission_header div.arrow {
        position: absolute;
        width: 100%;
        z-index: 0;
        left: 0;
        bottom: 0;
        top: 0;
        right: 0;
    }

    .erp_role_permission_area .single_permission .permission_header div.arrow i {
        color: #FFF;
        font-size: 20px;
    }

    .mesonary_role_header {
        column-count: 1 !important;
        column-gap: 30px;
    }

    .dropdown .dropdown-toggle {
        background: transparent;
        color: var(--base_color);
        font-size: 13px;
        font-weight: 500;
        border: 1px solid var(--border_color);
        border-radius: 32px;
        padding: 5px 20px;
        text-transform: uppercase;
        overflow: hidden;
        -webkit-transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
    }

    .dropdown .dropdown-toggle:after {
        content: "\e62a";
        font-family: "themify";
        border: none;
        border-top: 0px;
        font-size: 10px;
        position: relative;
        top: 3px;
        left: 0;
        font-weight: 600;
        -webkit-transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
    }

    .dropdown .dropdown-menu .dropdown-item {
        color: #828bb2;
        text-align: right;
        font-size: 12px;
        padding: 4px 1.5rem;
        text-transform: uppercase;
        cursor: pointer;
        -webkit-transition: all 0.15s ease-in-out;
        -moz-transition: all 0.15s ease-in-out;
        -o-transition: all 0.15s ease-in-out;
        transition: all 0.15s ease-in-out;
    }

</style>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.admin_setup'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_setup'); ?></a>
                </div>
            </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($admin_setup)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('setup-admin')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('admin.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($admin_setup)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['setup-admin-update', @$admin_setup->id], 'method' => 'PUT'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('setup-admin-store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'setup-admin-store', 'method' => 'POST'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($admin_setup)): ?>
                                            <?php echo app('translator')->get('admin.edit_admin_setup'); ?>
    
                                        <?php else: ?>
                                            <?php echo app('translator')->get('admin.add_admin_setup'); ?>
    
                                        <?php endif; ?>
    
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.type'); ?> <span class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select form-control<?php echo e(@$errors->has('type') ? ' is-invalid' : ''); ?>"
                                                name="type">
                                                <option data-display="<?php echo app('translator')->get('common.type'); ?> *" value=""><?php echo app('translator')->get('common.type'); ?>
                                                    *
                                                </option>

                                                <option value="1"
                                                    <?php echo e(isset($admin_setup) ? ($admin_setup->type == '1' ? 'selected' : '') : ''); ?>>
                                                    <?php echo app('translator')->get('admin.purpose'); ?></option>
                                                <option value="2"
                                                    <?php echo e(isset($admin_setup) ? ($admin_setup->type == '2' ? 'selected' : '') : ''); ?>>
                                                    <?php echo app('translator')->get('admin.complaint_type'); ?></option>
                                                <option value="3"
                                                    <?php echo e(isset($admin_setup) ? ($admin_setup->type == '3' ? 'selected' : '') : ''); ?>>
                                                    <?php echo app('translator')->get('admin.source'); ?></option>
                                                <option value="4"
                                                    <?php echo e(isset($admin_setup) ? ($admin_setup->type == '4' ? 'selected' : '') : ''); ?>>
                                                    <?php echo app('translator')->get('common.reference'); ?></option>

                                            </select>
                                            <?php if($errors->has('type')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row  mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.name'); ?> <span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="name" maxlength="50"
                                                    value="<?php echo e(isset($admin_setup) ? $admin_setup->name : ''); ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php echo e(isset($admin_setup) ? $admin_setup->id : ''); ?>">
                                                
                                                
                                                <?php if($errors->has('name')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('name')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span></span></label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="4"
                                                    name="description"><?php echo e(isset($admin_setup) ? $admin_setup->description : ''); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('setup-admin-store')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($admin_setup)): ?>
                                                    <?php echo app('translator')->get('admin.update_setup'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('admin.save_setup'); ?>
                                                <?php endif; ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-0"><?php echo app('translator')->get('admin.admin_setup_list'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row base-setup">
                            <div class="col-lg-12">
                                <div class="erp_role_permission_area ">
                                    <!-- single_permission  -->
                                    <div class="mesonary_role_header">
                                        <?php $i = 0; ?>
                                        <?php $__currentLoopData = $admin_setups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- single_role_blocks  -->
                                            <div class="single_role_blocks">
                                                <div class="single_permission" id="">
                                                    <div
                                                        class="permission_header d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <input name="module_id[]" value="" id="Main_Module"
                                                                class="common-radio permission-checkAll main_module_id_">
                                                            <label for="Main_Module">
                                                                <?php
                                                                    if ($key == 1) {
                                                                        echo trans('admin.purpose');
                                                                    } elseif ($key == 2) {
                                                                        echo trans('admin.complaint_type');
                                                                    } elseif ($key == 3) {
                                                                        echo trans('admin.source');
                                                                    } elseif ($key == 4) {
                                                                        echo trans('admin.reference');
                                                                    }
                                                                ?>
                                                            </label>
                                                        </div>
    
                                                        <div class="arrow collapsed" data-toggle="collapse"
                                                            data-target="#Role<?php echo e($key); ?>">
    
    
    
                                                        </div>
    
                                                    </div>
    
                                                    <div id="Role<?php echo e($key); ?>" class="collapse">
                                                        <div class="permission_body school-table">
                                                            <ul>
                                                                <li>
                                                                    <ul class="option">
                                                                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $admin_setup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li>
                                                                                <div class="module_link_option_div" id="">
    
                                                                                    <div class="dropdown p-2">
                                                                                        <button type="button"
                                                                                            class="btn dropdown-toggle infix_csk module_id_ module_option_ module_link_option"
                                                                                            data-toggle="dropdown"><?php echo e(@$admin_setup->name); ?>

                                                                                        </button>
    
                                                                                        <div
                                                                                            class="dropdown-menu dropdown-menu-right">
                                                                                            <?php if(userPermission('setup-admin-edit')): ?>
                                                                                                <a class="dropdown-item"
                                                                                                    href="<?php echo e(route('setup-admin-edit', @$admin_setup->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                                            <?php endif; ?>
                                                                                            <?php if(userPermission("setup-admin-delete")): ?>
                                                                                                <a class="dropdown-item deleteSetupAdminModal"
                                                                                                    href="#" data-toggle="modal"
                                                                                                    data-target="#deleteSetupAdminModal"
                                                                                                    data-id="<?php echo e(@$admin_setup->id); ?>"><?php echo app('translator')->get('common.delete'); ?></a>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>
    
    
                                                                                </div>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                                                                    </ul>
                                                                </li>
    
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="deleteSetupAdminModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_admin_setup'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>


                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <a href="" class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></a>

                    </div>
                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/admin/setup_admin.blade.php ENDPATH**/ ?>