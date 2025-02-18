
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.general_settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('system_settings.update_general_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('general-settings')); ?>"><?php echo app('translator')->get('system_settings.general_settings_view'); ?></a>
              </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

        <?php else: ?>
            <?php if(userPermission('update-general-settings-data')): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-general-settings-data', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php echo app('translator')->get('common.update'); ?>
                               </h3>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <div class="row mb-30">
                            <div class="col-lg-4">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.school_name'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('school_name') ? ' is-invalid' : ''); ?>"
                                    type="text" name="school_name" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->school_name : old('school_name')); ?>">
                                    
                                    
                                    <?php if($errors->has('school_name')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('school_name')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.site_title'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('site_title') ? ' is-invalid' : ''); ?>"
                                    type="text" name="site_title" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->site_title : old('site_title')); ?>">
                                   
                                    
                                    <?php if($errors->has('site_title')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('site_title')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.academic_year'); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('session_id') ? ' is-invalid' : ''); ?>" name="session_id" id="session_id">
                                        <option data-display="<?php echo app('translator')->get('common.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('common.select_academic_year'); ?></option>
                                        <?php $__currentLoopData = academicYears(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$value->id); ?>"
                                        <?php if(isset($editData)): ?>
                                        <?php if(@$editData->session_id == @$value->id): ?>
                                        selected
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        >
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <?php echo e(@$value->name); ?>

                                        <?php else: ?> 
                                        <?php echo e(@$value->year); ?> (<?php echo e(@$value->title); ?>)
                                        <?php endif; ?> 
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('session_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('session_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-30">
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.school_code'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('school_code') ? ' is-invalid' : ''); ?>"
                                    type="text" name="school_code" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->school_code: old('school_code')); ?>">
                                   
                                    
                                    <?php if($errors->has('school_code')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('school_code')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.phone'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                    type="text" name="phone" autocomplete="off" value="<?php echo e(isset($editData) ? @$editData->phone : old('phone')); ?>">
                                   
                                    
                                    <?php if($errors->has('phone')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('phone')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.email'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                    type="text" name="email" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->email: old('email')); ?>">
                                   
                                    
                                    <?php if($errors->has('email')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.fees_income_head'); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('income_head') ? ' is-invalid' : ''); ?>" name="income_head" id="income_head_id">
                                        <option data-display="<?php echo app('translator')->get('system_settings.fees_income_head'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?></option>
                                        <?php $__currentLoopData = $sell_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sell_head->id); ?>"
                                            <?php echo e(isset($editData)? ($editData->income_head_id == $sell_head->id? 'selected':''):''); ?>

                                            ><?php echo e($sell_head->head); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                        <?php if($errors->has('income_head')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('income_head')); ?>

                                    </span>
                                        <?php endif; ?>
                                    <span class="modal_input_validation red_alert"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.language'); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('language_id') ? ' is-invalid' : ''); ?>" name="language_id" id="language_id">
                                        <option data-display="<?php echo app('translator')->get('system_settings.language'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?> <span class="text-danger"> *</span></option>
                                      
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$value->id); ?>" <?php if(@$editData->language_id == @$value->id): ?>
                                                selected <?php endif; ?> > <?php echo e(@$value->language_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </select>
                                    
                                    <?php if($errors->has('language_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('language_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.week_start_day'); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('week_start_id') ? ' is-invalid' : ''); ?>" name="week_start_id" id="week_start_id">
                                        <option data-display="<?php echo app('translator')->get('system_settings.week_start_day'); ?> *" value=""><?php echo app('translator')->get('system_settings.week_start_day'); ?> <span class="text-danger"> *</span></option>
                                        <?php $__currentLoopData = $weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($weekend->id); ?>" <?php if(isset($editData)): ?> <?php if(@$editData->week_start_id == @$weekend->id): ?> selected <?php endif; ?>  <?php endif; ?>><?php echo e($weekend->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php if($errors->has('week_start_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('week_start_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.date_format'); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('date_format_id') ? ' is-invalid' : ''); ?>" name="date_format_id" id="date_format_id">
                                        <option data-display="<?php echo app('translator')->get('system_settings.select_date_format'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?> <span class="text-danger"> *</span></option>
                                        <?php if(isset($dateFormats)): ?>
                                        <?php $__currentLoopData = $dateFormats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$value->id); ?>"
                                        <?php if(isset($editData)): ?>
                                        <?php if(@$editData->date_format_id == @$value->id): ?>
                                        selected
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        ><?php echo e(@$value->normal_view); ?> [<?php echo e(@$value->format); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    
                                    <?php if($errors->has('date_format_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('date_format_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.time_zone'); ?> <span class="text-danger"> *</span></label>
                                    <select name="time_zone" class="primary_select  form-control <?php echo e($errors->has('time_zone') ? ' is-invalid' : ''); ?>" id="time_zone">
                                        <option data-display="<?php echo app('translator')->get('common.select_time_zone'); ?> *" value=""><?php echo app('translator')->get('common.select_time_zone'); ?> *</option>

                                        <?php $__currentLoopData = $time_zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time_zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$time_zone->id); ?>" <?php echo e(@$time_zone->id == @$editData->time_zone_id? 'selected':''); ?>><?php echo e(@$time_zone->time_zone); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                    </select>

                                    
                                        <?php if($errors->has('time_zone')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('time_zone')); ?>

                                        </span>
                                        <?php endif; ?>


                                </div>
                            </div>
                        </div>                        

                        <div class="row mb-30">

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.currency'); ?> <span class="text-danger"> *</span></label>
                                     <select name="currency" class="primary_select  form-control <?php echo e($errors->has('currency') ? ' is-invalid' : ''); ?>" id="currency">
                                        <option data-display="<?php echo app('translator')->get('system_settings.select_currency'); ?>" value=""><?php echo app('translator')->get('system_settings.select_currency'); ?></option>
                                         <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$currency->code); ?>" <?php echo e(isset($editData)? (@$editData->currency  == @$currency->code? 'selected':''):''); ?>><?php echo e($currency->name); ?> (<?php echo e($currency->code); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('currency')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('currency')); ?>

                                    </span>
                                    <?php endif; ?>

                                 </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.currency_symbol'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('currency_symbol') ? ' is-invalid' : ''); ?>"
                                    type="text" name="currency_symbol" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->currency_symbol : old('currency_symbol')); ?>" id="currency_symbol" readonly="">
                                   
                                    
                                    <?php if($errors->has('currency_symbol')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('currency_symbol')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
    
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.max_upload_file_size'); ?> (MB) <span class="text-danger"> *</span></label>
                                    <input oninput="numberCheck(this)" class="primary_input_field form-control<?php echo e($errors->has('file_size') ? ' is-invalid' : ''); ?>"
                                    type="text" name="file_size" <?php echo e(moduleStatusCheck('Saas')== TRUE && Auth::user()->is_administrator != "yes" ? 'readonly':''); ?> autocomplete="off" value="<?php echo e(isset($editData)? @$editData->file_size : old('file_size')); ?>" id="file_size" >
                                    
                                    
                                    <?php if($errors->has('file_size')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('file_size')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.ss_page_load'); ?> <span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control<?php echo e($errors->has('ss_page_load') ? ' is-invalid' : ''); ?>"
                                    type="text" oninput="numberCheck(this)" name="ss_page_load" autocomplete="off" value="<?php echo e(isset($editData)? @$editData->ss_page_load : old('ss_page_load')); ?>" id="ss_page_load" >
                                   
                                    
                                    <?php if($errors->has('ss_page_load')): ?>
                                    <span class="text-danger" >
                                        <?php echo e($errors->first('ss_page_load')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        
                            
                        </div>
                        <div class="row mb-30">
                            
                            <div class="col-lg-6 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('student.multiple_roll_number'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="radio" name="multiple_roll" id="roll_yes" value="1" class="common-radio relationButton" <?php echo e(@$editData->multiple_roll == "1"? 'checked': ''); ?>>
                                        <label for="roll_yes"><?php echo app('translator')->get('common.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="multiple_roll" id="roll_no" value="0" class="common-radio relationButton" <?php echo e(@$editData->multiple_roll == "0"? 'checked': ''); ?>>
                                        <label for="roll_no"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('system_settings.promossion_without_exam'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="radio" name="promotionSetting" id="relationMother" value="0" class="common-radio relationButton" <?php echo e(@$editData->promotionSetting == "0"? 'checked': ''); ?>>
                                        <label for="relationMother"><?php echo app('translator')->get('common.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="promotionSetting" id="relationFather" value="1" class="common-radio relationButton" <?php echo e(@$editData->promotionSetting == "1"? 'checked': ''); ?>>
                                        <label for="relationFather"><?php echo app('translator')->get('system_settings.disabled'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(moduleStatusCheck('Lms')): ?>
                        <div class="row mb-30">
                            <div class="col-lg-6 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('lms::lms.lms_checkout_option'); ?></p>
                                <div class="d-flex radio-btn-flex mt-1">
                                    <div class="mr-20">
                                        <input type="radio" name="lms_checkout" id="lms_checkout_on" value="1" class="common-radio relationButton" <?php echo e(@$editData->lms_checkout == "1"? 'checked': ''); ?>>
                                        <label for="lms_checkout_on"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="lms_checkout" id="lms_checkout" value="0" class="common-radio relationButton" <?php echo e(@$editData->lms_checkout == "0"? 'checked': ''); ?>>
                                        <label for="lms_checkout"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    
                        <div class="row mb-30 ">
                            <div class="col-lg-6">
                                <p class="text-uppercase mb-2"><?php echo app('translator')->get('system_settings.subject_attendance_layout'); ?></p>
                                <div class="d-flex radio-btn-flex flex-wrap row-gap-24">
                                    <div class="mr-20">
                                        
                                            <input type="radio" name="attendance_layout" id="first_layout" value="1" class="common-radio relationButton attendance_layout"  <?php echo e(@$editData->attendance_layout == "1"? 'checked': ''); ?>>
                                            <label for="first_layout">
                                                <img src="<?php echo e(asset('public/backEnd/img/first_layout.png')); ?>" width="200px" height="auto" class="layout_image" for="first_layout" alt="">
                                            </label>
                                            
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="attendance_layout" id="second_layout" value="0" class="common-radio relationButton attendance_layout" <?php echo e(@$editData->attendance_layout == "0"? 'checked': ''); ?>>
                                        <label for="second_layout">
                                            <img src="<?php echo e(asset('public/backEnd/img/second_layout.png')); ?>" width="200px" height="auto" class="layout_image" for="second_layout" alt="">
                                        </label>
                                        </div>
                                </div>
                            </div>
                            <?php if(moduleStatusCheck('Fees') && !moduleStatusCheck('University')): ?>
                            <div class="col-lg-6">
                                <p class="text-uppercase mb-2"><?php echo app('translator')->get('fees::feesModule.new_fees_module'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="radio" name="fees_status" id="fees_enable" value="1" class="common-radio relationButton" <?php echo e(@$editData->fees_status == "1"? 'checked': ''); ?>>
                                        <label for="fees_enable"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="fees_status" id="fees_disable" value="0" class="common-radio relationButton" <?php echo e(@$editData->fees_status == "0"? 'checked': ''); ?>>
                                        <label for="fees_disable"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade admin-query" id="newFees" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.confirmation'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                            
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4>
                                                    <strong>Mention:</strong> Only one fees could work, 
                                                    if you enable new fees old fees can see but can't collect fees or others, 
                                                    clear all adjustment before enable new fees.
                                                </h4>
                                            </div>
                                        </br>
                                            <div class="text-center">
                                                <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal"><?php echo app('translator')->get('fees::feesModule.agree'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        
                            </div>
                   
                            <?php endif; ?>
                        </div>

                            <?php if(!moduleStatusCheck('University')): ?>
                                <div class="row mb-30 mt-30">
                                    <div class="col-lg-12 d-flex relation-button flex-wrap gap-20 mb-15">
                                        <p class="text-uppercase mb-0"><?php echo app('translator')->get('fees.school_fees_payment_installment_enable'); ?></p>
                                        <div class="d-flex radio-btn-flex">
                                            <div class="mr-20">
                                                <input type="radio" name="direct_fees_assign" id="direct_fees_enable" value="1" class="common-radio relationButton" <?php echo e(@$editData->direct_fees_assign == "1"? 'checked': ''); ?>>
                                                <label for="direct_fees_enable"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                            </div>
                                            <div class="mr-20">
                                                <input type="radio" name="direct_fees_assign" id="direct_fees_disable" value="0" class="common-radio relationButton" <?php echo e(@$editData->direct_fees_assign == "0"? 'checked': ''); ?>>
                                                <label for="direct_fees_disable"><?php echo app('translator')->get('common.disable'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade admin-query" id="FeesInstallment" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.confirmation'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4>
                                                            <strong>Fees Payment Installment Setup:</strong> 
                                                            if you enable old fees then it will be worked properly !
                                                        </h4>
                                                    </div>
                                                    </br>
                                                    <div class="text-center">
                                                        <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal"><?php echo app('translator')->get('fees::feesModule.agree'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-30">
                                <div class="col-lg-6 d-flex relation-button flex-wrap gap-20 mb-15">
                                    <p class="text-uppercase mb-0"><?php echo app('translator')->get('system_settings.result_type'); ?></p>
                                    <div class="d-flex radio-btn-flex">
                                        <div class="mr-20">
                                            <input type="radio" name="result_type" id="gpa" value="gpa" class="common-radio relationButton" <?php echo e(@$editData->result_type == "gpa"? 'checked': ''); ?>>
                                            <label for="gpa"><?php echo app('translator')->get('system_settings.gpa'); ?></label>
                                        </div>
                                        <div class="mr-20">
                                            <input type="radio" name="result_type" id="mark" value="mark" class="common-radio relationButton" <?php echo e(@$editData->result_type == "mark"? 'checked': ''); ?>>
                                            <label for="mark"><?php echo app('translator')->get('system_settings.100_%_mark'); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex relation-button flex-wrap gap-20 mb-15">
                                    <p class="text-uppercase mb-0"><?php echo app('translator')->get('system_settings.student_admission'); ?></p>
                                    <div class="d-flex radio-btn-flex">
                                        <div class="mr-20">
                                            <input type="radio" name="with_guardian" id="with_guardian" value="1" class="common-radio relationButton" <?php echo e(@$editData->with_guardian == 1 ? 'checked': ''); ?>>
                                            <label for="with_guardian"><?php echo app('translator')->get('system_settings.with_guardian'); ?></label>
                                        </div>
                                        <div class="mr-20">
                                            <input type="radio" name="with_guardian" id="without_guardian" value="0" class="common-radio relationButton" <?php echo e(@$editData->with_guardian == 0 ? 'checked': ''); ?>>
                                            <label for="without_guardian"><?php echo app('translator')->get('system_settings.without_guardian'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="row md-30 mt-30">
                            <div class="col-lg-12 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('system_settings.If_student_do_not_pay_fees_bfore_due_date_login_restricted_student_&_parent'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="radio" name="due_fees_login" id="login_rest_enable" value="1" class="common-radio relationButton" <?php echo e(@$editData->due_fees_login == 1 ? 'checked': ''); ?>>
                                        <label for="login_rest_enable"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="due_fees_login" id="login_rest_disable" value="0" class="common-radio relationButton" <?php echo e(@$editData->due_fees_login == 0 ? 'checked': ''); ?>>
                                        <label for="login_rest_disable"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row md-30 mt-30">
                            <div class="col-lg-12 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('common.global_settings_for_can_comment_and_comment_auto_approval'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="checkbox" name="auto_approve" id="newsAutoApproval" value=1 class="common-radio" <?php echo e(@$editData->auto_approve == 1 ? 'checked': ''); ?>>
                                        <label for="newsAutoApproval"><?php echo app('translator')->get('common.auto_approval_comment'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="checkbox" name="is_comment" id="canComment" value=1 class="common-radio" <?php echo e(@$editData->is_comment == 1 ? 'checked': ''); ?>>
                                        <label for="canComment"><?php echo app('translator')->get('common.can_comment'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row md-30 mt-30">
                            <div class="col-lg-12 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('common.Blog Search'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="radio" name="blog_search" id="bSearch" value="1" class="common-radio relationButton" <?php echo e(@$editData->blog_search == 1 ? 'checked': ''); ?>>
                                        <label for="bSearch"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="blog_search" id="bSearchO" value="0" class="common-radio relationButton" <?php echo e(@$editData->blog_search == 0 ? 'checked': ''); ?>>
                                        <label for="bSearchO"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row md-30 mt-30">
                            <div class="col-lg-12 d-flex relation-button flex-wrap gap-20 mb-15">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('common.Recent Blog'); ?></p>
                                <div class="d-flex radio-btn-flex">
                                    <div class="mr-20">
                                        <input type="radio" name="recent_blog" id="bRecentB" value="1" class="common-radio relationButton" <?php echo e(@$editData->recent_blog == 1 ? 'checked': ''); ?>>
                                        <label for="bRecentB"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                    </div>
                                    <div class="mr-20">
                                        <input type="radio" name="recent_blog" id="bRecentBO" value="0" class="common-radio relationButton" <?php echo e(@$editData->recent_blog == 0 ? 'checked': ''); ?>>
                                        <label for="bRecentBO"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row md-30 mt-30">
                            <div class="col-lg-5">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.Queue Connection'); ?> <span class="text-danger"> *</span></label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('session_id') ? ' is-invalid' : ''); ?>" name="queue_connection" id="queueConnection">
                                        <option value="database" <?php echo e(env('QUEUE_CONNECTION') == 'database' ? 'selected' : ''); ?>><?php echo app('translator')->get('common.Database'); ?></option>
                                        <option value="sync" <?php echo e(env('QUEUE_CONNECTION') == 'sync' ? 'selected' : ''); ?>><?php echo app('translator')->get('common.SYNC'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row md-30 mt-30 urlshowhide d-none">
                            <div class="col-lg-7">
                                <pre> <?php echo e('cd ' . base_path() . '/ && php artisan schedule:run >> /dev/null 2>&1'); ?></pre>
                            </div>
                        </div>

                        <div class="row md-30 mt-20">
                            <div class="col-lg-12">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.school_address'); ?> <span class="text-danger">*</span> </label>
                                <textarea class="primary_input_field form-control" cols="0" rows="4" name="address" id="address"><?php echo e(isset($editData) ? @$editData->address : old('address')); ?></textarea>
                                    
                                <?php if($errors->has('address')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('address')); ?>

                                </span>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row md-30 mt-25">
                            <div class="col-lg-12">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.copyright_text'); ?> <span></span> </label>
                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="copyright_text" id="copyright_text"><?php echo e(isset($editData) ? @$editData->copyright_text : old('copyright_text')); ?></textarea>
                                </div>
                            </div>
                        </div>

                    <div class="row mt-40">
                        <div class="col-lg-12 text-center">
                            <?php if(env('APP_SYNC')==TRUE): ?>
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" > <?php echo app('translator')->get('common.update'); ?></button></span>
                            <?php else: ?>
                                <?php if(userPermission('update-general-settings-data')): ?>
                                    <button type="submit" class="primary-btn fix-gr-bg submit">
                                        <span class="ti-check"></span>
                                        <?php echo app('translator')->get('common.update'); ?>
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        <?php echo e(Form::close()); ?>

    </div>

</div>
</section>
<div class="modal fade admin-query question_image_preview"  >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('system_settings.layout_image'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <img src="" width="100%" class="question_image_url" alt="">
            </div>

        </div>
    </div>
</div>
<script>
    var queueConn = $('#queueConnection').val();
    hideshowQueue(queueConn);
    $(document).on('click', '.layout_image', function(){
        // $('.question_image_url').src(this.src);
        $('.question_image_url').attr('src',this.src);   
        $('.question_image_preview').modal('show');
    });

    $(document).on('change', '#queueConnection', function(){
        hideshowQueue($(this).val());
    });

    $('#fees_enable').change(function() {
        $('#newFees').modal('show');
    });

    $('#direct_fees_enable').change(function() {
        $('#FeesInstallment').modal('show');
    });

    function hideshowQueue(value){
        if(value == 'database'){
            $('.urlshowhide').removeClass('d-none');
        }else{
            $('.urlshowhide').addClass('d-none');
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/systemSettings/updateGeneralSettings.blade.php ENDPATH**/ ?>