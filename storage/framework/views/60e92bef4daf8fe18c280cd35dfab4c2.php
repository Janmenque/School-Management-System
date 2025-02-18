
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.student_admission'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.student_admission'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_admission'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(userPermission('student_store')): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal studentadmission', 'files' => true, 'route' => 'student_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_form'])); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="white-box">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 col-5">
                                <div class="main-title my-0 xs_mt_0 mt_0_sm">
                                    <h3 class="mb-15"><?php echo app('translator')->get('student.add_student'); ?></h3>
                                </div>
                            </div>
                            <?php if(userPermission('import_student')): ?>
                                <div class="offset-lg-3 col-lg-3 text-right col-sm-6 col-7">
                                    <a href="<?php echo e(route('import_student')); ?>" class="primary-btn small fix-gr-bg">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->get('student.import_student'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 student-add-form">
                                <ul class="nav nav-tabs tabs_scroll_nav px-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#personal_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.personal_info'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#parents_and_guardian_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.parents_and_guardian_info'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#document_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.document_info'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#previous_school_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.previous_school_info'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Other_info" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.Other_info'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#custom_field" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.custom_field'); ?></a>
                                    </li>
                                    <li class="nav-item flex-grow-1 text-right">
                                        

                                        <div class="">
                                            <?php
                                                $tooltip = '';
                                                if (userPermission('student_store')) {
                                                    $tooltip = '';
                                                } else {
                                                    $tooltip = 'You have no permission to add';
                                                }
                                            ?>
                                        </div>

                                        <button class="primary-btn fix-gr-bg submit" id="_submit_btn_admission"
                                            data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('student.save_student'); ?>
                                        </button>
                                        
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <div class="student-add-form-container">
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <?php if($errors->any()): ?>
                                                    <div class="error text-danger ">
                                                        <?php echo e('Something went wrong, please try again'); ?></div>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($error == 'The email address has already been taken.'): ?>
                                                            <div class="error text-danger ">
                                                                <?php echo e('The email address has already been taken, You can find out in student list or disabled student list'); ?>

                                                            </div>
                                                        <?php else: ?>
                                                            
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <?php if($errors->any()): ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                                        <div role="tabpanel" class="tab-pane fade show active" id="personal_info">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.academic_info'); ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-4">
                                                                <div class="primary_input ">
                                                                    <label class="primary_input_label" for="">
                                                                        <?php echo app('translator')->get('common.academic_year'); ?> 
                                                                        <span class="text-danger"> <?php echo e(is_required('session') == true ? '*' : ''); ?></span>
                                                                    </label>
                                                                    <select class="primary_select" name="session"
                                                                        id="academic_year">
                                                                        <option
                                                                            data-display="<?php echo app('translator')->get('common.academic_year'); ?> <?php if(is_required('session') == true): ?> * <?php endif; ?>"
                                                                            value=""><?php echo app('translator')->get('common.academic_year'); ?> <?php if(is_required('session') == true): ?>
                                                                                *
                                                                            <?php endif; ?>
                                                                        </option>
                                                                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($session->id); ?>"
                                                                                <?php echo e(old('session', getAcademicId()) == $session->id ? 'selected' : ''); ?>>
                                                                                <?php echo e($session->year); ?>[<?php echo e($session->title); ?>]
                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>

                                                                    <?php if($errors->has('session')): ?>
                                                                        <span class="text-danger">
                                                                            <?php echo e($errors->first('session')); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                $classes = DB::table('sm_classes')
                                                                    ->where('academic_id', '=', old('session', getAcademicId()))
                                                                    ->get();
                                                            ?>
                                                            <div class="col-lg-6 mt-4">
                                                                <div class="primary_input " id="class-div">
                                                                    <label class="primary_input_label" for="">
                                                                        <?php echo app('translator')->get('common.class'); ?> 
                                                                        <span class="text-danger"> <?php echo e(is_required('class') == true ? '*' : ''); ?></span> 
                                                                    </label>
                                                                    <select
                                                                        class="primary_select form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                                        name="class" id="classSelectStudent">
                                                                        <option
                                                                            data-display="<?php echo app('translator')->get('common.class'); ?> <?php if(is_required('class') == true): ?> * <?php endif; ?>"
                                                                            value=""><?php echo app('translator')->get('common.class'); ?> <?php if(is_required('class') == true): ?>
                                                                                *
                                                                            <?php endif; ?>
                                                                        </option>
                                                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($class->id); ?>"
                                                                                <?php echo e(old('class') == $class->id ? 'selected' : ''); ?>>
                                                                                <?php echo e($class->class_name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                    <div class="pull-right loader loader_style"
                                                                        id="select_class_loader">
                                                                        <img class="loader_img_style"
                                                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                            alt="loader">
                                                                    </div>

                                                                    <?php if($errors->has('class')): ?>
                                                                        <span class="text-danger">
                                                                            <?php echo e($errors->first('class')); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <?php if(!empty(old('class'))): ?>
                                                                <?php
                                                                    $old_sections = DB::table('sm_class_sections')
                                                                        ->where('class_id', '=', old('class'))
                                                                        ->join('sm_sections', 'sm_class_sections.section_id', '=', 'sm_sections.id')
                                                                        ->get();
                                                                ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input " id="sectionStudentDiv">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.section'); ?> <span
                                                                                class="text-danger"> *</span> </label>
                                                                        <select
                                                                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                                            name="section" id="sectionSelectStudent">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('common.section'); ?> <?php if(is_required('section') == true): ?> * <?php endif; ?>"
                                                                                value=""><?php echo app('translator')->get('common.section'); ?>
                                                                                <?php if(is_required('section') == true): ?>
                                                                                    *
                                                                                <?php endif; ?>
                                                                            </option>
                                                                            <?php $__currentLoopData = $old_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($old_section->id); ?>"
                                                                                    <?php echo e(old('section') == $old_section->id ? 'selected' : ''); ?>>
                                                                                    <?php echo e($old_section->section_name); ?>

                                                                                </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                        <div class="pull-right loader loader_style"
                                                                            id="select_section_loader">
                                                                            <img class="loader_img_style"
                                                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                                alt="loader">
                                                                        </div>

                                                                        <?php if($errors->has('section')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('section')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input " id="sectionStudentDiv">
                                                                        <label class="primary_input_label" for="">
                                                                            <?php echo app('translator')->get('common.section'); ?> 
                                                                            <span class="text-danger"> <?php echo e(is_required('section') == true ? '*' : ''); ?></span> 
                                                                        </label>
                                                                        <select
                                                                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                                            name="section" id="sectionSelectStudent">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('common.section'); ?> <?php if(is_required('section') == true): ?> * <?php endif; ?>"
                                                                                value=""><?php echo app('translator')->get('common.section'); ?>
                                                                                <?php if(is_required('section') == true): ?>
                                                                                    *
                                                                                <?php endif; ?>
                                                                            </option>
                                                                        </select>
                                                                        <div class="pull-right loader loader_style"
                                                                            id="select_section_loader">
                                                                            <img class="loader_img_style"
                                                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                                alt="loader">
                                                                        </div>

                                                                        <?php if($errors->has('section')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('section')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(is_show('admission_number')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.admission_number'); ?>
                                                                            <?php if(is_required('admission_number') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field  form-control<?php echo e($errors->has('admission_number') ? ' is-invalid' : ''); ?>"
                                                                            type="text" onkeyup="GetAdmin(this.value)"
                                                                            name="admission_number"
                                                                            value="<?php echo e($max_admission_id != '' ? $max_admission_id + 1 : 1); ?>">


                                                                        <?php if($errors->has('admission_number')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('admission_number')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(is_show('admission_date')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label"
                                                                            for="admission_date"><?php echo app('translator')->get('student.admission_date'); ?>
                                                                            <?php if(is_required('admission_date') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <div class="primary_datepicker_input">
                                                                            <div class="no-gutters input-right-icon">
                                                                                <div class="col">
                                                                                    <div class="">
                                                                                        <input
                                                                                            class="primary_input_field primary_input_field date form-control"
                                                                                            id="admission_date"
                                                                                            type="text"
                                                                                            name="admission_date"
                                                                                            value="<?php echo e(old('admission_date') != '' ? old('admission_date') : date('m/d/Y')); ?>"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn-date"
                                                                                    style="top: 55% !important;"
                                                                                    data-id="#admission_date"
                                                                                    type="button">
                                                                                    <label class="m-0 p-0"
                                                                                        for="admission_date">
                                                                                        <i class="ti-calendar"
                                                                                            id="start-date-icon"></i>
                                                                                    </label>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <span
                                                                            class="text-danger"><?php echo e($errors->first('admission_date')); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(is_show('roll_number')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label>
                                                                            <?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?>

                                                                            <?php if(is_required('roll_number') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input oninput="numberCheck(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('roll_number') ? ' is-invalid' : ''); ?>"
                                                                            type="text" id="roll_number"
                                                                            name="roll_number"
                                                                            value="<?php echo e(old('roll_number')); ?>">


                                                                        <?php if($errors->has('roll_number')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('roll_number')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if(is_show('student_group_id')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <div class="primary_input ">
                                                                            <label class="primary_input_label"
                                                                                for=""><?php echo app('translator')->get('student.group'); ?>
                                                                                <?php if(is_required('student_group_id') == true): ?>
                                                                                    <span class="text-danger"> *</span>
                                                                                <?php endif; ?>
                                                                            </label>
                                                                            <select
                                                                                class="primary_select form-control<?php echo e($errors->has('student_group_id') ? ' is-invalid' : ''); ?>"
                                                                                name="student_group_id">
                                                                                <option
                                                                                    data-display="<?php echo app('translator')->get('student.group'); ?>  <?php if(is_required('student_group_id') == true): ?> * <?php endif; ?>"
                                                                                    value=""><?php echo app('translator')->get('student.group'); ?>
                                                                                    <?php if(is_required('student_group_id') == true): ?>
                                                                                        <span class="text-danger"> *</span>
                                                                                    <?php endif; ?>
                                                                                </option>
                                                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($group->id); ?>"
                                                                                        <?php echo e(old('student_group_id') == $group->id ? 'selected' : ''); ?>>
                                                                                        <?php echo e($group->group); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>

                                                                            <?php if($errors->has('student_group_id')): ?>
                                                                                <span class="text-danger">
                                                                                    <?php echo e($errors->first('student_group_id')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.personal_info'); ?></h4>
                                                                </div>
                                                            </div>
                                                            <?php if(is_show('first_name')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.first_name'); ?>
                                                                            <?php if(is_required('first_name') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="first_name"
                                                                            value="<?php echo e(old('first_name')); ?>">


                                                                        <?php if($errors->has('first_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('first_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('last_name')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.last_name'); ?>
                                                                            <?php if(is_required('last_name') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="last_name"
                                                                            value="<?php echo e(old('last_name')); ?>">


                                                                        <?php if($errors->has('last_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('last_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('gender')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.gender'); ?>
                                                                            <?php if(is_required('gender') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <select
                                                                            class="primary_select form-control<?php echo e($errors->has('gender') ? ' is-invalid' : ''); ?>"
                                                                            name="gender">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('common.gender'); ?> <?php if(is_required('gender') == true): ?> * <?php endif; ?>"
                                                                                value=""><?php echo app('translator')->get('common.gender'); ?>
                                                                                <?php if(is_required('gender') == true): ?>
                                                                                    <span class="text-danger"> *</span>
                                                                                <?php endif; ?>
                                                                            </option>
                                                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($gender->id); ?>"
                                                                                    <?php echo e(old('gender') == $gender->id ? 'selected' : ''); ?>>
                                                                                    <?php echo e($gender->base_setup_name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        </select>

                                                                        <?php if($errors->has('gender')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('gender')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('date_of_birth')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label" for="date_of_birth">
                                                                            <?php echo e(__('common.date_of_birth')); ?>

                                                                            <span class="text-danger"><?php echo e(is_required('date_of_birth') == true ? '*' : ''); ?></span>
                                                                        </label>
                                                                        <div class="primary_datepicker_input">
                                                                            <div class="no-gutters input-right-icon">
                                                                                <div class="col">
                                                                                    <div class="">
                                                                                        <input
                                                                                            class="primary_input_field date form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>"
                                                                                            id="date_of_birth"
                                                                                            type="text"
                                                                                            name="date_of_birth"
                                                                                            value="<?php echo e(old('admission_date') != '' ? old('admission_date') : date('m/d/Y')); ?>"
                                                                                            autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn-date"
                                                                                    style="top: 55% !important;"
                                                                                    data-id="#date_of_birth"
                                                                                    type="button">
                                                                                    <label class="m-0 p-0"
                                                                                        for="date_of_birth">
                                                                                        <i class="ti-calendar"
                                                                                            id="start-date-icon"></i>
                                                                                    </label>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <span
                                                                            class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('religion')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.religion'); ?>
                                                                            <?php if(is_required('religion') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <select
                                                                            class="primary_select form-control<?php echo e($errors->has('religion') ? ' is-invalid' : ''); ?>"
                                                                            name="religion">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('student.religion'); ?> <?php if(is_required('religion') == true): ?>  <?php endif; ?>"
                                                                                value=""><?php echo app('translator')->get('student.religion'); ?>
                                                                                <?php if(is_required('religion') == true): ?>
                                                                                    <span class="text-danger"> *</span>
                                                                                <?php endif; ?>
                                                                            </option>
                                                                            <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($religion->id); ?>"
                                                                                    <?php echo e(old('religion') == $religion->id ? 'selected' : ''); ?>>
                                                                                    <?php echo e($religion->base_setup_name); ?>

                                                                                </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        </select>

                                                                        <?php if($errors->has('religion')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('religion')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('caste')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.caste'); ?>
                                                                            <?php if(is_required('caste') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('caste') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="caste"
                                                                            value="<?php echo e(old('caste')); ?>">


                                                                        <?php if($errors->has('caste')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('caste')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('photo')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input">
                                                                        <div class="primary_file_uploader">
                                                                            <input class="primary_input_field form-control<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>"
                                                                                type="text" id="placeholderPhoto"
                                                                                placeholder="<?php echo app('translator')->get('common.student_photo'); ?> <?php if(is_required('photo') == true): ?> * <?php endif; ?>"
                                                                                readonly="">
                                                                            <button class="" type="button">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="addStudentImage"><?php echo e(__('common.browse')); ?></label>
                                                                                <input type="file" class="d-none"
                                                                                    name="photo" id="addStudentImage">
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <?php if($errors->has('photo')): ?>
                                                                        <span class="text-danger">
                                                                            <?php echo e($errors->first('photo')); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="col-md-12 mt-15">
                                                                <img class="d-none previewImageSize" src="" alt="" id="studentImageShow" height="100%" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.contact_info'); ?></h4>
                                                                </div>
                                                            </div>
                                                            <?php if(is_show('email_address')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.email_address'); ?>
                                                                            <?php if(is_required('email_address') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input oninput="emailCheck(this)"
                                                                            class="primary_input_field email_address form-control<?php echo e($errors->has('email_address') ? ' is-invalid' : ''); ?>"
                                                                            id="email_address" type="text"
                                                                            name="email_address"
                                                                            value="<?php echo e(old('email_address')); ?>">


                                                                        <?php if($errors->has('email_address')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('email_address')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('phone_number')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.phone_number'); ?>
                                                                            <?php if(is_required('phone_number') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input oninput="phoneCheck(this)"
                                                                            class="primary_input_field phone_number form-control<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>"
                                                                            type="tel" name="phone_number"
                                                                            id="phone_number"
                                                                            value="<?php echo e(old('phone_number')); ?>">




                                                                        <?php if($errors->has('phone_number')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('phone_number')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <div class="row mb-40 d-none" id="exitStudent">
                                                                <div class="col-lg-12">
                                                                    <input type="checkbox" id="edit_info" value="yes"
                                                                        class="common-checkbox" name="edit_info">
                                                                    <label for="edit_info"
                                                                        class="text-danger"><?php echo app('translator')->get('student.student_already_exit_this_phone_number/email_are_you_to_edit_student_parent_info'); ?></label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <?php if(is_show('current_address') || is_show('permanent_address')): ?>

                                                                    <div class="row mt-40">
                                                                        <div class="col-lg-12">
                                                                            <div class="main-title">
                                                                                <h4 class="stu-sub-head"><?php echo app('translator')->get('student.student_address_info'); ?>
                                                                                </h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <?php if(moduleStatusCheck('Lead') == true): ?>
                                                                            <?php if(is_show('lead_city')): ?>
                                                                                <div class="col-lg-6 mt-4 ">
                                                                                    <div class="primary_input"
                                                                                        style="margin-top:53px !important">
                                                                                        <select
                                                                                            class="primary_select form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>"
                                                                                            name="lead_city"
                                                                                            id="lead_city">
                                                                                            <option
                                                                                                data-display="<?php echo app('translator')->get('lead::lead.city'); ?> <?php if(is_required('lead_city') == true): ?> * <?php endif; ?>"
                                                                                                value="">
                                                                                                <?php echo app('translator')->get('lead::lead.city'); ?>
                                                                                                <?php if(is_required('lead_city') == true): ?>
                                                                                                    <span
                                                                                                        class="text-danger">
                                                                                                        *</span>
                                                                                                <?php endif; ?>
                                                                                            </option>
                                                                                            <?php $__currentLoopData = $lead_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option
                                                                                                    value="<?php echo e($city->id); ?>"
                                                                                                    <?php echo e(old('lead_city') == $city->id ? 'selected' : ''); ?>>
                                                                                                    <?php echo e($city->city_name); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>

                                                                                        <?php if($errors->has('lead_city')): ?>
                                                                                            <span class="text-danger">
                                                                                                <?php echo e($errors->first('lead_city')); ?>

                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                        <?php if(is_show('current_address')): ?>
                                                                            <div class="col-lg-6 mt-4">
                                                                                <div class="primary_input ">
                                                                                    <label class="primary_input_label"
                                                                                        for=""><?php echo app('translator')->get('student.current_address'); ?>
                                                                                        <?php if(is_required('current_address') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </label>
                                                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('current_address') ? ' is-invalid' : ''); ?>"
                                                                                        cols="0" rows="3" name="current_address" id="current_address"><?php echo e(old('current_address')); ?></textarea>


                                                                                    <?php if($errors->has('current_address')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('current_address')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php if(is_show('permanent_address')): ?>
                                                                            <div class="col-lg-6 mt-4">
                                                                                <div class="primary_input">
                                                                                    <label class="primary_input_label"
                                                                                        for=""><?php echo app('translator')->get('student.permanent_address'); ?>
                                                                                        <?php if(is_required('permanent_address') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </label>
                                                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('current_address') ? ' is-invalid' : ''); ?>"
                                                                                        cols="0" rows="3" name="permanent_address" id="permanent_address"><?php echo e(old('permanent_address')); ?></textarea>


                                                                                    <?php if($errors->has('permanent_address')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('permanent_address')); ?>

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
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.medical_record'); ?></h4>
                                                                </div>
                                                            </div>
                                                            <?php if(is_show('blood_group')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.blood_group'); ?>
                                                                            <?php if(is_required('blood_group') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <select
                                                                            class="primary_select form-control<?php echo e($errors->has('blood_group') ? ' is-invalid' : ''); ?>"
                                                                            name="blood_group">
                                                                            <option
                                                                                data-display="<?php echo app('translator')->get('common.blood_group'); ?> <?php if(is_required('blood_group') == true): ?> * <?php endif; ?>"
                                                                                value=""><?php echo app('translator')->get('common.blood_group'); ?>
                                                                                <?php if(is_required('blood_group') == true): ?>
                                                                                    <span class="text-danger"> *</span>
                                                                                <?php endif; ?>
                                                                            </option>
                                                                            <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($blood_group->id); ?>"
                                                                                    <?php echo e(old('blood_group') == $blood_group->id ? 'selected' : ''); ?>>
                                                                                    <?php echo e($blood_group->base_setup_name); ?>

                                                                                </option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>

                                                                        <?php if($errors->has('blood_group')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('blood_group')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('student_category_id')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <div class="primary_input ">
                                                                            <label class="primary_input_label"
                                                                                for=""><?php echo app('translator')->get('student.category'); ?>
                                                                                <?php if(is_required('student_category_id') == true): ?>
                                                                                    <span class="text-danger"> *</span>
                                                                                <?php endif; ?>
                                                                            </label>
                                                                            <select
                                                                                class="primary_select form-control<?php echo e($errors->has('student_category_id') ? ' is-invalid' : ''); ?>"
                                                                                name="student_category_id">
                                                                                <option
                                                                                    data-display="<?php echo app('translator')->get('student.category'); ?>  <?php if(is_required('student_category_id') == true): ?> * <?php endif; ?>"
                                                                                    value=""><?php echo app('translator')->get('student.student_category_id'); ?>
                                                                                    <?php if(is_required('category') == true): ?>
                                                                                        <span class="text-danger"> *</span>
                                                                                    <?php endif; ?>
                                                                                </option>
                                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($category->id); ?>"
                                                                                        <?php echo e(old('student_category_id') == $category->id ? 'selected' : ''); ?>>
                                                                                        <?php echo e($category->category_name); ?>

                                                                                    </option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                            </select>

                                                                            <?php if($errors->has('student_category_id')): ?>
                                                                                <span class="text-danger">
                                                                                    <?php echo e($errors->first('student_category_id')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('height')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.height_in'); ?>
                                                                            <?php if(is_required('height') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('height') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="height"
                                                                            value="<?php echo e(old('height')); ?>">


                                                                        <?php if($errors->has('height')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('height')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('weight')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.weight_kg'); ?>
                                                                            <?php if(is_required('weight') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('weight') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="weight"
                                                                            value="<?php echo e(old('weight')); ?>">


                                                                        <?php if($errors->has('weight')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('weight')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(moduleStatusCheck('Lead') == true): ?>
                                                                <div class="row mb-15">
                                                                    <?php if(is_show('source_id')): ?>
                                                                        <div class="col-lg-6 mt-4">
                                                                            <div class="primary_input">
                                                                                <select
                                                                                    class="primary_select form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>"
                                                                                    name="source_id" id="source_id">
                                                                                    <option
                                                                                        data-display="<?php echo app('translator')->get('lead::lead.source'); ?> <?php if(is_required('source_id') == true): ?> * <?php endif; ?>"
                                                                                        value=""><?php echo app('translator')->get('lead::lead.source'); ?>
                                                                                        <?php if(is_required('source_id') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </option>
                                                                                    <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option
                                                                                            value="<?php echo e($source->id); ?>"
                                                                                            <?php echo e(old('source_id') == $source->id ? 'selected' : ''); ?>>
                                                                                            <?php echo e($source->source_name); ?>

                                                                                        </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>

                                                                                <?php if($errors->has('source_id')): ?>
                                                                                    <span class="text-danger">
                                                                                        <?php echo e($errors->first('source_id')); ?>

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
                                        <div role="tabpanel" class="tab-pane fade" id="parents_and_guardian_info">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <?php if(generalSetting()->with_guardian): ?>
                                                                <?php if(is_show('guardians_email') || is_show('guardians_phone')): ?>
                                                                    <div class="col-lg-12 text-right">
                                                                        <div class="row">
                                                                            <div class="col-lg-7 text-left"
                                                                                id="parent_info">
                                                                                <input type="hidden" name="parent_id"
                                                                                    value="">

                                                                            </div>
                                                                            <div class="col-lg-5">
                                                                                <button
                                                                                    class="primary-btn-small-input primary-btn small fix-gr-bg"
                                                                                    type="button" data-toggle="modal"
                                                                                    data-target="#editStudent">
                                                                                    <span class="ti-plus pr-2"></span>
                                                                                    <?php echo app('translator')->get('student.add_parents'); ?>
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 guardian_section">
                                                    <div class="form-section">
                                                        <div class="row m-0">
                                                            <?php if(generalSetting()->with_guardian): ?>
                                                                <input type="hidden" name="staff_parent"
                                                                    id="staff_parent">
                                                                <!-- Start Sibling Add Modal -->
                                                                <div class="modal fade admin-query" id="editStudent">
                                                                    <div
                                                                        class="modal-dialog small-modal modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title"><?php echo app('translator')->get('student.select_sibling'); ?>
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal">&times;</button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <div class="container-fluid">
                                                                                    <form action="">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <div
                                                                                                    class="d-flex radio-btn-flex">
                                                                                                    <div class="mr-30">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="subject_type"
                                                                                                            id="siblingParentRadio"
                                                                                                            value="sibling"
                                                                                                            class="common-radio relationButton addParent"
                                                                                                            checked>
                                                                                                        <label
                                                                                                            for="siblingParentRadio"><?php echo app('translator')->get('student.From Sibling'); ?></label>
                                                                                                    </div>

                                                                                                    <div class="mr-30">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            name="subject_type"
                                                                                                            id="staffParentRadio"
                                                                                                            value="staff"
                                                                                                            class="common-radio relationButton addParent">
                                                                                                        <label
                                                                                                            for="staffParentRadio"><?php echo app('translator')->get('student.From Staff'); ?></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-15"
                                                                                            id="siblingParent">
                                                                                            <div class="col-lg-12">

                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12 sibling_required_error"
                                                                                                        id="sibling_required_error">

                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row mt-15">
                                                                                                    <div class="col-lg-12"
                                                                                                        id="sibling_class_div">
                                                                                                        <label
                                                                                                            for="primary_input_label"><?php echo app('translator')->get('common.class'); ?>
                                                                                                            <span
                                                                                                                class="text-danger">
                                                                                                                *</span></label>
                                                                                                        <select
                                                                                                            class="primary_select"
                                                                                                            name="sibling_class"
                                                                                                            id="select_sibling_class">
                                                                                                            <option
                                                                                                                data-display="<?php echo app('translator')->get('student.class'); ?> *"
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('student.class'); ?>
                                                                                                                *
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($class->id); ?>"
                                                                                                                    <?php echo e(old('sibling_class') == $class->id ? 'selected' : ''); ?>>
                                                                                                                    <?php echo e($class->class_name); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="row mt-15">
                                                                                                    <div class="col-lg-12"
                                                                                                        id="sibling_section_div">
                                                                                                        <label
                                                                                                            for="primary_input_label"><?php echo app('translator')->get('common.section'); ?>
                                                                                                            <span
                                                                                                                class="text-danger">
                                                                                                                *</span></label>
                                                                                                        <select
                                                                                                            class="primary_select"
                                                                                                            name="sibling_section"
                                                                                                            id="select_sibling_section">
                                                                                                            <option
                                                                                                                data-display="<?php echo app('translator')->get('common.section'); ?> *"
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('common.section'); ?>
                                                                                                                *
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row mt-15">
                                                                                                    <div class="col-lg-12"
                                                                                                        id="sibling_name_div">
                                                                                                        <label
                                                                                                            for="primary_input_label"><?php echo app('translator')->get('student.sibling'); ?>
                                                                                                            <span
                                                                                                                class="text-danger">
                                                                                                                *</span></label>
                                                                                                        <select
                                                                                                            class="primary_select"
                                                                                                            name="select_sibling_name"
                                                                                                            id="select_sibling_name">
                                                                                                            <option
                                                                                                                data-display="<?php echo app('translator')->get('student.sibling'); ?> *"
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('student.sibling'); ?>
                                                                                                                *
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="row mt-15 d-none"
                                                                                            id="staffParent">
                                                                                            <div class="col-lg-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12 sibling_required_error"
                                                                                                        id="sibling_required_error">

                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-12"
                                                                                                        id="staff_class_div">
                                                                                                        <select
                                                                                                            class="primary_select"
                                                                                                            id="select_staff_parent">
                                                                                                            <option
                                                                                                                data-display="<?php echo app('translator')->get('hr.select_staff'); ?> *"
                                                                                                                value="">
                                                                                                                <?php echo app('translator')->get('hr.select_staff'); ?>
                                                                                                                *
                                                                                                            </option>
                                                                                                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                <option
                                                                                                                    value="<?php echo e($staff->id); ?>">
                                                                                                                    <?php echo e($staff->full_name); ?>

                                                                                                                </option>
                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-12 text-center mt-40">
                                                                                                <div
                                                                                                    class="mt-40 d-flex justify-content-between">
                                                                                                    <button type="button"
                                                                                                        class="primary-btn tr-bg"
                                                                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                                                                                                    <button
                                                                                                        class="primary-btn fix-gr-bg"
                                                                                                        id="save_button_parent"
                                                                                                        data-dismiss="modal"
                                                                                                        type="button"><?php echo app('translator')->get('common.save_information'); ?></button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End Sibling Add Modal -->
                                                                <div class="parent_details" id="parent_details">

                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="main-title">
                                                                                <h4 class="stu-sub-head"><?php echo app('translator')->get('common.fathers_info'); ?>
                                                                                </h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <?php if(is_show('fathers_name')): ?>
                                                                            <div class="col-lg-6 mt-4">
                                                                                <div class="primary_input ">
                                                                                    <label class="primary_input_label"
                                                                                        for=""><?php echo app('translator')->get('student.father_name'); ?>
                                                                                        <?php if(is_required('fathers_name') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </label>
                                                                                    <input
                                                                                        class="primary_input_field form-control<?php echo e($errors->has('fathers_name') ? ' is-invalid' : ''); ?>"
                                                                                        type="text" name="fathers_name"
                                                                                        id="fathers_name"
                                                                                        value="<?php echo e(old('fathers_name')); ?>">


                                                                                    <?php if($errors->has('fathers_name')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('fathers_name')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php if(is_show('fathers_occupation')): ?>
                                                                            <div class="col-lg-6 mt-4">
                                                                                <div class="primary_input ">
                                                                                    <label class="primary_input_label"
                                                                                        for=""><?php echo app('translator')->get('student.occupation'); ?>
                                                                                        <?php if(is_required('fathers_occupation') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </label>
                                                                                    <input
                                                                                        class="primary_input_field form-control<?php echo e($errors->has('fathers_occupation') ? ' is-invalid' : ''); ?>"
                                                                                        type="text"
                                                                                        name="fathers_occupation"
                                                                                        id="fathers_occupation"
                                                                                        value="<?php echo e(old('fathers_occupation')); ?>">


                                                                                    <?php if($errors->has('fathers_occupation')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('fathers_occupation')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php if(is_show('fathers_phone')): ?>
                                                                            <div class="col-lg-6 mt-4">
                                                                                <div class="primary_input ">
                                                                                    <label class="primary_input_label"
                                                                                        for=""><?php echo app('translator')->get('student.father_phone'); ?>
                                                                                        <?php if(is_required('father_phone') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </label>
                                                                                    <input oninput="phoneCheck(this)"
                                                                                        class="primary_input_field form-control<?php echo e($errors->has('fathers_phone') ? ' is-invalid' : ''); ?>"
                                                                                        type="text"
                                                                                        name="fathers_phone"
                                                                                        id="fathers_phone"
                                                                                        value="<?php echo e(old('fathers_phone')); ?>">


                                                                                    <?php if($errors->has('fathers_phone')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('fathers_phone')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <?php if(is_show('fathers_photo')): ?>
                                                                            <div class="col-lg-6 mt-4">
                                                                                <div class="primary_input">
                                                                                    <label class="primary_input_label"
                                                                                        for=""><?php echo app('translator')->get('student.fathers_photo'); ?>
                                                                                        <?php if(is_required('fathers_photo') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </label>
                                                                                    <div class="primary_file_uploader">
                                                                                        <input class="primary_input_field"
                                                                                            type="text"
                                                                                            id="placeholderFathersName"
                                                                                            placeholder="<?php echo app('translator')->get('student.photo'); ?>"
                                                                                            readonly="">
                                                                                        <button class=""
                                                                                            type="button">
                                                                                            <label
                                                                                                class="primary-btn small fix-gr-bg"
                                                                                                for="addFatherImage"><?php echo e(__('common.browse')); ?></label>
                                                                                            <input type="file"
                                                                                                class="d-none"
                                                                                                name="fathers_photo"
                                                                                                id="addFatherImage">
                                                                                        </button>
                                                                                    </div>
                                                                                    <span
                                                                                        class="text-danger"><?php echo e($errors->first('fathers_photo')); ?></span>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <div class="col-md-12 mt-15">
                                                                            <img class="d-none previewImageSize" src="" alt="" id="fatherImageShow" height="100%" width="100%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="row mt-4">

                                                            <?php if(is_show('mothers_name')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.mother_name'); ?>
                                                                            <?php if(is_required('mothers_name') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('mothers_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="mothers_name"
                                                                            id="mothers_name"
                                                                            value="<?php echo e(old('mothers_name')); ?>">


                                                                        <?php if($errors->has('mothers_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('mothers_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('mothers_occupation')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.occupation'); ?>
                                                                            <?php if(is_required('mothers_occupation') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('mothers_occupation') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="mothers_occupation"
                                                                            id="mothers_occupation"
                                                                            value="<?php echo e(old('mothers_occupation')); ?>">


                                                                        <?php if($errors->has('mothers_occupation')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('mothers_occupation')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('mothers_phone')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.mother_phone'); ?>
                                                                            <?php if(is_required('mothers_phone') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input oninput="phoneCheck(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('mothers_phone') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="mothers_phone"
                                                                            id="mothers_phone"
                                                                            value="<?php echo e(old('mothers_phone')); ?>">


                                                                        <?php if($errors->has('mothers_phone')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('mothers_phone')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('mothers_photo')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input mb-15">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.mothers_photo'); ?>
                                                                            <?php if(is_required('mothers_photo') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <div class="primary_file_uploader">
                                                                            <input class="primary_input_field"
                                                                                type="text" id="placeholderMothersName"
                                                                                placeholder="<?php echo app('translator')->get('student.photo'); ?>"
                                                                                readonly="">
                                                                            <button class="" type="button">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="addMotherImage"><?php echo e(__('common.browse')); ?></label>
                                                                                <input type="file" class="d-none"
                                                                                    name="mothers_photo"
                                                                                    id="addMotherImage">
                                                                            </button>
                                                                        </div>
                                                                        <span
                                                                            class="text-danger"><?php echo e($errors->first('mothers_photo')); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="col-md-12 mt-15">
                                                                <img class="d-none previewImageSize" src="" alt="" id="motherImageShow" height="100%" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 guardian_section">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('common.guardian_info'); ?>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <?php if(is_show('guardians_email') || is_show('guardians_phone')): ?>
                                                                <div class="col-lg-12">
                                                                    <div class="row mt-4">
                                                                        <div class="col-lg-12 d-flex gap-20 flex-wrap">
                                                                            <p class="text-uppercase fw-500 mb-10">
                                                                                <?php echo app('translator')->get('student.relation_with_guardian'); ?></p>
                                                                            <div class="d-flex radio-btn-flex flex-wrap">
                                                                                <div class="mr-30">
                                                                                    <input type="radio"
                                                                                        name="relationButton"
                                                                                        id="relationFather" value="F"
                                                                                        class="common-radio relationButton"
                                                                                        <?php echo e(old('relationButton') == 'F' ? 'checked' : ''); ?>>
                                                                                    <label
                                                                                        for="relationFather"><?php echo app('translator')->get('student.father'); ?></label>
                                                                                </div>
                                                                                <div class="mr-30">
                                                                                    <input type="radio"
                                                                                        name="relationButton"
                                                                                        id="relationMother" value="M"
                                                                                        class="common-radio relationButton"
                                                                                        <?php echo e(old('relationButton') == 'M' ? 'checked' : ''); ?>>
                                                                                    <label
                                                                                        for="relationMother"><?php echo app('translator')->get('student.mother'); ?></label>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="radio"
                                                                                        name="relationButton"
                                                                                        id="relationOther" value="O"
                                                                                        class="common-radio relationButton"
                                                                                        <?php echo e(old('relationButton') != '' ? (old('relationButton') == 'O' ? 'checked' : '') : 'checked'); ?>>
                                                                                    <label
                                                                                        for="relationOther"><?php echo app('translator')->get('student.Other'); ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('guardians_name')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.guardian_name'); ?>
                                                                            <?php if(is_required('guardians_name') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('guardians_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="guardians_name"
                                                                            id="guardians_name"
                                                                            value="<?php echo e(old('guardians_name')); ?>">


                                                                        <?php if($errors->has('guardians_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('guardians_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('guardians_email') || is_show('guardians_phone')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.relation_with_guardian'); ?>
                                                                            <?php if(is_required('relation') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input class="primary_input_field read-only-input"
                                                                            type="text" placeholder="Relation"
                                                                            name="relation" id="relation" value="Other"
                                                                            readonly>


                                                                        <?php if($errors->has('relation')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('relation')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('guardians_email')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.guardian_email'); ?>
                                                                            <?php if(is_required('guardians_email') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input oninput="emailCheck(this)"
                                                                            class="primary_input_field form-control<?php echo e($errors->has('guardians_email') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="guardians_email"
                                                                            id="guardians_email"
                                                                            value="<?php echo e(old('guardians_email')); ?>">


                                                                        <?php if($errors->has('guardians_email')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('guardians_email')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('guardians_photo')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.guardians_photo'); ?>
                                                                            <?php if(is_required('guardians_photo') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <div class="primary_file_uploader">
                                                                            <input class="primary_input_field"
                                                                                type="text"
                                                                                id="placeholderGuardiansName"
                                                                                placeholder="<?php echo app('translator')->get('student.photo'); ?>"
                                                                                readonly="">
                                                                            <button class="" type="button">
                                                                                <label class="primary-btn small fix-gr-bg"
                                                                                    for="addGuardianImage"><?php echo e(__('common.browse')); ?></label>
                                                                                <input type="file" class="d-none"
                                                                                    name="guardians_photo"
                                                                                    id="addGuardianImage">
                                                                            </button>
                                                                        </div>
                                                                        <span
                                                                            class="text-danger"><?php echo e($errors->first('guardians_photo')); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="col-md-12 mt-15">
                                                                <img class="d-none previewImageSize" src="" alt="" id="guardianImageShow" height="100%" width="100%">
                                                            </div>
                                                            <?php if(is_show('guardians_phone')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.guardian_phone'); ?>
                                                                            <?php if(is_required('guardians_phone') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('guardians_phone') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="guardians_phone"
                                                                            id="guardians_phone"
                                                                            value="<?php echo e(old('guardians_phone')); ?>">


                                                                        <?php if($errors->has('guardians_phone')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e(@$errors->first('guardians_phone')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('guardians_occupation')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.guardian_occupation'); ?>
                                                                            <?php if(is_required('guardians_occupation') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('guardians_occupation') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="guardians_occupation"
                                                                            id="guardians_occupation"
                                                                            value="<?php echo e(old('guardians_occupation')); ?>">


                                                                        <?php if($errors->has('guardians_occupation')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e(@$errors->first('guardians_occupation')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('guardians_address')): ?>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.guardian_address'); ?>
                                                                            <?php if(is_required('guardians_address') == true): ?>
                                                                                <span class="text-danger">
                                                                                    *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <textarea class="primary_input_field form-control<?php echo e($errors->has('guardians_address') ? ' is-invalid' : ''); ?>"
                                                                            cols="0" rows="3" name="guardians_address" id="guardians_address"><?php echo e(old('guardians_address')); ?></textarea>


                                                                        <?php if($errors->has('guardians_address')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('guardians_address')); ?>

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
                                        <div role="tabpanel" class="tab-pane fade" id="document_info">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.document_info'); ?></h4>
                                                                </div>
                                                            </div>
                                                            <?php if(is_show('national_id_number')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('common.national_id_number'); ?>
                                                                            <?php if(is_required('national_id_number') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('national_id_number') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="national_id_number"
                                                                            value="<?php echo e(old('national_id_number')); ?>">


                                                                        <?php if($errors->has('national_id_number')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('national_id_number')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('local_id_number')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label> <?php echo app('translator')->get('common.birth_certificate_number'); ?><?php if(is_required('local_id_number') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?> </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('local_id_number') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="local_id_number"
                                                                            value="<?php echo e(old('local_id_number')); ?>">


                                                                        <?php if($errors->has('local_id_number')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('local_id_number')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('additional_notes')): ?>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.additional_notes'); ?>
                                                                            <?php if(is_required('additional_notes') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <textarea class="primary_input_field form-control<?php echo e($errors->has('additional_notes') ? ' is-invalid' : ''); ?>"
                                                                            cols="0" rows="3" name="additional_notes"><?php echo e(old('additional_notes')); ?></textarea>


                                                                        <?php if($errors->has('additional_notes')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('additional_notes')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.bank_info'); ?></h4>
                                                                </div>
                                                            </div>
                                                            <?php if(is_show('bank_name')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.bank_name'); ?>
                                                                            <?php if(is_required('bank_name') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('bank_name') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="bank_name"
                                                                            value="<?php echo e(old('bank_name')); ?>">


                                                                        <?php if($errors->has('bank_name')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('bank_name')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('bank_account_number')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('accounts.bank_account_number'); ?>
                                                                            <?php if(is_required('bank_account_number') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('bank_account_number') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="bank_account_number"
                                                                            value="<?php echo e(old('bank_account_number')); ?>">


                                                                        <?php if($errors->has('bank_account_number')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('bank_account_number')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if(is_show('ifsc_code')): ?>
                                                                <div class="col-lg-6 mt-4">
                                                                    <div class="primary_input">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.ifsc_code'); ?>
                                                                            <?php if(is_required('ifsc_code') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <input
                                                                            class="primary_input_field form-control<?php echo e($errors->has('ifsc_code') ? ' is-invalid' : ''); ?>"
                                                                            type="text" name="ifsc_code"
                                                                            value="<?php echo e(old('ifsc_code')); ?>">


                                                                        <?php if($errors->has('ifsc_code')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('ifsc_code')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="main-title">
                                                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.document_attachment'); ?></h4>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-3 col-lg-4 col-md-6 mt-4">
                                                                <div class="row">
                                                                    <?php if(is_show('document_file_1')): ?>
                                                                        <div class="col-lg-12">
                                                                            <div class="primary_input ">
                                                                                <label class="primary_input_label"
                                                                                    for=""><?php echo app('translator')->get('student.document_01_title'); ?>
                                                                                    <?php if(is_required('document_file_1') == true): ?>
                                                                                        <span class="text-danger"> *</span>
                                                                                    <?php endif; ?>
                                                                                </label>
                                                                                <input
                                                                                    class="primary_input_field form-control<?php echo e($errors->has('document_title_1') ? ' is-invalid' : ''); ?>"
                                                                                    type="text" name="document_title_1"
                                                                                    value="<?php echo e(old('document_title_1')); ?>">
                                                                                <?php if($errors->has('document_title_1')): ?>
                                                                                    <span class="text-danger">
                                                                                        <?php echo e($errors->first('document_title_1')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-lg-12 mt-2 mb-3 mb-lg-0">
                                                                        <div class="primary_input">
                                                                            <div class="primary_file_uploader">
                                                                                <input class="primary_input_field"
                                                                                    type="text"
                                                                                    name="document_title_1"
                                                                                    id="placeholderFileOneName"
                                                                                    placeholder="01  <?php if(is_required('document_file_1') == true): ?> * <?php endif; ?>"
                                                                                    readonly="">
                                                                                <button class="" type="button">
                                                                                    <label
                                                                                        class="primary-btn small fix-gr-bg"
                                                                                        for="document_file_1"><?php echo e(__('common.browse')); ?></label>
                                                                                    <input type="file" class="d-none"
                                                                                        name="document_file_1"
                                                                                        id="document_file_1">
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-6 mt-4">
                                                                <div class="row">
                                                                    <?php if(is_show('document_file_2')): ?>
                                                                        <div class="col-lg-12">
                                                                            <div class="primary_input ">
                                                                                <label class="primary_input_label"
                                                                                    for=""><?php echo app('translator')->get('student.document_02_title'); ?>
                                                                                    <?php if(is_required('document_file_2') == true): ?>
                                                                                        <span class="text-danger"> *</span>
                                                                                    <?php endif; ?>
                                                                                </label>
                                                                                <input
                                                                                    class="primary_input_field form-control<?php echo e($errors->has('document_title_2') ? ' is-invalid' : ''); ?>"
                                                                                    type="text" name="document_title_2"
                                                                                    value="<?php echo e(old('document_title_2')); ?>">


                                                                                <?php if($errors->has('document_title_2')): ?>
                                                                                    <span class="text-danger">
                                                                                        <?php echo e($errors->first('document_title_2')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-lg-12 mt-2 mb-3 mb-lg-0">
                                                                        <div class="primary_input">
                                                                            <div class="primary_file_uploader">
                                                                                <input class="primary_input_field"
                                                                                    type="text"
                                                                                    id="placeholderFileTwoName"
                                                                                    placeholder="01  <?php if(is_required('document_file_2') == true): ?> * <?php endif; ?>"
                                                                                    readonly="">
                                                                                <button class="" type="button">
                                                                                    <label
                                                                                        class="primary-btn small fix-gr-bg"
                                                                                        for="document_file_2"><?php echo e(__('common.browse')); ?></label>
                                                                                    <input type="file" class="d-none"
                                                                                        name="document_file_2"
                                                                                        id="document_file_2">
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-6 mt-4">
                                                                <div class="row">
                                                                    <?php if(is_show('document_file_3')): ?>
                                                                        <div class="col-lg-12">
                                                                            <div class="primary_input ">
                                                                                <label class="primary_input_label"
                                                                                    for=""><?php echo app('translator')->get('student.document_03_title'); ?>
                                                                                    <?php if(is_required('document_file_3') == true): ?>
                                                                                        <span class="text-danger"> *</span>
                                                                                    <?php endif; ?>
                                                                                </label>
                                                                                <input
                                                                                    class="primary_input_field form-control<?php echo e($errors->has('document_title_3') ? ' is-invalid' : ''); ?>"
                                                                                    type="text" name="document_title_3"
                                                                                    value="<?php echo e(old('document_title_3')); ?>">


                                                                                <?php if($errors->has('document_title_3')): ?>
                                                                                    <span class="text-danger">
                                                                                        <?php echo e($errors->first('document_title_3')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-lg-12 mt-2 mb-3 mb-lg-0">
                                                                        <div class="primary_input">
                                                                            <div class="primary_file_uploader">
                                                                                <input class="primary_input_field"
                                                                                    type="text"
                                                                                    id="placeholderFileThreeName"
                                                                                    placeholder="01  <?php if(is_required('document_file_3') == true): ?> * <?php endif; ?>"
                                                                                    readonly="">
                                                                                <button class="" type="button">
                                                                                    <label
                                                                                        class="primary-btn small fix-gr-bg"
                                                                                        for="document_file_3"><?php echo e(__('common.browse')); ?></label>
                                                                                    <input type="file" class="d-none"
                                                                                        name="document_file_3"
                                                                                        id="document_file_3">
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-6 mt-4">
                                                                <div class="row">
                                                                    <?php if(is_show('document_file_4')): ?>
                                                                        <div class="col-lg-12">
                                                                            <div class="primary_input ">
                                                                                <label class="primary_input_label"
                                                                                    for=""><?php echo app('translator')->get('student.document_04_title'); ?>
                                                                                    <?php if(is_required('document_file_4') == true): ?>
                                                                                        <span class="text-danger"> *</span>
                                                                                    <?php endif; ?>
                                                                                </label>

                                                                                <input
                                                                                    class="primary_input_field form-control<?php echo e($errors->has('document_title_4') ? ' is-invalid' : ''); ?>"
                                                                                    type="text" name="document_title_4"
                                                                                    value="<?php echo e(old('document_title_4')); ?>">

                                                                                <?php if($errors->has('document_title_4')): ?>
                                                                                    <span class="text-danger">
                                                                                        <?php echo e($errors->first('document_title_4')); ?>

                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-lg-12 mt-2 mb-3 mb-lg-0">

                                                                        <div class="primary_input">
                                                                            <div class="primary_file_uploader">
                                                                                <input class="primary_input_field"
                                                                                    type="text"
                                                                                    id="placeholderFileFourName"
                                                                                    placeholder="01  <?php if(is_required('document_file_4') == true): ?> * <?php endif; ?>"
                                                                                    readonly="">
                                                                                <button class="" type="button">
                                                                                    <label
                                                                                        class="primary-btn small fix-gr-bg"
                                                                                        for="document_file_4"><?php echo e(__('common.browse')); ?></label>
                                                                                    <input type="file" class="d-none"
                                                                                        name="document_file_4"
                                                                                        id="document_file_4">
                                                                                </button>
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
                                        <div role="tabpanel" class="tab-pane fade" id="previous_school_info">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <?php if(is_show('previous_school_details')): ?>
                                                                <div class="col-lg-12">
                                                                    <div class="primary_input ">
                                                                        <label class="primary_input_label"
                                                                            for=""><?php echo app('translator')->get('student.previous_school_details'); ?>
                                                                            <?php if(is_required('previous_school_details') == true): ?>
                                                                                <span class="text-danger"> *</span>
                                                                            <?php endif; ?>
                                                                        </label>
                                                                        <textarea class="primary_input_field form-control<?php echo e($errors->has('previous_school_details') ? ' is-invalid' : ''); ?>"
                                                                            cols="0" rows="5" name="previous_school_details"><?php echo e(old('previous_school_details')); ?></textarea>


                                                                        <?php if($errors->has('previous_school_details')): ?>
                                                                            <span class="text-danger">
                                                                                <?php echo e($errors->first('previous_school_details')); ?>

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
                                        <div role="tabpanel" class="tab-pane fade" id="Other_info">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <?php if(isMenuAllowToShow('transport')): ?>
                                                                    <?php if(is_show('route') || is_show('vehicle')): ?>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="main-title">
                                                                                    <h4 class="stu-sub-head">
                                                                                        <?php echo app('translator')->get('student.transport'); ?></h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-15 mt-30">
                                                                            <?php if(is_show('route')): ?>
                                                                                <div class="col-lg-6">
                                                                                    <div class="primary_input ">
                                                                                        <label
                                                                                            for="primary_input_label"><?php echo app('translator')->get('student.route_list'); ?>
                                                                                            <span>
                                                                                                <?php if(is_required('route') == true): ?>
                                                                                                    *
                                                                                                <?php endif; ?>
                                                                                            </span>
                                                                                        </label>
                                                                                        <select
                                                                                            class="primary_select form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>"
                                                                                            name="route"
                                                                                            id="route">
                                                                                            <option
                                                                                                data-display="<?php echo app('translator')->get('student.route_list'); ?> <?php if(is_required('route') == true): ?> * <?php endif; ?>"
                                                                                                value="">
                                                                                                <?php echo app('translator')->get('student.route_list'); ?>
                                                                                                <?php if(is_required('route') == true): ?>
                                                                                                    <span
                                                                                                        class="text-danger">
                                                                                                        *</span>
                                                                                                <?php endif; ?>
                                                                                            </option>
                                                                                            <?php $__currentLoopData = $route_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option
                                                                                                    value="<?php echo e($route_list->id); ?>"
                                                                                                    <?php echo e(old('route') == $route_list->id ? 'selected' : ''); ?>>
                                                                                                    <?php echo e($route_list->title); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>

                                                                                    </div>
                                                                                    <?php if($errors->has('route')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('route')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if(is_show('vehicle')): ?>
                                                                                <div class="col-lg-6">
                                                                                    <div class="primary_input "
                                                                                        id="select_vehicle_div">
                                                                                        <label
                                                                                            for="primary_input_label"><?php echo app('translator')->get('student.vehicle_number'); ?>
                                                                                            <span>
                                                                                                <?php if(is_required('vehicle') == true): ?>
                                                                                                    *
                                                                                                <?php endif; ?>
                                                                                            </span>
                                                                                        </label>
                                                                                        <select
                                                                                            class="primary_select form-control<?php echo e($errors->has('vehicle') ? ' is-invalid' : ''); ?>"
                                                                                            name="vehicle"
                                                                                            id="selectVehicle">
                                                                                            <option
                                                                                                data-display="<?php echo app('translator')->get('student.vehicle_number'); ?> <?php if(is_required('vehicle') == true): ?> * <?php endif; ?>"
                                                                                                value="">
                                                                                                <?php echo app('translator')->get('student.vehicle_number'); ?>
                                                                                                <?php if(is_required('vehicle') == true): ?>
                                                                                                    <span
                                                                                                        class="text-danger">
                                                                                                        *</span>
                                                                                                <?php endif; ?>
                                                                                            </option>
                                                                                        </select>
                                                                                        <div class="pull-right loader loader_style"
                                                                                            id="select_transport_loader">
                                                                                            <img class="loader_img_style"
                                                                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                                                alt="loader">
                                                                                        </div>

                                                                                    </div>
                                                                                    <?php if($errors->has('vehicle')): ?>
                                                                                        <span class="text-danger">
                                                                                            <?php echo e($errors->first('vehicle')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-section">
                                                        <?php if(isMenuAllowToShow('dormitory')): ?>
                                                            <?php if(is_show('dormitory_name') || is_show('room_number')): ?>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="main-title">
                                                                            <h4 class="stu-sub-head"><?php echo app('translator')->get('student.Other_info'); ?>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-15 mt-30">
                                                                    <?php if(is_show('dormitory_name')): ?>
                                                                        <div class="col-lg-6">
                                                                            <div class="primary_input ">
                                                                                <label
                                                                                    for="primary_input_label"><?php echo app('translator')->get('dormitory.dormitory'); ?>
                                                                                    <span>
                                                                                        <?php if(is_required('dormitory_name') == true): ?>
                                                                                            *
                                                                                        <?php endif; ?>
                                                                                    </span>
                                                                                </label>
                                                                                <select
                                                                                    class="primary_select form-control<?php echo e($errors->has('dormitory_name') ? ' is-invalid' : ''); ?>"
                                                                                    name="dormitory_name"
                                                                                    id="SelectDormitory">
                                                                                    <option
                                                                                        data-display="<?php echo app('translator')->get('dormitory.dormitory_name'); ?> <?php if(is_required('dormitory_name') == true): ?> * <?php endif; ?>"
                                                                                        value=""><?php echo app('translator')->get('dormitory.dormitory_name'); ?>
                                                                                        <?php if(is_required('dormitory_name') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </option>
                                                                                    <?php $__currentLoopData = $dormitory_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option
                                                                                            value="<?php echo e($dormitory_list->id); ?>"
                                                                                            <?php echo e(old('dormitory_name') == $dormitory_list->id ? 'selected' : ''); ?>>
                                                                                            <?php echo e($dormitory_list->dormitory_name); ?>

                                                                                        </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>

                                                                            </div>
                                                                            <?php if($errors->has('dormitory_name')): ?>
                                                                                <span class="text-danger">
                                                                                    <?php echo e($errors->first('dormitory_name')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <?php if(is_show('room_number')): ?>
                                                                        <div class="col-lg-6">
                                                                            <div class="primary_input "
                                                                                id="roomNumberDiv">
                                                                                <label
                                                                                    for="primary_input_label"><?php echo app('translator')->get('academics.room_number'); ?>
                                                                                    <span>
                                                                                        <?php if(is_required('room_number') == true): ?>
                                                                                            *
                                                                                        <?php endif; ?>
                                                                                    </span>
                                                                                </label>
                                                                                <select
                                                                                    class="primary_select form-control<?php echo e($errors->has('room_number') ? ' is-invalid' : ''); ?>"
                                                                                    name="room_number"
                                                                                    id="selectRoomNumber">
                                                                                    <option
                                                                                        data-display="<?php echo app('translator')->get('academics.room_number'); ?>"
                                                                                        value="">
                                                                                        <?php echo app('translator')->get('academics.room_number'); ?> <?php if(is_required('room_number') == true): ?>
                                                                                            <span class="text-danger">
                                                                                                *</span>
                                                                                        <?php endif; ?>
                                                                                    </option>
                                                                                </select>
                                                                                <div class="pull-right loader loader_style"
                                                                                    id="select_dormitory_loader">
                                                                                    <img class="loader_img_style"
                                                                                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                                        alt="loader">
                                                                                </div>

                                                                            </div>
                                                                            <?php if($errors->has('room_number')): ?>
                                                                                <span class="text-danger">
                                                                                    <?php echo e($errors->first('room_number')); ?>

                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="custom_field">
                                            <div class="row pt-4 row-gap-24">
                                                <div class="col-lg-12">
                                                    <div class="form-section">
                                                        <div class="">
                                                            <?php if(count($custom_fields) && is_show('custom_field') && isMenuAllowToShow('custom_field')): ?>
                                                                
                                                                <div class="row mt-40">
                                                                    <div class="col-lg-12">
                                                                        <div class="main-title">
                                                                            <h4 class="stu-sub-head"><?php echo app('translator')->get('student.custom_field'); ?>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
            </div>
            <?php echo e(Form::close()); ?>


        </div>
    </section>
    
    
    

    

    
    
    

    
    
    

    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('public/backEnd/js/croppie.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/js/st_addmision.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            var currentDate = new Date();
            $('#startDate').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true,
                endDate: "currentDate",
                maxDate: currentDate
            }).on('changeDate', function(ev) {
                $(this).datepicker('hide');
                console.log($(this).datepicker('hide'));
            });
            $('#startDate').keyup(function() {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9^-]/g, '');
                }
            });

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
            $(document).on('change', '.phone_number', function() {

                let email = $("#email_address").val();
                let phone = $(this).val();
                checkExitStudent(email, phone);
            });
            $(document).on('change', '.email_address', function() {
                let email = $(this).val();
                let phone = $("#phone_number").val();
                checkExitStudent(email, phone);
            });

            function checkExitStudent(email, phone) {
                var url = $("#url").val();
                var formData = {
                    email: email,
                    phone: phone,
                }
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "student/check-exit",
                    success: function(data) {
                        if (data.student != null) {
                            $('#exitStudent').removeClass('d-none');
                        } else {
                            $('#exitStudent').addClass('d-none');
                            $('#edit_info').prop('checked', false);
                        }

                    },
                    error: function(data) {
                        console.log("Error:", data);
                    }

                })
            }
            $(document).on('change', '.addParent', function() {
                let type = $(this).val();
                if (type == 'staff') {
                    $('#staffParent').removeClass('d-none');
                    $('#siblingParent').addClass('d-none');
                } else if (type == 'sibling') {
                    $('#siblingParent').removeClass('d-none');
                    $('#staffParent').addClass('d-none');
                }
            });

        })
        $(document).on('change', '#addStudentImage', function(event) {
            $('#studentImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderPhoto');
            imageChangeWithFile($(this)[0], '#studentImageShow');
        });
        $(document).on('change', '#addFatherImage', function(event) {
            $('#fatherImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderFathersName');
            imageChangeWithFile($(this)[0], '#fatherImageShow');
        });
        $(document).on('change', '#addMotherImage', function(event) {
            $('#motherImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderMothersName');
            imageChangeWithFile($(this)[0], '#motherImageShow');
        });
        $(document).on('change', '#addGuardianImage', function(event) {
            $('#guardianImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderGuardiansName');
            imageChangeWithFile($(this)[0], '#guardianImageShow');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/student_admission.blade.php ENDPATH**/ ?>