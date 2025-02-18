
<?php $__env->startSection('title'); ?>
    <?php echo e(@Auth::user()->roles->name); ?> <?php echo app('translator')->get('common.dashboard'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/css/fullcalendar.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/calender_js/core/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/calender_js/daygrid/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/calender_js/timegrid/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/calender_js/list/main.css')); ?>" />
    <style>
        .ti-calendar:before {
            position: absolute;
            bottom: 17px !important;
            right: 18px !important;
        }

        .fc-icon-chevron-left::before {
            content: "";
        }

        .fc-icon-chevron-right::before {
            content: "";
        }

        .fc-button {
            width: auto;
        }
        .white-box.single-summery{
            margin-top: 0px
        }
        @media (max-width: 1399px){
            .chart_grid.chart_container {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 40px
            }
        }
        @media (min-width: 1400px){
            .chart_grid.chart_container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 30px
            }
        }
        .chart_container h1{
            font-size: 14px
        }
        .chart_container p{
            font-size: 13px
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('mainContent'); ?>
    <section class="mb-40">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <?php if(isSubscriptionEnabled() && auth()->user()->role_id == 1 && saasDomain() != 'school'): ?>
                                <h3 class="mb-15"><?php echo app('translator')->get('dashboard.welcome'); ?> - <?php echo e(@Auth::user()->school->school_name); ?> |
                                    <?php echo e(@Auth::user()->roles->name); ?> |
                                    <?php echo app('translator')->get('dashboard.active_package'); ?> : <?php echo e(@$package_info['package_name']); ?> |
                                    <?php echo app('translator')->get('dashboard.remain_days'); ?> : <?php echo e(@$package_info['remaining_days']); ?> |
                                    <?php echo app('translator')->get('dashboard.student'); ?> : <?php echo e(@$totalStudents); ?> out <?php echo e(@$package_info['student_quantity']); ?> |
                                    <?php echo app('translator')->get('common.staff'); ?> : <?php echo e(@$totalStaffs); ?> out <?php echo e(@$package_info['staff_quantity']); ?>

                                </h3>
                            <?php else: ?>
                                <h3 class="mb-15"><?php echo app('translator')->get('dashboard.welcome'); ?> - <?php echo e(@Auth::user()->school->school_name); ?> |
                                    <?php echo e(@Auth::user()->roles->name); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
    
                <?php if(Auth::user()->is_saas == 0): ?>
                    <div class="row row-gap-24">
                        <?php if(userPermission('number-of-student')): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="<?php echo e(route('student_list')); ?>" class="d-block">
                                    <div class="white-box single-summery cyan">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('dashboard.student'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_students'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalStudents)): ?>
                                                    <?php echo e($totalStudents); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(userPermission('number-of-teacher')): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="<?php echo e(route('staff_directory')); ?>" class="d-block">
                                    <div class="white-box single-summery violet">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('common.teachers'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_teachers'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalTeachers)): ?>
                                                    <?php echo e($totalTeachers); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(userPermission('number-of-parent')): ?>
                            
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="#" class="d-block">
                                    <div class="white-box single-summery blue">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('dashboard.parents'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_parents'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalParents)): ?>
                                                    <?php echo e($totalParents); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(userPermission('number-of-staff')): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="<?php echo e(route('staff_directory')); ?>" class="d-block">
                                    <div class="white-box single-summery fuchsia">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('dashboard.staffs'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_staffs'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalStaffs)): ?>
                                                    <?php echo e($totalStaffs); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
    
                <?php if(Auth::user()->is_saas == 1): ?>
    
                    <div class="row">
                        <?php if(userPermission('number-of-student')): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="#" class="d-block">
                                    <div class="white-box single-summery">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('dashboard.student'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_students'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
    
                                                <?php if(isset($totalStudents)): ?>
                                                    <?php echo e($totalStudents); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(userPermission('number-of-teacher')): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="#" class="d-block">
                                    <div class="white-box single-summery">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('common.teachers'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_teachers'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalTeachers)): ?>
                                                    <?php echo e($totalTeachers); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(userPermission('number-of-parent')): ?>
                            
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="#" class="d-block">
                                    <div class="white-box single-summery">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('dashboard.parents'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_parents'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalParents)): ?>
                                                    <?php echo e($totalParents); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(userPermission('number-of-staff')): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="#" class="d-block">
                                    <div class="white-box single-summery">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h3><?php echo app('translator')->get('dashboard.staffs'); ?></h3>
                                                <p class="mb-0"><?php echo app('translator')->get('dashboard.total_staffs'); ?></p>
                                            </div>
                                            <h1 class="gradient-color2">
                                                <?php if(isset($totalStaffs)): ?>
                                                    <?php echo e($totalStaffs); ?>

                                                <?php endif; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <div class="chart_grid chart_container">

        <?php if(userPermission('month-income-expense')): ?>
        <section class="" id="incomeExpenseDiv">
            <div class="container-fluid p-0">
                <div class="white-box">
                    <div class="row justify-content-between">
                        <div class="col-lg-8 col-md-9 col-8">
                            <div class="main-title">
                                <h3 class="mb-0"> <?php echo app('translator')->get('dashboard.income_and_expenses_for'); ?> <?php echo e(date('M')); ?> <?php echo e($year); ?> </h3>
                            </div>
                        </div>
                        <div class="col-lg-4 text-right col-md-3 col-4 nowrap">
                            <button type="button" class="primary-btn small tr-bg icon-only  dashboard_collapse"
                                id="barChartBtn">
                                <span class="pr ti-angle-down"></span>
                            </button>

                            <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10"
                                id="barChartBtnRemovetn">
                                <span class="pr ti-close"></span>
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <div id="barChartDiv" class="mt-15">
                                <div class="row padding4 row-gap-24">
                                    <div class="col-lg-2 col-md-6 col-6">
                                        <div class="text-center">

                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($m_total_income)); ?>

                                            </h1>
                                            <p><?php echo app('translator')->get('dashboard.total_income'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($m_total_expense)); ?></h1>
                                            <p><?php echo app('translator')->get('dashboard.total_expenses'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($m_total_income - $m_total_expense)); ?></h1>
                                            <p><?php echo app('translator')->get('dashboard.total_profit'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($m_total_income)); ?>

                                            </h1>
                                            <p><?php echo app('translator')->get('dashboard.total_revenue'); ?></p>
                                        </div>
                                    </div>
                                    <?php if(moduleStatusCheck('Wallet')): ?>
                                        <div class="col-lg-2 col-md-6 col-6">
                                            <div class="text-center">
                                                <h1><?php echo e(currency_format($monthlyWalletBalance)); ?></h1>
                                                <p><?php echo app('translator')->get('dashboard.wallet_balance'); ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-lg-12">
                                        <div id="commonBarChart" style="height: 350px; padding-right: 20px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if(userPermission('year-income-expense')): ?>
        <section id="incomeExpenseSessionDiv">
            <div class="container-fluid p-0">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-9 col-8">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('dashboard.income_and_expenses_for'); ?> <?php echo e($year); ?></h3>
                            </div>
                        </div>
                        <div class="col-lg-4 text-right col-md-3 col-4 nowrap">
                            <button type="button" class="primary-btn small tr-bg icon-only dashboard_collapse"
                                id="areaChartBtn">
                                <span class="pr ti-angle-down"></span>
                            </button>

                            <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10"
                                id="areaChartBtnRemovetn">
                                <span class="pr ti-close"></span>
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <div id="areaChartDiv" class="mt-15">
                                <div class="row padding4 row-gap-24">
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($y_total_income)); ?>

                                            </h1>
                                            <p><?php echo app('translator')->get('dashboard.total_income'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="text-center">

                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($y_total_expense)); ?></h1>
                                            <p><?php echo app('translator')->get('dashboard.total_expenses'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($y_total_income - $y_total_expense)); ?></h1>
                                            <p><?php echo app('translator')->get('dashboard.total_profit'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                <?php echo e(number_format($y_total_income)); ?>

                                            </h1>
                                            <p><?php echo app('translator')->get('dashboard.total_revenue'); ?></p>
                                        </div>
                                    </div>
                                    <?php if(moduleStatusCheck('Wallet')): ?>
                                        <div class="col-lg-2 col-md-6 col-6">
                                            <div class="text-center">
                                                <h1><?php echo e(currency_format($yearlyWalletBalance)); ?></h1>
                                                <p><?php echo app('translator')->get('dashboard.wallet_balance'); ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-lg-12">
                                        <div id="commonAreaChart" style="height: 350px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    </div>


    <?php if(userPermission('notice-board')): ?>
        <section class="mt-40">
            <div class="container-fluid p-0">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('communicate.notice_board'); ?></h3>
                            </div>
                        </div>
                        <?php if(userPermission('add-notice')): ?>
                            <div class="col-lg-6 col-5 ml-auto pull-right text-right text-nowrap">
                                <a href="<?php echo e(route('add-notice')); ?>" class="primary-btn small fix-gr-bg"> <span
                                        class="ti-plus pr-2"></span> <?php echo app('translator')->get('common.add'); ?> </a>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-12">
                            <table class="school-table-style w-100">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('common.date'); ?></th>
                                        <th><?php echo app('translator')->get('dashboard.title'); ?></th>
                                        <th class="d-flex justify-content-around"><?php echo app('translator')->get('common.actions'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $role_id = Auth()->user()->role_id; ?>

                                    <?php if (isset($notices)) {
    
                                foreach ($notices as $notice) {
                                // $inform_to = explode(',', @$notice->inform_to);
                                // if (in_array($role_id, $inform_to)) {
                                ?>
                                    <tr>
                                        <td>

                                            <?php echo e(@$notice->publish_on != '' ? dateConvert(@$notice->publish_on) : ''); ?>


                                        </td>
                                        <td><?php echo e(@$notice->notice_title); ?></td>
                                        <td class="d-flex justify-content-around">
                                            <a href="<?php echo e(route('view-notice', @$notice->id)); ?>" title="<?php echo app('translator')->get('common.view_notice'); ?>"
                                                class="primary-btn small tr-bg modalLink" data-modal-size="modal-lg"><span
                                                    class="ti-eye"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                // }
                                }
                                }
    
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="mt-40">
        <div class="container-fluid p-0">
            <div class="row">
                <?php if(userPermission('calender-section')): ?>
                    <div class="col-lg-7 col-xl-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $__env->make('backEnd.communicate.commonAcademicCalendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-5 col-xl-4 mt-50-md md_infix_50">
                    <div class="modal fade admin-query" id="add_to_do">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo app('translator')->get('dashboard.add_to_do'); ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <?php echo e(Form::open([
                                            'class' => 'form-horizontal',
                                            'files' => true,
                                            'route' => 'saveToDoData',
                                            'method' => 'POST',
                                            'enctype' => 'multipart/form-data',
                                            'onsubmit' => 'return validateToDoForm()',
                                        ])); ?>


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row mt-25">
                                                    <div class="col-lg-12" id="sibling_class_div">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for=""><?php echo app('translator')->get('dashboard.to_do_title'); ?> *<span></span>
                                                            </label>
                                                            <input class="primary_input_field form-control" type="text"
                                                                name="todo_title" id="todo_title">

                                                            <span class="modal_input_validation red_alert"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-30">
                                                    <div class="col-lg-12" id="">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="primary_input">
                                                                    <label class="primary_input_label"
                                                                        for=""><?php echo app('translator')->get('common.date'); ?> <span></span>
                                                                    </label>
                                                                    <input
                                                                        class="read-only-input primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>"
                                                                        id="startDate" type="text" autocomplete="off"
                                                                        readonly="true" name="date"
                                                                        value="<?php echo e(date('m/d/Y')); ?>"><i
                                                                        class="ti-calendar" id="start-date-icon"></i>
                                                                    <?php if($errors->has('date')): ?>
                                                                        <span class="text-danger">
                                                                            <?php echo e($errors->first('date')); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 text-center">
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <input class="primary-btn fix-gr-bg submit" type="submit"
                                                            value="<?php echo app('translator')->get('common.save'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box school-table">
                                <?php if(userPermission('to-do-list')): ?>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <div class="main-title">
                                                <h3 class="mb-15"><?php echo app('translator')->get('dashboard.to_do_list'); ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-right col-md-6 col-6">
                                            <a href="#" data-toggle="modal" class="primary-btn small fix-gr-bg"
                                                data-target="#add_to_do" title="Add To Do" data-modal-size="modal-md">
                                                <span class="ti-plus pr-2"></span>
                                                <?php echo app('translator')->get('common.add'); ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row to-do-list mb-20">
                                    <div class="col-md-12 d-flex align-items-center justify-content-between ">
                                        <button class="primary-btn small fix-gr-bg"
                                            id="toDoList"><?php echo app('translator')->get('dashboard.incomplete'); ?></button>
                                        <button class="primary-btn small tr-bg"
                                            id="toDoListsCompleted"><?php echo app('translator')->get('dashboard.completed'); ?></button>
                                    </div>
                                </div>
                                <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
                                <div class="toDoList">
                                    <?php if(count(@$toDos->where('complete_status', 'P')) > 0): ?>
                                        <?php $__currentLoopData = $toDos->where('complete_status', 'P'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toDoList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-to-do d-flex justify-content-between toDoList"
                                                id="to_do_list_div<?php echo e(@$toDoList->id); ?>">
                                                <div>
                                                    <input type="checkbox" id="midterm<?php echo e(@$toDoList->id); ?>"
                                                        class="common-checkbox complete_task" name="complete_task"
                                                        value="<?php echo e(@$toDoList->id); ?>">

                                                    <label for="midterm<?php echo e(@$toDoList->id); ?>">
                                                        <input type="hidden" id="id"
                                                            value="<?php echo e(@$toDoList->id); ?>">
                                                        <input type="hidden" id="url"
                                                            value="<?php echo e(url('/')); ?>">
                                                        <h5 class="d-inline"><?php echo e(@$toDoList->todo_title); ?></h5>
                                                        <p>
                                                            <?php echo e($toDoList->date != '' ? dateConvert(@$toDoList->date) : ''); ?>


                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="single-to-do d-flex justify-content-between">
                                            <?php echo app('translator')->get('dashboard.no_do_lists_assigned_yet'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>


                                <div class="toDoListsCompleted">
                                    <?php if(count(@$toDos->where('complete_status', 'C')) > 0): ?>
                                        <?php $__currentLoopData = $toDos->where('complete_status', 'C'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toDoListsCompleted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-to-do d-flex justify-content-between"
                                                id="to_do_list_div<?php echo e(@$toDoListsCompleted->id); ?>">
                                                <div>
                                                    <h5 class="d-inline"><?php echo e(@$toDoListsCompleted->todo_title); ?></h5>
                                                    <p class="">

                                                        <?php echo e(@$toDoListsCompleted->date != '' ? dateConvert(@$toDoListsCompleted->date) : ''); ?>


                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="single-to-do d-flex justify-content-between">
                                            <?php echo app('translator')->get('dashboard.no_do_lists_assigned_yet'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span> <span class="sr-only"><?php echo app('translator')->get('common.close'); ?></span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="There are no image" id="image" class="" height="150"
                        width="auto">
                    <div id="modalBody"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                </div>
            </div>
        </div>
    </div>



    

    

    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.communicate.academic_calendar_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/fullcalendar.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/vendors/js/fullcalendar-locale-all.js')); ?>"></script>

    <script type="text/javascript">
        function barChart(idName) {
            window.barChart = Morris.Bar({
                element: 'commonBarChart',
                data: [<?php echo $chart_data; ?>],
                xkey: 'day',
                ykeys: ['income', 'expense'],
                labels: [jsLang('income'), jsLang('expense')],
                barColors: ['#8a33f8', '#f25278'],
                resize: true,
                redraw: true,
                gridTextColor: 'var(--base_color)',
                gridTextSize: 12,
                gridTextFamily: '"Poppins", sans-serif',
                barGap: 4,
                barSizeRatio: 0.3
            });
        }

        const monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        function areaChart() {
            window.areaChart = Morris.Area({
                element: 'commonAreaChart',
                data: [<?php echo $chart_data_yearly; ?>],
                xkey: 'y',
                parseTime: false,
                ykeys: ['income', 'expense'],
                labels: [jsLang('income'), jsLang('expense')],
                xLabelFormat: function(x) {
                    var index = parseInt(x.src.y);
                    return monthNames[index];
                },
                xLabels: "month",
                labels: [jsLang('income'), jsLang('expense')],
                hideHover: 'auto',
                lineColors: ['rgba(124, 50, 255, 0.5)', 'rgba(242, 82, 120, 0.5)'],
            });
        }
    </script>

    <script type="text/javascript">
        if ($('.common-calendar').length) {
            $('.common-calendar').fullCalendar({
                locale: _locale,
                rtl: _rtl,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventClick: function(event, jsEvent, view) {
                    console.log(event);
                    $('#modalTitle').html(event.title);
                    let url = event.url;
                    let description = event.description;
                    if (!url) {
                        $('#image').addClass('d-none');
                    }
                    if (url.includes('lead')) {
                        $('#image').addClass('d-none');
                        $('#modalBody').html(event.description);
                    } else {
                        $('#image').attr('src', event.url);
                    }
                    $('#fullCalModal').modal();
                    return false;
                },
                height: 650,
                events: <?php echo json_encode($calendar_events); ?>,
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/dashboard.blade.php ENDPATH**/ ?>