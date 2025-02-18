
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('rolepermission::role.login_permission'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        table.dataTable thead .sorting_asc {
            vertical-align: text-top;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css/login_access_control.css')); ?>" />
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('rolepermission::role.fees_due_users_login_permission'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('rolepermission::role.role_permission'); ?></a>
                    <a href="#"><?php echo app('translator')->get('rolepermission::role.fees_due_users_login_permission'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'due_fees_login_permission_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="white-box filter_card">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="main-title">
                                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">


                                            <?php if(moduleStatusCheck('University')): ?>
                                                <?php if ($__env->exists(
                                                    'university::common.session_faculty_depart_academic_semester_level',
                                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']]
                                                )) echo $__env->make(
                                                    'university::common.session_faculty_depart_academic_semester_level',
                                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']]
                                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <div class="col-lg-3 mt-25">
                                                    <div class="primary_input ">
                                                        <input class="primary_input_field" type="text" placeholder="Name"
                                                            name="name" value="<?php echo e(isset($name) ? $name : ''); ?>">
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('student.search_by_name'); ?></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-25">
                                                    <div class="primary_input md_mb_20">
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('student.search_by_roll_no'); ?></label>
                                                        <input class="primary_input_field" type="text" placeholder="Roll"
                                                            name="roll_no" value="<?php echo e(isset($roll_no) ? $roll_no : ''); ?>">


                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <?php echo $__env->make('backEnd.common.search_criteria', [
                                                    'mt' => 'mt-0',
                                                    'div' => 'col-lg-3',
                                                    'required' => [],
                                                    'visiable' => ['class', 'section'],
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <div class="col-lg-3">
                                                    <div class="primary_input sm_mb_20 ">
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('student.search_by_name'); ?></label>

                                                        <input class="primary_input_field" type="text" placeholder="Name"
                                                            name="name" value="<?php echo e(isset($name) ? $name : old('name')); ?>">

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="primary_input sm_mb_20 ">
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('student.admission_no'); ?></label>
                                                        <input class="primary_input_field" type="text"
                                                            placeholder="<?php echo app('translator')->get('student.admission_no'); ?>" name="admission_no"
                                                            value="<?php echo e(isset($admission_no) ? $admission_no : old('admission_no')); ?>">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-lg-12 mt-20 text-right">
                                                <button type="submit" class="primary-btn small fix-gr-bg" id="btnsubmit">
                                                    <span class="ti-search pr-2"></span>
                                                    <?php echo app('translator')->get('common.search'); ?>
                                                </button>
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
            <?php if(isset($students)): ?>
                <div class="row mt-60">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-3"><?php echo app('translator')->get('common.student_list'); ?> (<?php echo e(@$students->count()); ?>)</h3>
                                    </div>
                                </div>
                            </div>
    
    
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
                                        <table id="table_id"
                                            class="table data-table Crm_table_active3 no-footer dtr-inline collapsed"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('student.admission'); ?> </th>
                                                    <th><?php echo app('translator')->get('student.roll'); ?></th>
                                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                                    <th><?php echo app('translator')->get('common.class'); ?></th>
                                                    <th><?php echo app('translator')->get('rolepermission::role.student_permission'); ?></th>
                                                    <th><?php echo app('translator')->get('student.parents'); ?></th>
                                                    <th><?php echo app('translator')->get('rolepermission::role.parents_permission'); ?></th>
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="<?php echo e(@$student->user_id); ?>">
                                                        <td><?php echo e(@$student->admission_no); ?> </td>
                                                        <td> <?php echo e(@$student->roll_no); ?></td>
                                                        <td><?php echo e(@$student->first_name . ' ' . @$student->last_name); ?> </td>
                                                        <td>
                                                            <?php $__currentLoopData = $student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e(!empty(@$record->class) ? @$record->class->class_name : ''); ?>

                                                                (<?php echo e(!empty(@$record->section) ? @$record->section->section_name : ''); ?>)
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="id"
                                                                value="<?php echo e($student->user_id); ?>">
                                                            <label class="switch_toggle">
                                                                <input type="checkbox" id="ch<?php echo e(@$student->user_id); ?>"
                                                                    onclick="enableDisable(<?php echo e(@$student->user_id); ?>,<?php echo e(@$role); ?>)"
                                                                    class="switch-input11"
                                                                    <?php echo e(@$student->user->loginApproved ? 'checked' : ''); ?>>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>
                                                        <td> <?php echo e(@$student->parents->parent_user->full_name); ?></td>
    
                                                        <td>
    
                                                            <input type="hidden" name="ParentID"
                                                                value="<?php echo e(@$student->parents->user_id); ?>" id="ParentID">
    
                                                            <label class="switch_toggle">
    
                                                                <input type="checkbox" class="parent-login-disable"
                                                                    id="pr<?php echo e(@$student->parents->parent_user->id); ?>"
                                                                    onclick="enableDisableParent(<?php echo e(@$student->parents->parent_user->id); ?>,<?php echo e(@$student->parents->parent_user->role_id); ?>)"
                                                                    <?php echo e(@$student->parents->parent_user->loginApproved ? 'checked' : ''); ?>>
                                                                <span class="slider round"></span>
    
                                                            </label>
    
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
                </div>
            <?php endif; ?>
        </div>
        </div>
        </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        enableDisable = (id, role) => {
            var x = $(`#ch${id}`).is(":checked");
            if (x) {
                var status = "on";
            } else {
                var status = "off";
            }

            var formData = {
                id: id,
                status: status,
            };
            console.log(formData);

            var url = $("#url").val();

            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "due_fees_login_permission_store",
                success: function(data) {
                    console.log(data);

                    setTimeout(function() {
                        toastr.success(
                            "Operation Success!",
                            "Success Alert", {
                                iconClass: "customer-info",
                            }, {
                                timeOut: 2000,
                            }
                        );
                    }, 500);
                },
                error: function(data) {
                    console.log("no");

                    setTimeout(function() {
                        toastr.error("Operation Failed!", "Error Alert", {
                            timeOut: 5000,
                        });
                    }, 500);
                },
            });
        };


        //parent 
        enableDisableParent = (id, role) => {
            console.log(id, role);
            var x = $(`#pr${id}`).is(":checked");
            if (x) {
                var status = "on";
            } else {
                var status = "off";
            }

            var formData = {
                id: id,
                status: status,
            };
            console.log(formData);

            var url = $("#url").val();

            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "due_fees_login_permission_store",
                success: function(data) {
                    console.log(data);

                    setTimeout(function() {
                        toastr.success(
                            "Operation Success!",
                            "Success Alert", {
                                iconClass: "customer-info",
                            }, {
                                timeOut: 2000,
                            }
                        );
                    }, 500);
                },
                error: function(data) {
                    console.log("no");

                    setTimeout(function() {
                        toastr.error("Operation Failed!", "Error Alert", {
                            timeOut: 5000,
                        });
                    }, 500);
                },
            });
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/feesCollection/due_fees_login_permission.blade.php ENDPATH**/ ?>