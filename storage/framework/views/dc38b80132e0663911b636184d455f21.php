
<?php if(isset($custom_fields) && $custom_fields): ?>
    <style>
        .browse {
            top: 11px;
            right: 0px;
        }

        .input-right-icon button {
            position: absolute;
            top: 70%;
            right: 15px;
            display: inline-block;
            transform: translateY(-50%);
        }

        .input-right-icon button i {
            position: unset;
        }

        .input-right-icon button.primary-btn-small-input {
            top: 57%;
            right: 15px;
        }
        .customDate.ti-calendar:before {
            position: relative;
            bottom: 0px;
        }
    </style>
    <div class="row mt-5">
        <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($custom_field->type == 'textInput'): ?>
                <div class="<?php echo e($custom_field->width); ?>">
                    <div class="primary_input ">
                        <label><?php echo e($custom_field->label); ?> <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span>
                        </label>
                        <input
                            class="primary_input_field form-control<?php echo e($errors->has('customF.'.$custom_field->label) ? ' is-invalid' : ''); ?>"
                            type="text"
                            name="customF[<?php echo e($custom_field->label); ?>]"
                            value="<?php echo e(isset($student) ? customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name) : ''); ?>">
                        
                        <?php if($errors->has('customF.'.$custom_field->label)): ?>
                            <span class="text-danger">
                                <?php echo e(str_replace('custom f.', '', $errors->first('customF.'.$custom_field->label))); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif($custom_field->type == 'numericInput'): ?>
                <?php
                    $min_max_value = json_decode($custom_field->min_max_value);
                ?>
                <div class="<?php echo e($custom_field->width); ?>">
                    <div class="primary_input ">
                        <label><?php echo e($custom_field->label); ?> <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span>
                        </label>
                        <input
                            class="primary_input_field form-control<?php echo e($errors->has($custom_field->label) ? ' is-invalid' : ''); ?>"
                            type="number" min="<?php echo e($min_max_value[0]); ?>" max="<?php echo e($min_max_value[1]); ?>"
                            name="customF[<?php echo e($custom_field->label); ?>]"
                            value="<?php echo e(isset($student) ? customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name) : ''); ?>">

                            <?php if($errors->has('customF.'.$custom_field->label)): ?>
                                <span class="text-danger">
                                    <?php echo e(str_replace('custom f.', '', $errors->first('customF.'.$custom_field->label))); ?></strong>
                                </span>
                            <?php endif; ?>
                    </div>
                </div>
            <?php elseif($custom_field->type == 'multilineInput'): ?>
                <?php
                    $min_max_length = json_decode($custom_field->min_max_length);
                ?>
                <div class="<?php echo e($custom_field->width); ?>">
                    <div class="primary_input ">
                        <label><?php echo e($custom_field->label); ?> <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span>
                        </label>
                        <textarea class="primary_input_field form-control" cols="0" rows="3"
                            name="customF[<?php echo e($custom_field->label); ?>]"><?php echo e(isset($student) ? customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name) : ''); ?></textarea>

                        <?php if($errors->has('customF.'.$custom_field->label)): ?>
                            <span class="text-danger">
                                <?php echo e(str_replace('custom f.', '', $errors->first('customF.'.$custom_field->label))); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif($custom_field->type == 'datepickerInput'): ?>
                <div class="<?php echo e($custom_field->width); ?>">
                    <div class="no-gutters input-right-icon">
                        <div class="col">
                            <div class="primary_input ">
                                <label><?php echo e($custom_field->label); ?>

                                    <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span></label>
                                <input
                                    class="primary_input_field date form-control<?php echo e($errors->has($custom_field->label) ? ' is-invalid' : ''); ?>"
                                    id="startDate" type="text"
                                    name="customF[<?php echo e($custom_field->label); ?>]"
                                    value="<?php echo e(isset($student) ? customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name) : ''); ?>"
                                    autocomplete="off">
                                <button class="" type="button">
                                    <label class="m-0 p-0" for="startDate">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </label>
                                </button>

                                <?php if($errors->has('customF.'.$custom_field->label)): ?>
                                    <span class="text-danger">
                                        <?php echo e(str_replace('custom f.', '', $errors->first('customF.'.$custom_field->label))); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($custom_field->type == 'checkboxInput'): ?>
                <?php
                    $checkbox_values = json_decode($custom_field->name_value);
                ?>
                <div class="<?php echo e($custom_field->width); ?> d-flex align-items-center">
                    <label class="mr-5"><?php echo e($custom_field->label); ?> <span class="text-danger">
                        <?php echo e($custom_field->required == 1 ? '*' : ''); ?></span>
                    </label>
                    <?php if($checkbox_values): ?>
                        <?php $__currentLoopData = $checkbox_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $checkbox_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row no-gutters input-right-icon mr-3">
                                <div class="primary_input">
                                    <input type="checkbox"
                                        id="custom_types_<?php echo e($key); ?>_<?php echo e($custom_field->id); ?>"
                                        class="common-checkbox exam-checkbox"
                                        name="customF[<?php echo e($custom_field->label); ?>][]"
                                        <?php if(isset($student)): ?> 
                                            <?php if(!is_null(customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name))): ?>
                                                <?php if(in_array($checkbox_value, customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name))): ?>
                                                    checked 
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        value="<?php echo e($checkbox_value); ?>">
                                    <label for="custom_types_<?php echo e($key); ?>_<?php echo e($custom_field->id); ?>"><?php echo e($checkbox_value); ?></label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            <?php elseif($custom_field->type == 'radioInput'): ?>
                <?php
                    $name_values = json_decode($custom_field->name_value);
                ?>
                <div class="<?php echo e($custom_field->width); ?> d-flex flex-wrap align-items-center">
                    <p class="text-uppercase fw-500 mb-0"><?php echo e($custom_field->label); ?>

                        <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span>
                    </p>
                    <div class="d-flex radio-btn-flex ml-40">
                        <?php if($name_values): ?>
                            <?php $__currentLoopData = $name_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mr-30">
                                    <input type="radio" name="customF[<?php echo e($custom_field->label); ?>]"
                                        id="<?php echo e($key); ?>_custField_<?php echo e($custom_field->id); ?>"
                                        <?php if(isset($student) &&
                                                $name_value == customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name)): ?> checked <?php endif; ?>
                                        value="<?php echo e($name_value); ?>"
                                        class="common-radio relationButton">
                                    <label for="<?php echo e($key); ?>_custField_<?php echo e($custom_field->id); ?>"><?php echo e($name_value); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif($custom_field->type == 'dropdownInput'): ?>
                <?php
                    $dropdown_name_values = json_decode($custom_field->name_value);
                ?>
                <div class="<?php echo e($custom_field->width); ?>">
                    <div class="primary_input ">
                        <label><?php echo e($custom_field->label); ?> <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span></label>
                        <select class="primary_select  form-control<?php echo e($errors->has($custom_field->label) ? ' is-invalid' : ''); ?>"
                            name="customF[<?php echo e($custom_field->label); ?>]">
                            <option
                                data-display="<?php echo e($custom_field->label); ?> <?php echo app('translator')->get('common.select'); ?> <?php echo e($custom_field->required == 1 ? '*' : ''); ?>"
                                value=""><?php echo e($custom_field->label); ?> <?php echo app('translator')->get('common.select'); ?>
                                <?php echo e($custom_field->required == 1 ? '*' : ''); ?>

                            </option>
                            <?php if($dropdown_name_values): ?>
                                <?php $__currentLoopData = $dropdown_name_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dropdown_name_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dropdown_name_value); ?>"
                                        <?php echo e(isset($student) ? (customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name) == $dropdown_name_value ? 'selected' : '') : ''); ?>>
                                        <?php echo e($dropdown_name_value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>

                        <?php if($errors->has('customF.'.$custom_field->label)): ?>
                            <span class="text-danger">
                                <?php echo e(str_replace('custom field', '', $errors->first('customF.'.$custom_field->label))); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif($custom_field->type == 'fileInput'): ?>
                <div class="<?php echo e($custom_field->width); ?> mt-30">
                    <div class="row no-gutters input-right-icon">
                        <div class="col">
                            <div class="primary_input ">
                                <label><?php echo e($custom_field->label); ?> <span class="text-danger"><?php echo e($custom_field->required == 1 ? '*' : ''); ?></span></label>
                                <input class="primary_input_field" type="text" id="placeholderPhoto_<?php echo e($key); ?>"
                                    placeholder="<?php echo e(isset($student) ? (!showFileName(customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name)) ? $custom_field->label : showFileName(customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name))) : $custom_field->label); ?> <?php echo e((isset($student) ? '' : $custom_field->required == 1) ? '*' : ''); ?>"
                                    readonly="">

                                <?php if($errors->has($custom_field->label)): ?>
                                    <span class="text-danger d-block">
                                        <strong><?php echo e(@$errors->first($custom_field->label)); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="primary-btn-small-input" type="button">
                                <label class="primary-btn small fix-gr-bg browse"
                                    for="photo_<?php echo e($key); ?>"><?php echo app('translator')->get('common.browse'); ?></label>
                                <input type="file" id="photo_<?php echo e($key); ?>" data-id="#placeholderPhoto_<?php echo e($key); ?>"
                                    class="d-none cutom-photo"
                                    value="<?php echo e(isset($student) ? customFieldValue($student->id, $custom_field->label, $student->custom_field_form_name) : ''); ?>"
                                    name="customF[<?php echo e($custom_field->label); ?>]"
                                    <?php if(isset($student)): ?> <?php echo e(' '); ?>

                                                        <?php else: ?>
                                                    <?php if($custom_field->required == 1): ?>
                                                        <?php echo e('required'); ?> <?php endif; ?>
                                    <?php endif; ?>
                                >
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/_custom_field.blade.php ENDPATH**/ ?>