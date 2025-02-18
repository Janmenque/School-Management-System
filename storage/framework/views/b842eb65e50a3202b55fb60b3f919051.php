
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('communicate.Send_Email_Sms'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('communicate.send_email_sms'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('communicate.communicate'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('communicate.send_email_sms'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'send-email-sms', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="white-box sm2_mb_20">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="main-title">
                                            <h3 class="mb-15"><?php echo app('translator')->get('communicate.send_email_sms'); ?> </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input mb-30">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.title'); ?> <span
                                                        class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('email_sms_title') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="email_sms_title" autocomplete="off"
                                                    value="<?php echo e(old('email_sms_title')); ?>">


                                                <?php if($errors->has('email_sms_title')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('email_sms_title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-12 d-flex mb-20">
                                                <div class="row">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('communicate.send_through'); ?></p>
                                                    <div class="d-flex radio-btn-flex ml-40">
                                                        <div class="mr-30">
                                                            <input type="radio" name="send_through" id="Email"
                                                                value="E" class="common-radio relationButton" checked>
                                                            <label for="Email"><?php echo app('translator')->get('communicate.email'); ?></label>
                                                        </div>
                                                        <div class="mr-30">
                                                            <input type="radio" name="send_through" id="Sms"
                                                                value="S" class="common-radio relationButton">
                                                            <label for="Sms"><?php echo app('translator')->get('communicate.sms'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span
                                                        class="text-danger"> *</span> </label>
                                                <textarea class="primary_input_field form-control <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0"
                                                    rows="4" name="description" id="details"><?php echo e(old('description')); ?></textarea>


                                                <?php if($errors->has('description')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('description')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="row student-details mt_0_sm">
                                <!-- Start Sms Details -->
                                <div class="col-lg-12">
                                    <div class="white-box">
                                        <ul class="nav nav-tabs mt_0_sm mb-20" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#group_email_sms" selectTab="G" role="tab"
                                                    data-toggle="tab"><?php echo app('translator')->get('communicate.group'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" selectTab="I" href="#indivitual_email_sms" role="tab"
                                                    data-toggle="tab"><?php echo app('translator')->get('communicate.individual'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" selectTab="C" href="#class_section_email_sms"
                                                    role="tab" data-toggle="tab">
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <?php echo app('translator')->get('university::un.semester_label'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('common.class'); ?>
                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                        </ul>
    
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <input type="hidden" name="selectTab" id="selectTab" value="G">
    
                                            <div role="tabpanel" class="tab-pane fade show active" id="group_email_sms">
                                                <div class="white-box">
                                                    <div class="col-lg-12">
                                                        <label
                                                            class="primary_input_label form-control<?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>"
                                                            for=""><?php echo app('translator')->get('communicate.message_to'); ?>
                                                            <span class="text-danger"> *</span></label>
                                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="">
                                                                <input type="checkbox" id="role_<?php echo e(@$role->id); ?>"
                                                                    class="common-checkbox" value="<?php echo e(@$role->id); ?>"
                                                                    name="role[]">
                                                                <label
                                                                    for="role_<?php echo e(@$role->id); ?>"><?php echo e(@$role->name); ?></label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($errors->has('role')): ?>
                                                            <span class="text-danger invalid-select" role="alert">
                                                                <?php echo e($errors->first('role')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div role="tabpanel" class="tab-pane fade" id="indivitual_email_sms">
                                                <div class="white-box">
                                                    <div class="row mb-15">
                                                        <div class="col-lg-12">
                                                                <label for="checkbox"
                                                                    class="mb-2"><?php echo app('translator')->get('common.role'); ?><span class="text-danger"> *</span></label>
                                                            <select
                                                                class="primary_select  form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>"
                                                                name="role_id" id="staffsByRoleCommunication">
                                                                <option data-display="<?php echo app('translator')->get('communicate.role'); ?>  *" value="">
                                                                    <?php echo app('translator')->get('communicate.role'); ?> *</option>
                                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(isset($editData)): ?>
                                                                        <option value="<?php echo e(@$value->id); ?>"
                                                                            <?php echo e(@$value->id == @$editData->role_id ? 'selected' : ''); ?>>
                                                                            <?php echo e(@$value->name); ?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?php echo e(@$value->id); ?>"
                                                                            <?php echo e(old($value->id) ? 'selected' : ''); ?>>
                                                                            <?php echo e(@$value->name); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <?php if($errors->has('role_id')): ?>
                                                                <span class="text-danger invalid-select" role="alert">
                                                                    <?php echo e($errors->first('role_id')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-lg-12 mt-15" id="selectStaffsDiv">
                                                            <label for="checkbox" class="mb-2"><?php echo app('translator')->get('common.name'); ?></label>
                                                            <select multiple="multiple"
                                                                class="multypol_check_select active position-relative"
                                                                id="selectStaffss" name="message_to_individual[]"
                                                                style="width:300px"></select>
    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
    
                                            
                                            <div role="tabpanel" class="tab-pane fade" id="class_section_email_sms">
                                                <div class="white-box">
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <?php if ($__env->exists(
                                                            'university::common.session_faculty_depart_academic_semester_level',
                                                            [
                                                                'required' => ['USN', 'UD', 'UA', 'US', 'USL'],
                                                                'div' => 'col-lg-12',
                                                                'row' => 1,
                                                                'hide' => ['USUB'],
                                                            ]
                                                        )) echo $__env->make(
                                                            'university::common.session_faculty_depart_academic_semester_level',
                                                            [
                                                                'required' => ['USN', 'UD', 'UA', 'US', 'USL'],
                                                                'div' => 'col-lg-12',
                                                                'row' => 1,
                                                                'hide' => ['USUB'],
                                                            ]
                                                        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <div class="row mb-35">
                                                            <div class="col-lg-12">
                                                                <label for="checkbox"
                                                                    class="mb-2"><?php echo app('translator')->get('common.class'); ?><span class="text-danger"> *</span></label>
                                                                <select
                                                                    class="primary_select  form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>"
                                                                    name="class_id" id="class_id_email_sms">
                                                                    <option data-display="<?php echo app('translator')->get('common.class'); ?>  *"
                                                                        value=""><?php echo app('translator')->get('common.class'); ?> *</option>
                                                                    <?php if(isset($classes)): ?>
                                                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e(@$value->id); ?>">
                                                                                <?php echo e(@$value->class_name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                                <?php if($errors->has('class_id')): ?>
                                                                    <span class="text-danger invalid-select" role="alert">
                                                                        <?php echo e($errors->first('class_id')); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
    
                                                            <div class="col-lg-12 mt-30" id="selectSectionsDiv">
                                                                <label for="checkbox"
                                                                    class="mb-2"><?php echo app('translator')->get('common.section'); ?></label>
                                                                <select multiple
                                                                    class="multypol_check_select active position-relative"
                                                                    id="selectMultiSections" name="message_to_section[]"
                                                                    style="width:300px"></select>
                                                            </div>
                                                            <div class="col-lg-12 mt-30">
                                                                <label for="checkbox"
                                                                    class="mb-2"><?php echo app('translator')->get('common.student_parent'); ?></label>
                                                                <select multiple
                                                                    class="multypol_check_select active position-relative"
                                                                    name="message_to_student_parent[]"
                                                                    style="width:300px">
                                                                    <option value="2"><?php echo app('translator')->get('common.student'); ?></option>
                                                                    <option value="3"><?php echo app('translator')->get('common.parent'); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
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
            <div class="alert alert-warning mt-30">
                <?php echo app('translator')->get('communicate.For_Sending_Email'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <?php if(userPermission('send-email-sms')): ?>
                <div class="white-box mt-30">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button class="primary-btn fix-gr-bg">
                                <span class="ti-check"></span> <?php echo app('translator')->get('communicate.send'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/communicate/sendEmailSms.blade.php ENDPATH**/ ?>