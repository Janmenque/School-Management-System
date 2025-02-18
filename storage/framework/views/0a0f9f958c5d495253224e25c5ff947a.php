<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('library.add_member'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style type="text/css">
            #selectStaffsDiv,
            .forStudentWrapper,
            .forParentWrapper {
                display: none;
            }

            .child .dtr-data{
                word-break: break-word;
            }
            a.primary-btn.fix-gr-bg {
                line-height: 1.2;
                padding: 8px;
                font-size: 11px!important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('library.add_member'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                    <a href="#"><?php echo app('translator')->get('library.add_member'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($editData)): ?>
                <?php if(userPermission('library-member-store')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('library-member')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($editData)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'holiday/' . $editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('library-member-store')): ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'library-member-store',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($editData)): ?>
                                            <?php echo app('translator')->get('library.edit_member'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('library.add_member'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">

                                        <div class="col-lg-12 mb-15">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('library.member_type')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('member_type') ? ' is-invalid' : ''); ?>"
                                                name="member_type" id="member_type">
                                                <option data-display=" <?php echo app('translator')->get('library.member_type'); ?> *" value="">
                                                    <?php echo app('translator')->get('library.member_type'); ?> *</option>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($editData)): ?>
                                                        <option value="<?php echo e($value->id); ?>"
                                                            <?php echo e($value->id == $editData->role_id ? 'selected' : ''); ?>>
                                                            <?php echo e($value->full_name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('member_type')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('member_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="forStudentWrapper col-lg-12">
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

                                                <div class="mt-30 mb-40" id="select_un_student_div">
                                                    <?php echo e(Form::select('student_id', ['' => __('common.select_student') . '*'], null, ['class' => 'primary_select  form-control' . ($errors->has('student_id') ? ' is-invalid' : ''), 'id' => 'select_un_student'])); ?>


                                                    <div class="pull-right loader loader_style"
                                                        id="select_un_student_loader">
                                                        <img class="loader_img_style"
                                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                            alt="loader">
                                                    </div>
                                                    <?php if($errors->has('student_id')): ?>
                                                        <span class="text-danger custom-error-message" role="alert">
                                                            <?php echo e(@$errors->first('student_id')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="row">
                                                    <div class="col-lg-12 mb-15">
                                                        <label class="primary_input_label" for="">
                                                            <?php echo e(__('common.class')); ?>

                                                            <span class="text-danger"> *</span>
                                                        </label>
                                                        <select
                                                            class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                            id="class_library_member" name="class">
                                                            <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value="">
                                                                <?php echo app('translator')->get('common.select_class'); ?>*</option>
                                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($class->id); ?>"
                                                                    <?php echo e(old('class') == $class->id ? 'selected' : ''); ?>>
                                                                    <?php echo e($class->class_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 mb-15" id="select_section__member_div">
                                                        <label class="primary_input_label" for="">
                                                            <?php echo e(__('common.section')); ?>

                                                            <span class="text-danger"> *</span>
                                                        </label>
                                                        <input type="hidden" id="member_type_hidden" name="member_type_hidden"  value="">
                                                        <input type="hidden" id="is_alumni" value="<?php echo e(App\GlobalVariable::isAlumni()); ?>">
                                                        <select
                                                            class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                            id="select_section_member" name="section">
                                                            <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value="">
                                                                <?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                        </select>
                                                        <div class="pull-right loader loader_style"
                                                            id="select_section_loader">
                                                            <img class="loader_img_style"
                                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                alt="loader">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 mb-15" id="select_student_div">
                                                        <label class="primary_input_label" for="">
                                                            <?php echo e(__('common.student')); ?>

                                                            <span class="text-danger"> *</span>
                                                        </label>
                                                        <select
                                                            class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                                            id="select_student" name="student">
                                                            <option data-display="<?php echo app('translator')->get('library.select_student'); ?> *" value="">
                                                                <?php echo app('translator')->get('library.select_student'); ?> *</option>
                                                        </select>
                                                        <div class="pull-right loader loader_style"
                                                            id="select_student_loader">
                                                            <img class="loader_img_style"
                                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                                alt="loader">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <div class="forParentWrapper col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-15">
                                                    <label class="primary_input_label" for="">
                                                        <?php echo e(__('common.class')); ?>

                                                        <span class="text-danger"> *</span>
                                                    </label>
                                                    <select
                                                        class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                        id="class_library_parent_member" name="class">
                                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value="">
                                                            <?php echo app('translator')->get('common.select_class'); ?>*</option>
                                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($class->id); ?>"
                                                                <?php echo e(old('class') == $class->id ? 'selected' : ''); ?>>
                                                                <?php echo e($class->class_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="col-lg-12 mb-15" id="select_section_parent_member_div">
                                                    <label class="primary_input_label" for="">
                                                        <?php echo e(__('common.section')); ?>

                                                        <span class="text-danger"> *</span>
                                                    </label>
                                                    <select
                                                        class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                                        id="select_section_parent_member" name="section">
                                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value="">
                                                            <?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                    </select>
                                                    <div class="pull-right loader loader_style"
                                                        id="select_section_loader">
                                                        <img class="loader_img_style"
                                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                            alt="loader">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-15" id="select_parent_div">
                                                    <label class="primary_input_label" for="">
                                                        <?php echo app('translator')->get('library.parent'); ?>
                                                        <span class="text-danger"> *</span>
                                                    </label>
                                                    <select
                                                        class="primary_select form-control<?php echo e($errors->has('parent') ? ' is-invalid' : ''); ?>"
                                                        id="select_parent" name="parent">
                                                        <option data-display="<?php echo app('translator')->get('library.select_parent'); ?> *" value="">
                                                            <?php echo app('translator')->get('library.select_parent'); ?> *</option>
                                                    </select>
                                                    <div class="pull-right loader loader_style" id="select_parent_loader">
                                                        <img class="loader_img_style"
                                                            src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                            alt="loader">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-15" id="selectStaffsDiv">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('common.name')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('staff_id') ? ' is-invalid' : ''); ?>"
                                                name="staff" id="selectStaffs">
                                                <option data-display="<?php echo app('translator')->get('common.name'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.name'); ?> *</option>
                                                <?php if(isset($staffsByRole)): ?>
                                                    <?php $__currentLoopData = $staffsByRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>"
                                                            <?php echo e($value->id == $editData->staff_id ? 'selected' : ''); ?>>
                                                            <?php echo e($value->full_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-12 mb-15 mt-10">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('library.member_id'); ?> <span
                                                        class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('member_ud_id') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="member_ud_id" autocomplete="off"
                                                    value="<?php echo e(isset($content_title) ? $leave_type->type : ''); ?>">


                                                <?php if($errors->has('member_ud_id')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('member_ud_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                        <input type="hidden" name="url" id="url"
                                            value="<?php echo e(URL::to('/')); ?>">

                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('library-member-store')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>

                                                <?php if(isset($editData)): ?>
                                                    <?php echo app('translator')->get('library.update_member'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('library.save_member'); ?>
                                                <?php endif; ?>


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
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('library.members'); ?></h3>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
    
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
                                                <th><?php echo app('translator')->get('common.name'); ?></th>
                                                <th><?php echo app('translator')->get('library.member_type'); ?></th>
                                                <th><?php echo app('translator')->get('library.member_id'); ?></th>
                                                <th><?php echo app('translator')->get('common.email'); ?></th>
                                                <th><?php echo app('translator')->get('common.mobile'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php if(isset($libraryMembers)): ?>
                                                <?php $__currentLoopData = $libraryMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key + 1); ?></td>
                                                        <td>
                                                            <?php
                                                            if ($value->member_type == '2' || $value->member_type == '10') {
                                                                if (!empty($value->studentDetails) && !empty($value->studentDetails->full_name)) {
                                                                    echo $value->studentDetails->full_name;
                                                                }
                                                            } elseif ($value->member_type == '3') {
                                                                if (!empty($value->parentsDetails)) {
                                                                    echo $value->parentsDetails->fathers_name ? $value->parentsDetails->fathers_name : $value->parentsDetails->guardians_name;
                                                                }
                                                            } else {
                                                                if (!empty($value->staffDetails) && !empty($value->staffDetails->full_name)) {
                                                                    echo $value->staffDetails->full_name;
                                                                }
                                                            }
                                                            
                                                            ?>
    
                                                        </td>
                                                        <td><?php echo e(!empty($value->roles) ? $value->roles->name : ''); ?></td>
                                                        <td><?php echo e($value->member_ud_id); ?></td>
                                                        <td>
                                                            <?php
                                                            if ($value->member_type == '2' || $value->member_type == '10') {
                                                                if (!empty($value->studentDetails) && !empty($value->studentDetails->email)) {
                                                                    echo $value->studentDetails->email;
                                                                }
                                                            } elseif ($value->member_type == '3') {
                                                                if (!empty($value->parentsDetails) && !empty($value->parentsDetails->guardians_email)) {
                                                                    echo $value->parentsDetails->guardians_email;
                                                                }
                                                            } else {
                                                                if (!empty($value->staffDetails) && !empty($value->staffDetails->email)) {
                                                                    echo $value->staffDetails->email;
                                                                }
                                                            }
                                                            
                                                            ?>
    
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($value->member_type == '2' || $value->member_type == '10') {
                                                                if (!empty($value->studentDetails) && !empty($value->studentDetails->mobile)) {
                                                                    echo $value->studentDetails->mobile;
                                                                }
                                                            } elseif ($value->member_type == '3') {
                                                                if (!empty($value->parentsDetails) && !empty($value->parentsDetails->fathers_mobile)) {
                                                                    echo $value->parentsDetails->fathers_mobile;
                                                                }
                                                            } else {
                                                                if (!empty($value->staffDetails) && !empty($value->staffDetails->mobile)) {
                                                                    echo $value->staffDetails->mobile;
                                                                }
                                                            }
                                                            
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if(userPermission('cancel-membership')): ?>
                                                                <a class="primary-btn fix-gr-bg"
                                                                    href="<?php echo e(route('cancel-membership', @$value->id)); ?>"><?php echo app('translator')->get('library.cancel_membership'); ?></a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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

<?php if(moduleStatusCheck('University')): ?>
    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                $("#select_semester_label").on("change", function() {

                    var url = $("#url").val();
                    var i = 0;
                    let semester_id = $(this).val();
                    let academic_id = $('#select_academic').val();
                    let session_id = $('#select_session').val();
                    let faculty_id = $('#select_faculty').val();
                    let department_id = $('#select_dept').val();
                    let un_semester_label_id = $('#select_semester_label').val();

                    if (session_id == '') {
                        setTimeout(function() {
                            toastr.error(
                                "Session Not Found",
                                "Error ", {
                                    timeOut: 5000,
                                });
                        }, 500);

                        $("#select_semester option:selected").prop("selected", false)
                        return;
                    }
                    if (department_id == '') {
                        setTimeout(function() {
                            toastr.error(
                                "Department Not Found",
                                "Error ", {
                                    timeOut: 5000,
                                });
                        }, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return;
                    }
                    if (semester_id == '') {
                        setTimeout(function() {
                            toastr.error(
                                "Semester Not Found",
                                "Error ", {
                                    timeOut: 5000,
                                });
                        }, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return;
                    }
                    if (academic_id == '') {
                        setTimeout(function() {
                            toastr.error(
                                "Academic Not Found",
                                "Error ", {
                                    timeOut: 5000,
                                });
                        }, 500);
                        return;
                    }
                    if (un_semester_label_id == '') {
                        setTimeout(function() {
                            toastr.error(
                                "Semester Label Not Found",
                                "Error ", {
                                    timeOut: 5000,
                                });
                        }, 500);
                        return;
                    }

                    var formData = {
                        semester_id: semester_id,
                        academic_id: academic_id,
                        session_id: session_id,
                        faculty_id: faculty_id,
                        department_id: department_id,
                        un_semester_label_id: un_semester_label_id,
                    };

                    // Get Student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url + "/university/" + "get-university-wise-student",
                        beforeSend: function() {
                            $('#select_un_student_loader').addClass('pre_loader').removeClass(
                                'loader');
                        },
                        success: function(data) {
                            var a = "";
                            $.each(data, function(i, item) {
                                if (item.length) {
                                    $("#select_un_student").find("option").not(":first")
                                        .remove();
                                    $("#select_un_student_div ul").find("li").not(":first")
                                        .remove();

                                    $.each(item, function(i, students) {
                                        console.log(students);
                                        $("#select_un_student").append(
                                            $("<option>", {
                                                value: students.student.id,
                                                text: students.student
                                                    .full_name,
                                            })
                                        );

                                        $("#select_un_student_div ul").append(
                                            "<li data-value='" +
                                            students.student.id +
                                            "' class='option'>" +
                                            students.student.full_name +
                                            "</li>"
                                        );
                                    });
                                } else {
                                    $("#select_un_student_div .current").html(
                                        "SELECT STUDENT *");
                                    $("#select_un_student").find("option").not(":first")
                                        .remove();
                                    $("#select_un_student_div ul").find("li").not(":first")
                                        .remove();
                                }
                            });
                        },
                        error: function(data) {
                            console.log("Error:", data);
                        },
                        complete: function() {
                            i--;
                            if (i <= 0) {
                                $('#select_un_student_loader').removeClass('pre_loader').addClass(
                                    'loader');
                            }
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/library/members.blade.php ENDPATH**/ ?>