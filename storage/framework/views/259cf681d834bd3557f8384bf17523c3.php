<?php
$setting = generalSetting();
App::setLocale(getUserLanguage());

if (isset($setting->copyright_text)) {
    $copyright_text = $setting->copyright_text;
} else {
    $copyright_text = 'Copyright © 2020 All rights reserved | This template is made with by Codethemes';
}
if (isset($setting->logo)) {
    $logo = $setting->logo;
} else {
    $logo = 'public/uploads/settings/logo.png';
}
$ttl_rtl = userRtlLtl();

if (isset($setting->favicon)) {
    $favicon = $setting->favicon;
} else {
    $favicon = 'public/backEnd/img/favicon.png';
}

$login_background = App\SmBackgroundSetting::where([['is_default', 1], ['title', 'Login Background']])->first();

if (empty($login_background)) {
    $css = 'background: url(' . url('public/backEnd/img/in_registration.png') . ')  no-repeat center; background-size: cover; ';
} else {
    if (!empty($login_background->image)) {
        $css = "background: url('" . url($login_background->image) . "')  no-repeat center;  background-size: cover;";
    } else {
        $css = 'background:' . $login_background->color;
    }
}
?>


<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" <?php if(isset($ttl_rtl) && $ttl_rtl == 1): ?> dir="rtl" class="rtl" <?php endif; ?>
    style="<?php echo e(\Session::has('success') ? 'height: 100vh' : ''); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset($favicon)); ?>" type="image/png" />
    <title><?php echo e(@generalSetting()->site_title ? @generalSetting()->site_title : 'Infix Edu ERP'); ?>

        | <?php echo app('translator')->get('student.student_registration'); ?> </title>
    <meta name="_token" content="<?php echo csrf_token(); ?>" />
    <?php if (isset($component)) { $__componentOriginal05bb8265ee24cbda94049f193d0e88b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05bb8265ee24cbda94049f193d0e88b0 = $attributes; } ?>
<?php $component = App\View\Components\RootCss::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('root-css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RootCss::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05bb8265ee24cbda94049f193d0e88b0)): ?>
<?php $attributes = $__attributesOriginal05bb8265ee24cbda94049f193d0e88b0; ?>
<?php unset($__attributesOriginal05bb8265ee24cbda94049f193d0e88b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05bb8265ee24cbda94049f193d0e88b0)): ?>
<?php $component = $__componentOriginal05bb8265ee24cbda94049f193d0e88b0; ?>
<?php unset($__componentOriginal05bb8265ee24cbda94049f193d0e88b0); ?>
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/landing/css/toastr.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/fastselect.min.css" />
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/vendors/css/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/vendors/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/vendors/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/assets/vendors/vendors_static_style.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/css/rtl/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/css/loade.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/nice-select.css')); ?>" />
    <?php if(userRtlLtl() == 1): ?>
        <style>
            html[dir="rtl"] .loader_style_parent_reg {
                padding-left: 25px;
                position: absolute;
                left: 10px;
                top: 5px;
            }

            html[dir="rtl"] .input-right-icon button {
                margin-left: 0;
                left: 0;
                margin-right: auto;
            }

            html[dir="rtl"] .input-right-icon button i {
                left: 22px;
                display: inline-block !important;
            }

            html[dir="rtl"] .input-right-icon button {
                margin-left: 0;
                left: 0;
                margin-right: auto;
                position: absolute;
                left: 0;
            }

            html[dir="rtl"] .mr-20 {
                margin-right: 0px;
                margin-left: 20px;
            }

            html[dir="rtl"] .ml-30 {
                margin-left: 0;
                margin-right: 30px;
            }

            html[dir="rtl"] .primary_input_field:focus~label,
            .primary_input_field.read-only-input~label,
            html[dir="rtl"] .has-content.primary_input_field~label {
                text-align: right !important;
            }

            html[dir="rtl"] .primary_input_field~label {
                left: auto;
                right: 0 !important;
                text-align: right;
            }

            .loader {
                display: none;
            }
        </style>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/rtl/style.css" />
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/css/style.css" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(url('Modules/ParentRegistration/Resources/assets/css/style.css')); ?>">

</head>

