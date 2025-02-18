

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.update_system'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.update_system'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.update_system'); ?> </a>
                </div>
            </div>
        </div>
    </section>   

    <section class="admin-visitor-area up_admin_visitor empty_table_tab">
        <div class="container-fluid p-0">

        

            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(userPermission('admin/update-system')): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'versionUpdateInstall', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>   
                            <div class="white-box sm_mb_20  ">
                                <div class="main-title">
                                    <h3 class="mb-15 cust-lawngreen"><?php echo app('translator')->get('system_settings.upload_from_local_directory'); ?></h3>
                                </div>
                                    <div class="add-visitor">

                                        <div class="row no-gutters input-right-icon mb-20">
                                            <div class="col">
                                                <div class="primary_input">
                                                    
                                                    
                                                    <?php if($errors->has('updateFile')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('updateFile')); ?>

                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                   
                                                </button>

                                            </div>
                                        </div>
                                        <div class="primary_input">
                                            <div class="primary_file_uploader">
                                                    <input class="primary_input_field form-control <?php echo e($errors->has('updateFile') ? ' is-invalid' : ''); ?>" readonly="true" type="text"
                                                    placeholder="<?php echo e(isset($editData->file) && @$editData->file != ""? getFilePath3(@$editData->file):'Upload File'); ?> "  id="placeholderInputUpdate" name="updateFile">
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="upload_update_file"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none form-control" name="updateFile" id="upload_update_file">
                                                </button>
                                            </div>
                                        </div>
                                        <?php 
                                            $tooltip = "";
                                            if(userPermission('admin/update-system')){
                                                    $tooltip = "";
                                                }else{
                                                    $tooltip = "You have no permission to add";
                                                }
                                        ?>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center"> 
                                                <button class="primary-btn fix-gr-bg submit"  data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($session)): ?>
                                                        <?php echo app('translator')->get('common.update'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('common.save'); ?>
                                                    <?php endif; ?>
                                                    <?php echo app('translator')->get('common.file'); ?>
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
                            <div class="col-lg-12">
                                <div class="main-title mb-0" >
                                    <h3 class="mb-15"><?php echo app('translator')->get('system_settings.update_details'); ?></h3>
                                </div>
                            </div>
    
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h3> <?php echo app('translator')->get('system_settings.system_info'); ?> </h3>
                                    <div class="add-visitor">
                                        <table style="width:100%; box-shadow: none;" class="table school-table-style">
                                          
                                            <tr>
                                                <td><?php echo app('translator')->get('system_settings.software_version'); ?></td>
                                                <td><?php echo e(@file_get_contents('storage/app/.version')); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo app('translator')->get('system_settings.check_update'); ?></td>
                                                <td><a href="https://codecanyon.net/user/codethemes/portfolio" target="_blank"> <i class="ti-new-window"> </i> Update </a> </td>
                                            </tr> 
                                            <tr>
                                                <td> <?php echo app('translator')->get('system_settings.PHP_version'); ?></td>
                                                <td><?php echo e(phpversion()); ?></td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo app('translator')->get('system_settings.curl_enable'); ?></td>
                                                <td><?php
                                                if  (in_array  ('curl', get_loaded_extensions())) {
                                                    echo 'enable';
                                                }
                                                else {
                                                    echo 'disable';
                                                }
                                                ?></td>
                                            </tr>
                                
                                            
                                            <tr>
                                                <td> <?php echo app('translator')->get('system_settings.purchase_code'); ?></td>
    
                                                <td><?php echo e(__('Verified')); ?>

                                                <?php if(! Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                     <?php if ($__env->exists('service::license.revoke')) echo $__env->make('service::license.revoke', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                 <?php endif; ?> 
                                                 </td>
                                            </tr>
                                
    
                                            <tr>
                                                <td> <?php echo app('translator')->get('system_settings.install_domain'); ?></td>
                                                <td class="text-break"><?php echo e(@$data->system_domain); ?></td>
                                            </tr>
    
                                            <tr>
                                                <td> <?php echo app('translator')->get('system_settings.system_activation_date'); ?></td>
                                                <td><?php echo e(@dateConvert($data->system_activated_date)); ?></td>
                                            </tr>
                                            <tr>
                                                <td> <?php echo app('translator')->get('system_settings.last_update'); ?></td>
                                                <td>
                                                <?php if(is_null($data->last_update)): ?>
                                                     <?php echo e(@dateConvert($data->system_activated_date)); ?>

                                                <?php else: ?>
                                                        <?php echo e(@dateConvert($data->last_update)); ?>

                                                <?php endif; ?>
                                                </td>
                                            </tr>
    
                                        </table>
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
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script language="JavaScript">

        $('#selectAll').click(function () {
            $('input:checkbox').prop('checked', this.checked);

        });

        $(document).on('change', '#upload_update_file', function(event){
            getFileName($(this).val(),'#placeholderInputUpdate');
        });


    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/systemSettings/updateSettings.blade.php ENDPATH**/ ?>