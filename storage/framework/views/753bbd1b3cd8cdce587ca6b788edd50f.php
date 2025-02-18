
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.student_edit'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/backEnd/')); ?>/css/croppie.css">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .input-right-icon button.primary-btn-small-input {
            top: 80% !important;
            right: 10px !important;
        }
        i#end-date-icon::before {
            position: absolute !important;
            bottom: 30px !important;
            right: 5px !important;
        }

        i#start-date-icon::before {
            position: absolute !important;
            bottom: 8px !important;
            right: 5px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb up_breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_edit'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('student_list')); ?>"><?php echo app('translator')->get('common.student_list'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_edit'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row mb-30">
            <div class="col-lg-6">
                <div class="main-title">
                    <h3><?php echo app('translator')->get('student.student_edit'); ?></h3>
                </div>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_form'])); ?>

                     
        <div class="row">
            <div class="col-lg-12">
                
                <div class="white-box">
                    <div class="">
                        <div class="row mb-4">
                            <div class="col-lg-12 text-center">

                                <?php if($errors->any()): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <?php if($error == "The email address has already been taken."): ?>
                                        <div class="error text-danger ">
                                            <?php echo e('The email address has already been taken, You can find out in student list or disabled student list'); ?>

                                        </div>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if($errors->any()): ?>
                                     <div class="error text-danger "><?php echo e('Something went wrong, please try again'); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.personal_info'); ?></h4>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">                    
                        <input type="hidden" value="<?php echo e($student->id); ?>" name="parent_registration_student_id">  
                     



                        <div class="row mb-20">
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.academic_year'); ?> <span
                                            class="text-danger"> *</span> </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('session') ? ' is-invalid' : ''); ?>" name="session" id="academic_year">
                                        <option data-display="<?php echo app('translator')->get('common.academic_year'); ?>  <?php if(is_required('session')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('common.academic_year'); ?>  <?php if(is_required('session')==true): ?> * <?php endif; ?></option>
                                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($student->academic_id)): ?>
                                        <option value="<?php echo e($session->id); ?>" <?php echo e($student->academic_id == $session->id? 'selected':''); ?>><?php echo e($session->year); ?> [<?php echo e($session->title); ?>]</option>
                                        <?php else: ?>
                                        <option value="<?php echo e($session->id); ?>"><?php echo e($session->year); ?>[<?php echo e($session->title); ?>]</option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('session')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('session')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="primary_input" id="class-div">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?> <span
                                            class="text-danger"> *</span> </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" name="class" id="classSelectStudent">
                                        <option data-display="<?php echo app('translator')->get('common.class'); ?>  <?php if(is_required('class')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('common.class'); ?>  <?php if(is_required('class')==true): ?> * <?php endif; ?></option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e($student->class_id == $class->id? 'selected':''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_class_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    
                                    <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="primary_input" id="sectionStudentDiv">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?> <span
                                            class="text-danger"> *</span> </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" name="section" id="sectionSelectStudent">
                                       <option data-display="<?php echo app('translator')->get('common.section'); ?>  <?php if(is_required('section')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('common.section'); ?>  <?php if(is_required('section')==true): ?> * <?php endif; ?></option>
                                     
                                       <?php $__currentLoopData = $student->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>" <?php echo e($student->section_id == $section->id? 'selected': ''); ?>><?php echo e($section->section_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    
                                    <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.admission_number'); ?>  <?php if(is_required('admission_number')==true): ?> * <?php endif; ?></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('admission_number') ? ' is-invalid' : ''); ?>" type="text" name="admission_number" value="<?php echo e($max_admission_id != ''? $max_admission_id + 1 : 1); ?>" onkeyup="GetAdminUpdate(this.value,<?php echo e($student->id); ?>)">
                                    
                                    <span class="text-danger" id="Admission_Number" role="alert"></span>
                                    <?php if($errors->has('admission_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('admission_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <?php if(moduleStatusCheck('Lead')==true): ?>
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('lead::lead.id_number'); ?><?php if(is_required('roll_number')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <?php else: ?> 
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.roll'); ?><?php if(is_required('roll_number')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <?php endif; ?>

                                    <input class="primary_input_field " type="text" name="roll_number" value="<?php echo e($student->id_number); ?>"  id="roll_number">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.first_name'); ?> <?php if(is_required('first_name')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" type="text" name="first_name" value="<?php echo e($student->first_name); ?>">
                                    
                                    <?php if($errors->has('first_name')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('first_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.last_name'); ?><?php if(is_required('last_name')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" type="text" name="last_name" value="<?php echo e($student->last_name); ?>">
                                    
                                    <?php if($errors->has('last_name')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('last_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.gender'); ?>
                                        <?php if(is_required('gender') == true): ?>
                                            <span class="text-danger"> *</span>
                                        <?php endif; ?> </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('gender') ? ' is-invalid' : ''); ?>" name="gender">
                                        <option data-display="<?php echo app('translator')->get('common.gender'); ?> <?php if(is_required('gender')==true): ?>  * <?php endif; ?>" value=""><?php echo app('translator')->get('common.gender'); ?> <?php if(is_required('gender')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                        <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($student->gender_id)): ?>
                                                <option value="<?php echo e($gender->id); ?>" <?php echo e($student->gender_id == $gender->id? 'selected': ''); ?>><?php echo e($gender->base_setup_name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($gender->id); ?>"><?php echo e($gender->base_setup_name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    
                                    <?php if($errors->has('gender')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('gender')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date_of_birth'); ?> <?php if(is_required('date_of_birth')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                            <input class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>" id="startDate" type="text" name="date_of_birth" value="<?php echo e(date('m/d/Y', strtotime($student->date_of_birth))); ?>" autocomplete="off">
                                            
                                            <?php if($errors->has('date_of_birth')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('date_of_birth')); ?>

                                    </span>
                                    <?php endif; ?>
                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <label class="m-0 p-0" for="startDate">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </label>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-20">
                             <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.blood_group'); ?>
                                        <?php if(is_required('blood_group') == true): ?>
                                            <span class="text-danger"> *</span>
                                        <?php endif; ?>
                                    </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('blood_group') ? ' is-invalid' : ''); ?>" name="blood_group">
                                        <option data-display="<?php echo app('translator')->get('student.blood_group'); ?> <?php if(is_required('blood_group')==true): ?>  * <?php endif; ?>" value=""><?php echo app('translator')->get('student.blood_group'); ?> <?php if(is_required('blood_group')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                        <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($student->bloodgroup_id)): ?>
                                            <option value="<?php echo e($blood_group->id); ?>" <?php echo e($blood_group->id == $student->bloodgroup_id? 'selected': ''); ?>><?php echo e($blood_group->base_setup_name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($blood_group->id); ?>"><?php echo e($blood_group->base_setup_name); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('blood_group')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('blood_group')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.religion'); ?>
                                        <?php if(is_required('religion') == true): ?>
                                            <span class="text-danger"> *</span>
                                        <?php endif; ?>
                                    </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('religion') ? ' is-invalid' : ''); ?>" name="religion">
                                        <option data-display="<?php echo app('translator')->get('student.religion'); ?> <?php if(is_required('religion')==true): ?>  * <?php endif; ?>" value=""><?php echo app('translator')->get('student.religion'); ?> <?php if(is_required('religion')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                        <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($religion->id); ?>" <?php echo e($student->religion_id != ""? ($student->religion_id == $religion->id? 'selected':''):''); ?>><?php echo e($religion->base_setup_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    
                                    <?php if($errors->has('religion')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('religion')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.caste'); ?> <?php if(is_required('caste')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field" type="text" name="caste" value="<?php echo e($student->caste); ?>">
                                    
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.email_address'); ?> <?php if(is_required('email_address')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input oninput="emailCheck(this)" class="primary_input_field email_address form-control<?php echo e($errors->has('email_address') ? ' is-invalid' : ''); ?>" type="text" name="email_address" id="email_address" value="<?php echo e($student->student_email); ?>">
                                    
                                    <?php if($errors->has('email_address')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('email_address')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.phone_number'); ?> <?php if(is_required('phone_number')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input oninput="phoneCheck(this)" class="primary_input_field phone_number form-control<?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>" type="text" name="phone_number"  id="phone_number" value="<?php echo e($student->student_mobile); ?>">
                                    
                                    <?php if($errors->has('phone_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('phone_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="ro mb-40 <?php echo e($exitStudent ? '' :'d-none'); ?>" id="exitStudent">
                            <div class="col-lg-12">
                                <label for="edit_info" class="text-danger"><?php echo app('translator')->get('student.student_already_exit_this_phone_number_are_you_to_edit_student_parent_info'); ?></label>
                                <input type="checkbox" id="edit_info" value="yes" class="common-checkbox" name="edit_info">
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-lg-3">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.admission_date'); ?>
                                                <?php if(is_required('admission_date')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></span>
                                            </label>
                                            <input class="primary_input_field  primary_input_field date form-control" id="endDate" type="text" name="admission_date" value="<?php echo e($student->admission_date != ""? date('m/d/Y', strtotime($student->admission_date)): date('m/d/Y')); ?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <label class="m-0 p-0" for="startDate">
                                                <i class="ti-calendar" id="end-date-icon"></i>
                                            </label>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                           
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.category'); ?>
                                            <?php if(is_required('student_category_id') == true): ?>
                                                <span class="text-danger"> *</span>
                                            <?php endif; ?> </label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('student_category_id') ? ' is-invalid' : ''); ?>" name="student_category_id">
                                            <option data-display="<?php echo app('translator')->get('student.category'); ?> <?php if(is_required('student_category_id')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('student.category'); ?> <?php if(is_required('student_category_id')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($student->student_category_id)): ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo e($student->student_category_id == $category->id? 'selected': ''); ?>><?php echo e($category->category_name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    
                                    <?php if($errors->has('student_category_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('student_category_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.group'); ?>
                                            <?php if(is_required('student_group_id') == true): ?>
                                                <span class="text-danger"> *</span>
                                            <?php endif; ?> </label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('student_group_id') ? ' is-invalid' : ''); ?>" name="student_group_id">
                                            <option data-display="<?php echo app('translator')->get('student.group'); ?> <?php if(is_required('student_group_id')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('student.group'); ?> <?php if(is_required('student_group_id')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($student->student_group_id)): ?>
                                            <option value="<?php echo e($group->id); ?>" <?php echo e($student->student_group_id == $group->id? 'selected': ''); ?>><?php echo e($group->group); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($group->id); ?>"><?php echo e($group->group); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    
                                    <?php if($errors->has('student_group_id')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('student_group_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.height_in'); ?> <?php if(is_required('height')==true): ?> <span class="text-danger"> *</span> <?php endif; ?> </label>
                                    <input class="primary_input_field" type="text" name="height" value="<?php echo e($student->height); ?>">
                                    
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.weight_kg'); ?> <?php if(is_required('weight')==true): ?> <span class="text-danger"> *</span> <?php endif; ?> </label>
                                    <input class="primary_input_field" type="text" name="weight" value="<?php echo e($student->weight); ?>">
                                    
                                </div>
                            </div>
                        </div>
                        <?php if(moduleStatusCheck('Lead')==true): ?>
                        <div class="row mb-20">                            
                            <div class="col-lg-4">
                                <div class="primary_input">
                                        <select class="primary_select  form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>" name="source_id" id="source_id">
                                            <option data-display="<?php echo app('translator')->get('lead::lead.source'); ?> <?php if(is_required('source_id')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('lead::lead.source'); ?> <?php if(is_required('source_id')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                            <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($source->id); ?>" <?php echo e($student->source_id == $source->id? 'selected': ''); ?>><?php echo e($source->source_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        
                                        <?php if($errors->has('source_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('source_id')); ?>

                                        </span>
                                        <?php endif; ?>
                                </div>
                            </div>                            
                        </div>
                        <?php endif; ?>
                        <div class="row mb-20">
                            
                            <div class="col-lg-3">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.student_photo'); ?>
                                                <?php if(is_required('student_photo') == true): ?>
                                                    <span class="text-danger"> *</span>
                                                <?php endif; ?>
                                            </label>
                                            <input class="primary_input_field" type="text" id="placeholderPhoto" placeholder="<?php echo e($student->student_photo != ""? getFilePath3($student->student_photo):(is_required('student_photo')==true ? trans('common.student_photo') .'*': trans('common.student_photo'))); ?>"
                                                disabled>
                                            
                                            <?php if($errors->has('photo')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('photo')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="upload_content_file"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="photo" id="upload_content_file">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                           <div class="col-lg-6 text-right">
                                <div class="row mt-35">
                                    <div class="col-lg-7 text-left" id="parent_info">
                                        <input type="hidden" name="parent_id" value="">

                                    </div>
                                    <div class="col-lg-5">
                                        <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button" data-toggle="modal" data-target="#editStudent">
                                            <span class="ti-plus pr-2"></span> 
                                            <?php echo app('translator')->get('student.add_parent'); ?>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Start Sibling Add Modal -->
                        <div class="modal fade admin-query" id="editStudent">
                            <div class="modal-dialog small-modal modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo app('translator')->get('common.select_sibling'); ?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <form action="">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-12" id="sibling_required_error">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row mt-25">
                                                            <div class="col-lg-12" id="sibling_class_div">
                                                                <label for="primary_input_label"><?php echo app('translator')->get('common.class'); ?>
                                                                    <span class="text-danger"> *</span></label>
                                                                <select class="primary_select " name="sibling_class" id="select_sibling_class">
                                                                    <option data-display="<?php echo app('translator')->get('common.class'); ?> *" value=""><?php echo app('translator')->get('common.class'); ?> *</option>
                                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->class_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-25">
                                                            <div class="col-lg-12" id="sibling_section_div">
                                                                <label for="primary_input_label"><?php echo app('translator')->get('common.section'); ?>
                                                                    <span class="text-danger"> *</span></label>
                                                                <select class="primary_select " name="sibling_section" id="select_sibling_section">
                                                                    <option data-display="<?php echo app('translator')->get('common.section'); ?> *" value=""><?php echo app('translator')->get('common.section'); ?> *</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-25">
                                                            <div class="col-lg-12" id="sibling_name_div">
                                                                <label for="primary_input_label"><?php echo app('translator')->get('student.sibling'); ?>
                                                                    <span class="text-danger"> *</span></label>
                                                                <select class="primary_select " name="select_sibling_name" id="select_sibling_name">
                                                                    <option data-display="<?php echo app('translator')->get('student.sibling'); ?> *" value=""><?php echo app('translator')->get('student.sibling'); ?> *</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 text-center mt-40">
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <button class="primary-btn fix-gr-bg" id="save_button_parent" data-dismiss="modal" type="button"><?php echo app('translator')->get('student.update_information'); ?></button>
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
                        <input type="hidden" name="sibling_id" value="<?php echo e(count($siblings) > 1? 1: 0); ?>" id="sibling_id">
                        <?php if(count($siblings) > 1): ?>
                         <div class="row mt-40 mb-4" id="siblingTitle">
                            <div class="col-lg-11 col-md-10">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.siblings'); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-1 text-right col-md-2">
                                <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10"  data-toggle="modal" data-target="#removeSiblingModal">
                                    <span class="pr ti-close"></span>
                                </button>
                            </div>
                        </div>
                        <div class="row mb-20 student-details" id="siblingInfo">
                            <?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sibling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sibling->id != $student->id): ?>
                                    <div class="col-sm-12 col-md-6 col-lg-3 mb-30">
                                        <div class="student-meta-box">
                                            <div class="student-meta-top siblings-meta-top"></div>
                                            <img class="student-meta-img img-100" src="<?php echo e(asset($student->fathers_photo)); ?>" alt="<?php echo e($student->fathers_name); ?>">
                                            <div class="white-box radius-t-y-0">
                                                <div class="single-meta mt-50">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="name">
                                                            <?php echo app('translator')->get('student.full_name'); ?>
                                                        </div>
                                                        <div class="value">
                                                            <?php echo e($sibling->full_name); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-meta">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="name">
                                                            <?php echo app('translator')->get('student.admission_number'); ?>
                                                        </div>
                                                        <div class="value">
                                                            <?php echo e($sibling->admission_no); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single-meta">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="name">
                                                            <?php echo app('translator')->get('common.class'); ?>
                                                        </div>
                                                        <div class="value">
                                                            <?php echo e($sibling->class!=""?$sibling->class->class_name:""); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single-meta">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="name">
                                                            <?php echo app('translator')->get('common.section'); ?>
                                                        </div>
                                                        <div class="value">
                                                            <?php echo e($sibling->section !=""?$sibling->section->section_name:""); ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>

                        <div class="parent_details" id="parent_details">
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <h4 class="stu-sub-head"><?php echo app('translator')->get('student.parents_and_guardian_info'); ?></h4>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-20">
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.father_name'); ?> <?php if(is_required('father_name')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('fathers_name') ? ' is-invalid' : ''); ?>" type="text" name="fathers_name" id="fathers_name" value="<?php echo e($student->fathers_name); ?>">
                                        
                                        <?php if($errors->has('fathers_name')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('fathers_name')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.occupation'); ?>  <?php if(is_required('fathers_occupation')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field form-control" type="text" placeholder="" name="fathers_occupation" id="fathers_occupation" value="<?php echo e($student->fathers_occupation); ?>">
                                        
                                    </div>
                                </div>
                                 <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.father_phone'); ?> <?php if(is_required('father_phone')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input oninput="phoneCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('fathers_phone') ? ' is-invalid' : ''); ?>" type="text" name="fathers_phone" id="fathers_phone"  value="<?php echo e($student->fathers_mobile); ?>">
                                        
                                        <?php if($errors->has('fathers_phone')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('fathers_phone')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.fathers_photo'); ?>
                                                    <?php if(is_required('fathers_photo') == true): ?>
                                                        <span class="text-danger"> *</span>
                                                    <?php endif; ?>
                                                </label>
                                                <input class="primary_input_field" type="text" id="placeholderFathersName" placeholder="<?php echo e(isset($student->fathers_photo) && $student->fathers_photo != ""? getFilePath3($student->fathers_photo):(is_required('fathers_photo')==true ? __('common.photo') .'*': __('common.photo'))); ?>"
                                                    disabled>
                                                
                                                <?php if($errors->has('fathers_photo')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('fathers_photo')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="fathers_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="fathers_photo" id="fathers_photo">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-20">
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.mother_name'); ?>  <?php if(is_required('mothers_name')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('mothers_name') ? ' is-invalid' : ''); ?>" type="text" name="mothers_name" id="mothers_name"   value="<?php echo e($student->mothers_name); ?>">
                                        
                                        <?php if($errors->has('mothers_name')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('mothers_name')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.occupation'); ?> <?php if(is_required('mothers_occupation')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field" type="text" name="mothers_occupation" id="mothers_occupation" value="<?php echo e($student->mothers_occupation); ?>">
                                        
                                    </div>
                                </div>
                                 <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.mother_phone'); ?> <?php if(is_required('mothers_phone')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input oninput="phoneCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('mothers_phone') ? ' is-invalid' : ''); ?>" type="text" name="mothers_phone" id="mothers_phone" value="<?php echo e($student->mothers_mobile); ?>">
                                        
                                        <?php if($errors->has('mothers_phone')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('mothers_phone')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.mothers_photo'); ?>
                                                    <?php if(is_required('mothers_photo') == true): ?>
                                                        <span class="text-danger"> *</span>
                                                    <?php endif; ?>
                                                </label>
                                                <input class="primary_input_field" type="text" id="placeholderMothersName" placeholder="<?php echo e(isset($student->mothers_photo) && $student->mothers_photo != ""? getFilePath3($student->mothers_photo):(is_required('mothers_photo')==true ? __('common.photo') .'*': __('common.photo'))); ?>"
                                                    disabled>
                                                
                                                <?php if($errors->has('mothers_photo')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('mothers_photo')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="mothers_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="mothers_photo" id="mothers_photo">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="row mb-40">
                                <div class="col-lg-12 d-flex">
                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('student.relation_with_guardian'); ?> *</p>
                                    <div class="d-flex radio-btn-flex ml-40">
                                        <div class="mr-30">
                                            <input type="radio" name="relationButton" id="relationFather" value="F" class="common-radio relationButton" <?php echo e($student->guardian_relation == "F"? 'checked':''); ?>>
                                            <label for="relationFather"><?php echo app('translator')->get('student.father'); ?></label>
                                        </div>
                                        <div class="mr-30">
                                            <input type="radio" name="relationButton" id="relationMother" value="M" class="common-radio relationButton" <?php echo e($student->guardian_relation == "M"? 'checked':''); ?>>
                                            <label for="relationMother"><?php echo app('translator')->get('student.mother'); ?></label>
                                        </div>
                                        <div>
                                            <input type="radio" name="relationButton" id="relationOther" value="O" class="common-radio relationButton"
                                                    <?php echo e($student->guardian_relation == "O"? 'checked':''); ?>>
                                            <label for="relationOther"><?php echo app('translator')->get('student.Other'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                            <div class="row mb-20">
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.guardian_name'); ?>  <?php if(is_required('guardians_name')==true): ?> <span class="text-danger"> *</span> <?php endif; ?> </label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('guardians_name') ? ' is-invalid' : ''); ?>" type="text" name="guardians_name" id="guardians_name" value="<?php echo e($student->guardian_name); ?>">
                                        
                                        <?php if($errors->has('guardians_name')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('guardians_name')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php
                                    if($student->guardian_relation=='F'){
                                            $show_relation ="Father";
                                    }
                                    if($student->guardian_relation=='M'){
                                            $show_relation ="Mother";
                                    }
                                    if($student->guardian_relation=='O'){
                                            $show_relation ="Other";
                                    }
                                ?>
                                
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.relation_with_guardian'); ?> <?php if(is_required('relation')==true): ?> <span> * </span> <?php endif; ?> </label>
                                        <input class="primary_input_field read-only-input" type="text" placeholder="Relation" name="relation" id="relation" value="<?php echo e($student->relation); ?>" readonly>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.guardian_email'); ?> <?php if(is_required('guardians_email')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('guardians_email') ? ' is-invalid' : ''); ?>" type="text" name="guardians_email" id="guardians_email" value="<?php echo e($student->guardian_email); ?>">
                                        
                                        <?php if($errors->has('guardians_email')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('guardians_email')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.guardians_photo'); ?>
                                                    <?php if(is_required('guardians_photo') == true): ?>
                                                        <span class="text-danger"> *</span>
                                                    <?php endif; ?>
                                                </label>
                                                <input class="primary_input_field" type="text" id="placeholderGuardiansName" placeholder="<?php echo e(isset($student->guardians_photo) && $student->guardians_photo != ""? getFilePath3($student->guardians_photo):(is_required('guardians_photo')==true ? __('common.photo') .'*': __('common.photo'))); ?>"
                                                    disabled>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg" for="guardians_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="guardians_photo" id="guardians_photo">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-20">
                                <div class="col-lg-6">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.guardian_phone'); ?> <?php if(is_required('guardians_phone')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field form-control<?php echo e($errors->has('guardians_phone') ? ' is-invalid' : ''); ?>" type="text" name="guardians_phone" id="guardians_phone" value="<?php echo e($student->guardian_mobile); ?>">
                                        
                                        <?php if($errors->has('guardians_phone')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('guardians_phone')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.guardian_occupation'); ?> <?php if(is_required('guardians_occupation')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                        <input class="primary_input_field" type="text" name="guardians_occupation" id="guardians_occupation" value="<?php echo e($student->guardians_occupation); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                             <div class="row mt-35">
                                <div class="col-lg-12">
                                    <div class="primary_input">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.guardian_address'); ?> <?php if(is_required('guardians_address')==true): ?> <span class="text-danger"> *</span> <?php endif; ?>  </label>
                                        <textarea class="primary_input_field form-control" cols="0" rows="4" name="guardians_address" id="guardians_address"><?php echo e($student->guardians_address); ?></textarea>
                                        
                                       <?php if($errors->has('guardians_address')): ?>
                                        <span class="danger text-danger">
                                            <?php echo e($errors->first('guardians_address')); ?>

                                        </span>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.student_address_info'); ?></h4>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-30 mt-30">
                            <?php if(moduleStatusCheck('Lead')==true): ?>
                            <div class="col-lg-4 ">
                                <div class="primary_input" style="margin-top:53px !important">
                                    <select class="primary_select  form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>" name="lead_city" id="lead_city">
                                        <option data-display="<?php echo app('translator')->get('lead::lead.city'); ?> <?php if(is_required('lead_city')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('lead::lead.city'); ?> <?php if(is_required('lead_city')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></option>
                                        <?php $__currentLoopData = $lead_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e($student->lead_city == $city->id? 'selected': ''); ?>><?php echo e($city->city_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('lead_city')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('lead_city')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-lg-6">
                                <div class="primary_input mt-20">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.current_address'); ?> <?php if(is_required('current_address')==true): ?> <span class="text-danger"> *</span> <?php endif; ?>  </label>
                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('current_address') ? ' is-invalid' : ''); ?>" cols="0" rows="3" name="current_address" id="current_address"><?php echo e($student->current_address); ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="primary_input mt-20">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.permanent_address'); ?>  <?php if(is_required('permanent_address')==true): ?> <span class="text-danger"> *</span> <?php endif; ?>  </label>
                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('current_address') ? ' is-invalid' : ''); ?>" cols="0" rows="3" name="permanent_address" id="permanent_address"><?php echo e($student->permanent_address); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40 mb-4">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.transport_and_dormitory_info'); ?></h4>
                                </div>
                            </div>
                        </div>

                         <div class="row mb-20">
                            <div class="col-lg-6">
                                <div class="primary_input">
                                    <select class="primary_select  form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>" name="route" id="route">
                                        <option data-display="<?php echo app('translator')->get('student.route_list'); ?> <?php if(is_required('route')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('student.route_list'); ?> <?php if(is_required('route')==true): ?> * <?php endif; ?></option>
                                        <?php $__currentLoopData = $route_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($student->route_list_id)): ?>
                                        <option value="<?php echo e($route_list->id); ?>" <?php echo e($student->route_list_id == $route_list->id? 'selected':''); ?>><?php echo e($route_list->title); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($route_list->id); ?>"><?php echo e($route_list->title); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('route')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('route')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="primary_input" id="select_vehicle_div">
                                    <select class="primary_select  form-control<?php echo e($errors->has('vehicle') ? ' is-invalid' : ''); ?>" name="vehicle" id="selectVehicle">
                                        <option data-display="<?php echo app('translator')->get('student.vehicle_number'); ?> <?php if(is_required('vehicle')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('student.vehicle_number'); ?> <?php if(is_required('vehicle')==true): ?> * <?php endif; ?></option>
                                        <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($student->vechile_id) && $vehicle->id == $student->vechile_id): ?>
                                        <option value="<?php echo e($vehicle->id); ?>" <?php echo e($student->vechile_id == $vehicle->id? 'selected':''); ?>><?php echo e($vehicle->vehicle_no); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_transport_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    
                                    <?php if($errors->has('vehicle')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('vehicle')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                         <div class="row mb-20">
                            <div class="col-lg-6">
                                <div class="primary_input">
                                    <select class="primary_select  form-control<?php echo e($errors->has('dormitory_name') ? ' is-invalid' : ''); ?>" name="dormitory_name" id="SelectDormitory">
                                        <option data-display="<?php echo app('translator')->get('dormitory.dormitory_name'); ?> <?php if(is_required('dormitory_name')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('dormitory.dormitory_name'); ?> <?php if(is_required('dormitory_name')==true): ?> * <?php endif; ?></option >
                                        <?php $__currentLoopData = $dormitory_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($student->dormitory_id): ?>
                                        <option value="<?php echo e($dormitory_list->id); ?>" <?php echo e($student->dormitory_id == $dormitory_list->id? 'selected':''); ?>><?php echo e($dormitory_list->dormitory_name); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($dormitory_list->id); ?>"><?php echo e($dormitory_list->dormitory_name); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
                                    </select>
                                    
                                    <?php if($errors->has('dormitory_name')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('dormitory_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="primary_input" id="roomNumberDiv">
                                    <select class="primary_select  form-control<?php echo e($errors->has('room_number') ? ' is-invalid' : ''); ?>" name="room_number" id="selectRoomNumber">
                                        <option data-display="<?php echo app('translator')->get('academics.room_number'); ?> <?php if(is_required('room_number')==true): ?> * <?php endif; ?>" value=""><?php echo app('translator')->get('academics.room_number'); ?> <?php if(is_required('room_number')==true): ?> * <?php endif; ?></option>
                                        <?php if($student->room_id != ""): ?>
                                            <option value="<?php echo e($student->room_id); ?>" selected="true"><?php echo e($student->room !=""?$student->room->name:""); ?></option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_dormitory_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    
                                    <?php if($errors->has('room_number')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('room_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40 mb-4">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.Other_info'); ?></h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-20">
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.national_id_number'); ?> <?php if(is_required('national_id_number')==true): ?> <span class="text-danger"> *</span> <?php endif; ?><span></span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('national_id_number') ? ' is-invalid' : ''); ?>" type="text" name="national_id_number" value="<?php echo e($student->national_id_no); ?>">
                                    
                                    <?php if($errors->has('national_id_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('national_id_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.birth_certificate_number'); ?><?php if(is_required('local_id_number')==true): ?> <span class="text-danger"> *</span> <?php endif; ?> </label>
                                    <input class="primary_input_field form-control" type="text" name="local_id_number" value="<?php echo e($student->local_id_no); ?>">
                                    
                                    <?php if($errors->has('local_id_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('local_id_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.bank_account_number'); ?> <?php if(is_required('bank_account_number')==true): ?> <span class="text-danger"> *</span> <?php endif; ?> </label>
                                    <input class="primary_input_field form-control" type="text" name="bank_account_number" value="<?php echo e($student->bank_account_no); ?>">
                                    
                                    <?php if($errors->has('bank_account_number')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('bank_account_number')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.bank_name'); ?> <?php if(is_required('bank_name')==true): ?> <span class="text-danger"> *</span> <?php endif; ?> </label>
                                    <input class="primary_input_field form-control" type="text" name="bank_name" value="<?php echo e($student->bank_name); ?>">
                                    
                                    <?php if($errors->has('bank_name')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('bank_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-20 mt-40">
                            <div class="col-lg-6">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.previous_school_details'); ?> <?php if(is_required('previous_school_details')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="previous_school_details"><?php echo e($student->previous_school_details); ?></textarea>
                                    
                                    <?php if($errors->has('previous_school_details')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('previous_school_details')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.additional_notes'); ?> <?php if(is_required('additional_notes')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="additional_notes"><?php echo e($student->aditional_notes); ?></textarea>
                                    
                                    <?php if($errors->has('additional_notes')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('additional_notes')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input mt-50">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.ifsc_code'); ?><?php if(is_required('ifsc_code')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field form-control" type="text" name="ifsc_code" value="<?php echo e(old('ifsc_code')); ?><?php echo e($student->ifsc_code); ?>">
                                    
                                    <?php if($errors->has('ifsc_code')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('ifsc_code')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40 mb-4">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.document_info'); ?></h4>
                                </div>
                            </div>
                        </div>
                        
                         <div class="row mb-20">
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_01_title'); ?> <?php if(is_required('document_file_1')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field" type="text" name="document_title_1" value="<?php echo e($student->document_title_1); ?>">
                                    
                                    <?php if($errors->has('document_title_1')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('document_title_1')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_02_title'); ?> <?php if(is_required('document_file_2')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field" type="text" name="document_title_2" value="<?php echo e($student->document_title_2); ?>">
                                    
                                    <?php if($errors->has('document_title_2')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('document_title_2')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_03_title'); ?> <?php if(is_required('document_file_3')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field" type="text" name="document_title_3" value="<?php echo e($student->document_title_3); ?>">
                                    
                                    <?php if($errors->has('document_title_3')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('document_title_3')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_04_title'); ?> <?php if(is_required('document_file_4')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                    <input class="primary_input_field" type="text" name="document_title_4" value="<?php echo e($student->document_title_4); ?>">
                                    
                                    <?php if($errors->has('document_title_4')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('document_title_4')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                         <div class="row mb-20">
                             <div class="col-lg-3">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_01'); ?> <?php if(is_required('document_file_1')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                            <input class="primary_input_field" type="text" id="placeholderFileOneName" placeholder="<?php echo e($student->document_file_1 != ""? showPicName($student->document_file_1):(is_required('document_file_1')==true ? '01 *': '01')); ?>"
                                                disabled>
                                            
                                            <?php if($errors->has('document_file_1')): ?>
                                            <span class="text-danger d-block" >
                                                <?php echo e($errors->first('document_file_1')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="document_file_1"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_1" id="document_file_1">
                                        </button>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_02'); ?> <?php if(is_required('document_file_2')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                            <input class="primary_input_field" type="text" id="placeholderFileTwoName" placeholder="<?php echo e(isset($student->document_file_2) && $student->document_file_2 != ""? showPicName($student->document_file_2):(is_required('document_file_2')==true ? '02 *': '02')); ?>"
                                                disabled>
                                            
                                            <?php if($errors->has('document_file_2')): ?>
                                            <span class="text-danger d-block" >
                                                <?php echo e($errors->first('document_file_2')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="document_file_2"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_2" id="document_file_2">
                                        </button>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_03'); ?> <?php if(is_required('document_file_3')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                            <input class="primary_input_field" type="text" id="placeholderFileThreeName" placeholder="<?php echo e(isset($student->document_file_3) && $student->document_file_3 != ""? showPicName($student->document_file_3):(is_required('document_file_3')==true ? '03 *': '03')); ?>"
                                                disabled>
                                            
                                            <?php if($errors->has('document_file_3')): ?>
                                            <span class="text-danger d-block" >
                                                <?php echo e($errors->first('document_file_3')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="document_file_3"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_3" id="document_file_3">
                                        </button>
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.document_04'); ?> <?php if(is_required('document_file_4')==true): ?> <span class="text-danger"> *</span> <?php endif; ?></label>
                                            <input class="primary_input_field" type="text" id="placeholderFileFourName" placeholder="<?php echo e(isset($student->document_file_4) && $student->document_file_4 != ""? showPicName($student->document_file_4):(is_required('document_file_4')==true ? '04 *': '04')); ?>"
                                                disabled>
                                            
                                            <?php if($errors->has('document_file_4')): ?>
                                            <span class="text-danger d-block" >
                                                <?php echo e($errors->first('document_file_4')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="document_file_4"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_4" id="document_file_4">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row mt-40">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.custom_field'); ?></h4>
                                </div>
                            </div>
                        </div>

                        <?php echo $__env->make('backEnd.studentInformation._custom_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        

                        
                        <div class="row mt-5">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg submit">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('student.approve'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</section>


<div class="modal fade admin-query" id="removeSiblingModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('student.remove'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('student.are_you'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal" id="yesRemoveSibling"><?php echo app('translator')->get('common.delete'); ?></button>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>


 
 <input type="text" id="STurl" value="<?php echo e(route('student_update_pic',$student->id)); ?>" hidden>
 <div class="modal" id="LogoPic">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Crop Image And Upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="resize"></div>
                <button class="btn rotate float-lef" data-deg="90" > 
                <i class="ti-back-right"></i></button>
                <button class="btn rotate float-right" data-deg="-90" > 
                <i class="ti-back-left"></i></button>
                <hr>                
                <a href="javascript:;" class="primary-btn fix-gr-bg pull-right" id="upload_logo">Crop</a>
            </div>
        </div>
    </div>
</div>


 

 <div class="modal" id="FatherPic">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Crop Image And Upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="fa_resize"></div>
                <button class="btn rotate float-lef" data-deg="90" > 
                <i class="ti-back-right"></i></button>
                <button class="btn rotate float-right" data-deg="-90" > 
                <i class="ti-back-left"></i></button>
                <hr>                
                <a href="javascript:;" class="primary-btn fix-gr-bg pull-right" id="FatherPic_logo">Crop</a>
            </div>
        </div>
    </div>
</div>

 

 <div class="modal" id="MotherPic">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Crop Image And Upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="ma_resize"></div>
                <button class="btn rotate float-lef" data-deg="90" > 
                <i class="ti-back-right"></i></button>
                <button class="btn rotate float-right" data-deg="-90" > 
                <i class="ti-back-left"></i></button>
                <hr>                
                <a href="javascript:;" class="primary-btn fix-gr-bg pull-right" id="Mother_logo">Crop</a>
            </div>
        </div>
    </div>
</div>

 

 <div class="modal" id="GurdianPic">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Crop Image And Upload</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="Gu_resize"></div>
                <button class="btn rotate float-lef" data-deg="90" > 
                <i class="ti-back-right"></i></button>
                <button class="btn rotate float-right" data-deg="-90" > 
                <i class="ti-back-left"></i></button>
                <hr>
                
                <a href="javascript:;" class="primary-btn fix-gr-bg pull-right" id="Gurdian_logo">Crop</a>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/croppie.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/st_addmision.js"></script>
<script>
    $(document).ready(function(){
        
        $(document).on('change','.cutom-photo',function(){
            let v = $(this).val();
            let v1 = $(this).data("id");
            console.log(v,v1);
            getFileName(v, v1);

        });

        function getFileName(value, placeholder){
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
        $(document).on('change','.phone_number',function(){
           
           let email =  $("#email_address").val();
           let phone =  $(this).val();
           checkExitStudent(email, phone);
       });
       $(document).on('change','.email_address',function(){
           let email = $(this).val();
           let phone = $("#phone_number").val();
           checkExitStudent(email, phone);
       });
       function checkExitStudent(email, phone){
          var url = $("#url").val();
          var formData = {
               email : email,
               phone : phone,
           }
           $.ajax({
               type: "GET",
               data: formData,
               dataType: "json",
               url: url + "/" + "student/check-exit",
               success: function(data) {
                   if(data.student !=null) {
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
        
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/ParentRegistration\Resources/views/student_approve.blade.php ENDPATH**/ ?>