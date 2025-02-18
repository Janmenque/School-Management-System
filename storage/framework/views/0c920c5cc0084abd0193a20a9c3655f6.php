<?php
$div = isset($div) ? $div : 'col-lg-4';
$mt = isset($mt) ? $mt : 'mb-15';
$subject = isset($subject) ? true : false;
$required = $required ?? [];
$selected = isset($selected) ? $selected : null;
$academic_year = $selected && isset($selected['academic_year']) ? $selected['academic_year'] : null;
$class_id = $selected && isset($selected['class_id']) ? $selected['class_id'] : null;
$section_id = $selected && isset($selected['section_id']) ? $selected['section_id'] : null;
$subject_id = $selected && isset($selected['subject_id']) ? $selected['subject_id'] : null;
$student_id = $selected && isset($selected['student_id']) ? $selected['student_id'] : null;

if ($academic_year) {
$classes = classes($academic_year) ?? null;
$sections = $class_id ? sections($class_id, $academic_year) : null;
$subjects = $class_id && $section_id ? subjects($class_id, $section_id, $academic_year) : null;
$students = $class_id && $section_id ? students($class_id, $section_id, $academic_year) : null;
} else {
$sections = $class_id ? sections($class_id) : null;
$subjects = $class_id && $section_id ? subjects($class_id, $section_id) : null;
}
$visiable = $visiable ?? [];

