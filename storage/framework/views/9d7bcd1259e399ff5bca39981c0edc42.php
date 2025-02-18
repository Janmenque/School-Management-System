<div>


    <?php if(auth()->user()->role_id == 1): ?>
    <div class="mb-40">
        <?php if(userPermission('academic-calendar-settings-view')): ?>
        <div class="white-box">
            <div class="row">
                <div class="col-lg-12 text-right col-md-12">
                    <a href="#" class="primary-btn small fix-gr-bg calenderSettingsJs">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('communicate.calendar_settings'); ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <?php echo $__env->make('backEnd.communicate._calendarSettingsForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="white-box">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-5">
                <div class="main-title">
                    <h3 class="mb-15"><?php echo app('translator')->get('communicate.calendar'); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div id='academicCalendar'></div>
                    <input type="hidden" id="calendarStartDate">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="descriptionModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.description'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <div class="admissionQueryModal commonModalContent">
                            <h4><?php echo app('translator')->get('admin.admission_query'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('admin.name'); ?></th>
                                        <th scope="col" id="AQname"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('admin.phone'); ?></th>
                                        <th scope="col" id="AQphone"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('admin.email'); ?></th>
                                        <th scope="col" id="AQemail"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('admin.address'); ?></th>
                                        <th scope="col" id="AQaddress"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('admin.next_follow_up_date'); ?></th>
                                        <th scope="col" id="AQdate"></th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="mt-20 eventActionCutomButton">
                                <div class="col-lg-12 text-center">
                                    <a class="primary-btn fix-gr-bg" target="_blank" id="admissionQueryUrl">
                                        <span class="pl ti-link"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="homeworkModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.homework'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.description'); ?></th>
                                        <th scope="col" id="Hdescription"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.class'); ?></th>
                                        <th scope="col" id="Hclass"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.section'); ?></th>
                                        <th scope="col" id="Hsection"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('homework.subject'); ?></th>
                                        <th scope="col" id="Hsubject"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('communicate.submission_date'); ?></th>
                                        <th scope="col" id="Hdate"></th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="mt-20 eventActionCutomButton">
                                <div class="col-lg-12 text-center">
                                    <a class="primary-btn fix-gr-bg" target="_blank" id="homeworkRoute">
                                        <span class="pl ti-link"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="studyMaterialModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.study_material'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.title'); ?></th>
                                        <th scope="col" id="SMtitle"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('study.content_type'); ?></th>
                                        <th scope="col" id="SMtype"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('communicate.avaiable'); ?></th>
                                        <th scope="col" id="SMavailable"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.description'); ?></th>
                                        <th scope="col" id="SMdescription"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.created_at'); ?></th>
                                        <th scope="col" id="SMdate"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="eventModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.event'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.title'); ?></th>
                                        <th scope="col" id="Etitle"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.description'); ?></th>
                                        <th scope="col" id="Edescription"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('communicate.location'); ?></th>
                                        <th scope="col" id="Elocation"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.start_date'); ?></th>
                                        <th scope="col" id="Esdate"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.end_date'); ?></th>
                                        <th scope="col" id="Eedate"></th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="mt-20 eventActionCutomButton">
                                <div class="col-lg-12 text-center">
                                    <a class="primary-btn fix-gr-bg d-none" target="_blank" id="eventFile">
                                        <span class="pl ti-download"></span>
                                    </a>
                                    <a class="primary-btn fix-gr-bg d-none" target="_blank" id="eventLink">
                                        <span class="pl ti-link"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="holidayModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.event'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.title'); ?></th>
                                        <th scope="col" id="HDtitle"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.description'); ?></th>
                                        <th scope="col" id="HDdescription"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.start_date'); ?></th>
                                        <th scope="col" id="HDsdate"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.end_date'); ?></th>
                                        <th scope="col" id="HDedate"></th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="mt-20 eventActionCutomButton">
                                <div class="col-lg-12 text-center">
                                    <a class="primary-btn fix-gr-bg d-none" target="_blank" id="holidayFile">
                                        <span class="pl ti-download"></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="examModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.exam'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('exam.exam_type'); ?></th>
                                        <th scope="col" id="EMname"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.class'); ?></th>
                                        <th scope="col" id="EMclass"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.section'); ?></th>
                                        <th scope="col" id="EMsection"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.subject'); ?></th>
                                        <th scope="col" id="EMsubject"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.teacher'); ?></th>
                                        <th scope="col" id="EMteacher"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.room'); ?></th>
                                        <th scope="col" id="EMroom"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.date'); ?></th>
                                        <th scope="col" id="EMdate"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.start_time'); ?></th>
                                        <th scope="col" id="EMstarttime"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.end_time'); ?></th>
                                        <th scope="col" id="EMendtime"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="noticeBoardModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.notice_board'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.title'); ?></th>
                                        <th scope="col" id="NBtitle"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.description'); ?></th>
                                        <th scope="col" id="NBdescription"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('communicate.inform_to'); ?></th>
                                        <th scope="col" id="NBinform"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.date'); ?></th>
                                        <th scope="col" id="NBdate"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="onlineExamModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.online_exam'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('exam.title'); ?></th>
                                        <th scope="col" id="OEtitle"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.class'); ?></th>
                                        <th scope="col" id="OEclass"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.section'); ?></th>
                                        <th scope="col" id="OEsection"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.subject'); ?></th>
                                        <th scope="col" id="OEsubject"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.start_date'); ?></th>
                                        <th scope="col" id="OEstartdate"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.end_date'); ?></th>
                                        <th scope="col" id="OEenddate"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.start_time'); ?></th>
                                        <th scope="col" id="OEstarttime"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.end_time'); ?></th>
                                        <th scope="col" id="OEendtime"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="lessonPlanModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.lesson_plan'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.class'); ?></th>
                                        <th scope="col" id="LPclass"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('academics.section'); ?></th>
                                        <th scope="col" id="LPsection"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.subject'); ?></th>
                                        <th scope="col" id="LPsubject"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.teacher'); ?></th>
                                        <th scope="col" id="LPteacher"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.date'); ?></th>
                                        <th scope="col" id="LPdate"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="leaveModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.leave'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.name'); ?></th>
                                        <th scope="col" id="Lname"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('leave.reason'); ?></th>
                                        <th scope="col" id="Lreason"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.start_date'); ?></th>
                                        <th scope="col" id="Lstartdate"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('common.end_date'); ?></th>
                                        <th scope="col" id="Lenddate"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="libraryModal commonModalContent">
                            <h4><?php echo app('translator')->get('communicate.library'); ?></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('library.book_title'); ?></th>
                                        <th scope="col" id="Lbooktitle"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col"><?php echo app('translator')->get('reports.due_date'); ?></th>
                                        <th scope="col" id="Lduedate"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="addEventOnCalendar">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('communicate.add_event'); ?> <span id="currentDate"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.event_title'); ?>
                                                <span class="text-danger"> *</span> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('event_title') ? ' is-invalid' : ''); ?> commonInputBlank"
                                                type="text" name="event_title" autocomplete="off"
                                                value="<?php echo e(isset($editData) ? $editData->event_title : old('event_title')); ?>">
                                            <span id="error_event_title" class="text-danger commonErrorBlank"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="checkbox" class="mb-2"><?php echo app('translator')->get('communicate.role'); ?> <span
                                                class="text-danger">*</span></label>
                                        <select multiple id="selectMultiUsers"
                                            class="multypol_check_select active position-relative commonInputBlank"
                                            name="role_ids[]" style="width:300px">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"
                                                <?php echo e(@$editData ? (in_array($role->id, json_decode($editData->role_ids)) ? 'selected' : '') : ''); ?>>
                                                <?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span id="error_role" class="text-danger commonErrorBlank"></span>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for=""><?php echo app('translator')->get('communicate.event_location'); ?> <span class="text-danger">
                                                    *</span> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('event_location') ? ' is-invalid' : ''); ?> commonInputBlank"
                                                type="text" name="event_location" autocomplete="off"
                                                value="<?php echo e(isset($editData) ? $editData->event_location : old('event_location')); ?>">
                                            <span id="error_event_location" class="text-danger commonErrorBlank"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-25">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <span
                                                    class="text-danger"> *</span> </label>
                                            <textarea
                                                class="primary_input_field form-control <?php echo e($errors->has('event_des') ? ' is-invalid' : ''); ?> commonInputBlank"
                                                id="event_desData" cols="0" rows="4" name="event_des"></textarea>
                                            <span id="error_description" class="text-danger commonErrorBlank"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.url'); ?></label>
                                            <textarea
                                                class="primary_input_field form-control <?php echo e($errors->has('url') ? ' is-invalid' : ''); ?> commonInputBlank"
                                                id="event_urlData" cols="0" rows="4" name="url"></textarea>
                                            <span id="error_url" class="text-danger commonErrorBlank"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center mt-25">
                                <div class="d-flex justify-content-center">
                                    <button class="primary-btn fix-gr-bg submit" id="saveButtonForAddEvent"
                                        type="submit"><?php echo app('translator')->get('admin.save'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/communicate/commonAcademicCalendar.blade.php ENDPATH**/ ?>