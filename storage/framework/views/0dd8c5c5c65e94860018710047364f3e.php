<?php $__env->startPush('css'); ?>
    <style>
        #table_id1 {
            border: 1px solid var(--border_color);
        }

        #table_id1 td {
            border: 1px solid var(--border_color);
            text-align: center;
        }

        #table_id1 th {
            border: 1px solid var(--border_color);
            text-align: center;
        }

        .main-wrapper {
            display: block;
            width: auto;
            align-items: stretch;
        }

        .main-wrapper {
            display: block;
            width: auto;
            align-items: stretch;
        }

        #main-content {
            width: auto;
        }

        #table_id1 td {
            border: 1px solid var(--border_color);
            text-align: center;
            padding: 7px;
            flex-wrap: nowrap;
            white-space: nowrap;
            font-size: 11px
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #828bb2;
            height: 5px;
            border-radius: 0;
        }

        .table-responsive::-webkit-scrollbar {
            width: 5px;
            height: 5px
        }

        .table-responsive::-webkit-scrollbar-track {
            height: 5px !important;
            background: #ddd;
            border-radius: 0;
            box-shadow: inset 0 0 5px grey
        }

        .attendance td {
            padding: .3rem !important;
            font-size: 12px !important;
        }

        .dataTables_filter {
            margin-top: 30px;
        }

        .white-box.attendance-table {
            padding: 30px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php if(isset($attendance)): ?>
    <div class="col-lg-12 mt-30">
        <div class="white-box">
            <div class="row mb-0">
                <div class="col-lg-12 no-gutters d-flex align-items-center justify-content-between">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('student.monthly_attendance_report'); ?>(<?php echo e(date('F')); ?>)
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="attendance-table">
                        <div class="lateday d-flex">
                            <div class="mr-3"><?php echo app('translator')->get('student.present'); ?>: <span class="text-success">P</span></div>
                            <div class="mr-3"><?php echo app('translator')->get('student.late'); ?>: <span class="text-warning">L</span></div>
                            <div class="mr-3"><?php echo app('translator')->get('student.absent'); ?>: <span class="text-danger">A</span></div>
                            <div class="mr-3"><?php echo app('translator')->get('student.half_day'); ?>: <span class="text-info">F</span></div>
                            <div><?php echo app('translator')->get('student.holiday'); ?>: <span class="text-dark">H</span></div>
                        </div>
                        <div class="table-responsive">
                            <table id="table_id1" class="display school-table table-responsive attendance" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th width="3%">P</th>
                                        <th width="3%">L</th>
                                        <th width="3%">A</th>
                                        <th width="3%">F</th>
                                        <th width="3%">H</th>
                                        <th width="2%">%</th>
                                        <?php for($i = 1; $i <= $days; $i++): ?>
                                            <th width="3%" class="<?php echo e($i <= 18 ? 'all' : 'none'); ?>">
                                                <?php echo e($i); ?> <br>
                                                <?php
                                                    $date = $year . '-' . $month . '-' . $i;
                                                    $day = date('D', strtotime($date));
                                                    echo $day;
                                                ?>
                                            </th>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php
                                        $total_grand_present = 0;
                                        $total_late = 0;
                                        $total_absent = 0;
                                        $total_holiday = 0;
                                        $total_halfday = 0;
                                    ?>
                                    <?php $total_attendance = 0; ?>
                                    <?php $count_absent = 0; ?>
                                    <tr>
                                        <td>
                                            <?php $p = 0; ?>
                                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->attendance_type == 'P'): ?>
                                                    <?php
                                                        $p++;
                                                        $total_attendance++;
                                                        $total_grand_present++;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($p); ?>

                                        </td>
                                        <td>
                                            <?php $l = 0; ?>
                                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->attendance_type == 'L'): ?>
                                                    <?php
                                                        $l++;
                                                        $total_attendance++;
                                                        $total_late++;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($l); ?>

                                        </td>
                                        <td>
                                            <?php $a = 0; ?>
                                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->attendance_type == 'A'): ?>
                                                    <?php
                                                        $a++;
                                                        $count_absent++;
                                                        $total_attendance++;
                                                        $total_absent++;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($a); ?>

                                        </td>
    
                                        <td>
                                            <?php $f = 0; ?>
                                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->attendance_type == 'F'): ?>
                                                    <?php
                                                        $f++;
                                                        $total_attendance++;
                                                        $total_halfday++;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($f); ?>

                                        </td>
                                        <td>
                                            <?php $h = 0; ?>
                                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->attendance_type == 'H'): ?>
                                                    <?php
                                                        $h++;
                                                        $total_attendance++;
                                                        $total_holiday++;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($h); ?>

                                        </td>
                                        <td>
                                            <?php
                                                $total_present = $total_attendance - $count_absent;
                                                if ($count_absent == 0) {
                                                    echo '100%';
                                                } else {
                                                    $percentage = ($total_present / $total_attendance) * 100;
                                                    echo number_format((float) $percentage, 2, '.', '') . '%';
                                                }
                                            ?>
                                        </td>
                                        <?php for($i = 1; $i <= $days; $i++): ?>
                                            <?php
                                                $date = $year . '-' . $month . '-' . $i;
                                                $y = 0;
                                            ?> <td
                                                width="3%" class="<?php echo e($i <= 18 ? 'all' : 'none'); ?>">
                                                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(strtotime($value->attendance_date) == strtotime($date)): ?>
                                                        <?php echo e($value->attendance_type); ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endfor; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" id="total-attendance"
                            value="<?php echo e($total_grand_present . '-' . $total_absent . '-' . $total_late . '-' . $total_halfday . '-' . $total_holiday); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/inc/_attendance_statistics.blade.php ENDPATH**/ ?>