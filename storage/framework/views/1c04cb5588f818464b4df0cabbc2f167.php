<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.my_profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        table#table_id thead tr th:not(:first-child) {
            padding-left: 30px !important;
        }

        table#table_id tbody tr td:not(:first-child),
        table#table_id tbody tr td:nth-child(2) {
            padding-left: 30px !important;
        }

        .leave_table {
            overflow: hidden;
        }

        .table tbody tr:last-child td,
        .table tbody tr:last-child th {
            border-bottom: none;
        }

        .QA_section .QA_table .table.school-table-style-parent-fees thead th,
        .QA_section .QA_table .table.school-table-style-parent-fees thead td {
            padding: 16px 30px !important;
        }

        .fc th {
            padding: 0 !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php
        @$setting = generalSetting();
        if (!empty(@$setting->currency_symbol)) {
            @$currency = @$setting->currency_symbol;
        } else {
            @$currency = '$';
        }
    ?>
    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row">
                <div class="col-lg-12">
                    <!-- Start Student Meta Information -->
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('student.welcome_to'); ?> <strong> <?php echo e(@$student_detail->full_name); ?></strong> </h3>
                    </div>
                </div>
            </div>
            <div class="row row-gap-30">
                <?php if(userPermission('dashboard-subject')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_subject')); ?>" class="d-block">
                            <div class="white-box single-summery cyan">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('common.subject'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_subject'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($totalSubjects)): ?>
                                            <?php echo e(count(@$totalSubjects)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-notice') && userPermission('student_noticeboard')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_noticeboard')); ?>" class="d-block">
                            <div class="white-box single-summery violet">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.notice'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_notice'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($totalNotices)): ?>
                                            <?php echo e(count(@$totalNotices)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-exam')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_exam_schedule')); ?>" class="d-block">
                            <div class="white-box single-summery violet">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.exam'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_exam'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($exams)): ?>
                                            <?php echo e(count(@$exams)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-online-exam')): ?>
                    <div class="col-lg-3 col-md-6">
                        <?php if(moduleStatusCheck('OnlineExam')): ?>
                            <a href="<?php echo e(route('om_student_online_exam')); ?>" class="d-block">
                            <?php else: ?>
                                <a href="<?php echo e(route('student_online_exam')); ?>" class="d-block">
                        <?php endif; ?>
                        <div class="white-box single-summery blue">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo app('translator')->get('student.online_exam'); ?></h3>
                                    <p class="mb-0"><?php echo app('translator')->get('student.total_online_exam'); ?></p>
                                </div>
                                <h1 class="gradient-color2">
                                    <?php if(isset($online_exams)): ?>
                                        <?php echo e(count(@$online_exams)); ?>

                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-teachers')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_teacher')); ?>" class="d-block">
                            <div class="white-box single-summery fuchsia">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.teachers'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_teachers'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($teachers)): ?>
                                            <?php echo e(count(@$teachers)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-issued-books')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_book_issue')); ?>" class="d-block">
                            <div class="white-box single-summery cyan">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.issued_book'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_issued_book'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($issueBooks)): ?>
                                            <?php echo e(count(@$issueBooks)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-pending-homeworks')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_homework')); ?>" class="d-block">
                            <div class="white-box single-summery violet">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.pending_home_work'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_pending_home_work'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($homeworkLists)): ?>
                                            <?php echo e(count(@$homeworkLists)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('dashboard-attendance-in-current-month')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student_my_attendance')); ?>" class="d-block">
                            <div class="white-box single-summery blue">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.attendance_in_current_month'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_attendance_in_current_month'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($attendances)): ?>
                                            <?php echo e(count(@$attendances)); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>

                <?php
                    $feesDue = 0;
                    $totalPoint = 0;
                    $balance_fees = 0;
                    foreach ($student_detail->studentRecords as $record) {
                        foreach ($record->feesInvoice as $key => $studentInvoice) {
                            $amount = $studentInvoice->Tamount;
                            $weaver = $studentInvoice->Tweaver;
                            $fine = $studentInvoice->Tfine;
                            $paid_amount = $studentInvoice->Tpaidamount;
                            $sub_total = $studentInvoice->Tsubtotal;
                            $feesDue += $amount + $fine - ($paid_amount + $weaver);
                        }
                        foreach ($record->directFeesInstallments as $feesInstallment) {
                            $balance_fees += discount_fees($feesInstallment->amount, $feesInstallment->discount_amount) - $feesInstallment->paid_amount;
                        }
                        foreach ($record->incidents as $incident) {
                            $totalPoint += $incident->point;
                        }
                    }
                ?>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo e(route(generalSetting()->fees_status == 0 ? 'student_fees' : 'fees.student-fees-list')); ?>" class="d-block">
                        <div class="white-box single-summery fuchsia">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo app('translator')->get('student.fees'); ?></h3>
                                    <p class="mb-0"><?php echo app('translator')->get('student.total_due_fees'); ?></p>
                                </div>
                                <h1 class="gradient-color2">
                                    <?php if(!moduleStatusCheck('University')): ?>
                                        <?php if(generalSetting()->fees_status == 0): ?>
                                            <?php if(directFees()): ?>
                                                <?php echo e($currency); ?><?php echo e($balance_fees); ?>

                                            <?php else: ?>
                                                <?php echo e($currency); ?><?php echo e($old_fees); ?>

                                            <?php endif; ?>
                                        <?php elseif(isset($feesDue)): ?>
                                            <?php echo e($currency); ?><?php echo e($feesDue); ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(generalSetting()->fees_status == 1): ?>
                                            <?php echo e($currency); ?><?php echo e($feesDue); ?>


                                        <?php else: ?> 
                                            <?php if(isset($due_amount)): ?>
                                                <?php echo e($currency); ?><?php echo e($due_amount); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
                <?php if(moduleStatusCheck('BehaviourRecords')): ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('student-profile')); ?>" class="d-block">
                            <div class="white-box single-summery cyan">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3><?php echo app('translator')->get('student.behaviour_point'); ?></h3>
                                        <p class="mb-0"><?php echo app('translator')->get('student.total_behaviour_point'); ?></p>
                                    </div>
                                    <h1 class="gradient-color2">
                                        <?php if(isset($totalPoint)): ?>
                                            <?php echo e($totalPoint); ?>

                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            </div>
            <div class="row mt-40">
                <?php if(userPermission('student_class_routine')): ?>
                    <?php echo $__env->make('backEnd.studentPanel._class_routine_content', [
                        'sm_weekends' => $sm_weekends,
                        'records' => $records,
                        'routineDashboard' => $routineDashboard,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(userPermission('student_my_attendance')): ?>
                    <?php echo $__env->make('backEnd.studentPanel.inc._attendance_statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('backEnd.studentPanel.inc._dashboard_subject_attendance_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <div class="col-md-12 mt-40">
                    <div class="white-box">
                        <?php if(userPermission('fees.student-fees-list')): ?>
                            <?php echo $__env->make('backEnd.studentPanel.inc._fees_info', ['currency' => $currency], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-12 mt-40">
                        <?php if(userPermission('student_exam_schedule')): ?>
                    <div class="container-fluid p-0">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_routine'); ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-12 student-details up_admin_visitor">
                                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                                        <?php
                                            $exams = [];
                                        ?>
                                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($record->Exam): ?>
                                                <?php $__currentLoopData = $record->Exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $s = $exam->exam_type_id . $exam->class_id . $exam->section_id;
                                                    ?>
                                                    <?php if(!in_array($s, $exams)): ?>
                                                        <?php
                                                            array_push($exams, $s);
                                                        ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>"
                                                                href="#tabExam<?php echo e($key); ?>" role="tab"
                                                                data-toggle="tab"><?php echo e($exam->examType->title); ?>

                                                                - <?php echo e(moduleStatusCheck('University') ? $record->unSemesterLabel->name : $record->class->class_name); ?>

                                                                (<?php echo e($record->section->section_name); ?>)
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="tab-content">
                                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($record->Exam): ?>
                                                <?php $__currentLoopData = $record->Exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $exam_routines = App\SmExamSchedule::getAllExams($exam->class_id, $exam->section_id, $exam->exam_type_id);
                                                    ?>
                                                    <div role="tabpanel"
                                                        class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                                                        id="tabExam<?php echo e($key); ?>">
                                                        <div class="container-fluid p-0">
                                                            <div class="col-lg-12 p-0">
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
                                                                        <table id="default_table" class="table"
                                                                            cellspacing="0"
                                                                            width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width:10%;">
                                                                                        <?php echo app('translator')->get('exam.date_&_day'); ?>
                                                                                    </th>
                                                                                    <th><?php echo app('translator')->get('exam.subject'); ?></th>
                                                                                    <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                                                                    <th><?php echo app('translator')->get('exam.teacher'); ?></th>
                                                                                    <th><?php echo app('translator')->get('exam.time'); ?></th>
                                                                                    <th><?php echo app('translator')->get('exam.duration'); ?></th>
                                                                                    <th><?php echo app('translator')->get('exam.room'); ?></th>
    
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $exam_routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $exam_routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr
                                                                                        class="<?php echo e(Carbon::parse($exam_routine->date)->format('Y-m-d') == Carbon::now()->format('Y-m-d') ? 'main-border-color' : ''); ?>">
                                                                                        <td><?php echo e(dateConvert($exam_routine->date)); ?>

                                                                                            <br><?php echo e(Carbon::createFromFormat('Y-m-d', $exam_routine->date)->format('l')); ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <strong>
                                                                                                <?php echo e($exam_routine->subject ? $exam_routine->subject->subject_name : ''); ?>

                                                                                            </strong>
                                                                                            <?php echo e($exam_routine->subject ? '(' . $exam_routine->subject->subject_code . ')' : ''); ?>

                                                                                        </td>
                                                                                        <td><?php echo e($exam_routine->class ? $exam_routine->class->class_name : ''); ?>

                                                                                            <?php echo e($exam_routine->section ? '(' . $exam_routine->section->section_name . ')' : ''); ?>

                                                                                        </td>
                                                                                        <td><?php echo e($exam_routine->teacher ? $exam_routine->teacher->full_name : ''); ?>

                                                                                        </td>
    
                                                                                        <td> <?php echo e(date('h:i A', strtotime(@$exam_routine->start_time))); ?>

                                                                                            -
                                                                                            <?php echo e(date('h:i A', strtotime(@$exam_routine->end_time))); ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                                $duration = strtotime($exam_routine->end_time) - strtotime($exam_routine->start_time);
                                                                                            ?>
    
                                                                                            <?php echo e(timeCalculation($duration)); ?>

                                                                                        </td>
    
                                                                                        <td><?php echo e($exam_routine->classRoom ? $exam_routine->classRoom->room_no : ''); ?>

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
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <?php if(userPermission('student_teacher')): ?>
                    <div class="container-fluid mt-40">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $__env->make('backEnd.studentPanel.inc._teacher_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(userPermission('leave')): ?>
                    <div class="container-fluid mt-40">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $__env->make('backEnd.studentPanel.inc._leave_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="container-fluid mt-40">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $__env->make('backEnd.studentPanel.inc._complaint_list_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white-box mt-40">
                <?php if(userPermission('dashboard-calendar')): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $__env->make('backEnd.communicate.commonAcademicCalendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </section>

    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span
                            class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="There are no image" id="image" height="150" width="auto">
                    <div id="modalBody"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    $count_event = 0;
    @$calendar_events = [];
    foreach ($holidays as $k => $holiday) {
        @$calendar_events[$k]['title'] = $holiday->holiday_title;
    
        @$calendar_events[$k]['start'] = $holiday->from_date;
    
        @$calendar_events[$k]['end'] = Carbon::parse($holiday->to_date)
            ->addDays(1)
            ->format('Y-m-d');
    
        @$calendar_events[$k]['description'] = $holiday->details;
    
        @$calendar_events[$k]['url'] = $holiday->upload_image_file;
    
        $count_event = $k;
        $count_event++;
    }
    
    foreach ($events as $k => $event) {
        @$calendar_events[$count_event]['title'] = $event->event_title;
    
        @$calendar_events[$count_event]['start'] = $event->from_date;
    
        @$calendar_events[$count_event]['end'] = Carbon::parse($event->to_date)
            ->addDays(1)
            ->format('Y-m-d');
        @$calendar_events[$count_event]['description'] = $event->event_des;
        @$calendar_events[$count_event]['url'] = $event->uplad_image_file;
        $count_event++;
    }
    ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.communicate.academic_calendar_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/studentProfile.blade.php ENDPATH**/ ?>