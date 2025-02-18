
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.staff_details'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        table.dataTable thead .sorting_asc:after {
            left: 5px;
            top: 11px;
        }

        table.dataTable thead .sorting:after {
            left: 5px;
            top: 11px;
        }

        #table_id_wrapper {
            margin-top: 10px;
        }
        .table.dataTable {
            padding: 0;
            box-shadow: 0 0 0 !important;
        }

        table.dataTable thead th {
            padding-left: 24px;
        }

        table.dataTable thead .sorting_desc:after {
            left: 5px;
            top: 10px;
        }
        .input-right-icon button.primary-btn-small-input {
            top: 8px !important;
            right: 11px !important;
        }
    </style>
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
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.human_resource'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href=""><?php echo app('translator')->get('hr.human_resource'); ?></a>
                    <a href="<?php echo e(route('staff_directory')); ?>"><?php echo app('translator')->get('hr.staff_details'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-40 student-details">

        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3 mb-30">
                    <!-- Start Student Meta Information -->
                    <div class="white-box">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('hr.staff_details'); ?></h3>
                        </div>
                        <div class="student-meta-box">
                            <div class="student-meta-top"></div>
    
                            <img class="student-meta-img img-100"
                                src="<?php echo e(file_exists(@$staffDetails->staff_photo) ? asset($staffDetails->staff_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                alt="">
                            <div class="white-box">
                                <div class="single-meta mt-50">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.staff_name'); ?>
                                        </div>
                                        <div class="value">
    
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e($staffDetails->full_name); ?>

                                            <?php endif; ?>
    
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.role'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e($staffDetails->roles->name); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.designation'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e(!empty($staffDetails->designations) ? $staffDetails->designations->title : ''); ?>

                                            <?php endif; ?>
    
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.department'); ?>
                                        </div>
                                        <div class="value">
    
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e(!empty($staffDetails->departments) ? $staffDetails->departments->name : ''); ?>

                                            <?php endif; ?>
    
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.epf_no'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e($staffDetails->epf_no); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.basic_salary'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e(currency_format($staffDetails->basic_salary)); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.contract_type'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e($staffDetails->contract_type); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="d-flex justify-content-between">
                                        <div class="name">
                                            <?php echo app('translator')->get('hr.date_of_joining'); ?>
                                        </div>
                                        <div class="value">
                                            <?php if(isset($staffDetails)): ?>
                                                <?php echo e($staffDetails->date_of_joining != '' ? dateConvert($staffDetails->date_of_joining) : ''); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                </div>
                <!-- Start Student Details -->
                <div class="col-lg-9 staff-details">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php if(Session::get('staffDocuments') != 'active' && Session::get('staffTimeline') != 'active'): ?> active <?php endif; ?>" href="#studentProfile"
                                    role="tab" data-toggle="tab"><?php echo app('translator')->get('hr.profile'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#payroll" role="tab" data-toggle="tab"><?php echo app('translator')->get('hr.payroll'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#leaves" role="tab" data-toggle="tab"><?php echo app('translator')->get('hr.leave'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('staffDocuments') == 'active' ? 'active' : ''); ?>"
                                    href="#staffDocuments" role="tab" data-toggle="tab"><?php echo app('translator')->get('hr.documents'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('staffTimeline') == 'active' ? 'active' : ''); ?>"
                                    href="#staffTimeline"
                                    role="tab" data-toggle="tab"><?php echo app('translator')->get('hr.timeline'); ?></a>
                            </li>
                            <li class="nav-item edit-button d-flex align-items-center justify-content-end">
                                <a href="<?php echo e(route('editStaff', $staffDetails->id)); ?>"
                                    class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('common.edit'); ?>
                                </a>
                            </li>
                        </ul>
    
                        <!-- Tab panes -->
                        <div class="tab-content mt-10">
                            <!-- Start Profile Tab -->
                            <div role="tabpanel" class="tab-pane fade <?php if(Session::get('staffDocuments') != 'active' && Session::get('staffTimeline') != 'active'): ?> show active <?php endif; ?>"
                                id="studentProfile">
                                <div>
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('hr.personal_info'); ?></h4>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('common.mobile_no'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->mobile); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.emergency_mobile'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->emergency_mobile); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('common.email'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->email); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.driving_license'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e(@$staffDetails->driving_license); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('common.gender'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e(@$staffDetails->genders->base_setup_name); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('common.date_of_birth'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->date_of_birth != '' ? dateConvert($staffDetails->date_of_birth) : ''); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.marital_status'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->marital_status); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('student.father_name'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->fathers_name); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.mother_name'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->mothers_name); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.qualifications'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->qualification); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.work_experience'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-7">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->experience); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Start Parent Part -->
                                    <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('hr.address'); ?></h4>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.current_address'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->current_address); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.permanent_address'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->permanent_address); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Parent Part -->
    
                                    <!-- Start Transport Part -->
                                    <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('hr.bank_account_details'); ?></h4>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('accounts.account_name'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->bank_account_name); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('accounts.bank_account_number'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->bank_account_no); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('accounts.bank_name'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->bank_name); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('accounts.branch_name'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php if(isset($staffDetails)): ?>
                                                        <?php echo e($staffDetails->bank_brach); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
    
                                    <!-- End Transport Part -->
    
                                    <!-- Start Other Information Part -->
                                    <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('hr.social_links_details'); ?></h4>
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.facebook_url'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <a href="<?php echo e($staffDetails->facebook_url); ?>" target="_blank">
                                                        <?php if(isset($staffDetails)): ?>
                                                            <?php echo e($staffDetails->facebook_url); ?>

                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.twitter_url'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <a href="<?php echo e($staffDetails->twiteer_url); ?>" target="_blank">
                                                        <?php if(isset($staffDetails)): ?>
                                                            <?php echo e($staffDetails->twiteer_url); ?>

                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.linkedin_url'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <a href="<?php echo e($staffDetails->linkedin_url); ?>" target="_blank">
                                                        <?php if(isset($staffDetails)): ?>
                                                            <?php echo e($staffDetails->linkedin_url); ?>

                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('hr.instragram_url'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <a href="<?php echo e($staffDetails->instragram_url); ?>" target="_blank">
                                                        <?php if(isset($staffDetails)): ?>
                                                            <?php echo e($staffDetails->instragram_url); ?>

                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Other Information Part -->
                                    
                                    <?php echo $__env->make('backEnd.customField._coutom_field_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
    
                                </div>
                            </div>
                            <!-- End Profile Tab -->
    
                            <!-- Start payroll Tab -->
                            <div role="tabpanel" class="tab-pane fade" id="payroll">
                                <div>
                                    <table id="" class="table simple-table table-responsive school-table"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%"><?php echo app('translator')->get('hr.payslip_id'); ?></th>
                                                <th width="20%"><?php echo app('translator')->get('hr.month_year'); ?></th>
                                                <th width="15%"><?php echo app('translator')->get('common.date'); ?></th>
                                                <th width="15%"><?php echo app('translator')->get('hr.mode_of_payment'); ?></th>
                                                <th width="15%"><?php echo app('translator')->get('hr.net_salary'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                </th>
                                                <th width="12%"><?php echo app('translator')->get('common.status'); ?></th>
                                                <th width="20%"><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php if(count($staffPayrollDetails) > 0): ?>
                                                <?php $__currentLoopData = $staffPayrollDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($value->id); ?></td>
                                                        <td><?php echo e($value->payroll_month); ?> - <?php echo e($value->payroll_year); ?></td>
                                                        <td>
    
                                                            <?php echo e($value->created_at != '' ? dateConvert($value->created_at) : ''); ?>

    
                                                        </td>
                                                        <td><?php $payment_mode = '';
                                                        if (!empty($value->payment_mode)) {
                                                            $payment_mode = App\SmHrPayrollGenerate::getPaymentMode($value->payment_mode);
                                                        } else {
                                                            $payment_mode = '';
                                                        }
                                                        ?>
                                                            <?php echo e($payment_mode); ?>

                                                        </td>
                                                        <td><?php echo e($value->net_salary); ?></td>
                                                        <td>
                                                            <?php if($value->payroll_status == 'G'): ?>
                                                                <button
                                                                    class="primary-btn small bg-warning text-white border-0">
                                                                    <?php echo app('translator')->get('hr.generated'); ?></button>
                                                            <?php endif; ?>
    
                                                            <?php if($value->payroll_status == 'P'): ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0">
                                                                    <?php echo app('translator')->get('hr.paid'); ?> </button>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($value->payroll_status == 'P'): ?>
                                                                <a class="modalLink" data-modal-size="modal-lg"
                                                                    title="<?php echo app('translator')->get('hr.view_payslip_details'); ?>"
                                                                    href="<?php echo e(route('view-payslip', $value->id)); ?>"><button
                                                                        class="primary-btn small tr-bg">
                                                                        <?php echo app('translator')->get('common.view_payslip'); ?></button></a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr class="justify-content-center">
                                                    <td colspan="7" class="justify-content-center text-center">
                                                        <?php echo app('translator')->get('hr.no_payroll_data'); ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End payroll Tab -->
    
                            <!-- Start leave Tab -->
                            <div role="tabpanel" class="tab-pane fade" id="leaves">
                                <div>
                                    <div class="row mt-50">
                                        <div class="col-lg-12">
                                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('leave.leave_type'); ?></th>
                                                        <th><?php echo app('translator')->get('leave.leave_from'); ?> </th>
                                                        <th><?php echo app('translator')->get('leave.leave_to'); ?></th>
                                                        <th><?php echo app('translator')->get('leave.apply_date'); ?></th>
                                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $diff = ''; ?>
                                                    <?php if(count($staffLeaveDetails) > 0): ?>
                                                        <?php $__currentLoopData = $staffLeaveDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(@$value->leaveDefine->leaveType->type); ?></td>
                                                                <td><?php echo e($value->leave_from != '' ? dateConvert($value->leave_from) : ''); ?>

                                                                </td>
                                                                <td><?php echo e($value->leave_to != '' ? dateConvert($value->leave_to) : ''); ?>

                                                                </td>
                                                                <td><?php echo e($value->apply_date != '' ? dateConvert($value->apply_date) : ''); ?>

                                                                </td>
                                                                <td>
                                                                    <?php if($value->approve_status == 'P'): ?>
                                                                        <button
                                                                            class="primary-btn small bg-warning text-white border-0">
                                                                            <?php echo app('translator')->get('common.pending'); ?></button>
                                                                    <?php endif; ?>
    
                                                                    <?php if($value->approve_status == 'A'): ?>
                                                                        <button
                                                                            class="primary-btn small bg-success text-white border-0">
                                                                            <?php echo app('translator')->get('common.approved'); ?></button>
                                                                    <?php endif; ?>
    
                                                                    <?php if($value->approve_status == 'C'): ?>
                                                                        <button
                                                                            class="primary-btn small bg-danger text-white border-0">
                                                                            <?php echo app('translator')->get('hr.cancelled'); ?></button>
                                                                    <?php endif; ?>
    
                                                                </td>
                                                                <td>
                                                                    <a class="modalLink" data-modal-size="modal-md"
                                                                        title="<?php echo app('translator')->get('common.view_leave_details'); ?>"
                                                                        href="<?php echo e(url('view-leave-details-apply', $value->id)); ?>"><button
                                                                            class="primary-btn small tr-bg"> <?php echo app('translator')->get('common.view'); ?>
                                                                        </button></a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?php echo app('translator')->get('hr.not_leaves_data'); ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End leave Tab -->
    
                            <!-- Start Documents Tab -->
                            <div role="tabpanel" class="tab-pane fade <?php echo e(Session::get('staffDocuments') == 'active' ? 'show active' : ''); ?>" id="staffDocuments">
                                <div>
                                    <div class="text-right mb-20">
                                        <button type="button" data-toggle="modal" data-target="#add_document_madal"
                                            class="primary-btn tr-bg text-uppercase bord-rad">
                                            <?php echo app('translator')->get('hr.upload_document'); ?>
                                            <span class="pl ti-upload"></span>
                                        </button>
                                    </div>
                                    <table id="" class="table simple-table table-responsive school-table"
                                        cellspacing="0">
                                        <thead class="d-block">
                                            <tr class="d-flex">
                                                <th class="col-7"><?php echo app('translator')->get('hr.document_title'); ?></th>
                                                <th class="col-5"><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="d-block">
                                            <?php if($staffDetails->joining_letter != ''): ?>
                                                <tr class="d-flex">
                                                    <td class="col-7"><?php echo app('translator')->get('hr.joining_letter'); ?></td>
                                                    <td class="col-5 d-flex align-itemd-center">
                                                        <a href="<?php echo e(url($staffDetails->joining_letter)); ?>" download>
                                                            <button class="primary-btn tr-bg text-uppercase bord-rad">
                                                                <?php echo app('translator')->get('common.download'); ?>
                                                                <span class="pl ti-download"></span>
                                                            </button>
                                                        </a>
                                                        <a class="primary-btn icon-only fix-gr-bg ml-2"
                                                            onclick="deleteStaffDoc(<?php echo e($staffDetails->id); ?>,1)"
                                                            data-id="1"
                                                            href="#">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($staffDetails->resume != ''): ?>
                                                <tr class="d-flex">
                                                    <td class="col-7"><?php echo app('translator')->get('hr.resume'); ?></td>
                                                    <td class="col-5 d-flex align-itemd-center">
                                                        <a href="<?php echo e(url($staffDetails->resume)); ?>" download>
                                                            <button class="primary-btn tr-bg text-uppercase bord-rad">
                                                                <?php echo app('translator')->get('common.download'); ?>
                                                                <span class="pl ti-download"></span>
                                                            </button>
                                                        </a>
                                                        <a class="primary-btn icon-only fix-gr-bg ml-2"
                                                            onclick="deleteStaffDoc(<?php echo e($staffDetails->id); ?>,2)"
                                                            data-id="2"
                                                            href="#">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($staffDetails->other_document != ''): ?>
                                                <tr class="d-flex">
                                                    <td class="col-7"><?php echo app('translator')->get('hr.other_documents'); ?></td>
                                                    <td class="col-5 d-flex align-itemd-center">
                                                        <a href="<?php echo e(url($staffDetails->other_document)); ?>" download>
                                                            <button class="primary-btn tr-bg text-uppercase bord-rad">
                                                                <?php echo app('translator')->get('common.download'); ?>
                                                                <span class="pl ti-download"></span>
                                                            </button>
                                                        </a>
                                                        <a class="primary-btn icon-only fix-gr-bg ml-2"
                                                            onclick="deleteStaffDoc(<?php echo e($staffDetails->id); ?>,3)"
                                                            data-id="3"
                                                            href="#">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if(isset($staffDocumentsDetails)): ?>
                                                <?php $__currentLoopData = $staffDocumentsDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="d-flex">
                                                        <td class="col-7"><?php echo e($value->title); ?></td>
                                                        <td class="col-5 d-flex align-itemd-center">
                                                            <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                                href="<?php echo e(url($value->file)); ?>" download>
                                                                <?php echo app('translator')->get('common.download'); ?>
                                                                <span class="pl ti-download"></span>
                                                            </a>
                                                            <a class="primary-btn icon-only fix-gr-bg modalLink ml-2"
                                                                title="<?php echo e(__('hr.delete_document')); ?>"
                                                                data-modal-size="modal-md"
                                                                href="<?php echo e(route('delete-staff-document-view', $value->student_staff_id)); ?>">
                                                                <span class="ti-trash pt-30"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Documents Tab -->
    
                            
                            <div role="tabpanel" class="tab-pane fade <?php echo e(Session::get('staffTimeline') == 'active' ? 'show active' : ''); ?>" id="staffTimeline">
                                    <div>
                                        <div class="text-right mb-20">
                                            <button type="button" data-toggle="modal"
                                                data-target="#add_timeline_madal"
                                                class="primary-btn tr-bg text-uppercase bord-rad">
                                                <?php echo app('translator')->get('common.add'); ?>
                                                <span class="pl ti-plus"></span>
                                            </button>
                                        </div>
                                        <?php if(isset($timelines)): ?>
                                            <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="student-activities">
                                                    <div class="single-activity">
                                                        <h4 class="title text-uppercase">
                                                            <?php echo e($timeline->date != '' ? dateConvert($timeline->date) : ''); ?>

                                                        </h4>
                                                        <div class="sub-activity-box d-flex">
                                                            <h6 class="time text-uppercase">
                                                                <?php echo e(date('h:i a', strtotime($timeline->created_at))); ?>

                                                            </h6>
                                                            <div class="sub-activity">
                                                                <h5 class="subtitle text-uppercase">
                                                                    <?php echo e($timeline->title); ?></h5>
                                                                <p>
                                                                    <?php echo e($timeline->description); ?>

                                                                </p>
                                                            </div>
                                                            <div class="close-activity">
                                                                <a class="primary-btn icon-only fix-gr-bg modalLink"
                                                                    title="<?php echo e(__('hr.delete_timeline')); ?>"
                                                                    data-modal-size="modal-md"
                                                                    href="<?php echo e(route('delete-staff-timeline-view', $timeline->id)); ?>">
                                                                    <span class="ti-trash"></span>
                                                                </a>
                                                                <?php if($timeline->file != ''): ?>
                                                                    <a href="<?php echo e(url($timeline->file)); ?>"
                                                                        class="primary-btn tr-bg text-uppercase bord-rad"
                                                                        download>
                                                                        <?php echo app('translator')->get('common.download'); ?>
                                                                        <span
                                                                            class="pl ti-download"></span>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
    
                            
                            <div class="modal fade admin-query" id="delete-staff-doc">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
    
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                            </div>
    
                                            <div class="mt-40 d-flex justify-content-between">
                                                <form action="<?php echo e(route('staff-document-delete')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="staff_id">
                                                    <input type="hidden" name="doc_id">
                                                    <button type="button" class="primary-btn tr-bg"
                                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                    <button type="submit"
                                                        class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></button>
    
                                                </form>
    
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            
    
                            <!-- Add Document modal form start-->
                            <div class="modal fade admin-query" id="add_document_madal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('hr.upload_document'); ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <?php echo e(Form::open([
                                                    'class' => 'form-horizontal',
                                                    'files' => true,
                                                    'route' => 'save_upload_document',
                                                    'method' => 'POST',
                                                    'enctype' => 'multipart/form-data',
                                                    'name' => 'document_upload',
                                                ])); ?>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="hidden" name="staff_id"
                                                            value="<?php echo e($staffDetails->id); ?>">
                                                        <div class="row mt-25">
                                                            <div class="col-lg-12">
                                                                <div class="primary_input">
                                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('hr.title'); ?> <span class="text-danger"> *</span> </label>
                                                                    <input class="primary_input_field form-control" type="text" name="title" id="title" required>
                                                                    <span class="text-danger" role="alert" id="amount_error">
                                                                    </span>
                                                                </div>
                                                                
                                                                    <div class="row no-gutters input-right-icon mt-40">
                                                                        <div class="col">
                                                                            <div class="primary_input">
                                                                                <input class="primary_input_field" id="placeholderInput" type="text" placeholder="<?php echo app('translator')->get('hr.new_document'); ?>*" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <button class="primary-btn-small-input" type="button">
                                                                                <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo app('translator')->get('common.browse'); ?></label>
                                                                                <input type="file" class="d-none" id="browseFile" name="staff_upload_document" required>
                                                                            </button>
                                                                        </div>
                                                                    </div>
    
                                                                <div class="col-lg-12 text-center mt-40">
                                                                    <div class="mt-40 d-flex justify-content-between">
                                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                                        <button class="primary-btn fix-gr-bg submit" type="submit"><?php echo app('translator')->get('common.save'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Document modal form end-->
                            
                            <!-- timeline form modal start-->
                            <div class="modal fade admin-query" id="add_timeline_madal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo app('translator')->get('common.add_timeline'); ?></h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
    
                                                <?php echo e(Form::open([
                                                    'class' => 'form-horizontal',
                                                    'files' => true,
                                                    'route' => 'staff_timeline_store',
                                                    'method' => 'POST',
                                                    'enctype' => 'multipart/form-data',
                                                    'name' => 'document_upload',
                                                ])); ?>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="hidden" name="staff_student_id"
                                                            value="<?php echo e($staffDetails->id); ?>">
                                                        <div class="row mt-25">
                                                            <div class="col-lg-12">
                                                                <div class="primary_input">
                                                                    <label class="primary_input_label"
                                                                        for=""><?php echo app('translator')->get('common.title'); ?> <span
                                                                            class="text-danger"> *</span>
                                                                    </label>
                                                                    <input
                                                                        class="primary_input_field form-control{"
                                                                        type="text" name="title"
                                                                        value=""
                                                                        id="title" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-30">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="primary_input">                                                          
                                                                <label class="primary_input_label"
                                                                    for=""><?php echo app('translator')->get('common.date'); ?> <span
                                                                        class="text-danger"> *</span>
                                                                </label>
                                                                <div class="position-relative">
                                                                    <input
                                                                        class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>"
                                                                        id="startDate" type="text"
                                                                        name="date" autocomplete="off"
                                                                        value="<?php echo e(date('m/d/Y')); ?>" required>
                                                                    <label for="startDate" class="primary_input-icon pr-2">
                                                                        <i class="ti-calendar"
                                                                        id="admission-date-icon"></i>
                                                                    </label>
                                                                </div>
                                                                <?php if($errors->has('date_of_birth')): ?>
                                                                    <span class="text-danger">
                                                                        <?php echo e($errors->first('date_of_birth')); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-30">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for=""><?php echo app('translator')->get('common.description'); ?> <span
                                                                    class="text-danger"> *</span> </label>
                                                            <textarea class="primary_input_field form-control" cols="0" rows="3" name="description"
                                                                id="Description" required></textarea>
    
                                                        </div>
                                                    </div>
    
                                                    <div class="col-lg-12 mt-30">
                                                        <div class="d-flex justify-content-between">
                                                            <button class="primary-btn tr-bg" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="primary-btn fix-gr-bg submit" type="submit">Save</button>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Timeline Tab -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deleteStaffDoc(id, doc) {
            var modal = $('#delete-staff-doc');
            modal.find('input[name=staff_id]').val(id)
            modal.find('input[name=doc_id]').val(doc)
            modal.modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/humanResource/viewStaff.blade.php ENDPATH**/ ?>