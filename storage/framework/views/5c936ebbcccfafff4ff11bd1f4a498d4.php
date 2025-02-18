<section class="section_padding_off notice-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-xl-10 offset-xl-1 offset-0">
              <div class="row text-center" id='noticeContent'>
                  <div class="notice-board-header d-flex justify-content-between align-items-center mb-3">
                      <h2 class="notice-board-title mb-0"><?php echo e(pagesetting('noticeboard_title')); ?></h2>
                      <a class="notice-view-all" href="<?php echo e(url('/').pagesetting('noticeboard_show_more_link')); ?>"><?php echo e(pagesetting('noticeboard_show_more')); ?></a>
                  </div>
                  <div class="notification-container">
                    <ul>
                      <?php if (isset($component)) { $__componentOriginal6ca207ff87a899e6f020c155efd3ca8f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ca207ff87a899e6f020c155efd3ca8f = $attributes; } ?>
<?php $component = App\View\Components\HomePageNoticeboard::resolve(['sorting' => pagesetting('notice_gallery_sorting'),'count' => pagesetting('notice_gallery_count')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-page-noticeboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HomePageNoticeboard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ca207ff87a899e6f020c155efd3ca8f)): ?>
<?php $attributes = $__attributesOriginal6ca207ff87a899e6f020c155efd3ca8f; ?>
<?php unset($__attributesOriginal6ca207ff87a899e6f020c155efd3ca8f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ca207ff87a899e6f020c155efd3ca8f)): ?>
<?php $component = $__componentOriginal6ca207ff87a899e6f020c155efd3ca8f; ?>
<?php unset($__componentOriginal6ca207ff87a899e6f020c155efd3ca8f); ?>
<?php endif; ?>
                    </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<?php if (! $__env->hasRenderedOnce('d081e2b5-f109-421f-b0d1-6a21bc434905')): $__env->markAsRenderedOnce('d081e2b5-f109-421f-b0d1-6a21bc434905');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
            // notification area

            var isAnimating = false;

        $(function() {
            let tickerLength = $('.notification-container ul li').length;
            let tickerHeight = $('.notification-container ul li').outerHeight();
            $('.notification-container ul li:last-child').prependTo('.notification-container ul');
            $('.notification-container ul').css('marginTop', -tickerHeight);
            
            var timer;
            function moveTop() {
                if (!isAnimating) {
                    isAnimating = true;
                    $('.notification-container ul').animate({
                      top: -tickerHeight - 10
                    }, 600, function() {
                      isAnimating = false;
                      $('.notification-container ul li:first-child').appendTo('.notification-container ul');
                      $('.notification-container ul').css('top', '');
                    });
                }
            }
            
            // Check if the mouse is hovered over the notification container
            var isHovered = false;
            $('.notification-container').hover(function() {
              isHovered = true;
            }, function() {
              isHovered = false;
            });
            
            // Pause the animation when the mouse is hovered over the notification container
            timer = setInterval(moveTop, 3000);
            $('.notification-container').on('mouseenter', function() {
              clearInterval(timer);
            }).on('mouseleave', function() {
              timer = setInterval(moveTop, 3000);
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/home-page-noticeboard/view.blade.php ENDPATH**/ ?>