<body class="reg_bg" style="<?php echo e(@$css); ?>">
    <!--================ Start Login Area =================-->
    <div class="reg_bg">

    </div>
    <section class="login-area  registration_area ">
        <div class="container">
            <div class="registration_area_logo">
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
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="text-center white-box single_registration_area">
                            <div class="reg_tittle mt-20" style="margin-botton: 100px;">
                                <h2><?php echo app('translator')->get('student.student_registration'); ?></h2>
                            </div>

                            <?php if($reg_setting->registration_permission == 1): ?>
                                <form method="POST" class=""
                                    action="<?php echo e(route('parentregistration-student-store')); ?>"
                                    id="parent-registration" enctype="multipart/form-data">
                            <?php endif; ?>
                            <?php echo e(csrf_field()); ?>

                            <?php if($errors->any()): ?>
                                <div>
                                    <div class="text-danger"><?php echo e(__('common.whoops_something_went_wrong')); ?></div>
                                    <ul class="mt-1 text-danger">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
                            <div class="row">

                                <?php if(in_array('session', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input" id="academic-year-div">
                                            <select class="primary_select  form-control" name="academic_year"
                                                id="select-academic-year">
                                                <option data-display="<?php echo app('translator')->get('student.select_academic_year'); ?> *"
                                                    value=""><?php echo app('translator')->get('student.select_academic_year'); ?></option>
                                                <?php $__currentLoopData = $academic_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($academic_year->id); ?>">
                                                        <?php echo e($academic_year->year); ?>

                                                        [<?php echo e($academic_year->title); ?>]
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>

                                        </div>
                                        <?php if($errors->has('academic_year')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('academic_year')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('class', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input" id="class-div">
                                            <select class="primary_select  form-control" name="class"
                                                id="select-class">
                                                <option data-display="<?php echo e(field_label($fields, 'class')); ?> *"
                                                    value=""><?php echo e(field_label($fields, 'class')); ?> *
                                                </option>
                                            </select>
                                            <div class="loader loader_style_parent_reg loader"
                                                id="select_class_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                    alt="loader">
                                            </div>
                                        </div>
                                        <?php if($errors->has('class')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('class')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                <?php endif; ?>
                                <?php if(in_array('section', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input" id="section-div">
                                            <select class="primary_select  form-control" name="section"
                                                id="select-section">
                                                <option data-display=" <?php echo e(field_label($fields, 'section')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'section')); ?></option>
                                            </select>
                                            <div class="loader_style_parent_reg loader" id="select_class_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                    alt="loader">
                                            </div>
                                        </div>
                                        <?php if($errors->has('section')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('section')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                <?php endif; ?>
                                <?php if(in_array('first_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='first_name'
                                                id="school_name"
                                                placeholder="<?php echo e(field_label($fields, 'first_name')); ?> *"
                                                value="<?php echo e(old('first_name')); ?>" />
                                        </div>
                                        <?php if($errors->has('first_name')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('first_name')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('last_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='last_name'
                                                id="school_name"
                                                placeholder="<?php echo e(field_label($fields, 'last_name')); ?> *"
                                                value="<?php echo e(old('last_name')); ?>" />
                                        </div>
                                        <?php if($errors->has('last_name')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('last_name')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('gender', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control" name="gender">

                                                <?php if(moduleStatusCheck('Lead') == true): ?>
                                                    <option data-display="<?php echo e(field_label($fields, 'gender')); ?> "
                                                        value=""><?php echo e(field_label($fields, 'gender')); ?>

                                                    </option>
                                                <?php else: ?>
                                                    <option data-display="<?php echo e(field_label($fields, 'gender')); ?> *"
                                                        value=""><?php echo e(field_label($fields, 'first_name')); ?> *
                                                    </option>
                                                <?php endif; ?>

                                                <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($gender->id); ?>"
                                                        <?php echo e(old('gender') == $gender->id ? 'selected' : ''); ?>>
                                                        <?php echo e($gender->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('gender')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('gender')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('date_of_birth', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="no-gutters input-right-icon">
                                            <div class="primary_input">
                                                <input
                                                    class="primary_input_field mydob date form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>"
                                                    id="startDate" type="text"
                                                    name="date_of_birth"
                                                    placeholder="<?php echo e(field_label($fields, 'date_of_birth')); ?>"
                                                    value=""
                                                    autocomplete="off" id="date_of_birth">

                                                <?php if($errors->has('date_of_birth')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('date_of_birth')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <label for="startDate" class="primary_input-icon">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('age', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='age' id="age"
                                                placeholder="<?php echo e(field_label($fields, 'age')); ?> *"
                                                readonly="" value="<?php echo e(old('age')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('blood_group', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control" name="blood_group">
                                                <option data-display="<?php echo e(field_label($fields, 'blood_group')); ?>"
                                                    value=""> <?php echo e(field_label($fields, 'blood_group')); ?>

                                                </option>
                                                <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($group->id); ?>"
                                                        <?php echo e(old('blood_group') == $group->id ? 'selected' : ''); ?>>
                                                        <?php echo e($group->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('blood_group')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('blood_group')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('religion', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control" name="religion">
                                                <option data-display="<?php echo e(field_label($fields, 'religion')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'religion')); ?></option>
                                                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($religion->id); ?>"
                                                        <?php echo e(old('religion') == $religion->id ? 'selected' : ''); ?>>
                                                        <?php echo e($religion->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('religion')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('religion')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('caste', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='caste' id="caste"
                                                placeholder="<?php echo e(field_label($fields, 'caste')); ?>"
                                                value="<?php echo e(old('caste')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('email_address', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='student_email'
                                                id="student_email"
                                                placeholder="<?php echo e(field_label($fields, 'email_address')); ?>"
                                                value="<?php echo e(old('student_email')); ?>" />
                                        </div>
                                        <?php if($errors->has('student_email')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('student_email')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('id_number', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='id_number'
                                                id="id_number"
                                                placeholder="<?php echo e(field_label($fields, 'id_number')); ?>

                                                       <?php if(moduleStatusCheck('Lead') == true): ?> * <?php endif; ?>"
                                                value="<?php echo e(old('id_number')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('phone_number', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='student_mobile'
                                                id="student_mobile"
                                                placeholder="<?php echo e(field_label($fields, 'student_mobile')); ?>"
                                                value="<?php echo e(old('student_mobile')); ?>" />
                                        </div>
                                        <span class="text-danger error-message" id="student_mobile_error"></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('lead_city', $active_fields) && moduleStatusCheck('Lead') == true): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control"
                                                name="lead_city">
                                                <option data-display="<?php echo e(field_label($fields, 'lead_city')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'lead_city')); ?></option>
                                                <?php $__currentLoopData = $lead_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>"
                                                        <?php echo e(old('city') == $city->id ? 'selected' : ''); ?>>
                                                        <?php echo e($city->city_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('lead_city')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('lead_city')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('source_id', $active_fields) && moduleStatusCheck('Lead') == true): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control"
                                                name="source_id">
                                                <option data-display="<?php echo e(field_label($fields, 'source_id')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'source_id')); ?></option>
                                                <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($source->id); ?>"
                                                        <?php echo e(old('source_id') == $source->id ? 'selected' : ''); ?>>
                                                        <?php echo e($source->source_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('source_id')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('source_id')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('student_category_id', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control"
                                                name="student_category_id">
                                                <option
                                                    data-display="<?php echo e(field_label($fields, 'student_category_id')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'student_category_id')); ?>

                                                </option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"
                                                        <?php echo e(old('category') == $category->id ? 'selected' : ''); ?>>
                                                        <?php echo e($category->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('student_category_id')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('student_category_id')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('student_group_id', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control"
                                                name="student_group_id">
                                                <option data-display="<?php echo e(field_label($fields, 'student_group_id')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'student_group_id')); ?>

                                                </option>
                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($group->id); ?>"
                                                        <?php echo e(old('group') == $group->id ? 'selected' : ''); ?>>
                                                        <?php echo e($group->group); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('group')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('group')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('height', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='height' id="height"
                                                placeholder="<?php echo e(field_label($fields, 'height')); ?>"
                                                value="<?php echo e(old('height')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('weight', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='weight' id="weight"
                                                placeholder="<?php echo e(field_label($fields, 'weight')); ?>"
                                                value="<?php echo e(old('weight')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('photo', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderPhoto"
                                                        placeholder="<?php echo e(field_label($fields, 'photo')); ?>"
                                                        readonly="">


                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none"
                                                        value="<?php echo e(old('photo')); ?>"
                                                        name="photo" id="photo">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                
                                <?php if(in_array('fathers_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='fathers_name'
                                                id="fathers_name"
                                                placeholder="<?php echo e(field_label($fields, 'fathers_name')); ?>"
                                                value="<?php echo e(old('fathers_name')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('fathers_occupation', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='fathers_occupation'
                                                id="fathers_occupation"
                                                placeholder="<?php echo e(field_label($fields, 'fathers_occupation')); ?>"
                                                value="<?php echo e(old('fathers_occupation')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('fathers_phone', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="number" name='fathers_phone'
                                                id="fathers_phone"
                                                placeholder="<?php echo e(field_label($fields, 'fathers_phone')); ?>"
                                                value="<?php echo e(old('fathers_phone')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('fathers_photo', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderFathersName"
                                                        placeholder="<?php echo e(field_label($fields, 'fathers_photo')); ?>"
                                                        readonly="">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="fathers_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="fathers_photo"
                                                        id="fathers_photo">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                

                                
                                <?php if(in_array('mothers_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='mothers_name'
                                                id="mothers_name"
                                                placeholder="<?php echo e(field_label($fields, 'mothers_name')); ?>"
                                                value="<?php echo e(old('mothers_name')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('mothers_occupation', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='mothers_occupation'
                                                id="mothers_occupation"
                                                placeholder="<?php echo e(field_label($fields, 'mothers_occupation')); ?>"
                                                value="<?php echo e(old('mothers_occupation')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('mothers_phone', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="number" name='mothers_phone'
                                                id="mothers_phone"
                                                placeholder="<?php echo e(field_label($fields, 'mothers_phone')); ?>"
                                                value="<?php echo e(old('mothers_phone')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('mothers_photo', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderMothersName"
                                                        placeholder="<?php echo e(field_label($fields, 'mothers_photo')); ?>"
                                                        readonly="">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="mothers_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="mothers_photo"
                                                        id="mothers_photo">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                

                                
                                
                                <?php if(in_array('guardians_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='guardian_name'
                                                id="guardians_name"
                                                placeholder="<?php echo e(field_label($fields, 'guardians_name')); ?> *"
                                                value="<?php echo e(old('guardian_name')); ?>" />
                                        </div>
                                        <?php if($errors->has('guardian_name')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('guardian_name')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('relation', $active_fields)): ?>
                                    <div class="col-lg-6 d-flex relation-button">
                                        <p class="text-uppercase mb-0">
                                            <?php echo e(field_label($fields, 'relation')); ?>

                                        </p>
                                        <div class="d-flex radio-btn-flex ml-30 mt-1">
                                            <div class="mr-20">
                                                <input type="radio" name="relationButton" id="relationFather"
                                                    value="F"
                                                    class="common-radio relationButton"
                                                    <?php echo e(old('relationButton', 'F') == 'F' ? 'checked' : ''); ?>>
                                                <label for="relationFather"><?php echo app('translator')->get('student.father'); ?></label>
                                            </div>
                                            <div class="mr-20">
                                                <input type="radio" name="relationButton" id="relationMother"
                                                    value="M"
                                                    class="common-radio relationButton"
                                                    <?php echo e(old('relationButton') == 'M' ? 'checked' : ''); ?>>
                                                <label for="relationMother"><?php echo app('translator')->get('student.mother'); ?></label>
                                            </div>
                                            <div>
                                                <input type="radio" name="relationButton" id="relationOther"
                                                    value="O"
                                                    class="common-radio relationButton"
                                                    <?php echo e(old('relationButton') == 'O' ? 'checked' : ''); ?>>
                                                <label for="relationOther"><?php echo app('translator')->get('student.Other'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('guardians_email', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='guardian_email'
                                                id="guardians_email"
                                                placeholder="<?php echo e(field_label($fields, 'guardians_email')); ?> *"
                                                value="<?php echo e(old('guardian_email')); ?>" />
                                        </div>
                                        <?php if($errors->has('guardian_email')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"
                                                id="guardian_email_error"><?php echo e($errors->first('guardian_email')); ?>

                                            </div>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('guardians_phone', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='guardian_mobile'
                                                id="guardians_phone"
                                                placeholder="<?php echo e(field_label($fields, 'guardians_phone')); ?> "
                                                value="<?php echo e(old('guardian_mobile')); ?>" />
                                        </div>
                                        <?php if($errors->has('guardian_mobile')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"
                                                id="guardian_mobile_error"><?php echo e($errors->first('guardian_mobile')); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="text-danger error-message invalid-select mb-10"
                                                id="guardian_mobile_error"></div>
                                        <?php endif; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('guardians_photo', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderGuardiansName"
                                                        placeholder="<?php echo e(field_label($fields, 'guardians_photo')); ?>"
                                                        readonly="">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="guardians_photo"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="guardians_photo"
                                                        id="guardians_photo">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('guardians_occupation', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='guardians_occupation'
                                                id="guardians_occupation"
                                                placeholder="<?php echo e(field_label($fields, 'guardians_occupation')); ?>"
                                                value="<?php echo e(old('guardians_occupation')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('guardians_address', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='guardians_address'
                                                id="guardians_address"
                                                placeholder="<?php echo e(field_label($fields, 'guardians_address')); ?>"
                                                value="<?php echo e(old('guardians_address')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                
                                <?php if(in_array('current_address', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='current_address'
                                                id="current_address"
                                                placeholder="<?php echo e(field_label($fields, 'current_address')); ?>"
                                                value="<?php echo e(old('current_address')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('permanent_address', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name='permanent_address'
                                                id="permanent_address"
                                                placeholder="<?php echo e(field_label($fields, 'permanent_address')); ?>"
                                                value="<?php echo e(old('permanent_address')); ?>" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12">
                                    <div class="form-group input-group">
                                        <textarea class="form-control" name='how_do_know_us' id="school_name"
                                            placeholder="<?php echo e(__('parentregistration::parentRegistration.how_do_you_know_us')); ?>?"><?php echo e(old('how_do_know_us')); ?></textarea>
                                    </div>
                                </div>

                                

                                <?php if(in_array('route', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select class="primary_select  form-control" name="route"
                                                id="route">
                                                <option data-display="<?php echo e(field_label($fields, 'route')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'route')); ?></option>
                                                <?php $__currentLoopData = $route_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($route_list->id); ?>"
                                                        <?php echo e(old('route') == $route_list->id ? 'selected' : ''); ?>>
                                                        <?php echo e($route_list->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->has('group')): ?>
                                            <div class="text-danger error-message invalid-select mb-10">
                                                <?php echo e($errors->first('group')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('vehicle', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input " id="select_vehicle_div">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('vehicle') ? ' is-invalid' : ''); ?>"
                                                name="vehicle" id="selectVehicle">
                                                <option data-display="<?php echo e(field_label($fields, 'vehicle')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'vehicle')); ?></option>
                                            </select>
                                            <div class="loader_style_parent_reg loader"
                                                id="select_transport_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                    alt="loader">
                                            </div>

                                            <?php if($errors->has('vehicle')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('vehicle')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('dormitory_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input ">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('dormitory_name') ? ' is-invalid' : ''); ?>"
                                                name="dormitory_name" id="SelectDormitory">
                                                <option data-display=" <?php echo e(field_label($fields, 'dormitory_name')); ?> "
                                                    value=""><?php echo e(field_label($fields, 'dormitory_name')); ?>

                                                </option>
                                                <?php $__currentLoopData = $dormitory_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dormitory_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($dormitory_list->id); ?>"
                                                        <?php echo e(old('dormitory_name') == $dormitory_list->id ? 'selected' : ''); ?>>
                                                        <?php echo e($dormitory_list->dormitory_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php if($errors->has('dormitory_name')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('dormitory_name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('room_number', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="primary_input " id="roomNumberDiv">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('room_number') ? ' is-invalid' : ''); ?>"
                                                name="room_number" id="selectRoomNumber">
                                                <option data-display="<?php echo e(field_label($fields, 'room_number')); ?>"
                                                    value=""><?php echo e(field_label($fields, 'room_number')); ?></option>
                                            </select>
                                            <div class="loader_style_parent_reg loader"
                                                id="select_dormitory_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                    alt="loader">
                                            </div>

                                            <?php if($errors->has('room_number')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('room_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('national_id_number', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'national_id_number')); ?>"
                                                name="national_id_number" value="<?php echo e(old('national_id_number')); ?>">

                                            <?php if($errors->has('national_id_number')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('national_id_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('local_id_number', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text" name="local_id_number"
                                                placeholder="<?php echo e(field_label($fields, 'local_id_number')); ?>"
                                                value="<?php echo e(old('local_id_number')); ?>">


                                            <?php if($errors->has('local_id_number')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('local_id_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('bank_account_number', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'bank_account_number')); ?>"
                                                name="bank_account_number"
                                                value="<?php echo e(old('bank_account_number')); ?>">


                                            <?php if($errors->has('bank_account_number')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('bank_account_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('bank_name', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'bank_name')); ?>"
                                                name="bank_name" value="<?php echo e(old('bank_name')); ?>">


                                            <?php if($errors->has('bank_name')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('bank_name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('previous_school_details', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'previous_school_details')); ?> "
                                                name="previous_school_details"
                                                value="<?php echo e(old('previous_school_details')); ?>">


                                            <?php if($errors->has('previous_school_details')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('previous_school_details')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('additional_notes', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'additional_notes')); ?>"
                                                name="additional_notes" value="<?php echo e(old('additional_notes')); ?>">


                                            <?php if($errors->has('additional_notes')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('additional_notes')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('ifsc_code', $active_fields)): ?>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <input class="form-control" type="text"
                                                placeholder="<?php echo e(field_label($fields, 'ifsc_code')); ?>"
                                                name="ifsc_code" value="<?php echo e(old('ifsc_code')); ?>">


                                            <?php if($errors->has('ifsc_code')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('ifsc_code')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('document_file_1', $active_fields)): ?>
                                    <div class="col-lg-6 pb-20">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input type="hidden" name="document_title_1"
                                                        value="<?php echo e(field_label($fields, 'document_file_1')); ?>">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderFileOneName"
                                                        placeholder="<?php echo e(field_label($fields, 'document_file_1')); ?>"
                                                        readonly="">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_1"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="document_file_1"
                                                        id="document_file_1">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('document_file_2', $active_fields)): ?>
                                    <div class="col-lg-6 pb-20">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input type="hidden" name="document_title_2"
                                                        value="<?php echo e(field_label($fields, 'document_file_2')); ?>">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderFileTwoName"
                                                        placeholder="<?php echo e(field_label($fields, 'document_file_2')); ?>"
                                                        readonly="">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_2"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="document_file_2"
                                                        id="document_file_2">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('document_file_3', $active_fields)): ?>
                                    <div class="col-lg-6 pb-20">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input type="hidden" name="document_title_3"
                                                        value="<?php echo e(field_label($fields, 'document_file_3')); ?>">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderFileThreeName"
                                                        placeholder="<?php echo e(field_label($fields, 'document_file_3')); ?>"
                                                        readonly="">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_3"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="document_file_3"
                                                        id="document_file_3">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(in_array('document_file_4', $active_fields)): ?>
                                    <div class="col-lg-6 pb-20">
                                        <div class="row no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="primary_input ">
                                                    <input class="primary_input_field" type="text"
                                                        id="placeholderFileFourName"
                                                        placeholder="<?php echo e(field_label($fields, 'document_file_4')); ?>"
                                                        readonly="">
                                                    <input type="hidden" name="document_title_4"
                                                        value="<?php echo e(field_label($fields, 'document_file_4')); ?>">

                                                    <?php if($errors->has('file')): ?>
                                                        <span class="text-danger d-block">
                                                            <strong><?php echo e(@$errors->first('file')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_4"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="document_file_4"
                                                        id="document_file_4">
                                                </button>
                                            </div>
                                        </div>
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

                            </div>

                            <?php
                                $tooltip = '';
                                if ($reg_setting->registration_permission == 1) {
                                    $tooltip = '';
                                } else {
                                    $tooltip = "You Can't Registration Now";
                                }
                            ?>
                            <div class="row mt-40">
                                <div class="col-lg-12">
                                    <div class="login_button text-center">
                                        <button type="submit" class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('common.submit'); ?>
                                        </button>
                                    </div>
                                </div>
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
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!--================ Start End Login Area =================-->
    <!--================ Footer Area =================-->
    <footer class="footer_area registration_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <p><?php echo $copyright_text; ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/popper.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/bootstrap.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/nice-select.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/toastr.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/js/login.js"></script>
    <script src="<?php echo e(url('public/backEnd/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/js/main.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/js/custom.js"></script>
    <script src="<?php echo e(url('/public/js/registration_custom.js')); ?>"></script>
    <script>
        $('#startDate').datepicker({
            Default: {
                leftArrow: '<i class="fa fa-long-arrow-left"></i>',
                rightArrow: '<i class="fa fa-long-arrow-right"></i>'
            }
        });
    </script>
    <?php echo Toastr::message(); ?>

    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\immersion\Modules/ParentRegistration\Resources/views/registration.blade.php ENDPATH**/ ?>