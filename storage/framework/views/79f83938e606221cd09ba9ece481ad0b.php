<?php $__env->startPush('css'); ?>
     <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/bootstrap-datepicker.min.css')); ?>" />
     <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/bootstrap-datetimepicker.min.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
     <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap_datetimepicker.min.js"></script>
     <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap-datepicker.min.js"></script>
     <script type="text/javascript">
          (function($){
              $.fn.datepicker.dates[_locale] = new Object({
                  "days" : <?php echo json_encode(__('calender.days')); ?>,
                  "daysShort": <?php echo json_encode(__('calender.daysShort')); ?>,
                  "daysMin": <?php echo json_encode(__('calender.daysMin')); ?>,
                  "months": <?php echo json_encode(__('calender.months')); ?>,
                  "monthsShort": <?php echo json_encode(__('calender.monthsShort')); ?>,
                  "today": <?php echo json_encode(__('calender.today')); ?>,
                  "clear": <?php echo json_encode(__('calender.clear')); ?>

              })
          }(jQuery));
      
          $("#search-icon").on("click", function () {
               $("#search").focus();
             });
           
             $("#start-date-icon").on("click", function () {
               $("#startDate").focus();
             });
           
             $("#end-date-icon").on("click", function () {
               $("#endDate").focus();
             });
           
             $(".primary_input_field.date").datepicker({
               autoclose: true,
               setDate: new Date(),
           
             });
             $(".primary_input_field.date").datepicker({
               autoclose: true,
               setDate: new Date(),
               format: "mm/dd",
             });
             $(".primary_input_field.date").on("changeDate", function (ev) {
               // $(this).datepicker('hide');
               $(this).focus();
             });
           
             $(".primary_input_field.time").datetimepicker({
               format: "LT",
             });
           
             if ($)
               $(".primary_input_field.datetime").datetimepicker({
                 format: "YYYY-MM-DD H:mm",
               });
      </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/partials/date_picker_css_js.blade.php ENDPATH**/ ?>