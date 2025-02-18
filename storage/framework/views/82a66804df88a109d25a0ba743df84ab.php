<form method="GET" action="<?php echo e(route('frontend.indiviual-result')); ?>">
    <div class="row align-items-end">
        <?php echo csrf_field(); ?>
        <div class="col-lg-5 col-md-4 col-sm-6">
            <div class="mb-2"><?php echo app('translator')->get('edulia.exam'); ?> <span class="required">*</span> </div>
            <select id="academic_year_selector" class="w-100" name="exam">
                <option value="<?php echo app('translator')->get('edulia.select'); ?>"><?php echo app('translator')->get('edulia.select'); ?></option>
                <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-6">
            <div class="mb-2"><?php echo app('translator')->get('edulia.admission_no'); ?> <span class="required">*</span></div>
            <div class="input-control">
                <input type="number" class="result_filter_input" name="admission_number"
                    placeholder='<?php echo app('translator')->get('edulia.admission_no'); ?>' required>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <button type="submit" class="boxed_btn search_btn text-center">
                <i class="fa fa-search"></i>
                <?php echo app('translator')->get('edulia.search'); ?>
            </button>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/components/edulia/frontend-individual-result.blade.php ENDPATH**/ ?>