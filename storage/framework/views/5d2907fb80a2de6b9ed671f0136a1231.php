<div class="row">
    <div class="col-lg-4">
        <div class="primary_input">
            <label class="primary_input_label" for=""><?php echo app('translator')->get('student.label'); ?><span class="text-danger"> *</span></label>
            <input class="primary_input_field form-control<?php echo e($errors->has('label') ? ' is-invalid' : ''); ?>" type="text" name="label" autocomplete="off"
                    value="<?php echo e(isset($v_custom_field)? $v_custom_field->label: old('label')); ?>">
            
            
            <?php if($errors): ?>
            
                <span class="text-danger">
                <?php echo e($errors->first('label')); ?>

            </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-lg-4">
        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.type'); ?><span class="text-danger"> *</span></label>
        <select class="primary_select form-control <?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" name="type" id="inputType">
            <option data-display="<?php echo app('translator')->get('common.type'); ?> *" value=""><?php echo app('translator')->get('common.select_type'); ?> *</option>
            <option value="textInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="textInput" ?'selected':''): (old('type') == 'textInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.text_input'); ?></option>
            <option value="numericInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="numericInput"?'selected':''): (old('type') == 'numericInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.numeric_input'); ?></option>
            <option value="multilineInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="multilineInput"?'selected':''): (old('type') == 'multilineInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.multiline_input'); ?></option>
            <option value="datepickerInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="datepickerInput"?'selected':''): (old('type') == 'datepickerInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.datepicker_input'); ?></option>
            <option value="checkboxInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="checkboxInput"?'selected':''): (old('type') == 'checkboxInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.checkbox_input'); ?></option>
            <option value="radioInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="radioInput"?'selected':''): (old('type') == 'radioInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.radio_input'); ?></option>
            <option value="dropdownInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="dropdownInput"?'selected':''):(old('type') == 'dropdownInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.dropdown_input'); ?></option>
            <option value="fileInput" <?php echo e(isset($v_custom_field)? ($v_custom_field->type =="fileInput"?'selected':''):(old('type') == 'fileInput' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.file_input'); ?></option>
        </select>
        <?php if($errors->has('type')): ?>
            <span class="text-danger invalid-select" role="alert">
                <?php echo e($errors->first('type')); ?>

            </span>
        <?php endif; ?>
    </div>
    <div class="col-lg-4">
        <div class="primary_input sm_mb_20 mt-30" style="position: relative; top: 12px;">
            <input type="checkbox" name="required" id="labalRequired" class="common-checkbox permission-checkAll" value="1"
            <?php echo e(isset($v_custom_field)? ($v_custom_field->required == 1?'checked':''):(old('required') ? 'checked' : '')); ?>>
            <label for="labalRequired"><?php echo app('translator')->get('student.required'); ?></label>
        </div>
        <?php
           $type = isset($type) ? $type : null;
        ?>
        <?php if(moduleStatusCheck('ParentRegistration')== TRUE && $type == 'student_online_regi'): ?>
            <div class="primary_input sm_mb_20 mt-30 pt-10">
                <input type="checkbox" name="is_showing_online_registration" id="is_showing_online_registration" class="common-checkbox " value="1"
                <?php echo e(isset($v_custom_field)? ($v_custom_field->is_showing == 1?'checked':''):(old('is_showing_online_registration') ? 'checked' : '')); ?>>
                <label for="is_showing_online_registration"><?php echo app('translator')->get('student.available_for_online_registration'); ?></label>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
    if(isset($v_custom_field)){
        $v_lengths = json_decode($v_custom_field->min_max_length);
        $v_values = json_decode($v_custom_field->min_max_value);
    }
?>
<div class="row">
    <div class="col-xl-8">
        <div class="row mt-30 text_input d-none">
            <div class="col-lg-6">
                <div class="primary_input sm_mb_20 ">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.min_length'); ?></label>
                    <input class="primary_input_field" type="text" name="min_max_length[]" value="<?php echo e(isset($v_custom_field)? $v_lengths[0]:(old('min_max_length') ? old('min_max_length')[0] : '')); ?>">
                    <?php if($errors): ?>
                        <span class="text-danger">
                            <?php echo e($errors->first('min_max_length.0')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input sm_mb_20 ">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.max_length'); ?></label>
                    <input class="primary_input_field" type="text" name="min_max_length[]" value="<?php echo e(isset($v_custom_field)? $v_lengths[1]:(old('min_max_length') ? old('min_max_length')[1] : '')); ?>">
                    <?php if($errors): ?>
                        <span class="text-danger">
                            <?php echo e($errors->first('min_max_length.1')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>

        <div class="row mt-30 numeric_input d-none">
            <div class="col-lg-6">
                <div class="primary_input sm_mb_20 ">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.min_value'); ?></label>
                    <input class="primary_input_field" type="text" name="min_max_value[]" value="<?php echo e(isset($v_custom_field)? $v_values[0]:(old('min_max_value') ? old('min_max_value')[0] : '')); ?>">
                    
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="primary_input sm_mb_20 ">
                    <label class="primary_input_label" for=""><?php echo app('translator')->get('student.max_value'); ?></label>
                    <input class="primary_input_field" type="text" name="min_max_value[]" value="<?php echo e(isset($v_custom_field)? $v_values[1]:(old('min_max_value') ? old('min_max_value')[1] : '')); ?>">
                 
                    
                </div>
            </div>
        </div>

        <div class="row mt-30 checkbox_input d-none">
            <div class="col-lg-8 mt-20 text-right">
                <button type="button" class="primary-btn small fix-gr-bg" onclick="customFieldAddRow();" id="customFieldaddRowBtn">
                    <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                </button>
            </div>
        </div>

        <?php
            $v_name_values = [];
            if (isset($v_custom_field) && !empty($v_custom_field->name_value)) {
                $v_name_values = json_decode($v_custom_field->name_value);
            }
        ?>
        
        <input type="hidden" value="<?php echo app('translator')->get('student.value'); ?>" id="rowLang">
        
        <?php if(isset($v_custom_field) && in_array($v_custom_field->type, ["checkboxInput", "radioInput", "dropdownInput"]) && is_array($v_name_values)): ?>
            <?php $__currentLoopData = $v_name_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_name_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-30 static">
                    <div class="col-lg-6">
                        <div class="primary_input">
                            <label><?php echo e(isset($v_custom_field) ? trans('student.value').' '.$v_name_value : trans('student.value')); ?><span class="text-danger"> *</span></label>
                            <input class="primary_input_field form-control<?php echo e($errors->has('value') ? ' is-invalid' : ''); ?>" type="text" name="name_value[]" autocomplete="off" value="<?php echo e(isset($v_custom_field) ? $v_name_value : ''); ?>">
                        </div>
                        <?php if($errors->has('value')): ?>
                            <span class="text-danger"><?php echo e($errors->first('value')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4">
                        <button class="primary-btn icon-only fix-gr-bg mt-35" type="button" id="deleteCustRow" <?php echo e(isset($v_custom_field) ? '' : 'disabled'); ?>>
                            <span class="ti-trash"></span>
                        </button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    
        <div id="addCustRow"></div>
    </div>
    <div class="col-xl-4 mt-30 widthDropdown d-none">
        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.width'); ?><span class="text-danger"> *</span></label>
        <select class="primary_select form-control <?php echo e($errors->has('width') ? ' is-invalid' : ''); ?>" name="width">
            <option data-display="<?php echo app('translator')->get('student.width'); ?> *" value=""><?php echo app('translator')->get('common.select_width'); ?> *</option>
            <option value="col-12" <?php echo e(isset($v_custom_field)? ($v_custom_field->width =="col-12"?'selected':''):(old('width') == 'col-12' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.full_width'); ?></option>
            <option value="col-6" <?php echo e(isset($v_custom_field)? ($v_custom_field->width =="col-6"?'selected':''):(old('width') == 'col-6' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.half_width'); ?></option>
            <option value="col-3" <?php echo e(isset($v_custom_field)? ($v_custom_field->width =="col-3"?'selected':''):(old('width') == 'col-3' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.one_thired_width'); ?></option>
            <option value="col-4" <?php echo e(isset($v_custom_field)? ($v_custom_field->width =="col-4"?'selected':''):(old('width') == 'col-4' ? 'selected' : '')); ?>><?php echo app('translator')->get('student.one_fourth_width'); ?></option>
        </select>
        <?php if($errors->has('width')): ?>
            <span class="text-danger invalid-select" role="alert">
                <?php echo e($errors->first('width')); ?>

            </span>
        <?php endif; ?>
    </div>
</div>
<?php if(userPermission("store-student-registration-custom-field") || userPermission("store-staff-registration-custom-field")): ?>
    <div class="col-lg-12 mt-20 text-right">
        <button type="submit" class="primary-btn small fix-gr-bg">
            <span class="ti-save pr-2"></span>
            <?php echo e(isset($v_custom_field)?trans('common.update'):trans('student.save')); ?>

        </button>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $( document ).ready(function() {
        let inputType= $('#inputType').val();
        if(inputType == "checkboxInput" || inputType == "radioInput" ||inputType == "dropdownInput")
        {
            $('.static').removeClass('d-none');
            $('.checkbox_input').removeClass('d-none');
        }
        
        showHideFields(inputType);

        $(document).on("change","#inputType", function(event)
        {
            let inputType = $(this).val();
            showHideFields(inputType);
        });

        $(document).on("click","#customFieldaddRowBtn", function(event)
        {
            $('.addRow').removeClass('d-none');
        });
    });

    function showHideFields(inputType){
        if(inputType == ''){
            $('.widthDropdown').addClass('d-none');
            $('.text_input').addClass('d-none');
            $('.numeric_input').addClass('d-none');
            $('.addRow').addClass('d-none');
            $('.static').addClass('d-none');
            $('.checkbox_input').addClass('d-none');
            $('.addRow').addClass('d-none');
        }else{
            if(inputType == "textInput" || inputType == "multilineInput")
            {
                $('.text_input').removeClass('d-none');
                $('.addRow').addClass('d-none');
                $('.static').addClass('d-none');
            }else{
                $('.text_input').addClass('d-none');
            }
            if(inputType == "numericInput")
            {
                $('.numeric_input').removeClass('d-none');
                $('.addRow').addClass('d-none');
                $('.static').addClass('d-none');
            }else{
                $('.numeric_input').addClass('d-none');
            }
            if(inputType == "datepickerInput")
            {
                $('.static').addClass('d-none');
                $('.addRow').addClass('d-none');
            }
            if(inputType == "checkboxInput" || inputType == "radioInput" ||inputType == "dropdownInput")
            {
                $('.static').removeClass('d-none');
                $('.checkbox_input').removeClass('d-none');
            }else{
                $('.checkbox_input').addClass('d-none');
            }
            if(inputType == "fileInput")
            {
                $('.static').addClass('d-none');
                $('.addRow').addClass('d-none');
            }
            $('.widthDropdown').removeClass('d-none');
        }
    }
    
    customFieldAddRow = () => 
        {
            var divLength = $(".addRow").length;
            var rowLang = $("#rowLang").val();
            var count = divLength + 1;
            var newRow = `<div class="row mt-30 addRow d-none">
                            <div class="col-lg-6">
                                <div class="primary_input">
                                    <label>${rowLang} ${count}<span class="text-danger"> *</span></label>
                                    <input class="primary_input_field form-control has-content" type="text" name="name_value[]" autocomplete="off"">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="primary-btn icon-only fix-gr-bg mt-35" type="button" id="deleteCustRow">
                                    <span class="ti-trash"></span>
                                </button>
                            </div>
                        </div>`;
            $("#addCustRow").append(newRow);
    };
    
    $(document).on('click', '#deleteCustRow', function() 
    {
        $(this).parent().parent().remove();
    });
</script><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/customField/_custom_form.blade.php ENDPATH**/ ?>