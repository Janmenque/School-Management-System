<section class="section_padding faq_area">
  <?php if(pagesetting('faqs_heading')): ?>
    <h2><?php echo e(pagesetting('faqs_heading')); ?></h2>
  <?php endif; ?>
    <div class="container mt-20">
      <div class="row">
        <?php if(!empty(pagesetting('faq_datas'))): ?>
          <div class="faq_area_accordion" id="accordionExample">
            <?php $__currentLoopData = pagesetting('faq_datas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="accordion-item">
                  <h6 class="accordion-header" id="headingOne<?php echo e($key); ?>">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapseOne<?php echo e($key); ?>">
                          <?php echo e(gv($data, 'faq_question')); ?>

                      </button>
                  </h6>
                  <div id="collapseOne<?php echo e($key); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo e($key); ?>"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php echo gv($data, 'faq_answer'); ?>

                      </div>
                  </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/faqs/view.blade.php ENDPATH**/ ?>