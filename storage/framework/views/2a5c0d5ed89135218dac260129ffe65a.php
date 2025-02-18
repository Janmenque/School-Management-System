
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.edit_staff'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .form-control:disabled {
            background-color: #FFFFFF;
        }

        .input-right-icon button.primary-btn-small-input {
            top: 66% !important;
            right: 11px !important;
        }
    </style>
    <input type="text" hidden id="urlStaff" value="<?php echo e(route('staffProfileUpdate', $editData->id)); ?>">
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.edit_staff'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="<?php echo e(route('staff_directory')); ?>"><?php echo app('translator')->get('hr.staff_list'); ?></a>
                    <a href="<?php echo e(route('editStaff', $editData->id)); ?>"><?php echo app('translator')->get('hr.edit_staff'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

            <?php else: ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'staffUpdate', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('hr.edit_staff'); ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 form_tab">
                                <ul class="nav nav-tabs tabs_scroll_nav px-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#basic_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('hr.basic_info'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#payroll_details" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('hr.payroll_details'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#bank_info_details" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('hr.bank_info_details'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#social_link_details" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('hr.social_links_details'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#document_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('hr.document_info'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#custom_field" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('hr.custom_field'); ?></a>
                                    </li>

                                    <li class="nav-item flex-grow-1 text-right">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-12 text-end">
                                                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                                title="Disabled For Demo ">
                                                                <button class="primary-btn small fix-gr-bg  demo_view"
                                                                    style="pointer-events: none;" type="button">
                                                                    <?php echo app('translator')->get('hr.update_staff'); ?></button></span>
                                                        <?php else: ?>
                                                            <button class="primary-btn fix-gr-bg submit">
                                                                <span class="ti-check"></span>
                                                                <?php echo app('translator')->get('hr.update_staff'); ?>
                                                            </button>
                                                        <?php endif; ?>
                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-tab-container">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active" id="basic_info">
                                            <div class="row row-gap-24 pt-4">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <input type="hidden" name="staff_id"
                                                                value="<?php echo e(@$editData->id); ?>" id="_id">
                                                            <?php if(in_array('staff_no', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.staff_number'); ?>
                                                                            <?php echo e(in_array('staff_no', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('staff_no') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="staff_no" readonly
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->staff_no); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('staff_no')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('staff_no')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('role', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.role'); ?>
                                                                            <?php echo e(in_array('role', $is_required) ? '*' : ''); ?>

                                                                        </label>
                                                                        <select
                                                                            class="primary_select  form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>"
                                                                            name="role_id" id="role_id">
                                                                            <?php if($editData->role_id != 1): ?>
                                                                                <option
                                                                                    data-display="<?php echo app('translator')->get('hr.role'); ?> <?php echo e(in_array('role', $is_required) ? '*' : ''); ?>"
                                                                                    value=""><?php echo app('translator')->get('common.select'); ?>
                                                                                    <?php echo e(in_array('role', $is_required) ? '*' : ''); ?>

                                                                                </option>

                                                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($value->id); ?>"
                                                                                        <?php if(isset($editData)): ?> <?php if(($editData->role_id == 3 ? $editData->previous_role_id : $editData->role_id) == $value->id): ?>
                                                                                                selected <?php endif; ?>
                                                                                        <?php endif; ?>
                                                                                        ><?php echo e($value->name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php else: ?>
                                                                                <option value="1">Superadmin</option>

                                                                            <?php endif; ?>
                                                                        </select>

                                                                        <?php if($errors->has('role_id')): ?>
                                                                            <span class="text-danger invalid-select"
                                                                                role="alert">
                                                                                <?php echo e($errors->first('role_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('department', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.department'); ?>
                                                                            <?php echo e(in_array('department', $is_required) ? '*' : ''); ?>

                                                                        </label>
                                                                        <select
                                                                            class="primary_select  form-control<?php echo e($errors->has('department_id') ? ' is-invalid' : ''); ?>"
                                                                            name="department_id" id="department_id">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('hr.department'); ?> <?php echo e(in_array('department', $is_required) ? '*' : ''); ?>"
                                                                                value=""><?php echo app('translator')->get('common.select'); ?>
                                                                                <?php echo e(in_array('department', $is_required) ? '*' : ''); ?>

                                                                            </option>
                                                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($value->id); ?>"
                                                                                    <?php if(isset($editData)): ?> <?php if($editData->department_id == $value->id): ?>
                                                                                            selected <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                    ><?php echo e($value->name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>

                                                                        <?php if($errors->has('department_id')): ?>
                                                                            <span class="text-danger invalid-select"
                                                                                role="alert">
                                                                                <?php echo e($errors->first('department_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('designation', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.designation'); ?>
                                                                            <?php echo e(in_array('designation', $is_required) ? '*' : ''); ?>

                                                                        </label>
                                                                        <select
                                                                            class="primary_select  form-control<?php echo e($errors->has('designation_id') ? ' is-invalid' : ''); ?>"
                                                                            name="designation_id" id="designation_id">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('hr.designation'); ?> <?php echo e(in_array('designation', $is_required) ? '*' : ''); ?>"
                                                                                value=""><?php echo app('translator')->get('common.select'); ?>
                                                                                <?php echo e(in_array('designation', $is_required) ? '*' : ''); ?>

                                                                            </option>
                                                                            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($value->id); ?>"
                                                                                    <?php if(isset($editData)): ?> <?php if($editData->designation_id == $value->id): ?>
                                                                                            selected <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                    ><?php echo e($value->title); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>

                                                                        <?php if($errors->has('designation_id')): ?>
                                                                            <span class="text-danger invalid-select"
                                                                                role="alert">
                                                                                <?php echo e($errors->first('designation_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(in_array('first_name', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.first_name'); ?>
                                                                            <?php echo e(in_array('first_name', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="first_name"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->first_name); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('first_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('first_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('last_name', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.last_name'); ?>
                                                                            <?php echo e(in_array('last_name', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="last_name"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->last_name); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('last_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('last_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('fathers_name', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.father_name'); ?>
                                                                            <?php echo e(in_array('fathers_name', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('fathers_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="fathers_name"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->fathers_name); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('fathers_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('fathers_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('mothers_name', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.mother_name'); ?>
                                                                            <?php echo e(in_array('mothers_name', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('mothers_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="mothers_name"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->mothers_name); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('mothers_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('mothers_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('email', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.email'); ?>
                                                                            <?php echo e(in_array('email', $is_required) ? '*' : ''); ?></label>
                                                                        <input oninput="emailCheck(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                                            type="email" name="email"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->email); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('email')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('email')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('gender', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.gender'); ?>
                                                                            <?php echo e(in_array('gender', $is_required) ? '*' : ''); ?>

                                                                        </label>
                                                                        <select
                                                                            class="primary_select  form-control<?php echo e($errors->has('gender_id') ? ' is-invalid' : ''); ?>"
                                                                            name="gender_id">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('common.gender'); ?> <?php echo e(in_array('gender', $is_required) ? '*' : ''); ?>"
                                                                                value=""><?php echo app('translator')->get('common.gender'); ?>
                                                                                <?php echo e(in_array('gender', $is_required) ? '*' : ''); ?>

                                                                            </option>
                                                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($gender->id); ?>"
                                                                                    <?php if(isset($editData)): ?> <?php if($editData->gender_id == $gender->id): ?>
                                                            selected <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                    ><?php echo e($gender->base_setup_name); ?>

                                                                                </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>

                                                                        <?php if($errors->has('gender_id')): ?>
                                                                            <span class="text-danger invalid-select"
                                                                                role="alert">
                                                                                <?php echo e($errors->first('gender_id')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(in_array('date_of_birth', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.date_of_birth'); ?>
                                                                            <?php echo e(in_array('date_of_birth', $is_required) ? '*' : ''); ?></label>
                                                                        <div class="primary_datepicker_input">
                                                                            <div class="no-gutters input-right-icon">
                                                                                <div class="col">
                                                                                    <div class="">
                                                                                        <input
                                                                                            class="primary_input_field primary_input_field date form-control"
                                                                                            id="date_of_birth"
                                                                                            type="text"
                                                                                            name="date_of_birth"
                                                                                            value="<?php echo e(date('m/d/Y', strtotime($editData->date_of_birth))); ?>"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn-date"
                                                                                    data-id="#date_of_birth"
                                                                                    type="button">
                                                                                    <i class="ti-calendar"
                                                                                        id="start-date-icon"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <span
                                                                            class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('date_of_joining', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.date_of_joining'); ?>
                                                                            <?php echo e(in_array('date_of_joining', $is_required) ? '*' : ''); ?></label>
                                                                        <div class="primary_datepicker_input">
                                                                            <div class="no-gutters input-right-icon">
                                                                                <div class="col">
                                                                                    <div class="">
                                                                                        <input
                                                                                            class="primary_input_field primary_input_field date form-control"
                                                                                            id="date_of_joining"
                                                                                            type="text"
                                                                                            name="date_of_joining"
                                                                                            value="<?php echo e(date('m/d/Y', strtotime($editData->date_of_joining))); ?> "
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn-date"
                                                                                    data-id="#date_of_joining"
                                                                                    type="button">
                                                                                    <i class="ti-calendar"
                                                                                        id="start-date-icon"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <span
                                                                            class="text-danger"><?php echo e($errors->first('date_of_joining')); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('mobile', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.mobile'); ?>
                                                                            <?php echo e(in_array('mobile', $is_required) ? '*' : ''); ?></label>
                                                                        <input oninput="phoneCheck(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="mobile"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->mobile); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('mobile')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('mobile')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('marital_status', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.marital_status'); ?>
                                                                            <?php echo e(in_array('marital_status', $is_required) ? '*' : ''); ?>

                                                                        </label>
                                                                        <select class="primary_select  form-control"
                                                                            name="marital_status">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('hr.marital_status'); ?> <?php echo e(in_array('marital_status', $is_required) ? '*' : ''); ?>"
                                                                                value=""><?php echo app('translator')->get('hr.marital_status'); ?>
                                                                                <?php echo e(in_array('marital_status', $is_required) ? '*' : ''); ?>

                                                                            </option>
                                                                            <option value="married"
                                                                                <?php echo e($editData->marital_status == 'married' ? 'selected' : ''); ?>>
                                                                                <?php echo app('translator')->get('hr.married'); ?></option>
                                                                            <option value="unmarried"
                                                                                <?php echo e($editData->marital_status == 'unmarried' ? 'selected' : ''); ?>>
                                                                                <?php echo app('translator')->get('hr.unmarried'); ?>
                                                                            </option>

                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('emergency_mobile', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.emergency_mobile'); ?>
                                                                            <?php echo e(in_array('emergency_mobile', $is_required) ? '*' : ''); ?></label>
                                                                        <input oninput="phoneCheck(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('emergency_mobile') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="emergency_mobile"
                                                                            value="<?php if(isset($editData)): ?> <?php echo e($editData->emergency_mobile); ?> <?php endif; ?>">


                                                                        <?php if($errors->has('emergency_mobile')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('emergency_mobile')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('driving_license', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.driving_license'); ?>
                                                                            <?php echo e(in_array('driving_license', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('driving_license') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="driving_license"
                                                                            value="<?php echo e($editData->driving_license); ?>">


                                                                        <?php if($errors->has('driving_license')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('driving_license')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('staff_photo', $has_permission)): ?>
                                                                <div class="col-lg-6 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo e(trans('hr.staff_photo')); ?></label>
                                                                        <div class="primary_file_uploader">
                                                                            <input class="primary_input_field"
                                                                                id="placeholderStaffsName" type="text"
                                                                                placeholder="<?php echo e($editData->staff_photo != '' ? getFilePath3($editData->staff_photo) : (in_array('staff_photo', $is_required) ? trans('hr.staff_photo') . '*' : trans('hr.staff_photo'))); ?>"
                                                                                readonly>
                                                                            <button class="" type="button"
                                                                                id="pic">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="addStaffImage"><?php echo app('translator')->get('common.browse'); ?></label>
                                                                                <input type="file"
                                                                                    class="d-none form-control"
                                                                                    name="staff_photo" id="addStaffImage">
                                                                            </button>
                                                                        </div>

                                                                        <?php if($errors->has('upload_event_image')): ?>
                                                                            <span class="text-danger d-block">
                                                                                <?php echo e($errors->first('upload_event_image')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <img class="previewImageSize my-2 <?php echo e(@$editData->staff_photo ? '' : 'd-none'); ?>"
                                                                src="<?php echo e(@$editData->staff_photo ? asset($editData->staff_photo) : ''); ?>"
                                                                alt="" id="staffImageShow" height="100%" width="100%">
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="col-lg-6 mb-20">
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 primary_input sm_mb_20">
                                                                            <label><?php echo app('translator')->get('front_settings.show_as_expert_staff'); ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 radio-btn-flex">
                                                                    <div class="row">
                                                                        <div class="col-lg-5 primary_input sm_mb_20">
                                                                            <input type="radio" name="show_public"
                                                                                id="show_public" class="common-radio"
                                                                                value="1"
                                                                                <?php echo e(@$editData->show_public == 1 ? 'checked' : ''); ?>>
                                                                            <label
                                                                                for="show_public"><?php echo app('translator')->get('front_settings.yes'); ?></label>
                                                                        </div>
                                                                        <div class="col-lg-7 primary_input sm_mb_20">
                                                                            <input type="radio" name="show_public"
                                                                                id="do_not_show_public"
                                                                                class="common-radio" value="0"
                                                                                <?php echo e(@$editData->show_public == 0 ? 'checked' : ''); ?>>
                                                                            <label
                                                                                for="do_not_show_public"><?php echo app('translator')->get('front_settings.no'); ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-6">

                                                            </div> -->
                                                            <?php if(in_array('current_address', $has_permission)): ?>
                                                                <div class="col-lg-6 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.current_address'); ?>
                                                                            <?php echo e(in_array('current_address', $is_required) ? '*' : ''); ?></label>
                                                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="current_address"
                                                                            id="current_address">
                                                            <?php if(isset($editData)): ?><?php echo e($editData->current_address); ?><?php endif; ?>
                                                                </textarea>

                                                                        <span class="focus-border textarea "></span>
                                                                        <?php if($errors->has('current_address')): ?>
                                                                            <span class="text-danger d-block">
                                                                                <?php echo e($errors->first('current_address')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(in_array('permanent_address', $has_permission)): ?>
                                                                <div class="col-lg-6 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.permanent_address'); ?>
                                                                            <?php echo e(in_array('permanent_address', $is_required) ? '*' : ''); ?></label>
                                                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="permanent_address"
                                                                            id="permanent_address">
                                                                            <?php if(isset($editData)): ?><?php echo e($editData->permanent_address); ?><?php endif; ?>
                                                                            </textarea>


                                                                        <?php if($errors->has('permanent_address')): ?>
                                                                            <span class="danger text-danger">
                                                                                <?php echo e($errors->first('permanent_address')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('qualifications', $has_permission)): ?>
                                                                <div class="col-lg-6 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.qualifications'); ?>
                                                                            <?php echo e(in_array('qualifications', $is_required) ? '*' : ''); ?></label>
                                                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="qualification"
                                                                            id="qualification">
                                                                        <?php if(isset($editData)): ?><?php echo e($editData->qualification); ?><?php endif; ?>
                                                                        </textarea>


                                                                        <?php if($errors->has('qualification')): ?>
                                                                            <span class="danger text-danger">
                                                                                <?php echo e($errors->first('qualification')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('experience', $has_permission)): ?>
                                                                <div class="col-lg-6 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.experience'); ?>
                                                                            <?php echo e(in_array('experience', $is_required) ? '*' : ''); ?></label>
                                                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="experience" id="experience">
                                                                        <?php if(isset($editData)): ?><?php echo e($editData->experience); ?><?php endif; ?>
                                                                        </textarea>


                                                                        <?php if($errors->has('experience')): ?>
                                                                            <span class="danger text-danger">
                                                                                <?php echo e($errors->first('experience')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(moduleStatusCheck('Lms')): ?>
                                                                <div class="row">
                                                                    <?php if(in_array('staff_bio', $has_permission)): ?>
                                                                        <div class="col-lg-12">
                                                                            <div class="primary_input">
                                                                                <label class="primary_input_label"
                                                                                    for=""><?php echo app('translator')->get('staff.staff_bio'); ?>
                                                                                    <?php echo e(in_array('staff_bio', $is_required) ? '*' : ''); ?></label>
                                                                                <textarea class="primary_input_field form-control" cols="0" rows="6" name="staff_bio" id="staff_bio">
                                                                                    <?php if(isset($editData)): ?><?php echo e($editData->staff_bio); ?><?php endif; ?>
                                                                                    </textarea>


                                                                                <?php if($errors->has('staff_bio')): ?>
                                                                                    <span class="danger text-danger">
                                                                                        <?php echo e($errors->first('staff_bio')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="payroll_details">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <?php if(in_array('epf_no', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.epf_no'); ?>
                                                                            <?php echo e(in_array('epf_no', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('epf_no') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="epf_no"
                                                                            value="<?php echo e($editData->epf_no); ?>">


                                                                        <?php if($errors->has('epf_no')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('epf_no')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('basic_salary', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.basic_salary'); ?>
                                                                            <?php echo e(in_array('basic_salary', $is_required) ? '*' : ''); ?></label>
                                                                        <input oninput="numberCheckWithDot(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('basic_salary') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="basic_salary"
                                                                            value="<?php echo e($editData->basic_salary); ?>">


                                                                        <?php if($errors->has('basic_salary')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('basic_salary')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('contract_type', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.contract_type'); ?>
                                                                            <?php echo e(in_array('contract_type', $is_required) ? '*' : ''); ?>

                                                                        </label>
                                                                        <select class="primary_select  form-control"
                                                                            name="contract_type">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('common.select'); ?> <?php echo e(in_array('contract_type', $is_required) ? '*' : ''); ?>"
                                                                                value=""><?php echo app('translator')->get('common.select'); ?>
                                                                                <?php echo e(in_array('contract_type', $is_required) ? '*' : ''); ?>

                                                                            </option>
                                                                            <option value="permanent"
                                                                                <?php if(isset($editData)): ?> <?php if($editData->contract_type == 'permanent'): ?>
                                                        selected <?php endif; ?>
                                                                                <?php endif; ?>
                                                                                ><?php echo app('translator')->get('hr.permanent'); ?>
                                                                            </option>
                                                                            <option value="contract"
                                                                                <?php if(isset($editData)): ?> <?php if($editData->contract_type == 'contract'): ?>
                                                        selected <?php endif; ?>
                                                                                <?php endif; ?>
                                                                                > <?php echo app('translator')->get('hr.contract'); ?>
                                                                            </option>
                                                                        </select>


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('location', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.location'); ?>
                                                                            <?php echo e(in_array('location', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('location') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="location"
                                                                            value="<?php echo e($editData->location); ?>">


                                                                        <?php if($errors->has('location')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('location')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="bank_info_details">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <?php if(in_array('bank_account_name', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.bank_account_name'); ?>
                                                                            <?php echo e(in_array('bank_account_name', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('bank_account_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="bank_account_name"
                                                                            value="<?php echo e($editData->bank_account_name); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('bank_account_no', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('accounts.account_no'); ?>
                                                                            <?php echo e(in_array('bank_account_no', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('bank_account_no') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="bank_account_no"
                                                                            value="<?php echo e($editData->bank_account_no); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('bank_name', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('accounts.bank_name'); ?>
                                                                            <?php echo e(in_array('bank_name', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('bank_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="bank_name"
                                                                            value="<?php echo e($editData->bank_name); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('bank_brach', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.branch_name'); ?>
                                                                            <?php echo e(in_array('bank_brach', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('bank_brach') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="bank_brach"
                                                                            value="<?php echo e($editData->bank_brach); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="social_link_details">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <?php if(in_array('facebook', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.facebook_url'); ?>
                                                                            <?php echo e(in_array('facebook', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('facebook_url') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="facebook_url"
                                                                            value="<?php echo e($editData->facebook_url); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('twitter', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.twitter_url'); ?>
                                                                            <?php echo e(in_array('twitter', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('twiteer_url') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="twiteer_url"
                                                                            value="<?php echo e($editData->twiteer_url); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('linkedin', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.linkedin_url'); ?>
                                                                            <?php echo e(in_array('linkedin', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('linkedin_url') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="linkedin_url"
                                                                            value="<?php echo e($editData->linkedin_url); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('instagram', $has_permission)): ?>
                                                                <div class="col-lg-6 col-xl-3 mb-20">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('hr.instragram_url'); ?>
                                                                            <?php echo e(in_array('instagram', $is_required) ? '*' : ''); ?></label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('instragram_url') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="instragram_url"
                                                                            value="<?php echo e($editData->instragram_url); ?>">


                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="document_info">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <?php if(in_array('resume', $has_permission)): ?>
                                                                <div class="col-lg-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo e(trans('hr.resume')); ?></label>
                                                                        <div class="primary_file_uploader">
                                                                            <input
                                                                                class="primary_input_field form-control <?php echo e($errors->has('resume') ? ' is-invalid' : ''); ?>"
                                                                                type="text"
                                                                                placeholder="<?php echo e(isset($editData->resume) && $editData->resume != '' ? getFilePath3($editData->resume) : (in_array('resume', $is_required) ? trans('hr.resume') . '*' : trans('hr.resume'))); ?>"
                                                                                readonly id="placeholderResume">
                                                                            <button class="" type="button"
                                                                                id="pic">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="resume"><?php echo app('translator')->get('common.browse'); ?></label>
                                                                                <input type="file"
                                                                                    class="d-none form-control"
                                                                                    name="resume" id="resume">
                                                                            </button>
                                                                        </div>

                                                                        <?php if($errors->has('upload_event_image')): ?>
                                                                            <span class="text-danger d-block">
                                                                                <?php echo e($errors->first('upload_event_image')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('joining_letter', $has_permission)): ?>

                                                                <div class="col-lg-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo e(trans('hr.joining_letter')); ?></label>
                                                                        <div class="primary_file_uploader">
                                                                            <input
                                                                                class="primary_input_field form-control <?php echo e($errors->has('joining_letter') ? ' is-invalid' : ''); ?>"
                                                                                type="text"
                                                                                placeholder="<?php echo e(isset($editData->joining_letter) && $editData->joining_letter != '' ? getFilePath3($editData->joining_letter) : (in_array('joining_letter', $is_required) ? trans('hr.joining_letter') . '*' : trans('hr.joining_letter'))); ?>"
                                                                                readonly id="placeholderJoiningLetter">
                                                                            <button class="" type="button"
                                                                                id="pic">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="joining_letter"><?php echo app('translator')->get('common.browse'); ?></label>
                                                                                <input type="file"
                                                                                    class="d-none form-control"
                                                                                    name="joining_letter"
                                                                                    id="joining_letter">
                                                                            </button>
                                                                        </div>

                                                                        <?php if($errors->has('joining_letter')): ?>
                                                                            <span class="text-danger d-block">
                                                                                <?php echo e($errors->first('joining_letter')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(in_array('other_document', $has_permission)): ?>

                                                                <div class="col-lg-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo e(trans('hr.other_documents')); ?></label>
                                                                        <div class="primary_file_uploader">
                                                                            <input
                                                                                class="primary_input_field form-control <?php echo e($errors->has('other_document') ? ' is-invalid' : ''); ?>"
                                                                                type="text"
                                                                                placeholder="<?php echo e(isset($editData->other_document) && $editData->other_document != '' ? getFilePath3($editData->joining_letter) : (in_array('other_documents', $is_required) ? trans('hr.other_documents') . '*' : trans('hr.other_documents'))); ?>"
                                                                                readonly id="placeholderOthersDocument">
                                                                            <button class="" type="button"
                                                                                id="pic">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="other_document"><?php echo app('translator')->get('common.browse'); ?></label>
                                                                                <input type="file"
                                                                                    class="d-none form-control"
                                                                                    name="other_document"
                                                                                    id="other_document">
                                                                            </button>
                                                                        </div>

                                                                        <?php if($errors->has('other_document')): ?>
                                                                            <span class="text-danger d-block">
                                                                                <?php echo e($errors->first('other_document')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="custom_field">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        
                                                        <?php if(in_array('custom_fields', $has_permission) && isMenuAllowToShow('custom_field') && count($custom_fields) > 0): ?>
                                                            <?php echo $__env->make('backEnd.studentInformation._custom_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>


    <div class="modal" id="LogoPic">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('hr.crop_image_and_upload'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="resize"></div>
                    <button class="btn rotate float-lef" data-deg="90">
                        <i class="ti-back-right"></i></button>
                    <button class="btn rotate float-right" data-deg="-90">
                        <i class="ti-back-left"></i></button>
                    <hr>
                    <a href="javascript:;" class="primary-btn fix-gr-bg pull-right"
                        id="upload_logo"><?php echo app('translator')->get('hr.crop'); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/js/croppie.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/js/editStaff.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.cutom-photo', function() {
                let v = $(this).val();
                let v1 = $(this).data("id");
                console.log(v, v1);
                getFileName(v, v1);
            });

            function getFileName(value, placeholder) {
                if (value) {
                    var startIndex = (value.indexOf('\\') >= 0 ? value.lastIndexOf('\\') : value.lastIndexOf('/'));
                    var filename = value.substring(startIndex);
                    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                        filename = filename.substring(1);
                    }
                    $(placeholder).attr('placeholder', '');
                    $(placeholder).attr('placeholder', filename);
                }
            }
        })
        $(document).on('change', '#addStaffImage', function(event) {
            $('#staffImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderStaffsName');
            imageChangeWithFile($(this)[0], '#staffImageShow');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/humanResource/editStaff.blade.php ENDPATH**/ ?>