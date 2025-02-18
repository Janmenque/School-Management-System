<?php if (! $__env->hasRenderedOnce('624aaec8-634a-487c-9330-fb6963b27d61')): $__env->markAsRenderedOnce('624aaec8-634a-487c-9330-fb6963b27d61');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/nice-select/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/themify-icons.min.css')); ?>">
    <style>
        .nice-select:after {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<div class="section_padding">
    <div class="container">
        <?php if (isset($component)) { $__componentOriginal7d3ccb6c6c00c663cbae576988abf939 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d3ccb6c6c00c663cbae576988abf939 = $attributes; } ?>
<?php $component = App\View\Components\FrontendStudentList::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend-student-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontendStudentList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d3ccb6c6c00c663cbae576988abf939)): ?>
<?php $attributes = $__attributesOriginal7d3ccb6c6c00c663cbae576988abf939; ?>
<?php unset($__attributesOriginal7d3ccb6c6c00c663cbae576988abf939); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d3ccb6c6c00c663cbae576988abf939)): ?>
<?php $component = $__componentOriginal7d3ccb6c6c00c663cbae576988abf939; ?>
<?php unset($__componentOriginal7d3ccb6c6c00c663cbae576988abf939); ?>
<?php endif; ?>
    </div>
</div>
<?php if (! $__env->hasRenderedOnce('572f913a-89ad-4b7f-8a9d-4471c570e6b5')): $__env->markAsRenderedOnce('572f913a-89ad-4b7f-8a9d-4471c570e6b5');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/edulia/packages/nice-select/jquery.nice-select.min.js')); ?>"></script>
    <script>
        $('select').niceSelect();
        $(".individual_result_datatable table").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search ...",
                search: "<i class='far fa-search datatable-search'></i>",
            },
        });

        if($('.individual_result_datatable .dataTables_length label select').length > 0){
            $('.individual_result_datatable .dataTables_length label select').niceSelect('destroy');
            $(".individual_result_datatable .dataTables_length label select").select2({
                minimumResultsForSearch: Infinity
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#academic_year_selector").on("change", function() {
                var url = $("#url").val();
                var formData = {
                    year: $(this).val(),
                };
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "frontend-get-class",
                    success: function(data) {
                        $.each(data, function(i, item) {
                            if (item.length) {
                                $("#class_selector").find("option").not(":first")
                                    .remove();
                                $("#class_selector_div ul").find("li").not(":first")
                                    .remove();

                                $.each(item, function(i, academic_class) {
                                    $("#class_selector").append(
                                        $("<option>", {
                                            value: academic_class.id,
                                            text: academic_class
                                                .class_name,
                                        })
                                    );

                                    $("#class_selector_div ul").append(
                                        "<li data-value='" +
                                        academic_class.id +
                                        "' class='option'>" +
                                        academic_class.class_name +
                                        "</li>"
                                    );
                                });
                            } else {
                                $("#class_selector_div .current").html(
                                    "SELECT CLASS *");
                                $("#class_selector").find("option").not(":first")
                                    .remove();
                                $("#class_selector_div ul").find("li").not(":first")
                                    .remove();
                            }
                        });
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    },
                });
            });
        });
        $(document).ready(function() {
            $("#class_selector").on("change", function() {
                var url = $("#url").val();
                var formData = {
                    class: $(this).val(),
                };
                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "frontend-get-section",
                    success: function(data) {
                        $.each(data, function(i, item) {
                            if (item.length) {
                                $("#section_selector").find("option").not(":first")
                                    .remove();
                                $("#section_selector_div ul").find("li").not(":first")
                                    .remove();

                                $.each(item, function(i, academic_section) {
                                    $("#section_selector").append(
                                        $("<option>", {
                                            value: academic_section.id,
                                            text: academic_section
                                                .section_name,
                                        })
                                    );

                                    $("#section_selector_div ul").append(
                                        "<li data-value='" +
                                        academic_section.id +
                                        "' class='option'>" +
                                        academic_section.section_name +
                                        "</li>"
                                    );
                                });
                            } else {
                                $("#section_selector_div .current").html(
                                    "SELECT SECTION *");
                                $("#section_selector").find("option").not(":first")
                                    .remove();
                                $("#section_selector_div ul").find("li").not(":first")
                                    .remove();
                            }
                        });
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    },
                });
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/student-list/view.blade.php ENDPATH**/ ?>