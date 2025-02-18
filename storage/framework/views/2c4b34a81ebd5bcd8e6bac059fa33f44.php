<?php
$setting = generalSetting();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset(generalSetting()->favicon)); ?>" type="image/png" />
    <title><?php echo e(@generalSetting()->site_title ? @generalSetting()->site_title : 'Infix Edu ERP'); ?>

        | <?php echo app('translator')->get('student.student_registration'); ?> </title>
    <meta name="_token" content="<?php echo csrf_token(); ?>" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Fonts -->

    <!-- DatePicker CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/datepicker/gijgo.min.css')); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/bootstrap.min.css')); ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/fontawesome.all.min.css')); ?>">

    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/themify/themify-icons.min.css')); ?>">

    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/nice-select/nice-select.css')); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/style.css')); ?>">
    <style>
        .section_padding {
            padding: 50px 0px !important;
        }

        .file_uploader button {
            position: absolute;
            right: 0;
            border: 0;
            bottom: 7px;
            right: 7px;
            padding: 0;
            background: transparent;
            z-index: 99;
            background: #4068FC;
            padding: 4px 10px;
            color: white;
        }

        .file_uploader button label {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- registration area start -->
    <section class="section_padding gray_bg reg">
        <div class="container">
            <div class="registration_area_logo text-center">
                <?php if(!empty($setting->logo)): ?>
                    <img src="<?php echo e(asset($setting->logo)); ?>" alt="Login Panel">
                <?php endif; ?>
            </div>
            <?php if(\Session::has('success')): ?>
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="text-center white-box single_registration_area">
                            <h1><?php echo e(__('Thank You')); ?></h1>
                            <h3><?php echo \Session::get('success'); ?></h3>
                            <a href="<?php echo e(url('/')); ?>" class="primary-btn small fix-gr-bg">
                                <?php echo app('translator')->get('common.home'); ?>
                            </a>
                        </div>

                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-md-10 offset-md-1 col-sm-12" id='page-width-clearfix'>
                        <div class="reg_wrapper">
                            <?php if($reg_setting->registration_permission == 1): ?>
                                <form method="POST" class=""
                                    action="<?php echo e(route('parentregistration-student-store')); ?>"
                                    id="parent-registration" enctype="multipart/form-data">
                            <?php endif; ?>
                            <?php echo e(csrf_field()); ?>

                            <?php if($errors->any()): ?>
                                <div>
                                    <div class="text-danger"><?php echo e(__('common.whoops_something_went_wrong')); ?></div>
                                </div>
                            <?php endif; ?>
                            <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">

                            
                            <div class="reg_wrapper_item">
                                <h4><span>1</span> Academic Details</h4>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('session', $active_fields)): ?>
                                        <div class="input-control" id="academic-year-div">
                                            <label for="#" class="input-control-label"><?php echo app('translator')->get('student.academic_year'); ?>
                                                <span>*</span></label>
                                            <select name="academic_year" class="input-control-input"
                                                id="select-academic-year">
                                                <option data-display="<?php echo app('translator')->get('student.select_academic_year'); ?>"
                                                    value=""><?php echo app('translator')->get('student.select_academic_year'); ?></option>
                                                <?php $__currentLoopData = $academic_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($academic_year->id); ?>">
                                                        <?php echo e($academic_year->year); ?>

                                                        [<?php echo e($academic_year->title); ?>]
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('academic_year')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('academic_year')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('class', $active_fields)): ?>
                                        <div class="input-control" id="class-div">
                                            <label for="#" class="input-control-label">
                                                <?php echo e(field_label($fields, 'class') ? field_label($fields, 'class') : __('student.class')); ?> <span>*</span>
                                            </label>
                                            <select name="class" class="input-control-input" id="select-class">
                                                <option data-display="<?php echo e(field_label($fields, 'class')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'class')); ?> </option>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('class')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('section', $active_fields)): ?>
                                        <div class="input-control" id="section-div">
                                            <label for="#"
                                                class="input-control-label"><?php echo app('translator')->get('student.section'); ?> </label>
                                            <select name="section" class="input-control-input" id="select-section">
                                                <option data-display="<?php echo e(field_label($fields, 'section')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'section')); ?> </option>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            

                            
                            <div class="reg_wrapper_item">
                                <h4><span>2</span> Student Details</h4>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('first_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="first_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'first_name')); ?>

                                                <span>*</span></label>
                                            <input type="text" name='first_name' id="first_name"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'first_name')); ?>'>
                                            <?php if($errors->has('first_name')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('first_name')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('last_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="last_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'last_name')); ?>

                                                <span>*</span></label>
                                            <input type="text" name='last_name' id="last_name"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'last_name')); ?>'>
                                            <?php if($errors->has('last_name')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('last_name')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('date_of_birth', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="datepicker3"
                                                class="input-control-label"><?php echo e(field_label($fields, 'date_of_birth')); ?>

                                                <span>*</span></label>
                                            <input type="text" name="date_of_birth"
                                                class="input-control-input mydob" placeholder='<?php echo e(date('m/d/Y')); ?>'
                                                id='datepicker3'>
                                            <?php if($errors->has('date_of_birth')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('date_of_birth')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('email_address', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="student_email"
                                                class="input-control-label"><?php echo e(field_label($fields, 'email_address')); ?>

                                            </label>
                                            <input type="text" name='student_email' id="student_email"
                                                class="input-control-input" value="<?php echo e(old('student_email')); ?>"
                                                placeholder='<?php echo e(field_label($fields, 'email_address')); ?>'>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('gender', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="gender"
                                                class="input-control-label"><?php echo e(field_label($fields, 'gender')); ?>

                                            </label>
                                            <select name="gender" id="gender" class="input-control-input">
                                                <?php if(moduleStatusCheck('Lead') == true): ?>
                                                    <option data-display="<?php echo e(field_label($fields, 'gender')); ?> "
                                                        value=""><?php echo e(field_label($fields, 'gender')); ?>

                                                    </option>
                                                <?php else: ?>
                                                    <option data-display="<?php echo e(field_label($fields, 'gender')); ?> "
                                                        value=""><?php echo e(field_label($fields, 'gender')); ?>

                                                    </option>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($gender->id); ?>"
                                                        <?php echo e(old('gender') == $gender->id ? 'selected' : ''); ?>>
                                                        <?php echo e($gender->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('phone_number', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="student_mobile"
                                                class="input-control-label"><?php echo e(field_label($fields, 'phone_number')); ?>

                                                <span>*</span></label>
                                            <input type="text" name='student_mobile' id="student_mobile"
                                                class="input-control-input" value="<?php echo e(old('student_mobile')); ?>"
                                                placeholder='<?php echo e(field_label($fields, 'phone_number')); ?>'>
                                            <?php if($errors->has('student_mobile')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('student_mobile')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('age', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="age"
                                                class="input-control-label"><?php echo e(field_label($fields, 'age')); ?></label>
                                            <input type="text" name='age' id="age"
                                                class="input-control-input" value="<?php echo e(old('age')); ?>"
                                                placeholder='<?php echo e(field_label($fields, 'age')); ?>'>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('blood_group', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="blood_group"
                                                class="input-control-label"><?php echo e(field_label($fields, 'blood_group')); ?></label>
                                            <select name="blood_group" id="blood_group" class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'blood_group')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'blood_group')); ?>

                                                </option>
                                                <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($group->id); ?>"
                                                        <?php echo e(old('group') == $group->id ? 'selected' : ''); ?>>
                                                        <?php echo e($group->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('religion', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="religion"
                                                class="input-control-label"><?php echo e(field_label($fields, 'religion')); ?></label>
                                            <select name="religion" id="religion" class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'religion')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'religion')); ?>

                                                </option>
                                                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($religion->id); ?>"
                                                        <?php echo e(old('religion') == $religion->id ? 'selected' : ''); ?>>
                                                        <?php echo e($religion->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('caste', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="caste"
                                                class="input-control-label"><?php echo e(field_label($fields, 'caste')); ?></label>
                                            <input type="text" name='caste' id="caste"
                                                class="input-control-input" value="<?php echo e(old('caste')); ?>"
                                                placeholder='<?php echo e(field_label($fields, 'caste')); ?>'>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('id_number', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="id_number"
                                                class="input-control-label"><?php echo e(field_label($fields, 'id_number')); ?></label>
                                            <input type="text" name='id_number' id="id_number"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'id_number')); ?>

                                            <?php if(moduleStatusCheck('Lead') == true): ?> * <?php endif; ?>'
                                                value="<?php echo e(old('id_number')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('lead_city', $active_fields) && moduleStatusCheck('Lead') == true): ?>
                                        <div class="input-control">
                                            <label for="lead_city"
                                                class="input-control-label"><?php echo e(field_label($fields, 'lead_city')); ?></label>
                                            <select name="lead_city" id="lead_city" class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'lead_city')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'lead_city')); ?>

                                                </option>
                                                <?php $__currentLoopData = $lead_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>"
                                                        <?php echo e(old('city') == $city->id ? 'selected' : ''); ?>>
                                                        <?php echo e($city->city_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('source_id', $active_fields) && moduleStatusCheck('Lead') == true): ?>
                                        <div class="input-control">
                                            <label for="source_id"
                                                class="input-control-label"><?php echo e(field_label($fields, 'source_id')); ?></label>
                                            <select name="source_id" id="source_id" class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'source_id')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'source_id')); ?>

                                                </option>
                                                <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($source->id); ?>"
                                                        <?php echo e(old('source') == $source->id ? 'selected' : ''); ?>>
                                                        <?php echo e($source->source_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('student_category_id', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="student_category_id"
                                                class="input-control-label"><?php echo e(field_label($fields, 'student_category_id')); ?></label>
                                            <select name="student_category_id" id="student_category_id"
                                                class="input-control-input">
                                                <option
                                                    data-display="<?php echo e(field_label($fields, 'student_category_id')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'student_category_id')); ?>

                                                </option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"
                                                        <?php echo e(old('category') == $category->id ? 'selected' : ''); ?>>
                                                        <?php echo e($category->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('student_group_id', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="student_group_id"
                                                class="input-control-label"><?php echo e(field_label($fields, 'student_group_id')); ?></label>
                                            <select name="student_group_id" id="student_group_id"
                                                class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'student_group_id')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'student_group_id')); ?>

                                                </option>
                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($group->id); ?>"
                                                        <?php echo e(old('group') == $group->id ? 'selected' : ''); ?>>
                                                        <?php echo e($group->group); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('height', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="height"
                                                class="input-control-label"><?php echo e(field_label($fields, 'height')); ?></label>
                                            <input type="text" name='height' id="height"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'height')); ?>'
                                                value="<?php echo e(old('height')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('weight', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="weight"
                                                class="input-control-label"><?php echo e(field_label($fields, 'weight')); ?></label>
                                            <input type="text" name='weight' id="weight"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'weight')); ?>'
                                                value="<?php echo e(old('weight')); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if(in_array('photo', $active_fields)): ?>
                                        <div class="position-relative input-control file_uploader">
                                            <label for="#"
                                                class="input-control-label"><?php echo e(field_label($fields, 'photo')); ?></label>
                                            <input class="input-control-input" id="placeholderPhoto" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'photo')); ?>" readonly>
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="photo"
                                                    value="<?php echo e(old('photo')); ?>" id="photo">
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            

                            
                            <div class="reg_wrapper_item">
                                <h4><span>3</span> Guardian Details</h4>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('fathers_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="fathers_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'fathers_name')); ?></label>
                                            <input type="text" name='fathers_name' id="fathers_name"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'fathers_name')); ?>'
                                                value="<?php echo e(old('fathers_name')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('fathers_occupation', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="fathers_occupation"
                                                class="input-control-label"><?php echo e(field_label($fields, 'fathers_occupation')); ?></label>
                                            <input type="text" name='fathers_occupation' id="fathers_occupation"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'fathers_occupation')); ?>'
                                                value="<?php echo e(old('fathers_occupation')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('fathers_phone', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="fathers_phone"
                                                class="input-control-label"><?php echo e(field_label($fields, 'fathers_phone')); ?></label>
                                            <input type="text" name='fathers_phone' id="fathers_phone"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'fathers_phone')); ?>'
                                                value="<?php echo e(old('fathers_phone')); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if(in_array('fathers_photo', $active_fields)): ?>
                                        <div class="position-relative input-control file_uploader">
                                            <label for="#"
                                                class="input-control-label"><?php echo e(field_label($fields, 'fathers_photo')); ?></label>
                                            <input class="input-control-input" id="placeholderFathersName" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'fathers_photo')); ?>" readonly>
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="fathers_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="fathers_photo"
                                                    value="<?php echo e(old('fathers_photo')); ?>" id="fathers_photo">
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('mothers_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="mothers_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'mothers_name')); ?></label>
                                            <input type="text" name='mothers_name' id="mothers_name"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'mothers_name')); ?>'
                                                value="<?php echo e(old('mothers_name')); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if(in_array('mothers_occupation', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="mothers_occupation"
                                                class="input-control-label"><?php echo e(field_label($fields, 'mothers_occupation')); ?></label>
                                            <input type="text" name='mothers_occupation' id="mothers_occupation"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'mothers_occupation')); ?>'
                                                value="<?php echo e(old('mothers_occupation')); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if(in_array('mothers_phone', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="mothers_phone"
                                                class="input-control-label"><?php echo e(field_label($fields, 'mothers_phone')); ?></label>
                                            <input type="text" name='mothers_phone' id="mothers_phone"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'mothers_phone')); ?>'
                                                value="<?php echo e(old('mothers_phone')); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <?php if(in_array('mothers_photo', $active_fields)): ?>
                                        <div class="position-relative input-control file_uploader">
                                            <label for="#"
                                                class="input-control-label"><?php echo e(field_label($fields, 'mothers_photo')); ?></label>
                                            <input class="input-control-input" id="placeholderMothersName" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'mothers_photo')); ?>" readonly>
                                            <button class="" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="mothers_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="mothers_photo"
                                                    value="<?php echo e(old('mothers_photo')); ?>" id="mothers_photo">
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <?php if(in_array('relation', $active_fields)): ?>
                                    <div class="input-control select-guardian">
                                        <span><?php echo e(field_label($fields, 'relation')); ?>:</span>
                                        <label for="relationFather" class="page_radio">
                                            <input class="relationButton" type="radio" value="F"
                                                name='relationButton'
                                                id="relationFather"
                                                <?php echo e(old('relationButton', 'F') == 'F' ? 'checked' : ''); ?>>
                                            <span class="page_radio_title"><?php echo app('translator')->get('student.father'); ?></span>
                                        </label>
                                        <label for="relationMother" class="page_radio">
                                            <input class="relationButton" type="radio" value="M"
                                                name='relationButton'
                                                id="relationMother"
                                                <?php echo e(old('relationButton', 'M') == 'M' ? 'checked' : ''); ?>>
                                            <span class="page_radio_title"><?php echo app('translator')->get('student.mother'); ?></span>
                                        </label>
                                        <label for="relationOther" class="page_radio">
                                            <input class="relationButton" type="radio" value="O"
                                                name='relationButton'
                                                id="relationOther"
                                                <?php echo e(old('relationButton', 'O') == 'O' ? 'checked' : ''); ?>>
                                            <span class="page_radio_title"><?php echo app('translator')->get('student.Other'); ?></span>
                                        </label>
                                    </div>
                                <?php endif; ?>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('guardians_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="guardians_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'guardians_name')); ?>

                                            </label>
                                            <input type="text" name='guardian_name' id="guardians_name"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'guardians_name')); ?>'
                                                value="<?php echo e(old('guardian_name')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('guardians_email', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="guardians_email"
                                                class="input-control-label"><?php echo e(field_label($fields, 'guardians_email')); ?>

                                                <span>*</span></label>
                                            <input type="text" name='guardian_email' id="guardians_email"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'guardians_email')); ?>'
                                                value="<?php echo e(old('guardian_email')); ?>">
                                            <?php if($errors->has('guardian_email')): ?>
                                                <span class="text-danger" ><?php echo e(@$errors->first('guardian_email')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('guardians_phone', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="guardians_phone"
                                                class="input-control-label"><?php echo e(field_label($fields, 'guardians_phone')); ?>

                                            </label>
                                            <input type="text" name='guardian_mobile' id="guardians_phone"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'guardians_phone')); ?>'
                                                value="<?php echo e(old('guardian_mobile')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('guardians_occupation', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="guardians_occupation"
                                                class="input-control-label"><?php echo e(field_label($fields, 'guardians_occupation')); ?>

                                            </label>
                                            <input type="text" name='guardians_occupation'
                                                id="guardians_occupation"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'guardians_occupation')); ?>'
                                                value="<?php echo e(old('guardians_occupation')); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(in_array('guardians_photo', $active_fields)): ?>
                                    <div class="position-relative input-control file_uploader">
                                        <label for="#"
                                            class="input-control-label"><?php echo e(field_label($fields, 'guardians_photo')); ?></label>
                                        <input class="input-control-input" id="placeholderGuardiansName"
                                            type="text"
                                            placeholder="<?php echo e(field_label($fields, 'guardians_photo')); ?>" readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="guardians_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" name="guardians_photo"
                                                value="<?php echo e(old('guardians_photo')); ?>" id="guardians_photo">
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('guardians_address', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="guardians_address"
                                                class="input-control-label"><?php echo e(field_label($fields, 'guardians_address')); ?></label>
                                            <input type="text" name='guardians_address' id="guardians_address"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'guardians_address')); ?>'
                                                value="<?php echo e(old('guardians_address')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('current_address', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="current_address"
                                                class="input-control-label"><?php echo e(field_label($fields, 'current_address')); ?></label>
                                            <input type="text" name='current_address' id="current_address"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'current_address')); ?>'
                                                value="<?php echo e(old('current_address')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>

                                <?php if(in_array('permanent_address', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="permanent_address"
                                                class="input-control-label"><?php echo e(field_label($fields, 'permanent_address')); ?></label>
                                            <input type="text" name='permanent_address' id="permanent_address"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'permanent_address')); ?>'
                                                value="<?php echo e(old('permanent_address')); ?>">
                                        </div>
                                <?php endif; ?>

                                <div class="input-control">
                                    <label for="how_do_know_us"
                                        class="input-control-label"><?php echo e(__('parentregistration::parentRegistration.how_do_you_know_us')); ?>?</label>
                                    <textarea class="input-control-input" name="how_do_know_us" id="how_do_know_us" rows="1"
                                        placeholder="<?php echo e(__('parentregistration::parentRegistration.how_do_you_know_us')); ?>?"></textarea>
                                </div>
                            </div>
                            

                            
                            <div class="reg_wrapper_item">
                                <h4><span>4</span> Miscellaneous Details</h4>
                                <div class="reg_wrapper_item_flex">
                                    <?php if(in_array('route', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="route"
                                                class="input-control-label"><?php echo e(field_label($fields, 'route')); ?></label>
                                            <select name="route" id="route"
                                                class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'route')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'route')); ?>

                                                </option>
                                                <?php $__currentLoopData = $route_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($route_list->id); ?>"
                                                        <?php echo e(old('route_list') == $route_list->id ? 'selected' : ''); ?>>
                                                        <?php echo e($route_list->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('vehicle', $active_fields)): ?>
                                        <div class="input-control" id="select_vehicle_div">
                                            <label for="vehicle"
                                                class="input-control-label"><?php echo e(field_label($fields, 'vehicle')); ?></label>
                                            <select name="vehicle" id="selectVehicle"
                                                class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'vehicle')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'vehicle')); ?>

                                                </option>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('dormitory_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="dormitory_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'dormitory_name')); ?></label>
                                            <select name="dormitory_name" id="SelectDormitory"
                                                class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'dormitory_name')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'dormitory_name')); ?>

                                                </option>
                                                <?php $__currentLoopData = $dormitory_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($dormitory_list->id); ?>"
                                                        <?php echo e(old('dormitory_name') == $dormitory_list->id ? 'selected' : ''); ?>>
                                                        <?php echo e($dormitory_list->dormitory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('room_number', $active_fields)): ?>
                                        <div class="input-control" id="roomNumberDiv">
                                            <label for="room_number"
                                                class="input-control-label"><?php echo e(field_label($fields, 'room_number')); ?></label>
                                            <select name="room_number" id="selectRoomNumber"
                                                class="input-control-input">
                                                <option data-display="<?php echo e(field_label($fields, 'room_number')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'room_number')); ?>

                                                </option>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('national_id_number', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="national_id_number"
                                                class="input-control-label"><?php echo e(field_label($fields, 'national_id_number')); ?></label>
                                            <input type="text" name='national_id_number' id="national_id_number"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'national_id_number')); ?>'
                                                value="<?php echo e(old('national_id_number')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('local_id_number', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="local_id_number"
                                                class="input-control-label"><?php echo e(field_label($fields, 'local_id_number')); ?></label>
                                            <input type="text" name='local_id_number' id="local_id_number"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'local_id_number')); ?>'
                                                value="<?php echo e(old('local_id_number')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('bank_account_number', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="bank_account_number"
                                                class="input-control-label"><?php echo e(field_label($fields, 'bank_account_number')); ?></label>
                                            <input type="text" name='bank_account_number' id="bank_account_number"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'bank_account_number')); ?>'
                                                value="<?php echo e(old('bank_account_number')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('bank_name', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="bank_name"
                                                class="input-control-label"><?php echo e(field_label($fields, 'bank_name')); ?></label>
                                            <input type="text" name='bank_name' id="bank_name"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'bank_name')); ?>'
                                                value="<?php echo e(old('bank_name')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('previous_school_details', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="previous_school_details"
                                                class="input-control-label"><?php echo e(field_label($fields, 'previous_school_details')); ?></label>
                                            <input type="text" name='previous_school_details'
                                                id="previous_school_details"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'previous_school_details')); ?>'
                                                value="<?php echo e(old('previous_school_details')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('additional_notes', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="additional_notes"
                                                class="input-control-label"><?php echo e(field_label($fields, 'additional_notes')); ?></label>
                                            <input type="text" name='additional_notes' id="additional_notes"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'additional_notes')); ?>'
                                                value="<?php echo e(old('additional_notes')); ?>">
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                                <?php if(in_array('ifsc_code', $active_fields)): ?>
                                        <div class="input-control">
                                            <label for="ifsc_code"
                                                class="input-control-label"><?php echo e(field_label($fields, 'ifsc_code')); ?></label>
                                            <input type="text" name='ifsc_code' id="ifsc_code"
                                                class="input-control-input"
                                                placeholder='<?php echo e(field_label($fields, 'ifsc_code')); ?>'
                                                value="<?php echo e(old('ifsc_code')); ?>">
                                        </div>
                                <?php endif; ?>

                                <?php if(in_array('document_file_1', $active_fields)): ?>
                                    <div class="position-relative input-control file_uploader">
                                        <label for="#"
                                            class="input-control-label"><?php echo e(field_label($fields, 'document_file_1')); ?></label>
                                        <input class="input-control-input" id="placeholderFileOneName" type="text"
                                            placeholder="<?php echo e(field_label($fields, 'document_file_1')); ?>" readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="document_file_1"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_1"
                                                value="<?php echo e(old('document_file_1')); ?>" id="document_file_1">
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('document_file_2', $active_fields)): ?>
                                    <div class="position-relative input-control file_uploader">
                                        <label for="#"
                                            class="input-control-label"><?php echo e(field_label($fields, 'document_file_2')); ?></label>
                                        <input class="input-control-input" id="placeholderFileTwoName" type="text"
                                            placeholder="<?php echo e(field_label($fields, 'document_file_2')); ?>" readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="document_file_2"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_2"
                                                value="<?php echo e(old('document_file_2')); ?>" id="document_file_2">
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('document_file_3', $active_fields)): ?>
                                    <div class="position-relative input-control file_uploader">
                                        <label for="#"
                                            class="input-control-label"><?php echo e(field_label($fields, 'document_file_3')); ?></label>
                                        <input class="input-control-input" id="placeholderFileThreeName"
                                            type="text"
                                            placeholder="<?php echo e(field_label($fields, 'document_file_3')); ?>" readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="document_file_3"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_3"
                                                value="<?php echo e(old('document_file_3')); ?>" id="document_file_3">
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('document_file_4', $active_fields)): ?>
                                    <div class="position-relative input-control file_uploader">
                                        <label for="#"
                                            class="input-control-label"><?php echo e(field_label($fields, 'document_file_4')); ?></label>
                                        <input class="input-control-input" id="placeholderFileFourName"
                                            type="text"
                                            placeholder="<?php echo e(field_label($fields, 'document_file_4')); ?>" readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="document_file_4"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_4"
                                                value="<?php echo e(old('document_file_4')); ?>" id="document_file_4">
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if($custom_fields): ?>
                                    <?php echo $__env->make('parentregistration::_custom_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <?php if($captcha): ?>
                                    <div class="col-lg-12 text-center">
                                        <?php echo $captcha->renderJs(); ?>

                                        <?php echo $captcha->display(); ?>

                                        <span class="text-danger"
                                            id="g-recaptcha-error"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php
                                    $tooltip = '';
                                    if ($reg_setting->registration_permission == 1) {
                                        $tooltip = '';
                                    } else {
                                        $tooltip = "You Can't Registration Now";
                                    }
                                ?>
                                <div class="input-control">
                                    <button type="submit" class='input-control-input'
                                        id="onlineRegistrationSubmitButton" data-toggle="tooltip"
                                        title="<?php echo e(@$tooltip); ?>"><?php echo app('translator')->get('edulia.register_now'); ?></button>
                                </div>
                                <?php if($reg_setting->footer_note_status == 1): ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mt-30">
                                                <?php echo e($reg_setting->footer_note_text); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- registration area end -->

    <!-- jQuery JS -->
    <script src="<?php echo e(asset('public/theme/edulia/js/jquery.min.js')); ?>"></script>

    <!-- Nice Select JS -->
    <script src="<?php echo e(asset('public/theme/edulia/packages/nice-select/jquery.nice-select.min.js')); ?>"></script>

    <!-- DatePicker JS -->
    <script src="<?php echo e(asset('public/theme/edulia/packages/datepicker/gijgo.min.js')); ?>"></script>

    <!-- Main Script JS -->
    <script src="<?php echo e(asset('/public/backEnd/js/custom.js')); ?>"></script>

    <script>
        $('select').niceSelect();
        $('#datepicker3').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
        $('#datepicker4').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });

        let fileInput = document.getElementById('browseFile');
        if (fileInput) {
            fileInput.addEventListener('change', showFileName);

            function showFileName(event) {
                let fileInput = event.srcElement;
                let fileName = fileInput.files[0].name;
                document.getElementById('placeholderInput').placeholder = fileName;
            }
        }
        function getAge(dob) {
            return ~~((new Date() - new Date(dob)) / 31556952000);
        }
        $("input.mydob").change(function() {
            $("#age").val(getAge($(this).val()));
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\immersion\Modules/ParentRegistration\Resources/views/theme/edulia/registration.blade.php ENDPATH**/ ?>