?>
<?php if(in_array('academic', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>">
    <div class="primary_input ">
        <label class="primary_input_label" for=""><?php echo e(__('common.academic_year')); ?>

            <span class="text-danger"><?php echo e(in_array('academic', $required) ? '*' : ''); ?></span>
        </label>
        <select
            class="primary_select  form-control<?php echo e($errors->has('academic_year') ? ' is-invalid' : ''); ?> common_academic_year"
            name="academic_year" id="common_academic_year">
            <option data-display="<?php echo app('translator')->get('common.academic_year'); ?> <?php echo e(in_array('academic', $required) ? '*' : ''); ?>"
                value="">
                <?php echo app('translator')->get('common.academic_year'); ?> <?php echo e(in_array('academic', $required) ? '*' : ''); ?>

            </option>
            <?php if(isset($sessions)): ?>
            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($session->id); ?>"
                <?php echo e(isset($academic_year) && $academic_year == $session->id ? 'selected' : (getAcademicId() == $session->id ? 'selected' : '')); ?>>
                <?php echo e($session->year); ?>[<?php echo e($session->title); ?>]</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </select>

        <?php if($errors->has('academic_year')): ?>
        <span class="text-danger" role="alert">
            <?php echo e($errors->first('academic_year')); ?>

        </span>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php if(in_array('class', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>" id="common_select_class_div">
    <div class="primary_input mb-25">
        <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?>

            <span class="text-danger"><?php echo e(in_array('class', $required) ? '*' : ''); ?></span>
        </label>
        <select class="primary_select form-control<?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>" name="class_id"
            id="common_select_class">
            <option data-display="<?php echo app('translator')->get('common.select_class'); ?> <?php echo e(in_array('class', $required) ? '*' : ''); ?>" value="">
                <?php echo e(__('common.select_class')); ?> <?php echo e(in_array('class', $required) ? '*' : ''); ?></option>
            <?php if(isset($classes)): ?>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                <?php echo e($class->class_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
        <div class="pull-right loader loader_style" id="common_select_class_loader">
            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
        </div>
        <span class="text-danger"><?php echo e($errors->first('class_id')); ?></span>
    </div>
</div>

<?php endif; ?>
<?php if(in_array('section', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>" id="common_select_section_div">
    <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?>

        <span class="text-danger"><?php echo e(in_array('section', $required) ? '*' : ''); ?></span>
    </label>
    <select class="primary_select form-control<?php echo e($errors->has('section_id') ? ' is-invalid' : ''); ?> select_section"
        id="common_select_section" name="section_id">
        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> <?php echo e(in_array('section', $required) ? '*' : ''); ?>" value="">
            <?php echo app('translator')->get('common.select_section'); ?> <?php echo e(in_array('section', $required) ? '*' : ''); ?></option>
        <?php if(isset($sections)): ?>
        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($section->id); ?>"
            <?php echo e(isset($section_id) ? ($section_id == $section->section_id ? 'selected' : '') : ''); ?>>
            <?php echo e($section->sectionName->section_name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <div class="pull-right loader loader_style" id="common_select_section_loader" style="margin-top: -30px;padding-right: 21px;">
        <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="" style="width: 28px;height:28px;">
    </div>


    <?php if($errors->has('section_id')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('section_id')); ?>

    </span>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if(in_array('subject', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>" id="common_select_subject_div">
    <label class="primary_input_label" for=""><?php echo e(__('common.subject')); ?>

        <span class="text-danger"><?php echo e(in_array('subject', $required) ? '*' : ''); ?></span>
    </label>
    <select class="primary_select form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?> select_subject"
        id="common_select_subject" name="subject_id">
        <option data-display="<?php echo app('translator')->get('common.select_subject'); ?> <?php echo e(in_array('subject', $required) ? ' *' : ''); ?>" value="">
            <?php echo app('translator')->get('common.select_subject'); ?> <?php echo e(in_array('subject', $required) ? ' *' : ''); ?></option>
        <?php if(isset($subjects)): ?>
        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($subject->subject_id); ?>"
            <?php echo e(isset($subject_id) ? ($subject_id == $subject->subject_id ? 'selected' : '') : ''); ?>>
            <?php echo e($subject->subject->subject_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <div class="pull-right loader loader_style" id="common_select_subject_loader" style="margin-top: -30px;padding-right: 21px;">
        <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="" style="width: 28px;height:28px;">
    </div>

    <?php if($errors->has('subject_id')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('subject_id')); ?>

    </span>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if(in_array('student', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>" id="common_select_student_div">
    <label class="primary_input_label" for=""><?php echo e(__('common.student')); ?>

        <span class="text-danger"><?php echo e(in_array('student', $required) ? '*' : ''); ?></span>
    </label>
    <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
        id="common_select_student" name="student">
        <option data-display="<?php echo app('translator')->get('reports.select_student'); ?> <?php echo e(in_array('student', $required) ? '*' : ''); ?>" value="">
            <?php echo app('translator')->get('reports.select_student'); ?> <span><?php echo e(in_array('student', $required) ? '*' : ''); ?></span>
        </option>
        <?php if(isset($students)): ?>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($student->id); ?>"
            <?php echo e(isset($student_id) ? ($student_id == $student->id ? 'selected' : '') : ''); ?>>
            <?php echo e($student->full_name); ?>

        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>

    <div class="pull-right loader loader_style" id="common_select_student_loader">
        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
    </div>

    <?php if($errors->has('student')): ?>
    <span class="text-danger">
        <?php echo e($errors->first('student')); ?>

    </span>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function () {
        let class_required = "<?php echo e(in_array('class', $required) ? ' *' : ''); ?>";
        let section_required = "<?php echo e(in_array('section', $required) ? ' *' : ''); ?>";
        let subject_required = "<?php echo e(in_array('subject', $required) ? ' *' : ''); ?>";
        let student_required = "<?php echo e(in_array('student', $required) ? ' *' : ''); ?>";
        $("#common_academic_year").on(
            "change",
            function () {
                var url = $("#url").val();
                var i = 0;
                var formData = {
                    id: $(this).val(),
                };

                // get class
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "academic-year-get-class",

                    beforeSend: function () {
                        $('#common_select_class_loader').addClass('pre_loader').removeClass(
                            'loader');
                    },

                    success: function (data) {
                        $("#common_select_class").empty().append(
                            $("<option>", {
                                value: '',
                                text: window.jsLang('select_class') + class_required,
                            })
                        );

                        if (data[0].length) {
                            $.each(data[0], function (i, className) {
                                $("#common_select_class").append(
                                    $("<option>", {
                                        value: className.id,
                                        text: className.class_name,
                                    })
                                );
                            });
                        }
                        $('#common_select_class').niceSelect('update');
                        $('#common_select_class').trigger('change');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    },
                    complete: function () {
                        i--;
                        if (i <= 0) {
                            $('#common_select_class_loader').removeClass('pre_loader').addClass(
                                'loader');
                        }
                    }
                });
            }
        );

        $("#common_select_class").on("change", function () {

            var url = $("#url").val();
            var i = 0;
            var formData = {
                id: $(this).val(),
            };
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "ajaxStudentPromoteSection",

                beforeSend: function () {
                    $('#common_select_section_loader').addClass('pre_loader').removeClass(
                        'loader');
                },
                success: function (data) {
                    $("#common_select_section").empty().append(
                        $("<option>", {
                            value: '',
                            text: window.jsLang('select_section') +
                                section_required,
                        })
                    );

                    if (data[0].length) {
                        $.each(data[0], function (i, section) {
                            $("#common_select_section").append(
                                $("<option>", {
                                    value: section.id,
                                    text: section.section_name,
                                })
                            );
                        });
                    }
                    $('#common_select_section').niceSelect('update');
                    $('#common_select_section').trigger('change');

                },
                error: function (data) {
                    console.log("Error:", data);
                },
                complete: function () {
                    i--;
                    if (i <= 0) {
                        $('#common_select_section_loader').removeClass('pre_loader')
                            .addClass('loader');
                    }
                }
            });
        });
        $("#common_select_section").on("change", function () {
            var url = $("#url").val();
            var i = 0;
            var subject = "<?php echo e($subject); ?>";
            var select_class = $("#common_select_class").val();
            var class_id = $("#common_select_class").val();
            var section_id = $(this).val();

            var formData = {
                section: $(this).val(),
                class: $("#common_select_class").val(),
            };
            // get section for student
            if(subject == false)
            {
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "ajaxSelectStudent",

                beforeSend: function () {
                    $('#common_select_student_loader').addClass('pre_loader').removeClass(
                        'loader');
                },

                success: function (data) {

                    $("#common_select_student").empty().append(
                        $("<option>", {
                            value: '',
                            text: window.jsLang('select_student') +
                                student_required,
                        })
                    );

                    if (data[0].length) {
                        $.each(data[0], function (i, student) {
                            $("#common_select_student").append(
                                $("<option>", {
                                    value: student.id,
                                    text: student.full_name,
                                })
                            );
                        });
                    }
                    $('#common_select_student').niceSelect('update');
                    $('#common_select_student').trigger('change');
                },
                error: function (data) {
                    console.log("Error:", data);
                },
                complete: function () {
                    i--;
                    if (i <= 0) {
                        $('#common_select_student_loader').removeClass('pre_loader')
                            .addClass('loader');
                    }
                }
            });
            }
            // get subject from section
            if(subject == true)
            {
                getSubject(class_id, section_id);
            }
        });

        function getSubject(class_id, section_id) {
            var url = $("#url").val();
            var i = 0;
            $.ajax({
                type: "GET",
                data: {class: class_id, section: section_id},
                dataType: "json",
                url: url + "/" + "ajaxSelectSubject",

                beforeSend: function () {
                    $('#common_select_student_loader').addClass('pre_loader').removeClass('loader');
                },

                success: function (data) {

                    $("#common_select_subject").empty().append(
                        $("<option>", {
                            value: '',
                            text: window.jsLang('select_subject'),
                        })
                    );

                    if (data[0].length) {
                        $.each(data[0], function (i, subject) {
                            $("#common_select_subject").append(
                                $("<option>", {
                                    value: subject.id,
                                    text: subject.subject_name,
                                })
                            );
                        });
                    }
                    $('#common_select_subject').niceSelect('update');
                    $('#common_select_subject').trigger('change');
                },
                error: function (data) {
                    console.log("Error:", data);
                },
                complete: function () {
                    i--;
                    if (i <= 0) {
                        $('#common_select_student_loader').removeClass('pre_loader').addClass(
                            'loader');
                    }
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/common/search_criteria.blade.php ENDPATH**/ ?>