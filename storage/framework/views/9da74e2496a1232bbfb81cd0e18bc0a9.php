
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('student.student_attendance'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .QA_section .QA_table thead th {
        padding-left: 30px!important;
    }
    .check_box_table .QA_table .table thead th:nth-child(2) {
        padding-left: 0px!important;
    }

    .QA_section .QA_table tbody tr td{
        min-width: 150px;
    }

    .main-wrapper ::-webkit-scrollbar {
        height: 5px;
    }

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>


<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_attendance'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-center justify-content-between flex-wrap">
                            <div class="main-title m-0">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                            <a href="<?php echo e(route('student-attendance-import')); ?>"
                                class="primary-btn small fix-gr-bg pull-right mb-15"><span
                                    class="ti-plus pr-2"></span><?php echo app('translator')->get('student.import_attendance'); ?></a>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'student-search', 'method' => 'POST', 'id' => 'search_studentA'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'],
                        'required'=>['USEC']])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',['mt'=>'mt-30','hide'=>['USUB'],
                        'required'=>['USEC']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="col-lg-3 col-md-3 mt-30">
                            <div class="primary_input">
                                <label for="startDate"><?php echo app('translator')->get('hr.attendance_date'); ?><span class="text-danger">
                                        *</span></label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input
                                                    class="primary_input_field  primary_input_field date form-control"
                                                    id="startDate" type="text" name="attendance_date" autocomplete="off"
                                                    value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                                            </div>
                                        </div>
                                        <button class="btn-date" data-id="#attendance_date" type="button">
                                            <label class="m-0 p-0" for="startDate">
                                                <i class="ti-calendar" id="attendance_date"></i>
                                            </label>
                                        </button>
                                    </div>
                                </div>
                                <span class="text-danger"><?php echo e($errors->first('attendance_date')); ?></span>
                            </div>
                        </div>
                        <?php else: ?>

                        <?php echo $__env->make('backEnd.common.search_criteria', [
                        'div'=>'col-lg-4',
                        'visiable'=>['class', 'section'],
                        'required'=>['class', 'section'],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="col-lg-4 col-md-4 mt-30-md">
                            <div class="primary_input">
                                <label for="startDate"><?php echo app('translator')->get('hr.attendance_date'); ?><span class="text-danger">
                                        *</span></label>
                                <div class="primary_datepicker_input">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="">
                                                <input
                                                    class="primary_input_field  primary_input_field date form-control<?php echo e($errors->has('attendance_date') ? ' is-invalid' : ''); ?>"
                                                    id="attendance_date" type="text" name="attendance_date"
                                                    autocomplete="off" value="<?php echo e(isset($date)? $date: date('m/d/Y')); ?>">
                                            </div>
                                        </div>
                                        <button class="btn-date" data-id="#attendance_date" type="button">
                                            <label class="m-0 p-0" for="attendance_date">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </label>
                                        </button>
                                    </div>
                                </div>
                                <span class="text-danger"><?php echo e($errors->first('attendance_date')); ?></span>
                            </div>
                        </div>

                        <?php endif; ?>
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <?php if(isset($students)): ?>
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-12 no-gutters">
                            <div class="main-title">
                                <?php if(isset($search_info)): ?>
                                <h3 class="mb-15"><?php echo app('translator')->get('student.student_attendance'); ?> | <small>
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <?php echo app('translator')->get('university::un.faculty_department'); ?>
                                        :
                                        <?php echo e(isset($unFaculty) ? $unFaculty->name .'('. (isset($unDepartment) ? $unDepartment->name:'').')':''); ?>,
                                        <?php echo app('translator')->get('university::un.semester(label)'); ?>
                                        :
                                        <?php echo e(isset($unSemester) ? $unSemester->name .'('. (isset($unSemesterLabel) ? $unSemesterLabel->name : '') .')' :''); ?>,
                                        <?php echo app('translator')->get('common.date'); ?>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('common.class'); ?>
                                        : <?php echo e($search_info['class_name']); ?>, <?php echo app('translator')->get('common.section'); ?>
                                        : <?php echo e($search_info['section_name']); ?>, <?php echo app('translator')->get('common.date'); ?>
                                        <?php endif; ?>
                                        : <?php echo e(dateConvert($search_info['date'])); ?></small></h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <?php if($attendance_type != "" && $attendance_type == "H"): ?>
                            <div class="alert alert-warning"><?php echo app('translator')->get('student.attendance_already_submitted_as_holiday'); ?></div>
                            <?php elseif($attendance_type != "" && $attendance_type != "H"): ?>
                            <div class="alert alert-success"><?php echo app('translator')->get('student.attendance_already_submitted'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-lg-6  col-md-6 no-gutters text-md-left mark-holiday ">
                            <?php if($attendance_type != "H"): ?>
                            <form action="<?php echo e(route('student-attendance-holiday')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="purpose" value="mark">
                                <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
    
                                <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
    
                                <input type="hidden" name="un_session_id" value="<?php echo e(isset($unSession) ? $unSession->id:''); ?>">
                                <input type="hidden" name="un_faculty_id" value="<?php echo e(isset($unFaculty) ? $unFaculty->id:''); ?>">
                                <input type="hidden" name="un_department_id"
                                    value="<?php echo e(isset($unDepartment) ? $unDepartment->id:''); ?>">
                                <input type="hidden" name="un_academic_id"
                                    value="<?php echo e(isset($unAcademic) ? $unAcademic->id:''); ?>">
                                <input type="hidden" name="un_semester_id"
                                    value="<?php echo e(isset($unSemester) ? $unSemester->id:''); ?>">
                                <input type="hidden" name="un_section_id" value="<?php echo e(isset($unSection) ? $unSection->id:''); ?>">
                                <?php endif; ?>
                                <button type="submit" class="primary-btn fix-gr-bg">
                                    <?php echo app('translator')->get('student.mark_holiday'); ?>
                                </button>
                            </form>
                            <?php else: ?>
                            <form action="<?php echo e(route('student-attendance-holiday')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="purpose" value="unmark">
                                <input type="hidden" name="class_id" value="<?php echo e($class_id); ?>">
                                <input type="hidden" name="section_id" value="<?php echo e($section_id); ?>">
                                <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                                <?php if(moduleStatusCheck('University')): ?>
    
                                <input type="hidden" name="un_session_id" value="<?php echo e(isset($unSession) ? $unSession->id:''); ?>">
                                <input type="hidden" name="un_faculty_id" value="<?php echo e(isset($unFaculty) ? $unFaculty->id:''); ?>">
                                <input type="hidden" name="un_department_id"
                                    value="<?php echo e(isset($unDepartment) ? $unDepartment->id:''); ?>">
                                <input type="hidden" name="un_academic_id"
                                    value="<?php echo e(isset($unAcademic) ? $unAcademic->id:''); ?>">
                                <input type="hidden" name="un_semester_id"
                                    value="<?php echo e(isset($unSemester) ? $unSemester->id:''); ?>">
                                <input type="hidden" name="un_semester_label_id"
                                    value="<?php echo e(isset($unSemesterLabel) ? $unSemesterLabel->id:''); ?>">
                                <input type="hidden" name="un_section_id" value="<?php echo e(isset($unSection) ? $unSection->id:''); ?>">
                                <?php endif; ?>
                                <button type="submit" class="primary-btn fix-gr-bg">
                                    <?php echo app('translator')->get('student.unmark_holiday'); ?>
                                </button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route'=>'student-attendance-store', 'method' => 'POST'])); ?>

                    <input type="hidden" name="date" class="attendance_date" value="<?php echo e(isset($date)? $date: ''); ?>">
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
                                <div class="table-responsive">
                                    <table class="table school-table-style" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                                <th><?php echo app('translator')->get('student.roll_number'); ?></th>
                                                <th><?php echo app('translator')->get('student.attendance'); ?></th>
                                                <th><?php echo app('translator')->get('common.note'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
                                            <tr>
                                                <td><?php echo e($student->studentDetail->admission_no); ?>

                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>]"
                                                        value="<?php echo e($student->id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][student]"
                                                        value="<?php echo e($student->student_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][class]"
                                                        value="<?php echo e($student->class_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][section]"
                                                        value="<?php echo e($student->section_id); ?>">
                                                    <?php if(moduleStatusCheck('University')): ?>
    
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_session_id]"
                                                        value="<?php echo e($student->un_session_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_faculty_id]"
                                                        value="<?php echo e($student->un_faculty_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_department_id]"
                                                        value="<?php echo e($student->un_department_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_academic_id]"
                                                        value="<?php echo e($student->un_academic_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_semester_id]"
                                                        value="<?php echo e($student->un_semester_id); ?>">
                                                    <input type="hidden"
                                                        name="attendance[<?php echo e($student->id); ?>][un_semester_label_id]"
                                                        value="<?php echo e($student->un_semester_label_id); ?>">
                                                    <input type="hidden" name="attendance[<?php echo e($student->id); ?>][un_section_id]"
                                                        value="<?php echo e($student->un_section_id); ?>">
                                                    <?php endif; ?>
    
                                                </td>
                                                <td><?php echo e($student->studentDetail->first_name.' '.$student->studentDetail->last_name); ?>

                                                </td>
                                                <td><?php echo e($student->roll_no); ?></td>
                                                <td>
                                                    <div class="d-flex radio-btn-flex">
                                                        <div class="mr-20">
                                                            <input type="radio"
                                                                name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                                id="attendanceP<?php echo e($student->id); ?>" value="P"
                                                                class="common-radio attendanceP attendance_type"
                                                                <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "P" ? 'checked' :'') : ($attendance_type != "" ? '' :'checked')); ?>>
                                                            <label
                                                                for="attendanceP<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.present'); ?></label>
                                                        </div>
                                                        <div class="mr-20">
                                                            <input type="radio"
                                                                name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                                id="attendanceL<?php echo e($student->id); ?>" value="L"
                                                                class="common-radio attendance_type"
                                                                <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "L" ? 'checked' :''):''); ?>>
                                                            <label
                                                                for="attendanceL<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.late'); ?></label>
                                                        </div>
                                                        <div class="mr-20">
                                                            <input type="radio"
                                                                name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                                id="attendanceA<?php echo e($student->id); ?>" value="A"
                                                                class="common-radio attendance_type"
                                                                <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "A" ? 'checked' :''):''); ?>>
                                                            <label
                                                                for="attendanceA<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.absent'); ?></label>
                                                        </div>
                                                        <div>
                                                            <input type="radio"
                                                                name="attendance[<?php echo e($student->id); ?>][attendance_type]"
                                                                id="attendanceH<?php echo e($student->id); ?>" value="F"
                                                                class="common-radio attendance_type"
                                                                <?php echo e($student->studentDetail->DateWiseAttendances !=null ? ($student->studentDetail->DateWiseAttendances->attendance_type == "F" ? 'checked' :'') : ''); ?>>
                                                            <label
                                                                for="attendanceH<?php echo e($student->id); ?>"><?php echo app('translator')->get('student.half_day'); ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="primary_input">
                                                        <input class="primary_input_field form-control note_<?php echo e($student->id); ?>"
                                                            cols="0" rows="2" name="attendance[<?php echo e($student->id); ?>][note]"
                                                            id="" value="<?php echo e($student->studentDetail->DateWiseAttendances !=null ? $student->studentDetail->DateWiseAttendances->notes :''); ?>">
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('student.add_note_here'); ?></label>
    
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <button type="submit" class="primary-btn mr-40 fix-gr-bg nowrap submit">
                                                        <?php echo app('translator')->get('student.save_attendance'); ?>
                                                    </button>
                                                </td>
                                                <td></td>
                                            </tr>
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
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/student_attendance.blade.php ENDPATH**/ ?>