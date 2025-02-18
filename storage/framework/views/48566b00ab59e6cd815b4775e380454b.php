
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('student.student_registration'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_registration'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.custom_field'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_registration'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($v_custom_field)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('student-reg-custom-field')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="main-title mt_0_sm mt_0_md">
                            <h3 class="mb-15">
                                <?php if(isset($v_custom_field)): ?>
                                <?php echo app('translator')->get('student.edit_custom_field'); ?>
                                <?php else: ?>
                                <?php echo app('translator')->get('student.add_custom_field'); ?>
                                <?php endif; ?>

                        </div>
                    </div>
                </div>
                    <?php if(isset($v_custom_field)): ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'update-student-registration-custom-field', 'method' => 'POST'])); ?>

                    <input type="hidden" name="id" value="<?php echo e($v_custom_field->id); ?>">
                    <?php else: ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'store-student-registration-custom-field', 'method' => 'POST'])); ?>

                    <?php endif; ?>
                    <?php echo $__env->make('backEnd.customField._custom_form', ['type' => 'student_online_regi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="row mt-40 full_wide_table">
            <div class="col-lg-12">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('student.custom_field_list'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-lg-12">
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
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.sl'); ?></th>
                                        <th><?php echo app('translator')->get('student.label'); ?></th>
                                        <th><?php echo app('translator')->get('common.type'); ?></th>
                                        <th><?php echo app('translator')->get('student.width'); ?></th>
                                        <th><?php echo app('translator')->get('student.required'); ?></th>
                                        <th><?php echo app('translator')->get('student.value'); ?></th>
                                        <?php if(moduleStatusCheck('ParentRegistration') == true): ?>
                                        
                                        <th><?php echo app('translator')->get('student.available_for_online_registration'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('common.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $v_lengths = json_decode($custom_field->min_max_length);
                                    $v_values = json_decode($custom_field->min_max_value);
                                    $v_name_values = json_decode($custom_field->name_value);
                                    ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($custom_field->label); ?></td>
                                        <td>
                                            <?php if($custom_field->type == 'textInput'): ?>
                                            <?php echo app('translator')->get('student.text_input'); ?>
                                            <?php elseif($custom_field->type == 'numericInput'): ?>
                                            <?php echo app('translator')->get('student.numeric_input'); ?>
                                            <?php elseif($custom_field->type == 'multilineInput'): ?>
                                            <?php echo app('translator')->get('student.multiline_input'); ?>
                                            <?php elseif($custom_field->type == 'datepickerInput'): ?>
                                            <?php echo app('translator')->get('student.datepicker_input'); ?>
                                            <?php elseif($custom_field->type == 'checkboxInput'): ?>
                                            <?php echo app('translator')->get('student.checkbox_input'); ?>
                                            <?php elseif($custom_field->type == 'radioInput'): ?>
                                            <?php echo app('translator')->get('student.radio_input'); ?>
                                            <?php elseif($custom_field->type == 'dropdownInput'): ?>
                                            <?php echo app('translator')->get('student.dropdown_input'); ?>
                                            <?php else: ?>
                                            <?php echo app('translator')->get('student.file_input'); ?>
                                            <?php endif; ?>
                                            </br>
                                            <?php if($custom_field->type == 'textInput' || $custom_field->type ==
                                            'multilineInput'): ?>
                                            <small>
                                                <?php echo app('translator')->get('student.min_length'); ?> : <?php echo e($v_lengths[0]); ?>

                                            </small>
                                            </br>
                                            <small>
                                                <?php echo app('translator')->get('student.max_length'); ?> : <?php echo e($v_lengths[1]); ?>

                                            </small>
                                            </br>
                                            <?php endif; ?>

                                            <?php if($custom_field->type == 'numericInput'): ?>
                                            <small>
                                                <?php echo app('translator')->get('student.min_value'); ?> : <?php echo e($v_values[0]); ?>

                                            </small>
                                            </br>
                                            <small>
                                                <?php echo app('translator')->get('student.max_value'); ?> : <?php echo e($v_values[1]); ?>

                                            </small>
                                            </br>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($custom_field->width == 'col-12'): ?>
                                            <?php echo app('translator')->get('student.full_width'); ?>
                                            <?php elseif($custom_field->width == 'col-6'): ?>
                                            <?php echo app('translator')->get('student.half_width'); ?>
                                            <?php elseif($custom_field->width == 'col-4'): ?>
                                            <?php echo app('translator')->get('student.one_fourth_width'); ?>
                                            <?php elseif($custom_field->width == 'col-3'): ?>
                                            <?php echo app('translator')->get('student.one_thired_width'); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($custom_field->required == 1): ?>
                                            <?php echo app('translator')->get('student.required'); ?>
                                            <?php else: ?>
                                            <?php echo app('translator')->get('student.not_required'); ?>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php if(
                                            $custom_field->type == 'checkboxInput' ||
                                            $custom_field->type == 'radioInput' ||
                                            $custom_field->type == 'dropdownInput'): ?>
                                            <?php if($v_name_values): ?>
                                            <?php $__currentLoopData = $v_name_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_name_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e(@$v_name_value); ?><?php if(!$loop->last): ?>,
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(moduleStatusCheck('ParentRegistration') == true): ?>
                                        
                                        <td>
                                            <?php if($custom_field->is_showing == 1): ?>
                                            <?php echo app('translator')->get('common.yes'); ?>
                                            <?php else: ?>
                                            <?php echo app('translator')->get('common.no'); ?>
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if(userPermission(1103)): ?>
                                                <a class="dropdown-item"
                                                    href="<?php echo e(route('edit-custom-field', ['id' => @$custom_field->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                <?php endif; ?>
                                                <?php if(userPermission(1104)): ?>
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#deleteCustomField<?php echo e(@$custom_field->id); ?>"
                                                    href="#">
                                                    <?php echo app('translator')->get('common.delete'); ?>
                                                </a>
                                                <?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                        </td>
                                    </tr>

                                    <div class="modal fade admin-query"
                                        id="deleteCustomField<?php echo e(@$custom_field->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_custom_field'); ?></h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                            data-dismiss="modal">
                                                            <?php echo app('translator')->get('common.cancel'); ?>
                                                        </button>
                                                        <?php echo e(Form::open(['route' => 'delete-custom-field', 'method' => 'POST'])); ?>

                                                        <input type="hidden" name="id"
                                                            value="<?php echo e(@$custom_field->id); ?>">
                                                        <button class="primary-btn fix-gr-bg"
                                                            type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/customField/studentRegistration.blade.php ENDPATH**/ ?>