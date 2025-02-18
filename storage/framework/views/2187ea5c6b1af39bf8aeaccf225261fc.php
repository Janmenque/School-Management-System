<?php $__env->startSection('title'); ?>
<?php echo e(@$pt); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e($pt); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo e(@$pt); ?> </a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor empty_table_tab">
        <div class="container-fluid p-0">
          <div class="row mt-40">
               <div class="col-lg-12">
                   <div class="white-box">
                       <form method="post" action="<?php echo e(route('messengerSettingUpdate')); ?>" enctype = 'multipart/form-data'>
                           <?php echo csrf_field(); ?>
                           <div class="row p-0">
                               <div class="col-lg-12">
                                   <h3 class="text-center"><?php echo e(@$pt); ?></h3>
                                   <hr>
                                   <div class="row mb-40 mt-40">
                                        <div class="col-lg-5 d-flex">
                                             <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('system_settings.Tawk To Chat'); ?></p>
                                         </div>
                                         <div class="col-lg-7">
                                             <div class="d-flex radio-btn-flex flex-wrap">
                                                  <div class="mr-30">
                                                     <input type="radio" name="is_enable" id="via_sms" class="common-radio relationButton copy_per_th" <?php echo e(@$setting->is_enable == 1? 'checked':''); ?>  value="1" >
                                                     <label for="via_sms" id="via_sms"><?php echo app('translator')->get('common.enable'); ?></label>
                                                 </div>

                                                 <div class="mr-30">
                                                     <input type="radio" name="is_enable" id="via_email"  class="common-radio relationButton copy_per_th" <?php echo e(@$setting->is_enable == 0? 'checked':''); ?> value="0" >
                                                     <label for="via_email" id="via_email"><?php echo app('translator')->get('common.disable'); ?></label>
                                                 </div>                                        
                                             </div>
                                         </div>
                                   </div>
   
                                   <div class="row mb-40 mt-40">
                                       <div class="col-lg-12">
                                           <div class="row">
                                               <div class="col-lg-2 d-flex">
                                                   <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('auth.applicable_for'); ?></p>
                                               </div>
                                               <div class="col-lg-10">
                                                   <div class="d-flex radio-btn-flex flex-column flex-sm-row flex-wrap"> 
                                                       <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <div class="mr-30">
                                                               <input type="checkbox" name="applicable_for[]" id="applicable_for_<?php echo e($role->id); ?>" class="common-radio relationButton copy_per_th" value="<?php echo e($role->id); ?>" <?php if(!is_null($setting->applicable_for) &&  in_array($role->id,$setting->applicable_for)): ?> checked <?php endif; ?>>
                                                               <label for="applicable_for_<?php echo e($role->id); ?>" id="applicable_for_<?php echo e($role->id); ?>"><?php echo e($role->name); ?></label>
                                                           </div>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
   
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row mb-40 mt-40" id="pusher">
                                        <div class="col-xl-6 mt-4">
                                             <p class="primary_input_label">
                                                 <?php echo e(__('system_settings.show_admin_panel')); ?>

                                             </p>
                                             <div class="d-flex radio-btn-flex flex-wrap">
                                                 <div class="mr-20">
                                                     <input type="radio" name="show_admin_panel"
                                                         <?php echo e($setting->show_admin_panel == 1 ? 'checked' : ''); ?>

                                                         id="relationv" value="1" class="common-radio relationButton">
                                                     <label for="relationv"><?php echo e(__('common.yes')); ?></label>
                                                 </div>
                                                 <div class="mr-20">
                                                     <input type="radio" name="show_admin_panel"
                                                         <?php echo e($setting->show_admin_panel == 0 ? 'checked' : ''); ?>

                                                         id="relation3v" value="0" class="common-radio relationButton">
                                                     <label for="relation3v"><?php echo e(__('common.no')); ?></label>
                                                 </div>
                                                 <?php $__errorArgs = ['show_admin_panel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                     <small class="text-danger font-italic">*<?php echo e(@$message); ?></small>
                                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                             </div>
                                         </div>
                                         

                                        <div class="col-xl-6 mt-4">
                                             <p class="primary_input_label">
                                                  <?php echo e(__('system_settings.availability')); ?></p>
                                             <div class="d-flex radio-btn-flex flex-wrap">
                                                  <div class="mr-20">
                                                       <input type="radio" name="availability"
                                                            <?php echo e($setting->availability == 'mobile' ? 'checked' : ''); ?>

                                                            id="relationFather33332" value="mobile"
                                                            class="common-radio relationButton" checked>
                                                       <label
                                                            for="relationFather33332"><?php echo e(__('Mobile')); ?></label>
                                                  </div>
                                                  <div class="mr-20">
                                                       <input type="radio" name="availability"
                                                            <?php echo e($setting->availability == 'desktop' ? 'checked' : ''); ?>

                                                            id="relationMother4432" value="desktop"
                                                            class="common-radio relationButton">
                                                       <label
                                                            for="relationMother4432"><?php echo e(__('system_settings.only_desktop')); ?></label>
                                                  </div>
                                                  <div class="mr-20">
                                                       <input type="radio" name="availability"
                                                            <?php echo e($setting->availability == 'both' ? 'checked' : ''); ?>

                                                            id="relationMother4222" value="both"
                                                            class="common-radio relationButton">
                                                       <label
                                                            for="relationMother4222"><?php echo e(__('system_settings.both')); ?></label>
                                                  </div>
                                                  <?php $__errorArgs = ['availability'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <small class="text-danger font-italic">*<?php echo e(@$message); ?></small>
                                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                             </div>
                                        </div>

                                        <div class="col-xl-6 mt-4">
                                             <p class="primary_input_label">
                                                 <?php echo e(__('system_settings.show_website')); ?>

                                             </p>
                                             <div class="d-flex radio-btn-flex flex-wrap">
                                                 <div class="mr-20">
                                                     <input type="radio" name="show_website"
                                                         <?php echo e($setting->show_website == 1 ? 'checked' : ''); ?>

                                                         id="relationvC" value="1" class="common-radio relationButton" >
                                                     <label for="relationvC"><?php echo e(__('common.yes')); ?></label>
                                                 </div>
                                                 <div class="mr-20">
                                                     <input type="radio" name="show_website"
                                                         <?php echo e($setting->show_website == 0 ? 'checked' : ''); ?>

                                                         id="relation3vC" value="0" class="common-radio relationButton">
                                                     <label for="relation3vC"><?php echo e(__('common.no')); ?></label>
                                                 </div>
                                                 <?php $__errorArgs = ['disable_for_admin_panel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                     <small class="text-danger font-italic">*<?php echo e(@$message); ?></small>
                                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                             </div>
                                         </div>
                                         
                                        <div class="col-xl-6 mt-4">
                                             <p class="primary_input_label">
                                                  <?php echo e(__('system_settings.showing_page')); ?></p>
                                             <div class="d-flex radio-btn-flex flex-wrap">
                                                  <div class="mr-20">
                                                       <input type="radio" name="showing_page"
                                                            <?php echo e($setting->showing_page == 'homepage' ? 'checked' : ''); ?>

                                                            id="relationFather311" value="homepage"
                                                            class="common-radio relationButton" checked>
                                                       <label
                                                            for="relationFather311"><?php echo e(__('system_settings.only_homepage')); ?></label>
                                                  </div>
                                                  <div class="mr-20">
                                                       <input type="radio" name="showing_page"
                                                            <?php echo e($setting->showing_page == 'all' ? 'checked' : ''); ?>

                                                            id="relationMother411" value="all"
                                                            class="common-radio relationButton">
                                                       <label
                                                            for="relationMother411"><?php echo e(__('system_settings.all_page')); ?></label>
                                                  </div>
                                                  <?php $__errorArgs = ['showing_page'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                       <small class="text-danger font-italic">*<?php echo e(@$message); ?></small>
                                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                             </div>
                                        </div>

                                        <div class="col-xl-6 mt-4">
                                            <p class="primary_input_label">
                                                 <?php echo e(__('system_settings.position')); ?></p>
                                            <div class="d-flex radio-btn-flex flex-wrap">
                                                 <div class="mr-20">
                                                      <input type="radio" name="position"
                                                           <?php echo e($setting->position == 'left' ? 'right' : ''); ?>

                                                           id="relationFather312" value="left"
                                                           class="common-radio relationButton" checked>
                                                      <label
                                                           for="relationFather312"><?php echo e(__('system_settings.left_side')); ?></label>
                                                 </div>
                                                 <div class="mr-20">
                                                      <input type="radio" name="position"
                                                           <?php echo e($setting->position == 'right' ? 'checked' : ''); ?>

                                                           id="relationMother412" value="right"
                                                           class="common-radio relationButton">
                                                      <label
                                                           for="relationMother412"><?php echo e(__('system_settings.right_side')); ?></label>
                                                 </div>
                                                 <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                      <small class="text-danger font-italic">*<?php echo e(@$message); ?></small>
                                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                       </div>
                                   </div>
                                   
                                   <div class="row mb-40 mt-40">
                                        <div class="col-lg-12"> 
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.Short Code'); ?> </label>
                                                <textarea class="primary_input_field form-control" name="short_code" autocomplete="off"><?php echo isset($setting)? $setting->short_code:''; ?></textarea>
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
                       </form>
                    </div>
               </div>
          </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script language="JavaScript">

        $('#selectAll').click(function () {
            $('input:checkbox').prop('checked', this.checked);

        });


    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('change', '#imgInpBac', function(event){
            getFileName($(this).val(),'#placeholderFileFourName');
            imageChangeWithFile($(this)[0],'#blahImg');
        });
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/systemSettings/plugin_messenger_setting.blade.php ENDPATH**/ ?>