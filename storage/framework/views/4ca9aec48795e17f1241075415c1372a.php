<?php $__env->startPush('css'); ?>
    <?php if(!isset($editData)): ?>
        <style>
            .add_new_form {
                display: none;
            }

            .addFromBtn {
                display: block;
                width: max-content;
                margin-left: auto;
            }

            .closeFormBtn {
                display: none;
                width: max-content;
                margin-left: auto;
            }
        </style>
    <?php endif; ?>

    <style>
        .dt-buttons {
            display: none !important;
        }

        .primary_input_field~label {
            top: 5px;
        }

        .backBtn {
            width: max-content;
            margin-left: auto;
        }
    </style>

<?php $__env->stopPush(); ?>

<div role="tabpanel" class="tab-pane fade <?php if(Session::get('Custom_sms') == 'active'): ?> show active <?php endif; ?> " id="Custom_sms">
    <div class="white-box">

        <div class="row mb-30">
            <?php if(isset($editData)): ?>
                <a href="<?php echo e(route('sms-settings')); ?>" class="primary-btn small fix-gr-bg backBtn">
                    <?php echo app('translator')->get('common.back'); ?>
                </a>
            <?php else: ?>
                <div class="col-md-12">
                    <a onclick="addnewForm()" href="#" class="primary-btn small fix-gr-bg addFromBtn"
                        id="addFromBtn">
                        <span class="ti-plus pr-2"></span> <?php echo app('translator')->get('system_settings.add_new_gateway'); ?>
                    </a>

                    <a onclick="closeForm()" href="#" class="primary-btn small fix-gr-bg closeFormBtn"
                        id="closeFormBtn">
                        <?php echo app('translator')->get('system_settings.close'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class=" add_new_form pb-4 px-3 border-bottom" id="add_new_form">
                <?php if(isset($editData)): ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal mb-0', 'files' => true, 'route' => 'update-custom-sms-setting', 'id' => 'update-custom-sms-setting'])); ?>

                    <input type="hidden" name="id" value="<?php echo e(@$editData->id); ?>">
                <?php else: ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal mb-0', 'files' => true, 'route' => 'save-custom-sms-setting', 'id' => 'save-custom-sms-setting'])); ?>

                <?php endif; ?>
                <div class="row mb-15 mt-0">
                    <div class="col-lg-4 mb-15">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.gateway_name'); ?> <span class="text-danger"> *</span></label>
                            <input
                                class="primary_input_field form-control<?php echo e($errors->has('gateway_name') ? ' is-invalid' : ''); ?>"
                                type="text" name="gateway_name" autocomplete="off"
                                value="<?php echo e(isset($editData) ? @$editData->gateway_name : old('gateway_name')); ?>"
                                id="gateway_name">


                            <?php if($errors->has('gateway_name')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('gateway_name')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-15">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.gateway_url'); ?> <span class="text-danger"> *</span></label>
                            <input
                                class="primary_input_field form-control<?php echo e($errors->has('gateway_url') ? ' is-invalid' : ''); ?>"
                                type="text" name="gateway_url" autocomplete="off"
                                value="<?php echo e(isset($editData) ? @$editData->gateway_url : old('gateway_url')); ?>"
                                id="gateway_url">


                            <?php if($errors->has('gateway_url')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('gateway_url')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-15">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.request_method'); ?> <span class="text-danger"> *</span> </label>
                            <select
                                class="primary_select  form-control<?php echo e($errors->has('request_method') ? ' is-invalid' : ''); ?>"
                                name="request_method">
                                <option data-display="<?php echo app('translator')->get('system_settings.select_request_method'); ?> *" value=""><?php echo app('translator')->get('system_settings.select_a_SMS_service'); ?> *</option>
                                <option value="get" <?php if(isset($editData) && $editData->request_method == 'get'): ?> selected <?php endif; ?>>GET</option>
                                <option value="post" <?php if(isset($editData) && $editData->request_method == 'post'): ?> selected <?php endif; ?>>POST</option>
                            </select>
                            <?php if($errors->has('request_method')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('request_method')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-15">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.send_to_parameter_name'); ?> <span class="text-danger"> *</span> </label>
                            <input
                                class="primary_input_field form-control<?php echo e($errors->has('send_to_parameter_name') ? ' is-invalid' : ''); ?>"
                                type="text" name="send_to_parameter_name" autocomplete="off"
                                value="<?php echo e(isset($editData) ? @$editData->send_to_parameter_name : old('send_to_parameter_name')); ?>"
                                id="send_to_parameter_name">


                            <?php if($errors->has('send_to_parameter_name')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('send_to_parameter_name')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-15">
                        <div class="primary_input">
                            <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.messege_to_parameter_name'); ?> <span class="text-danger"> *</span> </label>
                            <input
                                class="primary_input_field form-control<?php echo e($errors->has('messege_to_parameter_name') ? ' is-invalid' : ''); ?>"
                                type="text" name="messege_to_parameter_name" autocomplete="off"
                                value="<?php echo e(isset($editData) ? @$editData->messege_to_parameter_name : old('messege_to_parameter_name')); ?>"
                                id="messege_to_parameter_name">


                            <?php if($errors->has('messege_to_parameter_name')): ?>
                                <span class="text-danger" >
                                    <?php echo e($errors->first('messege_to_parameter_name')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-15 d-flex relation-button mt-30">
                        <p class="text-uppercase mb-0 mt-10"><?php echo app('translator')->get('system_settings.set_authetication'); ?></p>
                        <div class="d-flex radio-btn-flex ml-30">
                            <div class="mr-20 mt-10">
                                <input type="radio" name="set_auth" id="set_auth_on" value="header"
                                    class="common-radio relationButton"
                                    <?php if(isset($editData) && $editData->set_auth == 'header'): ?> checked <?php endif; ?>>
                                <label for="set_auth_on">Header</label>
                            </div>
                            <div class="mr-20 mt-10">
                                <input type="radio" name="set_auth" id="set_auth" value="url"
                                    class="common-radio relationButton"
                                    <?php if(isset($editData) && $editData->set_auth == 'url'): ?> checked <?php endif; ?>>
                                <label for="set_auth">URL</label>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row mb-30">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_1'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_1') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_1" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_1 : old('param_key_1')); ?>"
                                        id="param_key_1">


                                    <?php if($errors->has('param_key_1')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_1')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_1'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_1') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_1" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_1 : old('param_value_1')); ?>"
                                        id="param_value_1">


                                    <?php if($errors->has('param_value_1')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_1')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_3'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_3') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_3" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_3 : old('param_key_3')); ?>"
                                        id="param_key_3">


                                    <?php if($errors->has('param_key_3')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_3')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_3'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_3') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_3" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_3 : old('param_value_3')); ?>"
                                        id="param_value_3">


                                    <?php if($errors->has('param_value_3')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_3')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_2'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_2') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_2" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_2 : old('param_key_2')); ?>"
                                        id="param_key_2">


                                    <?php if($errors->has('param_key_2')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_2')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_2'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_2') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_2" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_2 : old('param_value_2')); ?>"
                                        id="param_value_2">


                                    <?php if($errors->has('param_value_2')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_2')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_4'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_4') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_4" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_4 : old('param_key_4')); ?>"
                                        id="param_key_4">


                                    <?php if($errors->has('param_key_4')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_4')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_4'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_4') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_4" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_4 : old('param_value_4')); ?>"
                                        id="param_value_4">


                                    <?php if($errors->has('param_value_4')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_4')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_5'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_5') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_5" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_5 : old('param_key_5')); ?>"
                                        id="param_key_5">


                                    <?php if($errors->has('param_key_5')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_5')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_5'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_5') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_5" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_5 : old('param_value_5')); ?>"
                                        id="param_value_5">


                                    <?php if($errors->has('param_value_5')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_5')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_7'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_7') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_7" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_7 : old('param_key_7')); ?>"
                                        id="param_key_7">


                                    <?php if($errors->has('param_key_7')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_7')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_7'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_7') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_7" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_7 : old('param_value_7')); ?>"
                                        id="param_value_7">


                                    <?php if($errors->has('param_value_7')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_7')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_6'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_6') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_6" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_6 : old('param_key_6')); ?>"
                                        id="param_key_6">


                                    <?php if($errors->has('param_key_6')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_6')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_6'); ?></label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_6') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_6" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_6 : old('param_value_6')); ?>"
                                        id="param_value_6">


                                    <?php if($errors->has('param_value_2')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_2')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_key_8'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_key_8') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_key_8" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_key_8 : old('param_key_8')); ?>"
                                        id="param_key_8">


                                    <?php if($errors->has('param_key_8')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_key_8')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-15">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('system_settings.param_value_8'); ?> </label>
                                    <input
                                        class="primary_input_field form-control<?php echo e($errors->has('param_value_8') ? ' is-invalid' : ''); ?>"
                                        type="text" name="param_value_8" autocomplete="off"
                                        value="<?php echo e(isset($editData) ? @$editData->param_value_8 : old('param_value_8')); ?>"
                                        id="param_value_8">


                                    <?php if($errors->has('param_value_8')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('param_value_8')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                            <span class="ti-check"></span>
                            <?php if(isset($editData)): ?>
                                <?php echo app('translator')->get('common.update'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('common.save'); ?>
                            <?php endif; ?>
                        </button>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>

            <?php if(!isset($editData)): ?>
                <div class="col-lg-12 mt-15">
                    <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <div class="table-responsive">
                            <table id="noSearch" class="table shadow-none" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('student.status'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.gateway_name'); ?></th>
                                        <th><?php echo app('translator')->get('student.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php $__currentLoopData = $all_sms_services->where('gateway_type','custom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $custom_sms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="primary_input">
                                                    <input type="checkbox" data-id="<?php echo e(@$custom_sms->id); ?>"
                                                        id="custom_sms<?php echo e(@$custom_sms->id); ?>"
                                                        class="common-checkbox class-checkbox custom_sms_status"
                                                        name="custom_sms_status" value="<?php echo e(@$custom_sms->id); ?>"
                                                        <?php echo e(@$custom_sms->active_status == 1 ? 'checked' : ''); ?>>
                                                    <label for="custom_sms<?php echo e(@$custom_sms->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td><?php echo e(@$custom_sms->gateway_name); ?></td>
                                            <td>
                                                <div class="CRM_dropdown dropdown">
                                                    <button type="button" class="btn dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <?php echo app('translator')->get('common.select'); ?>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('edit-custom-sms-setting', [$custom_sms->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
        
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            onclick="deleteCustomSms(<?php echo e($custom_sms->id); ?>)"
                                                            href="#"><?php echo app('translator')->get('common.delete'); ?></a>
        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>
        </div>


    </div>



    <div class="modal fade admin-query" id="deleteCustomSmsModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('system_settings.delete_custom_sms_gateway'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo e(Form::open(['route' => 'delete-custom-sms-setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg"
                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                        <input type="hidden" name="id">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>

                    </div>
                </div>
                <?php echo e(Form::close()); ?>



            </div>
        </div>
    </div>


</div>

<?php $__env->startPush('script'); ?>
    <script>
        function deleteCustomSms(id) {
            var modal = $('#deleteCustomSmsModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }

        function addnewForm() {
            $("#add_new_form").css("display", "block");
            $("#closeFormBtn").css("display", "block");
            $("#addFromBtn").css("display", "none");
        }

        function closeForm() {
            $("#add_new_form").css("display", "none");
            $("#closeFormBtn").css("display", "none");
            $("#addFromBtn").css("display", "block");
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/systemSettings/includes/customSmsSetting.blade.php ENDPATH**/ ?>