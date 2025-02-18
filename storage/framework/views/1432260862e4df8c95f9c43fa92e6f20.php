
<?php $__env->startPush('css'); ?>
    <style>
        .school-table-up-style tr td {
            padding: 8px 6px 8px 10px !important;
            font-size: 12px !important;
        }

        .school-table-style {
            padding: 0px !important;
        }

        .badge {
            background: var(--primary-color);
            color: #fff;
            padding: 5px 10px;
            border-radius: 30px;
            display: inline-block;
            font-size: 8px;
        }

        table.dataTable thead th {
            padding-left: 25px !important;
        }

        table.dataTable thead th::after {
            left: 10px !important;
            top: 10px !important;
        }

        table.dataTable tbody td {
            padding-left: 13px !important;
        }

        .school-table-style tr th {
            padding: 10px 18px 10px 10px !important;
        }

        .school-table-style tr td {
            padding: 20px 10px 20px 10px !important;
        }

        .input-right-icon button.primary-btn-small-input {
            top: 8px !important;
            right: 11px !important;
        }

        .table thead th {
            font-size: 12px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.student_details'); ?>
<?php $__env->stopSection(); ?>

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
                <h1><?php echo app('translator')->get('student.student_details'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="<?php echo e(route('student_list')); ?>"><?php echo app('translator')->get('student.student_list'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_details'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">

                    <?php if(moduleStatusCheck('University')): ?>
                        <?php if ($__env->exists('university::promote.inc.student_profile', [
                            'student_detail' => $student_detail->defaultClass,
                            'student' => $student_detail,
                        ])) echo $__env->make('university::promote.inc.student_profile', [
                            'student_detail' => $student_detail->defaultClass,
                            'student' => $student_detail,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php if ($__env->exists('backEnd.studentInformation.inc.student_profile')) echo $__env->make('backEnd.studentInformation.inc.student_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                </div>

                <?php
                    $type = isset($type) ? $type : null;
                ?>

                <!-- Start Student Details -->
                <div class="col-lg-9 student-details up_admin_visitor">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav mb-10" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($type == '' && Session::get('studentDocuments') == '' ? 'active' : ''); ?> "
                                    href="#studentProfile" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.profile'); ?></a>
                            </li>
    
                            <?php if(generalSetting()->fees_status == 0): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#studentFees" role="tab"
                                        data-toggle="tab"><?php echo app('translator')->get('fees.fees'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isMenuAllowToShow('leave')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#leaves" role="tab" data-toggle="tab"><?php echo app('translator')->get('leave.leave'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isMenuAllowToShow('examination')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#studentExam" role="tab"
                                        data-toggle="tab"><?php echo app('translator')->get('exam.exam'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(moduleStatusCheck('University')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#studentExamTranscript" role="tab"
                                        data-toggle="tab"><?php echo app('translator')->get('university::un.transcript'); ?></a>
                                </li>
                            <?php endif; ?>
    
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('studentDocuments') == 'active' ? 'active' : ''); ?>"
                                    href="#studentDocuments" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.document'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('studentRecord') == 'active' ? 'active' : ''); ?> "
                                    href="#studentRecord" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.record'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e($type == 'studentTimeline' ? 'active' : ''); ?> " href="#studentTimeline"
                                    role="tab" data-toggle="tab"><?php echo app('translator')->get('student.timeline'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('studentAttendance') == 'active' ? 'active' : ''); ?> "
                                    href="#studentAttendance" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.student_attendance'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('subjectAttendance') == 'active' ? 'active' : ''); ?> "
                                    href="#subjectAttendance" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.subject_attendance'); ?></a>
                            </li>
                            <?php if(moduleStatusCheck('BehaviourRecords')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Session::get('studentBehaviourRecord') == 'active' ? 'active' : ''); ?> "
                                        href="#studentBehaviourRecord" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.behaviour_record'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(generalSetting()->result_type == 'mark'): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e($type == 'mark' ? 'active' : ''); ?> " href="#mark" role="tab"
                                        data-toggle="tab"><?php echo app('translator')->get('exam.marksheet'); ?></a>
                                </li>
                            <?php endif; ?>
    
                            <?php if(moduleStatusCheck('University')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e($type == 'assign_subject' ? 'active' : ''); ?> " href="#studentSubject"
                                        role="tab" data-toggle="tab"><?php echo app('translator')->get('university::un.subject'); ?></a>
                                </li>
                            <?php endif; ?>
    
                            <li class="nav-item edit-button">
                                <?php if(userPermission('student_edit')): ?>
                                    <a href="<?php echo e(route('student_edit', [@$student_detail->id])); ?>"
                                        class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('common.edit'); ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
    
    
                        <!-- Tab panes -->
                        <div class="tab-content">
    
                            <!-- Start Profile Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._profile_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Profile Tab -->
    
                            <!-- Start Fees Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._fees_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Fees Tab -->
    
                            <!-- Start leave Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._leave_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End leave Tab -->
    
                            <!-- Start Exam Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._exam_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Exam Tab -->
    
                            <?php if(moduleStatusCheck('University')): ?>
                                <div role="tabpanel" class="tab-pane fade" id="studentExamTranscript">
                                    <?php if ($__env->exists('university::exam.partials._examTabView')) echo $__env->make('university::exam.partials._examTabView', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
    
                            <!-- Start Documents Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._document_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Documents Tab -->
    
                            <!-- Start reocrd Tab -->
                            <div role="tabpanel"
                                class="tab-pane fade <?php echo e(Session::get('studentRecord') == 'active' ? 'show active' : ''); ?>"
                                id="studentRecord">
                                <div>
                                    <div class="text-right mb-20">
                                        <?php if(userPermission(1201)): ?>
                                            <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button"
                                                data-toggle="modal" data-target="#assignClass"> <span
                                                    class="ti-plus pr-2"></span> <?php echo app('translator')->get('common.add'); ?></button>
                                        <?php endif; ?>
                                    </div>
                                    <table id="" class="table simple-table table-responsive school-table"
                                        cellspacing="0">
                                        <thead class="d-block">
                                            <tr class="d-flex">
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th class="col-2"><?php echo app('translator')->get('university::un.session'); ?></th>
                                                    <th class="col-3"><?php echo app('translator')->get('university::un.faculty_department'); ?></th>
                                                    <th class="col-3"><?php echo app('translator')->get('university::un.semester(label)'); ?></th>
                                                <?php else: ?>
                                                    <th class="col-3"><?php echo app('translator')->get('common.class'); ?></th>
                                                    <th class="col-3"><?php echo app('translator')->get('common.section'); ?></th>
                                                <?php endif; ?>
                                                <?php if($setting->multiple_roll == 1): ?>
                                                    <th class="col-2"><?php echo app('translator')->get('student.id_number'); ?></th>
                                                <?php endif; ?>
                                                <th class="col-<?php echo e($setting->multiple_roll == 1 ? 2 : 4); ?>" style="text-align: center"><?php echo app('translator')->get('student.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="d-block">
                                            <?php $__currentLoopData = $records->where('active_status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="d-flex">
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <td class="col-2"><?php echo e($record->unSession->name); ?></td>
                                                        <td class="col-3">
                                                            <?php echo e($record->unFaculty->name . '(' . $record->unDepartment->name . ')'); ?>

                                                            <?php if($record->is_default): ?>
                                                                <span
                                                                    class="badge fix-gr-bg"><?php echo e(__('common.default')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="col-3">
                                                            <?php echo e($record->unSemester->name . '(' . $record->unSemesterLabel->name . ')'); ?>

                                                        </td>
                                                    <?php else: ?>
                                                        <td class="col-3">
                                                            <?php echo e($record->class->class_name); ?>

                                                            <?php if($record->is_default): ?>
                                                                <span
                                                                    class="badge fix-gr-bg"><?php echo e(__('common.default')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="col-3">
                                                            <?php echo e($record->section->section_name); ?>

                                                        </td>
                                                    <?php endif; ?>
    
                                                    <?php if($setting->multiple_roll == 1): ?>
                                                        <td class="col-2"><?php echo e($record->roll_no); ?></td>
                                                    <?php endif; ?>
                                                    <td class="col-<?php echo e($setting->multiple_roll == 1 ? 2 : 4); ?>" style="text-align: center">
                                                        <?php if($record->is_promote == 0): ?>
                                                            <a class="primary-btn icon-only fix-gr-bg modalLink"
                                                                data-modal-size="small-modal"
                                                                title="<?php if(moduleStatusCheck('University')): ?> <?php echo app('translator')->get('university::un.assign_faculty_department'); ?>
                                                                    <?php else: ?> 
                                                                        <?php echo app('translator')->get('student.assign_class'); ?> <?php endif; ?>"
                                                                href="<?php echo e(route('student_assign_edit', [@$record->student_id, @$record->id])); ?>"><span
                                                                    class="ti-pencil"></span></a>
                                                            <a href="#" class="primary-btn icon-only fix-gr-bg"
                                                                data-toggle="modal"
                                                                data-target="#deleteRecord_<?php echo e($record->id); ?>">
                                                                <span class="ti-trash"></span>
                                                            </a>
                                                        <?php endif; ?>
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
                                                            <form action="<?php echo e(route('student.record.delete')); ?>"
                                                                method="POST">
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
                                                                    <input type="hidden" name="record_id"
                                                                        value="<?php echo e($record->id); ?>">
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
                            <!-- End reocrd Tab -->
    
                            <!-- Start Timeline Tab -->
                            <div role="tabpanel" class="tab-pane fade" id="studentTimeline">
                                <div>
                                    <div class="text-right mb-20">
                                        <button type="button" data-toggle="modal" data-target="#add_timeline_madal"
                                            class="primary-btn tr-bg text-uppercase bord-rad">
                                            <?php echo app('translator')->get('common.add'); ?>
                                            <span class="pl ti-plus"></span>
                                        </button>
                                    </div>
                                    <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="student-activities">
                                            <div class="single-activity">
                                                <h4 class="title text-uppercase">
                                                    <?php echo e($timeline->date != '' ? dateConvert($timeline->date) : ''); ?></h4>
                                                <div class="sub-activity-box d-flex">
                                                    <h6 class="time text-uppercase">10.30 pm</h6>
                                                    <div class="sub-activity">
                                                        <h5 class="subtitle text-uppercase"> <?php echo e($timeline->title); ?></h5>
                                                        <p>
                                                            <?php echo e($timeline->description); ?>

                                                        </p>
                                                    </div>
    
                                                    <div class="close-activity">
    
                                                        <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                            data-target="#deleteTimelineModal<?php echo e($timeline->id); ?>"
                                                            href="#">
                                                            <span class="ti-trash text-white"></span>
                                                        </a>
    
                                                        <?php if(file_exists($timeline->file)): ?>
                                                            <a href="<?php echo e(url($timeline->file)); ?>"
                                                                class="primary-btn tr-bg text-uppercase bord-rad" download>
                                                                <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade admin-query" id="deleteTimelineModal<?php echo e($timeline->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                                <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                            </div>
    
                                                            <div class="mt-40 d-flex justify-content-between">
                                                                <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                                                                </button>
                                                                <a class="primary-btn fix-gr-bg"
                                                                    href="<?php echo e(route('delete_timeline', [$timeline->id])); ?>">
                                                                    <?php echo app('translator')->get('common.delete'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- End Timeline Tab -->
    
                            <!-- Start Attendance Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._student_attendance_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Attendance Tab -->
    
                            <!-- Start Attendance Tab -->
                            <?php echo $__env->make('backEnd.studentInformation.inc._subject_attendance_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <!-- End Attendance Tab -->
    
                            <!-- Start Behaviour Records Tab -->
                            <?php if(moduleStatusCheck('BehaviourRecords')): ?>
                                <?php echo $__env->make('backEnd.studentInformation.inc._student_behaviour_record_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <!-- End Behaviour Records Tab -->
                            
                            <?php if(generalSetting()->result_type == 'mark'): ?>
                                <div role="tabpanel"
                                    class="tab-pane fade <?php echo e(Session::get('mark') == 'active' ? 'show active' : ''); ?>"
                                    id="mark">
                                    <div class="white-box">
                                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if ($__env->exists('backend.studentInformation.inc.finalMarkSheet')) echo $__env->make('backend.studentInformation.inc.finalMarkSheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(moduleStatusCheck('University')): ?>
                                <div role="tabpanel" class="tab-pane fade <?php echo e($type == 'assign_subject' ? ' active show' : ''); ?>" id="studentSubject">
                                    <?php echo $__env->make('backEnd.studentInformation.inc.subject_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>
                            
                        </div>
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
                                            placeholder="<?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?><?php echo e(is_required('roll_number') == true ? ' *' : ''); ?>"
                                            id="roll_number" name="roll_number" value="<?php echo e(old('roll_number')); ?>">
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

    <!-- timeline form modal start-->
    <div class="modal fade admin-query" id="add_timeline_madal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('student.add_timeline'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_timeline_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload'])); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="student_id" value="<?php echo e($student_detail->id); ?>">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <label><?php echo app('translator')->get('student.title'); ?> <span>*</span> </label>
                                            <input class="primary_input_field form-control{" type="text"
                                                name="title" value="" id="title" maxlength="200">
                                            <span class="focus-border"></span>
                                            <span class=" text-danger" role="alert" id="amount_error">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="input-right-icon">
                                    <div class="input-effect">
                                        <label><?php echo app('translator')->get('common.date'); ?></label>
                                        <div class="position-relative">
                                            <input class="primary_input_field date form-control" readonly id="startDate"
                                                type="text" name="date">
                                            <span class="focus-border"></span>
                                            <label class="primary_input-icon mr-2" for="startDate">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="input-effect">
                                    <label><?php echo app('translator')->get('common.description'); ?><span></span> </label>
                                    <textarea class="primary_input_field form-control" cols="0" rows="3" name="description"
                                        id="Description"></textarea>
                                    <span class="focus-border textarea"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-40">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="input-effect">
                                            <input class="primary_input_field" type="text"
                                                id="placeholderFileFourName" placeholder="Document" disabled>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="document_file_4"><?php echo app('translator')->get('common.browse'); ?></label>
                                            <input type="file" class="d-none" name="document_file_4"
                                                id="document_file_4">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <input type="checkbox" id="currentAddressCheck" class="common-checkbox"
                                    name="visible_to_student" value="1">
                                <label for="currentAddressCheck"><?php echo app('translator')->get('student.visible_to_this_person'); ?></label>
                            </div>

                            <div class="col-lg-12 text-center mt-40">
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg"
                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                    <button class="primary-btn fix-gr-bg submit"
                                        type="submit"><?php echo app('translator')->get('common.save'); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- timeline form modal end-->


    <?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        function deleteDoc(id, doc) {
            var modal = $('#delete-doc');
            modal.find('input[name=student_id]').val(id)
            modal.find('input[name=doc_id]').val(doc)
            modal.modal('show');
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/student_view.blade.php ENDPATH**/ ?>