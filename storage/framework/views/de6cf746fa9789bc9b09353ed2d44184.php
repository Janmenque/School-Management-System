<style>
    .nice-select {
        margin-left: 0px !important;
    }
</style>
<input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
<form method="GET" action="">
    <div class="student_list_filters">
        <div class="row align-items-end row-gap-24">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="mb-2"><?php echo app('translator')->get('edulia.academic_year'); ?></div>
                <select id="academic_year_selector" class="w-100 p-3" name="academic_year">
                    <option data-display="<?php echo app('translator')->get('edulia.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('edulia.select_academic_year'); ?> *</option>
                    <?php $__currentLoopData = $academicYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academicYear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(request('academic_year') && $academicYear->id == request('academic_year')): ?> selected <?php endif; ?> value="<?php echo e($academicYear->id); ?>">
                            <?php echo e($academicYear->year); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" id="class_selector_div">
                <div class="mb-2"><?php echo app('translator')->get('edulia.class'); ?></div>
                <select id="class_selector" class="w-100 p-3" name="class">
                    <?php if(isset($req_data['class']) && $req_data['class']): ?>
                        <option selected value="<?php echo e($req_data['class']->id); ?>"><?php echo e($req_data['class']->class_name); ?>

                        </option>
                    <?php endif; ?>
                    <option data-display="<?php echo app('translator')->get('edulia.select_class'); ?> *" value=""><?php echo app('translator')->get('edulia.select_class'); ?></option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6" id="section_selector_div">
                <div class="mb-2"><?php echo app('translator')->get('edulia.section'); ?></div>
                <select id="section_selector" class="w-100 p-3" name="section">
                    <?php if(isset($req_data['section']) && $req_data['section']): ?>
                        <option selected value="<?php echo e($req_data['section']->id); ?>"><?php echo e($req_data['section']->section_name); ?>

                        </option>
                    <?php endif; ?>
                    <option data-display="<?php echo app('translator')->get('edulia.select_section'); ?> *" value=""><?php echo app('translator')->get('edulia.select_section'); ?></option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <button type="submit" class="boxed_btn search_btn"><i class="fa fa-search"></i>
                    <?php echo app('translator')->get('edulia.search'); ?></button>
            </div>
        </div>
    </div>
</form>

<?php if($students->isEmpty() && auth()->check() && auth()->user()->role_id == 1): ?>
    <p class="text-left text-danger"><?php echo app('translator')->get('edulia.no_data_available_please_go_to'); ?> <a target="_blank"
            href="<?php echo e(URL::to('/student-admission')); ?>"><?php echo app('translator')->get('edulia.student_list'); ?></a></p>
<?php elseif(count($students) > 0): ?>
    <div class="user_list_container student_list">
        <div class="tab-content">
            <div class="search_query">
                <?php echo app('translator')->get('edulia.class'); ?>: <?php echo e($req_data['class'] ? $req_data['class']->class_name : 'All'); ?>,
                <?php echo app('translator')->get('edulia.section'); ?>:
                <?php echo e($req_data['section'] ? $req_data['section']->section_name : 'All'); ?>

            </div>

            <div class="list_view_toggler d-flex justify-content-end">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#list_view"
                            type="button" role="tab" aria-selected="true"><i class="fas fa-list"></i></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#grid_view" type="button" role="tab" aria-selected="false"><i
                                class="fas fa-th-large"></i></button>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade show active" id="list_view" role="tabpanel">
                <div class="container px-3 px-sm-0">
                    <div class="common_data_table profile_list">
                        <table class="user_list_table table display" style="width:100%">
                            <thead class="text-nowrap">
                                <tr>
                                    <th><?php echo app('translator')->get('edulia.sl'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.admission_id'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.roll_no'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.Image'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.name'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.class'); ?>(<?php echo app('translator')->get('edulia.section'); ?>)</th>
                                    <th><?php echo app('translator')->get('edulia.guardian_name'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.blood_group'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.session'); ?></th>
                                    <th><?php echo app('translator')->get('edulia.address'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($student->admission_no); ?></td>
                                        <td><?php echo e($student->roll_no); ?></td>
                                        <td><img src="<?php echo e(file_exists($student->student_photo) ? asset($student->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                                class="user_img" alt=""></td>
                                        <td><a href="<?php echo e(route('frontend.frontend-single-student-details', $student->id)); ?>"
                                                class="link_to_details" target="_blank"><?php echo e($student->full_name); ?></a></td>
                                        <td><?php echo e(@$student->studentRecord->class->class_name); ?>(<?php echo e(@$student->studentRecord->section->section_name); ?>)
                                        </td>
                                        <td><?php echo e(@$student->parents->guardians_name); ?></td>
                                        <td class="blood_group"><?php echo e(@$student->bloodGroup->base_setup_name); ?></td>
                                        <td><?php echo e(@$student->academicYear->year); ?></td>
                                        <td><?php echo e($student->current_address); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="grid_view" role="tabpanel">
                <div id="user_list" class="user_grid">
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="user_item">
                            <div class="d-flex single-student-info">
                                <div><a href="<?php echo e(route('frontend.frontend-single-student-details', $student->id)); ?>"
                                        class="link_to_details" target="_blank">
                                        <img src="<?php echo e(file_exists($student->student_photo) ? asset($student->student_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                            class="user_photo" alt="student photo">
                                    </a>
                                </div>

                                <div class="flex-grow-1">
                                    <div class="info">
                                        <p class="user_name"><?php echo e($student->full_name); ?></p>
                                        <div class="additional_info">
                                            <p class="user_roll"><b><?php echo app('translator')->get('edulia.roll_no'); ?>:</b> <?php echo e($student->roll_no); ?></p>
                                            <p class="user_id"><b><?php echo app('translator')->get('edulia.admission_id'); ?>:</b> <?php echo e($student->admission_no); ?>

                                            </p>
                                            <p class="user_class"><b><?php echo app('translator')->get('edulia.class'); ?>(<?php echo app('translator')->get('edulia.section'); ?>):</b>
                                                <?php echo e(@$student->studentRecord->class->class_name); ?>(<?php echo e(@$student->studentRecord->section->section_name); ?>)
                                            </p>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-student-list.blade.php ENDPATH**/ ?>