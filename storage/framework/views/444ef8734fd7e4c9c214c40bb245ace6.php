<?php $__env->startPush('css'); ?>
<style>
    .school-table-style tr th{
        min-width: 150px;
    }

    .student-exam-data-table tr td:first-child{
        padding-left: 20px!important;
    }
</style>
<?php $__env->stopPush(); ?>

<div role="tabpanel" class="tab-pane fade" id="studentExam">
    <?php if(moduleStatusCheck('University')): ?>
        
        <?php if ($__env->exists('university::exam.admin_student_exam_tab')) echo $__env->make('university::exam.admin_student_exam_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php
            $exam_count = count($exam_terms);
        ?>
        <?php if($exam_count > 1): ?>
            <div class="no-search no-paginate no-table-info mb-2">
                <div class="table-responsive">
                    <table class="table school-table-style shadow-none pb-0" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    <?php echo app('translator')->get('student.subject'); ?>
                                </th>
                                <th>
                                    <?php echo app('translator')->get('student.full_marks'); ?>
                                </th>
                                <th>
                                    <?php echo app('translator')->get('student.passing_marks'); ?>
                                </th>
                                <th>
                                    <?php echo app('translator')->get('student.obtained_marks'); ?>
                                </th>
                                <th>
                                    <?php echo app('translator')->get('student.results'); ?>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <div class="no-search no-paginate no-table-info mb-2">
            <?php $__currentLoopData = $student_detail->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $exam_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $get_results = App\SmStudent::getExamResult(@$exam->id, @$record);                       
                    ?>
                    <?php if($get_results): ?>
                        <div class=<?php if($key != 0): ?> mt-40 <?php endif; ?>>
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo e(@$exam->title); ?></h3>
                            </div>
                            <?php
                                $grand_total = 0;
                                $grand_total_marks = 0;
                                $result = 0;
                                $temp_grade = [];
                                $total_gpa_point = 0;
                                $total_subject = count($get_results);
                                $optional_subject = 0;
                                $optional_gpa = 0;
                            ?>


                            <div class="table-responsive">
                                <table id="table_id" class="table student-exam-data-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('student.date'); ?></th>
                                            <th><?php echo app('translator')->get('exam.subject_full_marks'); ?></th>
                                            <th><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                <th><?php echo app('translator')->get('exam.pass_fail'); ?></th>
                                            <?php else: ?>
                                                <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $get_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                if (!is_null($student_detail->optionalSubjectSetup) && !is_null($student_detail->optionalSubject)) {
                                                    if ($mark->subject_id != @$student_detail->optionalSubject->subject_id) {
                                                        $temp_grade[] = $mark->total_gpa_grade;
                                                    }
                                                } else {
                                                    $temp_grade[] = $mark->total_gpa_grade;
                                                }
                                                $total_gpa_point += $mark->total_gpa_point;
                                                if (!is_null(@$student_detail->optionalSubject)) {
                                                    if (@$student_detail->optionalSubject->subject_id == $mark->subject->id && $mark->total_gpa_point < @$student_detail->optionalSubjectSetup->gpa_above) {
                                                        $total_gpa_point = $total_gpa_point - $mark->total_gpa_point;
                                                    }
                                                }
                                                $temp_gpa[] = $mark->total_gpa_point;
                                                $get_subject_marks = subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id);
                                                
                                                $subject_marks = App\SmStudent::fullMarksBySubject($exam->id, $mark->subject_id);
                                                $schedule_by_subject = App\SmStudent::scheduleBySubject($exam->id, $mark->subject_id, @$record);
                                                $result_subject = 0;
                                                if (@generalSetting()->result_type == 'mark') {
                                                    $grand_total_marks += subject100PercentMark();
                                                } else {
                                                    $grand_total_marks += $get_subject_marks;
                                                }
                                                if (@$mark->is_absent == 0) {
                                                    if (@generalSetting()->result_type == 'mark') {
                                                        $grand_total += @subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id));
                                                    } else {
                                                        $grand_total += @$mark->total_marks;
                                                    }
                                                    if ($mark->marks < $subject_marks->pass_mark) {
                                                        $result_subject++;
                                                        $result++;
                                                    }
                                                } else {
                                                    $result_subject++;
                                                    $result++;
                                                }
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(!empty($schedule_by_subject->date) ? dateConvert($schedule_by_subject->date) : ''); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(@$mark->subject->subject_name); ?>

                                                    <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                        (<?php echo e(subject100PercentMark()); ?>)
                                                    <?php else: ?>
                                                        (<?php echo e(@subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id)); ?>)
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                        <?php echo e(@subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id))); ?>

                                                    <?php else: ?>
                                                        <?php echo e(@$mark->total_marks); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                    <td>
                                                        <?php
                                                            $totalMark = subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id));
                                                            $passMark = $mark->subject->pass_mark;
                                                        ?>
                                                        <?php if($passMark <= $totalMark): ?>
                                                            <?php echo app('translator')->get('exam.pass'); ?>
                                                        <?php else: ?>
                                                            <?php echo app('translator')->get('exam.fail'); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php else: ?>
                                                    <td>
                                                        <?php echo e(@$mark->total_gpa_grade); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e(number_format(@$mark->total_gpa_point, 2, '.', '')); ?>

                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th><?php echo app('translator')->get('exam.position'); ?>:
                                                <?php echo e(getStudentMeritPosition($record->class_id, $record->section_id, $exam->id, $record->id)); ?>

                                            </th>
                                            <th>
                                                <?php echo app('translator')->get('exam.grand_total'); ?>: <?php echo e($grand_total); ?>/<?php echo e($grand_total_marks); ?>

                                            </th>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                <th></th>
                                            <?php else: ?>
                                                <th><?php echo app('translator')->get('exam.grade'); ?>:
                                                    <?php
                                                        if (in_array($fail_gpa_name->grade_name, $temp_grade)) {
                                                            echo $fail_gpa_name->grade_name;
                                                        } else {
                                                            $final_gpa_point = ($total_gpa_point - $optional_gpa) / ($total_subject - $optional_subject);
                                                            $average_grade = 0;
                                                            $average_grade_max = 0;
                                                            if ($result == 0 && $grand_total_marks != 0) {
                                                                $gpa_point = number_format($final_gpa_point, 2, '.', '');
                                                                if ($max_gpa && $gpa_point >= $max_gpa) {
                                                                    $average_grade_max = App\SmMarksGrade::where('school_id', Auth::user()->school_id)
                                                                        ->where('academic_id', getAcademicId())
                                                                        ->where('from', '<=', $max_gpa)
                                                                        ->where('up', '>=', $max_gpa)
                                                                        ->first('grade_name');
                                                        
                                                                    echo @$average_grade_max->grade_name;
                                                                } else {
                                                                    $average_grade = App\SmMarksGrade::where('school_id', Auth::user()->school_id)
                                                                        ->where('academic_id', getAcademicId())
                                                                        ->where('from', '<=', $final_gpa_point)
                                                                        ->where('up', '>=', $final_gpa_point)
                                                                        ->first('grade_name');
                                                                    echo @$average_grade->grade_name;
                                                                }
                                                            } else {
                                                                echo $fail_gpa_name->grade_name;
                                                            }
                                                        }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?php echo app('translator')->get('exam.gpa'); ?>
                                                    <?php
                                                        $final_gpa_point = 0;
                                                        $final_gpa_point = ($total_gpa_point - $optional_gpa) / ($total_subject - $optional_subject);
                                                        $float_final_gpa_point = number_format($final_gpa_point, 2);
                                                        if ($float_final_gpa_point >= $max_gpa) {
                                                            echo $max_gpa;
                                                        } else {
                                                            echo $float_final_gpa_point;
                                                        }
                                                    ?>
                                                </th>
                                            <?php endif; ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/inc/_exam_tab.blade.php ENDPATH**/ ?>