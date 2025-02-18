<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo app('translator')->get('student.student_attendance'); ?>  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/print/bootstrap.min.css" />
  <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/bootstrap.min.js"></script>
</head>
<style>
 table,th,tr,td{
     font-size: 11px !important;
     padding: 0px !important;
     text-align: center !important;
 }
 
</style>
<body>
 
        <div class="container-fluid" id="pdf"> 
                    
                    <table  cellspacing="0" width="100%">
                        <tr>
                            <td> 
                                <img class="logo-img" src="<?php echo e(url('/')); ?>/<?php echo e(@generalSetting()->logo); ?>" alt=""> 
                            </td>
                            <td> 
                                <h3 style="font-size:22px !important" class="text-white"> <?php echo e(isset(generalSetting()->school_name)?@generalSetting()->school_name:'Infix School Management ERP'); ?> </h3> 
                                <p style="font-size:18px !important" class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?@generalSetting()->address:'Infix School Address'); ?> </p> 
                                <p style="font-size:15px !important" class="text-white mb-0"> <?php echo app('translator')->get('student.attendance'); ?> </p> 
                          </td>
                            <td style="text-aligh:center"> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Name: <?php echo e(@$student_detail->full_name); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Month: <?php echo e(date("F", strtotime('00-'.@$month.'-01'))); ?> </p> 
                                <p style="font-size:14px !important; border-bottom:1px solid gray" align="left" class="text-white">Year: <?php echo e(@$year); ?> </p>
                               
                          </td>
                        </tr>
                    </table>

                    <hr>
           
                <table class="table table-bordered table-striped" cellspacing="0" width="100%">
                    
                         
                        <tr>
                            <!-- <th><?php echo app('translator')->get('common.name'); ?></th>
                            <th><?php echo app('translator')->get('student.admission_no'); ?></th> -->
                            <th>P</th>
                            <th>L</th>
                            <th>A</th>
                            <th>H</th>
                            <th>F</th>
                            <th>%</th>
                            <?php for($i = 1;  $i<=@$days; $i++): ?>
                            <th class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                <?php echo e($i); ?> <br>
                                <?php
                                    @$date = @$year.'-'.@$month.'-'.$i;
                                    @$day = date("D", strtotime($date));
                                    echo @$day;
                                ?>
                            </th>
                            <?php endfor; ?>
                        </tr>
               
                        <?php @$total_attendance = 0; ?>
                        <?php @$count_absent = 0; ?>
                        <tr>
                            <!-- <td>
                                <?php @$student = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php @$student++; ?>
                                    <?php if(@$student == 1): ?>
                                        <?php echo e(@$student_detail->full_name); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php @$student = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php @$student++; ?>
                                    <?php if(@$student == 1): ?>
                                        <?php echo e(@$student_detail->admission_no); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td> -->

                            <td>
                                <?php $p = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'P'): ?>
                                        <?php $p++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($p); ?>

                            </td>
                            <td>
                                <?php $l = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'L'): ?>
                                        <?php $l++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($l); ?>

                            </td>
                            <td>
                                <?php $a = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'A'): ?>
                                        <?php $a++; @$count_absent++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($a); ?>

                            </td>
                            <td>
                                <?php $h = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$value->attendance_type == 'H'): ?>
                                        <?php $h++; @$total_attendance++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($h); ?>

                            </td>
                            <td>
                                <?php $f = 0; ?>
                                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <td class="<?php echo e(($i<=18)? 'all':'none'); ?>">
                                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(strtotime(@$value->attendance_date) == strtotime(@$date)): ?>
                                            <?php echo e(@$value->attendance_type); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                               
                            <?php endfor; ?>
                        </tr>
                        
                </table>
        </div>  
<script src="<?php echo e(asset('public/vendor/spondonit/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/pdf/html2pdf.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/pdf/html2canvas.min.js')); ?>"></script>
<script>
    function generatePDF() {
        const element = document.getElementById('pdf');
        var opt = {
            margin: 0.5,
            pagebreak: {
                mode: ['avoid-all', 'css', 'legacy'],
                before: '#page2el'
            },
            filename: 'my_class_routine.pdf',
            image: {
                type: 'jpeg',
                quality: 100
            },
            html2canvas: {
                scale: 5
            },
            jsPDF: {
                unit: 'in',
                format: 'a4',
                orientation: 'landscape'
            }
        };
        html2pdf().set(opt).from(element).save().then(function() {
            // window.close();
        });
    }
    $(document).ready(function() {
        generatePDF();
    })
</script>


</body>
</html>
    

<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/my_attendance_print.blade.php ENDPATH**/ ?>