
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('student.attendance'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
    #table_id1{
        border: 1px solid var(--border_color);

    }
    #table_id1 td{
        border: 1px solid var(--border_color);
        text-align:center;
    }
    #table_id1 th{
        border: 1px solid var(--border_color);
        text-align:center;
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
      height:5px;
      border-radius: 0;
    }
    .table-responsive::-webkit-scrollbar {
      width: 5px;
      height: 5px
    }
    .table-responsive::-webkit-scrollbar-track {
      height: 5px !important ;
      background: #ddd;
      border-radius: 0;
      box-shadow: inset 0 0 5px grey
    }
    td{
        padding: .3rem !important;
        font-size: 12px !important;
    }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    td{
        padding: .3rem !important;
        font-size: 12px !important;  
    }
    td {
        padding: 20px 10px 20px 10px !important;
    }
</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.attendance'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('student_my_attendance')); ?>"><?php echo app('translator')->get('student.attendance'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php
    $year=date('Y');
     
?>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php elseif(session()->has('message-danger')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                        <?php endif; ?>
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_my_attendance_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                
                                
                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select form-control<?php echo e($errors->has('month') ? ' is-invalid' : ''); ?>" name="month">
                                        <option data-display="Select Month *" value=""><?php echo app('translator')->get('student.select_month'); ?> *</option>
                                        <option value="01" <?php echo e(isset($month)? ( @$month == "01"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.january'); ?></option>
                                        <option value="02" <?php echo e(isset($month)? ( @$month == "02"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.february'); ?></option>
                                        <option value="03" <?php echo e(isset($month)? ( @$month == "03"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.march'); ?></option>
                                        <option value="04" <?php echo e(isset($month)? ( @$month == "04"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.april'); ?></option>
                                        <option value="05" <?php echo e(isset($month)? ( @$month == "05"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.may'); ?></option>
                                        <option value="06" <?php echo e(isset($month)? ( @$month == "06"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.june'); ?></option>
                                        <option value="07" <?php echo e(isset($month)? ( @$month == "07"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.july'); ?></option>
                                        <option value="08" <?php echo e(isset($month)? ( @$month == "08"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.august'); ?></option>
                                        <option value="09" <?php echo e(isset($month)? ( @$month == "09"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.september'); ?></option>
                                        <option value="10" <?php echo e(isset($month)? ( @$month == "10"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.october'); ?></option>
                                        <option value="11" <?php echo e(isset($month)? ( @$month == "11"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.november'); ?></option>
                                        <option value="12" <?php echo e(isset($month)? ( @$month == "12"? 'selected': ''): ''); ?>><?php echo app('translator')->get('student.december'); ?></option>
                                    </select>
                                    <?php if($errors->has('month')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('month')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                              
                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>" name="year">
                                        <option data-display="Select Year *" value=""><?php echo app('translator')->get('student.select_year'); ?> *</option>
                                        <?php
                                        $current_year = date('Y');
                                        $ini = date('y');
                                        $limit = $ini + 30;
                                    ?>
                                    <?php for($i = $ini; $i <= $limit; $i++): ?>
                                        <option value="<?php echo e($current_year); ?>" <?php echo e(isset($year)? ($year == $current_year? 'selected':''):(date('Y') == $current_year? 'selected':'')); ?>><?php echo e($current_year--); ?></option>
                                    <?php endfor; ?>
                                       
                                    </select>
                                    <?php if($errors->has('year')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('year')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        search
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>


    </div>
</section>


<?php if(isset($records)): ?>

<section class="student-attendance">
    <div class="container-fluid p-0">

        <div class="row mt-40">
            <div class="col-lg-12 student-details up_admin_visitor">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab"><?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>) </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content mt-15">
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div role="tabpanel" class="tab-pane fade  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <div class="lateday d-flex">
                                            <div class="mr-3"><?php echo app('translator')->get('student.present'); ?>: <span class="text-success">P</span></div>
                                            <div class="mr-3"><?php echo app('translator')->get('student.late'); ?>: <span class="text-warning">L</span></div>
                                            <div class="mr-3"><?php echo app('translator')->get('student.absent'); ?>: <span class="text-danger">A</span></div>
                                            <div class="mr-3"><?php echo app('translator')->get('student.half_day'); ?>: <span class="text-info">F</span></div>
                                            <div><?php echo app('translator')->get('student.holiday'); ?>: <span class="text-dark">H</span></div>
                                        </div>
                                        <a href="<?php echo e(route('my-attendance/print', [$record->id,$month, $year])); ?>" class="primary-btn small fix-gr-bg " target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?></a>
                                    </div>
    
                                    <div class="col-lg-12">
    
                                        <div>
                                            <div class="table-responsive" style="padding:20px">
                                                <table id="table_id1" style="margin-bottom:25px" class="table table-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">P</th>
                                                            <th width="3%">L</th>
                                                            <th width="3%">A</th>
                                                            <th width="3%">H</th>
                                                            <th width="3%">F</th>
                                                            <th width="2%">%</th>
                                                            <?php for($i = 1;  $i<=@$days; $i++): ?>
                                                            <th width="3%" class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                                                <?php echo e($i); ?> <br>
                                                                <?php
                                                                    @$date = @$year.'-'.@$month.'-'.$i;
                                                                    @$day = date("D", strtotime(@$date));
                                                                    echo @$day;
                                                                ?>
                                                            </th>
                                                            <?php endfor; ?>
                                                        </tr>
                                                    </thead>
    
                                                    <tbody>
                                                        <?php $studentAttendance = $record->studentAttendanceByMonth($month, $year); ?>
                                                        <?php @$total_attendance = 0; ?>
                                                        <?php @$count_absent = 0; ?>
                                                        <tr>
                                                            <td>
                                                                <?php $p = 0; ?>
                                                                <?php $__currentLoopData = $studentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(@$value->attendance_type == 'P'): ?>
                                                                        <?php $p++; @$total_attendance++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($p); ?>

                                                            </td>
                                                            <td>
                                                                <?php $l = 0; ?>
                                                                <?php $__currentLoopData = $studentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(@$value->attendance_type == 'L'): ?>
                                                                        <?php $l++; @$total_attendance++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($l); ?>

                                                            </td>
                                                            <td>
                                                                <?php $a = 0; ?>
                                                                <?php $__currentLoopData = $studentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(@$value->attendance_type == 'A'): ?>
                                                                        <?php $a++; @$count_absent++; @$total_attendance++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($a); ?>

                                                            </td>
                                                            <td>
                                                                <?php $h = 0; ?>
                                                                <?php $__currentLoopData = $studentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(@$value->attendance_type == 'H'): ?>
                                                                        <?php $h++; @$total_attendance++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($h); ?>

                                                            </td>
                                                            <td>
                                                                <?php $f = 0; ?>
                                                                <?php $__currentLoopData = $studentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(@$value->attendance_type == 'F'): ?>
                                                                        <?php $f++; @$total_attendance++; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($f); ?>

                                                            </td>
                                                            <td>
                                                            <?php
                                                                @$total_present = @$total_attendance - @$count_absent;
                                                                if(@$count_absent == 0){
                                                                    echo '100%';
                                                                }else{
                                                                    @$percentage = @$total_present / @$total_attendance * 100;
                                                                    echo number_format((float)@$percentage, 2, '.', '').'%';
                                                                }
                                                            ?>
    
                                                            </td>
                                                            <?php for($i = 1;  $i<=@$days; $i++): ?>
                                                                <?php
                                                                    @$date = @$year.'-'.@$month.'-'.$i;
                                                                ?>
                                                                <td width="3%" class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                                                    <?php $__currentLoopData = $studentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(strtotime(@$value->attendance_date) == strtotime(@$date)): ?>
                                                                            <?php echo e(@$value->attendance_type); ?>

                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
    
                                                            <?php endfor; ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/student_attendance.blade.php ENDPATH**/ ?>