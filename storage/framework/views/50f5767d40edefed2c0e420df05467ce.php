
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('auth.two_factor_setting'); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .copyPaperShow {
        display: show;
    }

    .applicable-for-radio-option{
            margin-bottom: 20px;
        }

    @media (max-width: 576px){
        .applicable-for-radio-option{
            flex-direction: column!important;
            gap: 10px
        }
    }

    @media (max-width: 359px){
        .applicable-for-radio-option > div{
            margin-bottom: 0px!important;
        }
    }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('auth.two_factor_setting'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.general_settings'); ?></a>   
                <a href="#"><?php echo app('translator')->get('auth.two_factor_setting'); ?> </a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(route('two_factor_auth_setting_update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="white-box">
                            <div class="row p-0">
                                <div class="col-lg-12">
                                    <h3 class="text-center"><?php echo app('translator')->get('auth.two_factor_setting'); ?></h3>
                                    <hr>
                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('auth.two_factor_otp'); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="d-flex radio-btn-flex applicable-for-radio-option flex-wrap"> 

                                                       <div class="mr-30">
                                                            <input type="radio" name="two_factor" value="1" id="two_factor_on" class="common-radio relationButton copy_per_th" <?php echo e(generalSetting()->two_factor == 1? 'checked':''); ?>>
                                                            <label for="two_factor_on" id="two_factor_on"><?php echo app('translator')->get('common.enable'); ?></label>
                                                        </div>

                                                        <div class="mr-30">
                                                            <input type="radio" name="two_factor" value="0" id="two_factor_of"  class="common-radio relationButton copy_per_th" <?php echo e(generalSetting()->two_factor == 0? 'checked':''); ?>>
                                                            <label for="two_factor_of" id="two_factor_of"><?php echo app('translator')->get('common.disable'); ?></label>
                                                        </div>                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-5 d-flex">
                                                    <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('auth.send_code_via'); ?></p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="d-flex radio-btn-flex applicable-for-radio-option flex-wrap"> 

                                                       <div class="mr-30">
                                                            <input type="checkbox" name="via_sms" id="via_sms" class="common-radio relationButton copy_per_th" <?php echo e(@$setting->via_sms == 1? 'checked':''); ?>>
                                                            <label for="via_sms" id="via_sms"><?php echo app('translator')->get('common.sms'); ?></label>
                                                        </div>

                                                        <div class="mr-30">
                                                            <input type="checkbox" name="via_email" id="via_email"  class="common-radio relationButton copy_per_th" <?php echo e(@$setting->via_email == 1? 'checked':''); ?>>
                                                            <label for="via_email" id="via_email"><?php echo app('translator')->get('admin.email'); ?></label>
                                                        </div>                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>                                 

                                    <div class="row mb-40 mt-40">
                                        <div class="col-lg-6">
                                             <div class="row">
                                                 <div class="col-lg-3 d-flex">
                                                     <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('auth.applicable_for'); ?></p>
                                                 </div>
                                                 <div class="col-lg-9">
                                                     <div class="d-flex radio-btn-flex applicable-for-radio-option flex-wrap"> 
                                                        <div class="mr-30">
                                                             <input type="checkbox" name="for_admin" id="for_admin" class="common-radio relationButton copy_per_th" <?php echo e(@$setting->for_admin == 1? 'checked':''); ?>>
                                                             <label for="for_admin" id="for_admin"><?php echo app('translator')->get('admin.admin'); ?></label>
                                                         </div>
                                                         <div class="mr-30">
                                                             <input type="checkbox" name="for_student" id="for_student"  class="common-radio relationButton copy_per_th" <?php echo e(@$setting->for_student == 2? 'checked':''); ?>>
                                                             <label for="for_student" id="for_student"><?php echo app('translator')->get('student.student'); ?></label>
                                                         </div>
                                                         <div class="mr-30">
                                                             <input type="checkbox" name="for_parent" id="for_parent" class="common-radio relationButton copy_per_th" <?php echo e(@$setting->for_parent == 3? 'checked':''); ?>>
                                                             <label for="for_parent" id="for_parent"><?php echo app('translator')->get('student.parents'); ?></label>
                                                         </div>
                                                         <div class="mr-30">
                                                             <input type="checkbox" name="for_teacher"  id="for_teacher" class="common-radio relationButton copy_per_th" <?php echo e(@$setting->for_teacher == 4? 'checked':''); ?>>
                                                             <label for="for_teacher" id="for_teacher"><?php echo app('translator')->get('common.teacher'); ?></label>
                                                         </div> 
                                                         <div class="mr-30">
                                                             <input type="checkbox" name="for_staff" id="for_staff"  class="common-radio relationButton copy_per_th" <?php echo e(@$setting->for_staff == 6? 'checked':''); ?>>
                                                             <label for="for_staff" id="for_staff"><?php echo app('translator')->get('common.staff'); ?></label>
                                                         </div>                                           
                                                     </div>
                                                 </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                 <div class="col-lg-5 d-flex">
                                                      <label class="primary_input_label text-uppercase fw-500" for=""><?php echo app('translator')->get('auth.code_lifetime'); ?> <span>(second)</span></label>
                                                  </div>
                                                  <div class="col-lg-7">
                                                      <div class="primary_input ">
                                                           <input class="primary_input_field form-control<?php echo e($errors->has('expired_time') ? ' is-invalid' : ''); ?>"   type="number" name="expired_time"  id="expired_time" value="<?php echo e($setting->expired_time); ?>">
                                                          <?php if($errors->has('expired_time')): ?>
                                                          <span class="text-danger invalid-select" role="alert">
                                                              <?php echo e($errors->first('expired_time')); ?></span>
                                                          <?php endif; ?>
                                                       </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(userPermission('two_factor_auth_setting')): ?>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg">
                                                    <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php $__env->startSection('script'); ?>
<script>
 
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\Modules/TwoFactorAuth\Resources/views/two_factor_auth_setting.blade.php ENDPATH**/ ?>