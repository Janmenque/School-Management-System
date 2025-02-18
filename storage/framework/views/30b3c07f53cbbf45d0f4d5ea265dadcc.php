<div class="white-box">
    <!-- Start Student Meta Information -->
<?php if(!isset($title)): ?>
<div class="main-title">
    <h3 class="mb-15"><?php echo app('translator')->get('student.student_details'); ?></h3>
</div>
<?php endif; ?>

<div class="student-meta-box">
<div class="student-meta-top"></div>
<?php if(is_show('photo')): ?>
    <img class="student-meta-img img-100"
        src="<?php echo e(file_exists(@$student_detail->student_photo) ? asset($student_detail->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
        alt="">
<?php endif; ?>

<div class="white-box radius-t-y-0">
    <div class="single-meta mt-50">
        <div class="d-flex justify-content-between">
            <div class="name">
                <?php echo app('translator')->get('student.student_name'); ?>
            </div>
            <div class="value">
                <?php echo e(@$student_detail->first_name . ' ' . @$student_detail->last_name); ?>

            </div>
        </div>
    </div>
    <?php if(is_show('admission_number')): ?>
        <div class="single-meta">
            <div class="d-flex justify-content-between">
                <div class="name">
                    <?php echo app('translator')->get('student.admission_number'); ?>
                </div>
                <div class="value">
                    <?php echo e(@$student_detail->admission_no); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(is_show('roll_number')): ?>
        <?php if(isset($setting)): ?>
            <?php if(generalSetting()->multiple_roll == 0): ?>
                <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            <?php echo app('translator')->get('student.roll_number'); ?>
                        </div>
                        <div class="value">
                            <?php echo e(@$student_detail->roll_no ? $student_detail->roll_no : ''); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <div class="single-meta">
        <div class="d-flex justify-content-between">
            <div class="name">
                <?php echo app('translator')->get('student.class'); ?>

            </div>
            <div class="value">
                <?php if($student_detail->defaultClass != ''): ?>
                    <?php echo e(@$student_detail->defaultClass->class->class_name); ?>

                <?php elseif($student_detail->studentRecord != ''): ?>
                    <?php echo e(@$student_detail->studentRecord->class->class_name); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="single-meta">
        <div class="d-flex justify-content-between">
            <div class="name">

                <?php echo app('translator')->get('student.section'); ?>

            </div>
            <div class="value">

                <?php if($student_detail->defaultClass != ''): ?>
                    <?php echo e(@$student_detail->defaultClass->section->section_name); ?>

                <?php elseif($student_detail->studentRecord != ''): ?>
                    <?php echo e(@$student_detail->studentRecord->section->section_name); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if(is_show('gender')): ?>
        <div class="single-meta">
            <div class="d-flex justify-content-between">
                <div class="name">
                    <?php echo app('translator')->get('common.gender'); ?>
                </div>
                <div class="value">

                    <?php echo e(@$student_detail->gender != '' ? $student_detail->gender->base_setup_name : ''); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(moduleStatusCheck('BehaviourRecords')): ?>
        <div class="single-meta">
            <div class="d-flex justify-content-between">
                <div class="name">
                    <?php echo app('translator')->get('behaviourRecords.behaviour_records_point'); ?>
                </div>
                <div class="value">
                    <?php
                        $totalBehaviourPoints = 0;
                        if (@$studentBehaviourRecords) {
                            foreach ($studentBehaviourRecords as $studentBehaviourRecord) {
                                $totalBehaviourPoints += $studentBehaviourRecord->point;
                            }
                        }
                    ?>
                    <?php echo e($totalBehaviourPoints); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
</div>
<!-- End Student Meta Information -->
<?php if(isset($siblings)): ?>

<?php if(count($siblings) > 0): ?>
    <!-- Start Siblings Meta Information -->
    <div class="main-title mt-40">
        <h3 class="mb-15"><?php echo app('translator')->get('student.sibling_information'); ?> </h3>
    </div>
    <?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sibling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="student-meta-box mb-20">
            <div class="student-meta-top siblings-meta-top"></div>
            <img class="student-meta-img img-100"
                src="<?php echo e(file_exists(@$sibling->student_photo) ? asset(@$sibling->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                alt="">
            <div class="white-box radius-t-y-0">
                <div class="single-meta mt-50">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            <?php echo app('translator')->get('student.sibling_name'); ?>
                        </div>
                        <div class="value">
                            <?php echo e(isset($sibling->full_name) ? $sibling->full_name : ''); ?>

                        </div>
                    </div>
                </div>
                <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            <?php echo app('translator')->get('student.admission_number'); ?>
                        </div>
                        <div class="value">
                            <?php echo e(@$sibling->admission_no); ?>

                        </div>
                    </div>
                </div>
                <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            <?php echo app('translator')->get('student.roll_number'); ?>
                        </div>
                        <div class="value">
                            <?php echo e(@$sibling->roll_no); ?>

                        </div>
                    </div>
                </div>
                <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">

                            <?php echo app('translator')->get('student.class'); ?>

                        </div>
                        <div class="value">
                            
                            <?php if($sibling->defaultClass != ''): ?>
                                <?php echo e(@$sibling->defaultClass->class->class_name); ?>

                            <?php elseif($sibling->studentRecord != ''): ?>
                                <?php echo e(@$sibling->studentRecord->class->class_name); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">

                            <?php echo app('translator')->get('student.section'); ?>

                        </div>
                        <div class="value">

                            <?php if($sibling->defaultClass != ''): ?>
                                <?php echo e(@$sibling->defaultClass->section->section_name); ?>

                            <?php elseif($sibling->studentRecord != ''): ?>
                                <?php echo e(@$sibling->studentRecord->section->section_name); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="single-meta">
                    <div class="d-flex justify-content-between">
                        <div class="name">
                            <?php echo app('translator')->get('student.gender'); ?>
                        </div>
                        <div class="value">
                            <?php echo e($sibling->gender != '' ? $sibling->gender->base_setup_name : ''); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- End Siblings Meta Information -->
<?php endif; ?>
<?php endif; ?>

</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentInformation/inc/student_profile.blade.php ENDPATH**/ ?>