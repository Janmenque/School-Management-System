
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.my_profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            .student-details .nav-tabs {
                margin-left: 10px;
            }

            /* #studentOnlineExam table.dataTable thead .sorting:after,
            #studentOnlineExam table.dataTable thead .sorting_asc:after,
            #leaves table.dataTable thead .sorting:after,
            #leaves table.dataTable thead .sorting_asc:after {
                top: 10px !important;
                left: 4px !important;
            }

            #studentOnlineExam table.dataTable thead .sorting_desc:after,
            #leaves table.dataTable thead .sorting_desc:after {
                top: 10px !important;
                left: 4px !important;
            } */

            .input-right-icon button.primary-btn-small-input {
                top: 8px !important;
                right: 12px !important;
            }

            div#table_id_wrapper {
                margin-top: 50px;
            }

            table.dataTable thead th {
                padding-left: 18px !important;
            }


            @media (max-width: 767px) {
                .dataTables_filter label {
                    top: -25px !important;
                    width: 50%;
                    left: 30% !important;
                }
            }

            @media screen and (max-width: 640px) {

                .dataTables_filter label {
                    left: 50% !important;
                }

                div.dt-buttons {
                    display: none;
                }

                .dataTables_filter label {
                    top: -60px !important;
                    width: 100%;
                    float: right;
                }

                .main-title {
                    margin-bottom: 40px
                }
            }

            .check_box_table .QA_table .table tbody td:first-child {
                padding-left: 35px !important;
                padding-right: 24px !important;
            }

            /* #table_id.table.dataTable thead .sorting_asc:first-child::after,
            #table_id.table.dataTable thead .sorting_desc:first-child::after,
            #table_id.table.dataTable thead .sorting:first-child::after {
                left: 4px !important;
                top: 10px !important;
            } */
            .simple-table thead tr th{
                white-space: nowrap;
            }

            div#studentOnlineExam table.dataTable .sorting_asc:after{
                left: 4px!important;
                top: 10px;
            }

            div#studentOnlineExam table.dataTable .sorting:after{
                left: 4px!important;
                top: 10px;
            }

            div#studentOnlineExam table.dataTable .sorting_desc:after{
                left: 4px!important;
                top: 10px;
            }
            .linkopenmodal{
                font-size: 12px!important;
                padding: 2px 6px!important;
            }
            table thead tr th{
                white-space: nowrap;
            }
            table tbody tr td:first-child{
                padding-left: 22px!important;
            }
        </style>
        <?php if(moduleStatusCheck('University')): ?>
            <style>
                .school-table-up-style tr td {
                    padding: 8px 6px 8px 0px !important;
                    font-size: 14px !important;
                }

                .school-table-style {
                    padding: 0px !important;
                }
            </style>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>
    <?php
        $setting = app('school_info');
        if (!empty($setting->currency_symbol)) {
            $currency = $setting->currency_symbol;
        } else {
            $currency = '$';
        }
    ?>

    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3 mb-30">
                    <!-- Start Student Meta Information -->
                    <?php if(moduleStatusCheck('University')): ?>
                        <?php if ($__env->exists('university::promote.inc.student_profile', [
                            'student_detail' => $student_detail->defaultClass,
                            'setting' => null,
                            'student' => $student_detail,
                        ])) echo $__env->make('university::promote.inc.student_profile', [
                            'student_detail' => $student_detail->defaultClass,
                            'setting' => null,
                            'student' => $student_detail,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php if ($__env->exists('backEnd.studentInformation.inc.student_profile')) echo $__env->make('backEnd.studentInformation.inc.student_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <!-- End Siblings Meta Information -->
                </div>

                <!-- Start Student Details -->
                <div class="col-lg-9">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav mb-10" role="tablist">
                            <?php if(userPermission('student-profile.profile')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(Session::get('studentDocuments') != 'active' && Session::get('studentTimeline') != 'active'): ?> active <?php endif; ?>" href="#studentProfile"
                                        role="tab" data-toggle="tab"> <?php echo app('translator')->get('student.profile'); ?> </a>
                                </li>
                            <?php endif; ?>
                            <?php if(generalSetting()->fees_status == 0): ?>
                                <?php if(userPermission('student-profile.fees')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#studentFees" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('fees.fees'); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(userPermission('student-apply-leave')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#leaves" role="tab" data-toggle="tab"><?php echo app('translator')->get('leave.leave'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(userPermission('student-profile.exam')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#studentExam" role="tab"
                                        data-toggle="tab"><?php echo app('translator')->get('exam.exam'); ?></a>
                                </li>
                            <?php endif; ?>
    
                            <?php if(moduleStatusCheck('University')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#studentPanelExamTranscript" role="tab"
                                        data-toggle="tab"><?php echo app('translator')->get('university::un.transcript'); ?></a>
                                </li>
                            <?php endif; ?>
    
                            <li class="nav-item">
                                <a class="nav-link" href="#studentOnlineExam" role="tab"
                                    data-toggle="tab"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                            </li>
                            <?php if(userPermission('student-profile.document')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Session::get('studentDocuments') == 'active' ? 'active' : ''); ?>"
                                        href="#studentDocuments" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.documents'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(userPermission('studentTimeline')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Session::get('studentTimeline') == 'active' ? 'active' : ''); ?> "
                                        href="#studentTimeline" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.record'); ?></a>
                                </li>
                            <?php endif; ?>
    
                            <?php if(userPermission('studentTimeline') && moduleStatusCheck('University')): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(Session::get('chooseSubject') == 'active' ? 'active' : ''); ?> "
                                        href="#chooseSubject" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.subject'); ?></a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('studentAttendance') == 'active' ? 'active' : ''); ?> "
                                    href="#studentAttendance" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.my_attendance'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Session::get('subjectAttendance') == 'active' ? 'active' : ''); ?> "
                                    href="#subjectAttendance" role="tab" data-toggle="tab"><?php echo app('translator')->get('student.subject_attendance'); ?></a>
                            </li>
                            <?php if(moduleStatusCheck('Wallet')): ?>
                                <?php if(userPermission('wallet.my-wallet')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(Session::get('studentWallet') == 'active' ? 'active' : ''); ?> "
                                            href="#studentWallet" role="tab" data-toggle="tab"> <?php echo app('translator')->get('wallet::wallet.wallet'); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(moduleStatusCheck('BehaviourRecords')): ?>
                                <?php if($behaviourRecordSetting->student_view == 1): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(Session::get('studentBehaviourRecord') == 'active' ? 'active' : ''); ?> "
                                            href="#studentBehaviourRecord" role="tab"
                                            data-toggle="tab"><?php echo app('translator')->get('student.behaviour_record'); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
    
                            <?php if(userPermission('update-my-profile')): ?>
                                <li class="nav-item edit-button">
                                    <a href="<?php echo e(route('update-my-profile', $student_detail->id)); ?>"
                                        class="primary-btn small fix-gr-bg pull-right"><?php echo app('translator')->get('common.edit'); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
    
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Start Profile Tab -->
                            <div role="tabpanel" class="tab-pane fade <?php if(Session::get('studentDocuments') != 'active' && Session::get('studentTimeline') != 'active'): ?> show active <?php endif; ?>"
                                id="studentProfile">
                                <div>
                                    <h4 class="stu-sub-head"><?php echo app('translator')->get('student.personal_info'); ?></h4>
                                    <?php if(is_show('admission_date')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.admission_date'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->admission_date != '' ? dateConvert(@$student_detail->admission_date) : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
    
                                    <?php if(is_show('date_of_birth')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('common.date_of_birth'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->date_of_birth != '' ? dateConvert(@$student_detail->date_of_birth) : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
    
                                    <?php if(is_show('student_category_id')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('common.type'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->category != '' ? @$student_detail->category->catgeory_name : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('religion')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.religion'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->religion != '' ? @$student_detail->religion->base_setup_name : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
    
                                    <?php if(is_show('phone_number')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('common.phone_number'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->mobile); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('email_address')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('common.email_address'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->email); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if(moduleStatusCheck('Lead') == true): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('lead::lead.city'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->leadCity->city_name); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('lead::lead.source'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->source->source_name); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if(is_show('current_address')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.present_address'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->current_address); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('permanent_address')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.permanent_address'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->permanent_address); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
    
                                    <!-- Start Parent Part -->
                                    <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('student.parent_/_guardian_details'); ?></h4>
                                    <div class="d-flex">
                                        <?php if(is_show('fathers_photo')): ?>
                                            <div class="mt-20">
                                                <img class="student-meta-img img-100"
                                                    src="<?php echo e(@$student_detail->parents != '' ? asset(@$student_detail->parents->fathers_photo) : ''); ?>"
                                                    alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="w-100">
                                            <?php if(is_show('fathers_name')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('student.father_name'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->fathers_name : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(is_show('fathers_occupation')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('student.occupation'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->fathers_occupation : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
    
                                            <?php if(is_show('fathers_phone')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('common.phone_number'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->fathers_mobile : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
    
                                    <div class="d-flex">
                                        <?php if(is_show('mothers_photo')): ?>
                                            <div class="mt-20">
                                                <img class="student-meta-img img-100"
                                                    src="<?php echo e(@$student_detail->parents != '' ? asset(@$student_detail->parents->mothers_photo) : ''); ?>"
                                                    alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="w-100">
                                            <div class="single-info">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="">
                                                            <?php echo app('translator')->get('student.mother_name'); ?>
                                                        </div>
                                                    </div>
                                                    <?php if(is_show('mothers_name')): ?>
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->mothers_name : ''); ?>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
    
                                            <div class="single-info">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="">
                                                            <?php echo app('translator')->get('student.occupation'); ?>
                                                        </div>
                                                    </div>
                                                    <?php if(is_show('mothers_occupation')): ?>
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->mothers_occupation : ''); ?>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php if(is_show('mothers_phone')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('common.phone_number'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->mothers_mobile : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
    
                                    <div class="d-flex">
                                        <?php if(is_show('guardians_photo')): ?>
                                            <div class="mt-20">
                                                <img class="student-meta-img img-100"
                                                    src="<?php echo e(@$student_detail->parents != '' ? asset(@$student_detail->parents->guardians_photo) : ''); ?>"
                                                    alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="w-100">
                                            <?php if(is_show('guardians_name')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('student.guardian_name'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->guardians_name : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
    
                                            <?php if(is_show('guardians_email')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('common.email_address'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->guardians_email : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(is_show('guardians_phone')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('common.phone_number'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->guardians_mobile : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
    
                                            <div class="single-info">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="">
                                                            <?php echo app('translator')->get('student.relation_with_guardian'); ?>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-lg-8 col-md-7">
                                                        <div class="">
                                                            <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->guardians_relation : ''); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if(is_show('guardians_occupation')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('student.occupation'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->guardians_occupation : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(is_show('guardians_address')): ?>
                                                <div class="single-info">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="">
                                                                <?php echo app('translator')->get('student.guardian_address'); ?>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="">
                                                                <?php echo e(@$student_detail->parents != '' ? @$student_detail->parents->guardians_address : ''); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End Parent Part -->
    
                                    <!-- Start Transport Part -->
                                    <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('student.transport_and_dormitory_details'); ?></h4>
                                    <?php if(is_show('route')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('common.route'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->route != '' ? @$student_detail->route->title : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('vehicle')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('transport.vehicle_number'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->vehicle != '' ? @$student_detail->vehicle->vehicle_no : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('transport.driver_name'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php echo e(@$student_detail->vehicle != '' ? @$driver->full_name : ''); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="single-info">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <div class="">
                                                    <?php echo app('translator')->get('transport.driver_phone_number'); ?>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-7 col-md-6">
                                                <div class="">
                                                    <?php echo e(@$student_detail->vehicle != '' ? @$driver->mobile : ''); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(is_show('dormitory_name')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('dormitory.dormitory_name'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->dormitory != '' ? @$student_detail->dormitory->dormitory_name : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- End Transport Part -->
    
                                    <!-- Start Other Information Part -->
                                    <h4 class="stu-sub-head mt-40"><?php echo app('translator')->get('student.information_other'); ?></h4>
                                    <?php if(is_show('blood_group')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.blood_group'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(@$student_detail->bloodGroup != '' ? @$student_detail->bloodGroup->base_setup_name : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('height')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.height'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->height) ? @$student_detail->height : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('weight')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.weight'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->weight) ? @$student_detail->weight : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('previous_school_details')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.previous_school_details'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->previous_school_details) ? @$student_detail->previous_school_details : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('national_id_number')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.national_identification_number'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->national_id_no) ? @$student_detail->national_id_no : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('local_id_number')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.local_identification_number'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->local_id_no) ? @$student_detail->local_id_no : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('bank_account_number')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('accounts.bank_account_number'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->bank_account_no) ? @$student_detail->bank_account_no : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('bank_name')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('accounts.bank_name'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->bank_name) ? @$student_detail->bank_name : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('ifsc_code')): ?>
                                        <div class="single-info">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="">
                                                        <?php echo app('translator')->get('student.ifsc_code'); ?>
                                                    </div>
                                                </div>
    
                                                <div class="col-lg-7 col-md-6">
                                                    <div class="">
                                                        <?php echo e(isset($student_detail->ifsc_code) ? @$student_detail->ifsc_code : ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_show('custom_field')): ?>
                                        
                                        <?php echo $__env->make('backEnd.customField._coutom_field_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        
                                    <?php endif; ?>
                                    <!-- End Other Information Part -->
                                </div>
                            </div>
                            <!-- End Profile Tab -->
    
                            <!-- Start Fees Tab -->
                            <div role="tabpanel" class="tab-pane fade" id="studentFees">
                                <div class="table-responsive">
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="no-search no-paginate no-table-info mb-2">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="main-title">
                                                        <?php if(moduleStatusCheck('University')): ?>
                                                            <h3 class="mb-10"><?php echo e(@$record->name); ?>

                                                                (<?php echo e(@$record->unDepartment->name); ?> -
                                                                <?php echo e(@$record->unSection->section_name); ?>)
                                                            </h3>
                                                        <?php else: ?>
                                                            <h3 class="mb-10"><?php echo e($record->class->class_name); ?>

                                                                (<?php echo e($record->section->section_name); ?>)</h3>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
    
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <div class="col-lg-8 mb-10">
                                                        <table class="table school-table-style res_scrol school-table-up-style"
                                                            cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('fees.fees_type'); ?></th>
                                                                    <th><?php echo app('translator')->get('fees.assigned_date'); ?></th>
                                                                    <th><?php echo app('translator')->get('fees.amount'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <?php $gt_fees = 0; ?>
                                                            <tbody>
                                                                <?php $__currentLoopData = $record->fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_fees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php $gt_fees += $assign_fees->fees_amount; ?>
                                                                    <tr>
                                                                        <td><?php echo e(@$assign_fees->feesGroupMaster->feesTypes->name); ?>

                                                                        </td>
                                                                        <td><?php echo e(dateConvert($assign_fees->created_at)); ?></td>
                                                                        <td> <?php echo e(currency_format($assign_fees->fees_amount)); ?>

                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <tfoot>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('fees.grand_total'); ?>
                                                                        (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                                                    <th></th>
                                                                    <th> <?php echo e(currency_format($gt_fees)); ?></th>
                                                                </tr>
                                                            </tfoot>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php if ($__env->exists('university::include.studentPanelFeesPay')) echo $__env->make('university::include.studentPanelFeesPay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php elseif(directFees()): ?>
                                                <?php if ($__env->exists('backEnd.feesCollection.directFees.studentDirectFeesPay')) echo $__env->make('backEnd.feesCollection.directFees.studentDirectFeesPay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <table class="table school-table-style" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo app('translator')->get('fees.fees_group'); ?></th>
                                                            <th><?php echo app('translator')->get('fees.fees_code'); ?></th>
                                                            <th><?php echo app('translator')->get('fees.due_date'); ?></th>
                                                            <th><?php echo app('translator')->get('common.status'); ?></th>
                                                            <th><?php echo app('translator')->get('fees.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                            </th>
                                                            <th><?php echo app('translator')->get('fees.payment_id'); ?></th>
                                                            <th><?php echo app('translator')->get('fees.mode'); ?></th>
                                                            <th><?php echo app('translator')->get('common.date'); ?></th>
                                                            <th><?php echo app('translator')->get('fees.discount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                            </th>
                                                            <th><?php echo app('translator')->get('fees.fine'); ?>(<?php echo e(generalSetting()->currency_symbol); ?>)
                                                            </th>
                                                            <th><?php echo app('translator')->get('fees.paid'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)
                                                            </th>
                                                            <th><?php echo app('translator')->get('fees.balance'); ?></th>
                                                        </tr>
                                                    </thead>
    
                                                    <tbody>
                                                        <?php
                                                            @$grand_total = 0;
                                                            @$total_fine = 0;
                                                            @$total_discount = 0;
                                                            @$total_paid = 0;
                                                            @$total_grand_paid = 0;
                                                            @$total_balance = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $fees_assigneds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($fees_assigned->record_id == $record->id): ?>
                                                                <?php
                                                                    @$grand_total += @$fees_assigned->feesGroupMaster->amount;
    
                                                                ?>
    
                                                                <?php
                                                                    @$discount_amount = $fees_assigned->applied_discount;
                                                                    @$total_discount += @$discount_amount;
                                                                    @$student_id = @$fees_assigned->student_id;
                                                                ?>
                                                                <?php
                                                                    @$paid = App\SmFeesAssign::discountSum(@$fees_assigned->student_id, @$fees_assigned->feesGroupMaster->feesTypes->id, 'amount', $fees_assigned->record_id);
                                                                    @$total_grand_paid += @$paid;
                                                                ?>
                                                                <?php
                                                                    @$fine = App\SmFeesAssign::discountSum(@$fees_assigned->student_id, @$fees_assigned->feesGroupMaster->feesTypes->id, 'fine', $fees_assigned->record_id);
                                                                    @$total_fine += @$fine;
                                                                ?>
    
                                                                <?php
                                                                    @$total_paid = @$discount_amount + @$paid;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo e(@$fees_assigned->feesGroupMaster->feesGroups != '' ? @$fees_assigned->feesGroupMaster->feesGroups->name : ''); ?>

                                                                    </td>
                                                                    <td><?php echo e(@$fees_assigned->feesGroupMaster->feesTypes != '' ? @$fees_assigned->feesGroupMaster->feesTypes->name : ''); ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php if(!empty(@$fees_assigned->feesGroupMaster)): ?>
                                                                            <?php echo e(@$fees_assigned->feesGroupMaster->date != '' ? dateConvert(@$fees_assigned->feesGroupMaster->date) : ''); ?>

                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <?php
                                                                        $total_payable_amount = $fees_assigned->fees_amount;
                                                                        $rest_amount = $fees_assigned->feesGroupMaster->amount - $total_paid;
                                                                        $balance_amount = number_format($rest_amount + $fine, 2, '.', '');
                                                                        $total_balance += $balance_amount;
                                                                    ?>
                                                                    <td>
    
                                                                        <?php if($balance_amount == 0): ?>
                                                                            <button
                                                                                class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('fees.paid'); ?></button>
                                                                        <?php elseif($paid != 0): ?>
                                                                            <button
                                                                                class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('fees.partial'); ?></button>
                                                                        <?php elseif($paid == 0): ?>
                                                                            <button
                                                                                class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('fees.unpaid'); ?></button>
                                                                        <?php endif; ?>
    
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            echo number_format($fees_assigned->feesGroupMaster->amount, 2, '.', '');
                                                                        ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td> <?php echo e(@$discount_amount); ?> </td>
                                                                    <td><?php echo e(@$fine); ?></td>
                                                                    <td><?php echo e(@$paid); ?></td>
                                                                    <td>
                                                                        <?php
                                                                            echo @$balance_amount;
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                    @$payments = App\SmFeesAssign::feesPayment(@$fees_assigned->feesGroupMaster->feesTypes->id, @$fees_assigned->student_id, $fees_assigned->recordDetail->id);
                                                                    $i = 0;
                                                                ?>
    
                                                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td class="text-right"><img
                                                                                src="<?php echo e(asset('public/backEnd/img/table-arrow.png')); ?>">
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                @$created_by = App\User::find(@$payment->created_by);
                                                                            ?>
                                                                            <?php if(@$created_by != ''): ?>
                                                                                <a href="#" data-toggle="tooltip"
                                                                                    data-placement="right"
                                                                                    title="<?php echo e('Collected By: ' . @$created_by->full_name); ?>"><?php echo e(@$payment->fees_type_id . '/' . @$payment->id); ?></a>
                                                                        </td>
                                                                <?php endif; ?>
                                                                <td>
                                                                    <?php echo e($payment->payment_mode); ?>

                                                                </td>
                                                                <td class="nowrap">
                                                                    <?php echo e(@$payment->payment_date != '' ? dateConvert(@$payment->payment_date) : ''); ?>

                                                                </td>
                                                                <td>
                                                                    <?php echo e(@$payment->discount_amount); ?>

                                                                </td>
                                                                <td>
                                                                    <?php echo e(@$payment->fine); ?>

                                                                    <?php if($payment->fine != 0): ?>
                                                                        <?php if(strlen($payment->fine_title) > 14): ?>
                                                                            <span class="text-danger nowrap"
                                                                                title="<?php echo e($payment->fine_title); ?>">
                                                                                (<?php echo e(substr($payment->fine_title, 0, 15) . '...'); ?>)
                                                                            </span>
                                                                        <?php else: ?>
                                                                            <?php if($payment->fine_title == ''): ?>
                                                                                <?php echo e($payment->fine_title); ?>

                                                                            <?php else: ?>
                                                                                <span class="text-danger nowrap">
                                                                                    (<?php echo e($payment->fine_title); ?>)
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo e(@$payment->amount); ?>

                                                                </td>
                                                                <td></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo app('translator')->get('fees.grand_total'); ?> (<?php echo e(@generalSetting()->currency_symbol); ?>)</th>
                                                    <th></th>
                                                    <th><?php echo e(@$grand_total); ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(@$total_discount); ?></th>
                                                    <th><?php echo e(@$total_fine); ?></th>
                                                    <th><?php echo e(@$total_grand_paid); ?></th>
                                                    <th><?php echo e(number_format($total_balance, 2, '.', '')); ?> </th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            </table>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- End Profile Tab -->
                        <!-- Start leave Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="leaves">
                            <div>
                                <div class="row">
                                    <div class="col-lg-12">
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
                                                    
                                                    <?php $__currentLoopData = $leave_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e(@$value->leaveType->type); ?></td>
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
                                                                        <?php echo app('translator')->get('common.cancelled'); ?></button>
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
                                                    
                                                </tbody>
                                            </table>
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
                        </div>
                        <!-- End leave Tab -->
    
                        <!-- Start Exam Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentExam">
                            <?php if(moduleStatusCheck('University')): ?>
                                
                                <?php if ($__env->exists('university::exam.student_exam_tab')) echo $__env->make('university::exam.student_exam_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php $__currentLoopData = $student_detail->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $today = date('Y-m-d H:i:s');
                                        $exam_count = count($exam_terms);
                                    ?>
                                    <?php if($exam_count < 1): ?>
                                        <div class="no-search no-paginate no-table-info mb-2">
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
                                            <table class="table" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('common.subject'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.full_marks'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.passing_marks'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.results'); ?></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                    <?php endif; ?>
                                    <div class="no-search no-paginate no-table-info mb-2">
                                        <?php $__currentLoopData = $exam_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $get_results = App\SmStudent::getExamResult(@$exam->id, @$record);
                                            ?>
                                            <?php if($get_results): ?>
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
                                                <?php if(isset($exam->examSettings->publish_date)): ?>
                                                    <?php if($exam->examSettings->publish_date <= $today): ?>
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
                                                        <table id="table_id" class="table" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('common.date'); ?></th>
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
                                                                        if (!is_null($optional_subject_setup) && !is_null($student_optional_subject)) {
                                                                            if ($mark->subject_id != @$student_optional_subject->subject_id) {
                                                                                $temp_grade[] = $mark->total_gpa_grade;
                                                                            }
                                                                        } else {
                                                                            $temp_grade[] = $mark->total_gpa_grade;
                                                                        }
                                                                        $total_gpa_point += $mark->total_gpa_point;
                                                                        if (!is_null(@$student_optional_subject)) {
                                                                            if (@$student_optional_subject->subject_id == $mark->subject->id && $mark->total_gpa_point < @$optional_subject_setup->gpa_above) {
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
                                                                        <?php echo app('translator')->get('exam.grand_total'); ?>:
                                                                        <?php echo e($grand_total); ?>/<?php echo e($grand_total_marks); ?>

                                                                    </th>
                                                                    <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                        <th></th>
                                                                    <?php else: ?>
                                                                        <th><?php echo app('translator')->get('exam.grade'); ?>:
                                                                            <?php
                                                                                if (in_array($failgpaname->grade_name, $temp_grade)) {
                                                                                    echo $failgpaname->grade_name;
                                                                                } else {
                                                                                    $final_gpa_point = ($total_gpa_point - $optional_gpa) / ($total_subject - $optional_subject);
                                                                                    $average_grade = 0;
                                                                                    $average_grade_max = 0;
                                                                                    if ($result == 0 && $grand_total_marks != 0) {
                                                                                        $gpa_point = number_format($final_gpa_point, 2, '.', '');
                                                                                        if ($gpa_point >= $maxgpa) {
                                                                                            $average_grade_max = App\SmMarksGrade::where('school_id', Auth::user()->school_id)
                                                                                                ->where('academic_id', getAcademicId())
                                                                                                ->where('from', '<=', $maxgpa)
                                                                                                ->where('up', '>=', $maxgpa)
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
                                                                                        echo $failgpaname->grade_name;
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
                                                                                if ($float_final_gpa_point >= $maxgpa) {
                                                                                    echo $maxgpa;
                                                                                } else {
                                                                                    echo $float_final_gpa_point;
                                                                                }
                                                                            ?>
                                                                        </th>
                                                                    <?php endif; ?>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
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
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <!-- End Exam Tab -->
                        <?php if(moduleStatusCheck('University')): ?>
                            <div role="tabpanel" class="tab-pane fade" id="studentPanelExamTranscript">
                                <?php if ($__env->exists('university::exam.partials._examTabView')) echo $__env->make('university::exam.partials._examTabView', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <script src="<?php echo e(url('Modules\University\Resources\assets\js\app.js')); ?>"></script>
                        <?php endif; ?>
                        <!-- Start Online Exam Tab -->
                        <div role="tabpanel" class="tab-pane fade" id="studentOnlineExam">
                            <?php
                                $exam_count = count($exam_terms);
                            ?>
    
                            <div class="no-search no-paginate no-table-info mb-2">
                                <?php if($result_views->count() < 1): ?>
                                    <h4 class="text-center"><?php echo app('translator')->get('exam.result_not_publish_yet'); ?></h4>
                                <?php endif; ?>
                                
                                <table id="table_id" class="table" cellspacing="0" width="100%">
    
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.title'); ?></th>
                                            <th><?php echo app('translator')->get('common.time'); ?></th>
                                            <th><?php echo app('translator')->get('exam.total_marks'); ?></th>
                                            <th><?php echo app('translator')->get('exam.obtained_marks'); ?> </th>
                                            <th><?php echo app('translator')->get('reports.result'); ?></th>
                                            <th><?php echo app('translator')->get('common.status'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $__currentLoopData = $result_views; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($result_view->onlineExam != '' ? @$result_view->onlineExam->title : ''); ?>

                                                </td>
                                                <td data-sort="<?php echo e(strtotime(@$result_view->onlineExam->date)); ?>">
                                                    <?php if(!empty(@$result_view->onlineExam)): ?>
                                                        <?php echo e(@$result_view->onlineExam->date != '' ? dateConvert(@$result_view->onlineExam->date) : ''); ?>

    
    
                                                        <br> <?php echo app('translator')->get('common.time'); ?>:
                                                        <?php echo e(@$result_view->onlineExam->start_time . ' - ' . @$result_view->onlineExam->end_time); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $total_marks = 0;
                                                        foreach ($result_view->onlineExam->assignQuestions as $assignQuestion) {
                                                            @$total_marks = $total_marks + @$assignQuestion->questionBank->marks;
                                                        }
                                                        echo @$total_marks;
                                                    ?>
                                                </td>
                                                <td><?php echo e(@$result_view->total_marks); ?></td>
                                                <td>
                                                    <?php
                                                        @$result = (@$result_view->total_marks * 100) / @$total_marks;
                                                        if (@$result >= @$result_view->onlineExam->percentage) {
                                                            echo 'Pass';
                                                        } else {
                                                            echo 'Fail';
                                                        }
                                                    ?>
                                                </td>
    
                                                <td>
                                                    <?php
                                                        $startTime = strtotime($result_view->onlineExam->date . ' ' . $result_view->onlineExam->start_time);
                                                        $endTime = strtotime($result_view->onlineExam->date . ' ' . $result_view->onlineExam->end_time);
                                                        $now = date('h:i:s');
                                                        $now = strtotime('now');
                                                    ?>
                                                    <?php if($now >= $endTime): ?>
                                                        <a class="linkopenmodal btn btn-success modalLink" data-modal-size="modal-lg"
                                                            title="Answer Script"
                                                            href="
                                                    <?php if(moduleStatusCheck('OnlineExam')): ?> <?php echo e(route('om-student_answer_script-modal', [@$result_view->online_exam_id, @$result_view->student_id, @$result_view->student_record_id])); ?>

                                                    <?php else: ?>
                                                    <?php echo e(route('student_answer_script', [@$result_view->online_exam_id, @$result_view->student_id])); ?> <?php endif; ?>
                                                    "><?php echo app('translator')->get('exam.answer_script'); ?></a>
                                                    <?php else: ?>
                                                        <span class="btn primary-btn small  fix-gr-bg"
                                                            style="background:blue"><?php echo app('translator')->get('exam.Wait_Till_Exam_Finish'); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <!-- End Online Exam Tab -->
    
                        <!-- Start Documents Tab -->
                        <div role="tabpanel"
                            class="tab-pane fade <?php echo e(Session::get('studentDocuments') == 'active' ? 'show active' : ''); ?>"
                            id="studentDocuments">
                            <div>
                                <div class="text-right mb-20">
                                    <?php if(userPermission('student_upload_document')): ?>
                                        <button type="button" data-toggle="modal" data-target="#add_document_madal"
                                            class="primary-btn tr-bg text-uppercase bord-rad">
                                            <?php echo app('translator')->get('student.upload_document'); ?>
                                            <span class="pl ti-upload"></span>
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <div class="table-responsive">
                                <table id="" class="table simple-table school-table"
                                    cellspacing="0">
                                    <thead>
                                        <tr >
                                            <th><?php echo app('translator')->get('student.title'); ?></th>
                                            <th><?php echo app('translator')->get('student.name'); ?></th>
                                            <th><?php echo app('translator')->get('student.action'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php if(is_show('document_file_1')): ?>
                                            <?php if($student_detail->document_file_1 != ''): ?>
                                                <tr>
                                                    <td><?php echo e($student_detail->document_title_1); ?></td>
                                                    <td><?php echo e(showDocument(@$student_detail->document_file_1)); ?>

                                                    </td>
                                                    <td>
                                                        <?php if(file_exists($student_detail->document_file_1)): ?>
                                                            <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                                href="<?php echo e(url($student_detail->document_file_1)); ?>" download>
                                                                <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                                            </a>
                                                            <a class="primary-btn icon-only fix-gr-bg"
                                                                onclick="deleteDoc(<?php echo e($student_detail->id); ?>,1)"
                                                                data-id="1" href="#">
                                                                <span class="ti-trash"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(is_show('document_file_2')): ?>
                                            <?php if($student_detail->document_file_2 != ''): ?>
                                                <tr>
                                                    <td><?php echo e($student_detail->document_title_2); ?></td>
                                                    <td><?php echo e(showDocument(@$student_detail->document_file_2)); ?>

                                                    </td>
                                                    <td>
                                                        <?php if(file_exists($student_detail->document_file_2)): ?>
                                                            <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                                href="<?php echo e(url($student_detail->document_file_2)); ?>" download>
                                                                <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                                            </a>
                                                            <a class="primary-btn icon-only fix-gr-bg"
                                                                onclick="deleteDoc(<?php echo e($student_detail->id); ?>,2)"
                                                                data-id="2" href="#">
                                                                <span class="ti-trash"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(is_show('document_file_3')): ?>
                                            <?php if($student_detail->document_file_3 != ''): ?>
                                                <tr>
                                                    <td><?php echo e($student_detail->document_title_3); ?></td>
                                                    <td><?php echo e(showDocument(@$student_detail->document_file_3)); ?>

                                                    </td>
                                                    <td>
                                                        <?php if(file_exists($student_detail->document_file_3)): ?>
                                                            <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                                href="<?php echo e(url($student_detail->document_file_3)); ?>" download>
                                                                <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                                            </a>
                                                            <a class="primary-btn icon-only fix-gr-bg"
                                                                onclick="deleteDoc(<?php echo e($student_detail->id); ?>,3)"
                                                                data-id="3" href="#">
                                                                <span class="ti-trash"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(is_show('document_file_4')): ?>
                                            <?php if($student_detail->document_file_4 != ''): ?>
                                                <tr>
                                                    <td><?php echo e($student_detail->document_title_4); ?></td>
                                                    <td><?php echo e(showDocument(@$student_detail->document_file_4)); ?>

                                                    </td>
                                                    <td>
                                                        <?php if(file_exists($student_detail->document_file_4)): ?>
                                                            <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                                href="<?php echo e(url($student_detail->document_file_4)); ?>" download>
                                                                <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                                            </a>
    
                                                            <a class="primary-btn icon-only fix-gr-bg"
                                                                onclick="deleteDoc(<?php echo e($student_detail->id); ?>,4)"
                                                                data-id="4" href="#">
                                                                <span class="ti-trash"></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
    
                                        <div class="modal fade admin-query" id="delete-doc">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
    
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
    
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <form action="<?php echo e(route('student_document_delete')); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="student_id">
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
    
                                        <?php $__currentLoopData = $student_detail->studentDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="d-flex">
                                                <td class="col-2"><?php echo e($document->title); ?></td>
                                                <td class="col-6"><?php echo e(showDocument($document->file)); ?></td>
                                                <td class="col-4">
                                                    <?php if(file_exists($document->file)): ?>
                                                        <a class="primary-btn tr-bg text-uppercase bord-rad"
                                                            href="<?php echo e(url($document->file)); ?>" download>
                                                            <?php echo app('translator')->get('common.download'); ?><span class="pl ti-download"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <a class="primary-btn icon-only fix-gr-bg" data-toggle="modal"
                                                        data-target="#deleteDocumentModal<?php echo e($document->id); ?>"
                                                        href="#">
                                                        <span class="ti-trash"></span>
                                                    </a>
    
                                                </td>
                                            </tr>
                                            <div class="modal fade admin-query" id="deleteDocumentModal<?php echo e($document->id); ?>">
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
                                                                    href="<?php echo e(route('student-document-delete', [$document->id])); ?>">
                                                                    <?php echo app('translator')->get('common.delete'); ?></a>
                                                            </div>
                                                        </div>
    
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Documents Tab -->
    
                        <!-- Start Documents Tab -->
                        <?php if(moduleStatusCheck('University')): ?>
                            <div role="tabpanel"
                                class="tab-pane fade <?php echo e(Session::get('chooseSubject') == 'active' ? 'show active' : ''); ?>"
                                id="chooseSubject">
                                <div>
                                    <?php if($canChoose == true): ?>
                                        <?php echo $__env->make('backEnd.studentPanel.request_to_subject', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <strong><?php echo e(__('university::un.sorry_time_out')); ?></strong>
                                    <?php endif; ?>
    
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- End Documents Tab -->
                        <!-- Add Document modal form start-->
                        <div class="modal fade admin-query" id="add_document_madal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo app('translator')->get('student.upload_document'); ?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_upload_document', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'document_upload'])); ?>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="hidden" name="student_id"
                                                        value="<?php echo e(@$student_detail->id); ?>">
                                                    <div class="row mt-25">
                                                        <div class="col-lg-12">
                                                            <div class="primary_input">
                                                                <label>Title <span class="text-danger"> *</span> </label>
                                                                <input class="primary_input_field form-control{"
                                                                    type="text" name="title" value=""
                                                                    id="title">
    
    
                                                                <span class=" text-danger" role="alert" id="amount_error">
    
                                                                </span>
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-30">
                                                    <div class="row no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="primary_input">
                                                                <input class="primary_input_field" type="text"
                                                                    id="placeholderPhoto" placeholder="Document" disabled>
    
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button class="primary-btn-small-input" type="button">
                                                                <label class="primary-btn small fix-gr-bg"
                                                                    for="upload_content_file">browse</label>
                                                                <input type="file" class="d-none" name="photo"
                                                                    id="upload_content_file">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
    
    
                                                <!-- <div class="col-lg-12 text-center mt-40">
                                                                        <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                                                            <span class="ti-check"></span>
                                                                            save information
                                                                        </button>
                                                                    </div> -->
                                                <div class="col-lg-12 text-center mt-40">
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                            data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
    
                                                        <button class="primary-btn fix-gr-bg" type="submit">save</button>
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
    
                        <!-- Start Timeline Tab -->
                        <div role="tabpanel"
                            class="tab-pane fade <?php echo e(Session::get('studentTimeline') == 'active' ? 'show active' : ''); ?>"
                            id="studentTimeline">
                            <div>
    
                                <div class="table-responsive">
                                <table id="" class="table simple-table school-table"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <?php if(moduleStatusCheck('University')): ?>
                                                <th><?php echo app('translator')->get('university::un.session'); ?></th>
                                                <th><?php echo app('translator')->get('university::un.faculty_department'); ?></th>
                                                <th><?php echo app('translator')->get('university::un.semester(label)'); ?></th>
                                            <?php else: ?>
                                                <th><?php echo app('translator')->get('common.class'); ?></th>
                                                <th><?php echo app('translator')->get('common.section'); ?></th>
                                            <?php endif; ?>
    
                                            <th><?php echo app('translator')->get('student.id_number'); ?></th>
    
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $__currentLoopData = $student_detail->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <td>
                                                        <?php echo e($record->unSession->name); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($record->unFaculty->name . '(' . $record->unDepartment->name . ')'); ?>

                                                        <?php if($record->is_default): ?>
                                                            <span class="badge fix-gr-bg">
                                                                <?php echo e(__('common.default')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($record->unSemester->name . '(' . $record->unSemesterLabel->name . ')'); ?>

                                                    </td>
                                                <?php else: ?>
                                                    <td>
    
                                                        <?php echo e($record->class->class_name); ?>

                                                        <?php if($record->is_default): ?>
                                                            <span class="badge fix-gr-bg">
                                                                <?php echo e(__('common.default')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($record->section->section_name); ?>

                                                    </td>
                                                <?php endif; ?>
    
                                                <td><?php echo e($record->roll_no); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Timeline Tab -->
    
                        <!-- Start Attendance Tab -->
                        <?php echo $__env->make('backEnd.studentPanel.inc._student_attendance_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- End Attendance Tab -->
    
                        <!-- Start Attendance Tab -->
                        <?php echo $__env->make('backEnd.studentPanel.inc._subject_attendance_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- End Attendance Tab -->
    
                        <!-- Start Behaviour Records Tab -->
                        <?php if(moduleStatusCheck('BehaviourRecords')): ?>
                            <?php echo $__env->make('backEnd.studentInformation.inc._student_behaviour_record_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <!-- End Behaviour Records Tab -->
    
                        <?php if(moduleStatusCheck('Wallet')): ?>
                            <div role="tabpanel"
                                class="tab-pane fade <?php echo e(Session::get('studentWallet') == 'active' ? 'show active' : ''); ?>"
                                id="studentWallet">
                                <div>
                                    <?php echo $__env->make('wallet::_addWallet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
            </div>
            <!-- End Student Details -->
        </div>
        </div>
    </section>

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
                                <input type="hidden" name="student_id" value="<?php echo e(@$student_detail->id); ?>">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <input class="primary_input_field form-control{" type="text"
                                                name="title" value="" id="title">
                                            <label>Title <span class="text-danger"> *</span> </label>


                                            <span class=" text-danger" role="alert" id="amount_error">

                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input
                                                class="primary_input_field  primary_input_field date form-control form-control"
                                                id="startDate" type="text" name="date">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>

                                        </div>
                                    </div>
                                    <button class="" type="button">
                                        <i class="ti-calendar" id="start-date-icon"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-30">
                                <div class="primary_input">
                                    <textarea class="primary_input_field form-control" cols="0" rows="3" name="description"
                                        id="Description"></textarea>
                                    <label>Description<span></span> </label>

                                </div>
                            </div>

                            <div class="col-lg-12 mt-30">
                                <div class="row no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input class="primary_input_field" type="text"
                                                id="placeholderFileFourName" placeholder="Document" disabled>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="document_file_4">browse</label>
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


                            <!-- <div class="col-lg-12 text-center mt-40">
                                            <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                                                <span class="ti-check"></span>
                                                save information
                                            </button>
                                        </div> -->
                            <div class="col-lg-12 text-center mt-40">
                                <div class="mt-40 d-flex justify-content-between">
                                    <button type="button" class="primary-btn tr-bg"
                                        data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>

                                    <button class="primary-btn fix-gr-bg" type="submit">save</button>
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
    
    <?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        // data table responsive problem tab
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            });
        });

        function deleteDoc(id, doc) {
            var modal = $('#delete-doc');
            modal.find('input[name=student_id]').val(id)
            modal.find('input[name=doc_id]').val(doc)
            modal.modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/studentPanel/my_profile.blade.php ENDPATH**/ ?>