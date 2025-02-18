
<?php $__env->startSection('title'); ?>
    <?php if(moduleStatusCheck('University')): ?>
        <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
    <?php else: ?>
        <?php echo app('translator')->get('student.assign_class'); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .badge {
            background: var(--primary-color);
            color: #fff;
            padding: 5px 10px;
            border-radius: 30px;
            display: inline-block;
            font-size: 8px;
        }
        .icon-only [class*="ti-"]{
            color: #fff;
            font-size: 14px;
        }
        .icon-only:hover [class*="ti-"]{
            color: #fff!important;
        }

        .table thead td{
            text-align: left;
        }

        .table tbody td {
            padding: 10px 12px 10px 12px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>

    <?php
        function showTimelineDocName($data)
        {
            $name = explode('/', $data);
            $number = count($name);
            return $name[$number - 1];
        }
        function showDocumentName($data)
        {
            $name = explode('/', $data);
            $number = count($name);
            return $name[$number - 1];
        }
    ?>
    <?php
        $setting = app('school_info');
        if (!empty($setting->currency_symbol)) {
            $currency = $setting->currency_symbol;
        } else {
            $currency = '$';
        }
    ?>

    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>
                    <?php if(moduleStatusCheck('University')): ?>
                        <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('student.assign_class'); ?>
                    <?php endif; ?>
                </h1>
                <?php if(moduleStatusCheck('University')): ?>
                    <div class="bc-pages">
                        <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                        <a href="<?php echo e(route('student_list')); ?>"><?php echo app('translator')->get('student.student_list'); ?></a>
                        <a href="#">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('student.assign_class'); ?>
                            <?php endif; ?>
                        </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <?php if ($__env->exists('backEnd.studentInformation.inc.student_profile')) echo $__env->make('backEnd.studentInformation.inc.student_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <!-- Start Student Details -->
                <div class="col-lg-9 student-details up_admin_visitor">
                    <div class="white-box mt-40">
                        <div class="text-right mb-20">
                            <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button"
                                data-toggle="modal" data-target="#assignClass"> <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?></button>
                        </div>
                        <div class="table-responsive">
                        <table id="" class="table simple-table school-table"
                            cellspacing="0">
                            <thead>
                                <tr >
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <th><?php echo app('translator')->get('university::un.faculty'); ?> (<?php echo app('translator')->get('university::un.department'); ?>)</th>
                                        <th><?php echo app('translator')->get('university::un.semester_label'); ?></th>
                                        <th><?php echo app('translator')->get('common.section'); ?></th>
                                    <?php else: ?>
                                        <th><?php echo app('translator')->get('common.class'); ?></th>
                                        <th><?php echo app('translator')->get('common.section'); ?></th>
                                    <?php endif; ?>
                                    <?php if(generalSetting()->multiple_roll == 1): ?>
                                        <th><?php echo app('translator')->get('student.id_number'); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo app('translator')->get('student.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $student_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr >
                                        <?php if(moduleStatusCheck('University')): ?>
                                            <td>
                                                <?php echo e(@$record->unFaculty->name); ?>

                                                <br>
                                                (<?php echo e(moduleStatusCheck('University') ? $record->unDepartment->name : $record->section->section_name); ?>)

                                                <?php if($record->is_default): ?>
                                                    <span class="badge fix-gr-bg">
                                                        <?php echo e(__('common.default')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e(@$record->unSemesterLabel->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e(@$record->section->section_name); ?>

                                            </td>
                                        <?php else: ?>
                                            <td>
                                                <?php echo e(@$record->class->class_name); ?>


                                                <?php if($record->is_default): ?>
                                                    <span class="badge fix-gr-bg">
                                                        <?php echo e(__('common.default')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e(@$record->section->section_name); ?>

                                            </td>
                                        <?php endif; ?>

                                        <?php if(generalSetting()->multiple_roll == 1): ?>
                                            <td><?php echo e($record->roll_no); ?></td>
                                        <?php endif; ?>
                                        <td>

                                            <div class="d-flex gap-10">
                                            <a class="primary-btn icon-only fix-gr-bg modalLink"
                                                data-modal-size="small-modal"
                                                title=" <?php if(moduleStatusCheck('University')): ?> <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                                        <?php else: ?>
                                           <?php echo app('translator')->get('student.edit_assign_class'); ?> <?php endif; ?>"
                                                href="<?php echo e(route('student_assign_edit', [@$record->student_id, @$record->id])); ?>"><span
                                                    class="ti-pencil"></span></a>
                                            <a href="#" class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                data-target="#deleteRecord_<?php echo e($record->id); ?>">
                                                <span class="ti-trash"></span>
                                            </a>
                                            </div>
                                        </td>
                                    </tr>




                                    

                                    <div class="modal fade admin-query" id="deleteRecord_<?php echo e($record->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="<?php echo e(route('student.record.delete')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('student.Are you sure you want to move the following record to the trash?'); ?></h4>
                                                        </div>
                                                        <input type="checkbox" id="record<?php echo e(@$record->id); ?>"
                                                            class="common-checkbox form-control<?php echo e(@$errors->has('record') ? ' is-invalid' : ''); ?>"
                                                            name="type">
                                                        <label
                                                            for="record<?php echo e(@$record->id); ?>"><?php echo e(__('student.Skip the trash and permanently delete the record')); ?></label>
                                                        <input type="hidden" name="student_id"
                                                            value="<?php echo e($record->student_id); ?>">
                                                        <input type="hidden" name="record_id" value="<?php echo e($record->id); ?>">
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <button type="submit"
                                                                class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- End Student Details -->
            </div>


        </div>
    </section>

    <!-- assign class form modal start-->
    <div class="modal fade admin-query" id="assignClass">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <?php if(moduleStatusCheck('University')): ?>
                            <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('student.assign_class'); ?>
                        <?php endif; ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student.record.store', 'method' => 'POST'])); ?>



                        <input type="hidden" name="student_id" value="<?php echo e($student_detail->id); ?>">
                        <?php if(!moduleStatusCheck('University')): ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="primary_input ">
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('session') ? ' is-invalid' : ''); ?>"
                                            name="session" id="academic_year">
                                            <option data-display="<?php echo app('translator')->get('common.academic_year'); ?> *" value=""><?php echo app('translator')->get('common.academic_year'); ?>
                                                *</option>
                                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($session->id); ?>"
                                                    <?php echo e(old('session') == $session->id ? 'selected' : ''); ?>>
                                                    <?php echo e($session->year); ?>[<?php echo e($session->title); ?>]</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('session')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('session')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-lg-12">
                                    <div class="primary_input " id="class-div">
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                            name="class" id="classSelectStudent">
                                            <option data-display="<?php echo app('translator')->get('common.class'); ?> *" value=""><?php echo app('translator')->get('common.class'); ?>
                                                *</option>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_class_loader">
                                            <img class="loader_img_style"
                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>

                                        <?php if($errors->has('class')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('class')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-lg-12">
                                    <div class="primary_input " id="sectionStudentDiv">
                                        <select
                                            class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                            name="section" id="sectionSelectStudent">
                                            <option data-display="<?php echo app('translator')->get('common.section'); ?> *" value=""><?php echo app('translator')->get('common.section'); ?>
                                                *</option>
                                        </select>
                                        <div class="pull-right loader loader_style" id="select_section_loader">
                                            <img class="loader_img_style"
                                                src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>

                                        <?php if($errors->has('section')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('section')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level', [
                                'mt' => 'mt-0',
                                'required' => ['USN', 'UF', 'UD', 'UA', 'US', 'USL'],
                                'row' => 1,
                                'div' => 'col-lg-12',
                                'hide' => ['USUB'],
                            ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level', [
                                'mt' => 'mt-0',
                                'required' => ['USN', 'UF', 'UD', 'UA', 'US', 'USL'],
                                'row' => 1,
                                'div' => 'col-lg-12',
                                'hide' => ['USUB'],
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if(generalSetting()->multiple_roll == 1): ?>
                            <div class="row mt-25">
                                <div class="col-lg-12">
                                    <div class="primary_input ">
                                        <input oninput="numberCheck(this)" class="primary_input_field" type="text"
                                            id="roll_number" name="roll_number" value="<?php echo e(old('roll_number')); ?>">
                                        <label>
                                            <?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?>

                                            <?php if(is_required('roll_number') == true): ?>
                                                <span class="text-danger"> *</span>
                                            <?php endif; ?>
                                        </label>

                                        <span class="text-danger" id="roll-error" role="alert">
                                            <strong></strong>
                                        </span>
                                        <?php if($errors->has('roll_number')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('roll_number')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row  mt-25">
                            <div class="col-lg-12">
                                <label for="is_default"><?php echo app('translator')->get('student.is_default'); ?></label>
                                <div class="d-flex radio-btn-flex mt-10">

                                    <div class="mr-30">
                                        <input type="radio" name="is_default" id="isDefaultYes" value="1"
                                            class="common-radio relationButton">
                                        <label for="isDefaultYes"><?php echo app('translator')->get('common.yes'); ?></label>
                                    </div>
                                    <div class="mr-30">
                                        <input type="radio" name="is_default" id="isDefaultNo" value="0"
                                            class="common-radio relationButton" checked>
                                        <label for="isDefaultNo"><?php echo app('translator')->get('common.no'); ?></label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 text-center mt-20">
                            <div class="mt-40 d-flex justify-content-between">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                                <button class="primary-btn fix-gr-bg submit" id="save_button_query"
                                    type="submit"><?php echo app('translator')->get('admin.save'); ?></button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- assign class form modal end-->


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $("#assign_class_academic_year").on(
                "change",
                function() {
                    var url = $("#url").val();
                    var i = 0;
                    var formData = {
                        id: $(this).val(),
                    };

                    alert($(this).val());
                    // get section for student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url + "/" + "academic-year-get-class",

                        beforeSend: function() {
                            $('#select_class_loader').addClass('pre_loader');
                            $('#select_class_loader').removeClass('loader');
                        },

                        success: function(data) {
                            $("#classSelectStudent").empty().append(
                                $("<option>", {
                                    value: '',
                                    text: window.jsLang('select_class') + ' *',
                                })
                            );

                            if (data[0].length) {
                                $.each(data[0], function(i, className) {
                                    $("#classSelectStudent").append(
                                        $("<option>", {
                                            value: className.id,
                                            text: className.class_name,
                                        })
                                    );
                                });
                            }
                            $('#classSelectStudent').niceSelect('update');
                            $('#classSelectStudent').trigger('change');
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        },
                        complete: function() {
                            i--;
                            if (i <= 0) {
                                $('#select_class_loader').removeClass('pre_loader');
                                $('#select_class_loader').addClass('loader');
                            }
                        }
                    });
                }
            );
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/assign_class.blade.php ENDPATH**/ ?>