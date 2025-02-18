<?php if (! $__env->hasRenderedOnce('fe8c6fc9-ba47-4643-8c4b-dd41fbef2470')): $__env->markAsRenderedOnce('fe8c6fc9-ba47-4643-8c4b-dd41fbef2470');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/packages/carousel/owl.carousel.min.css')); ?>">
<?php $__env->stopPush(); endif; ?>
<section class="section_padding tesimonials about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section_title">
                    <span class="section_title_meta"><?php echo e(pagesetting('testimonial_sub_heading')); ?></span>
                    <h2><?php echo e(pagesetting('testimonial_heading')); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <?php if (isset($component)) { $__componentOriginal06cf8767fb67761f17058e74be611369 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06cf8767fb67761f17058e74be611369 = $attributes; } ?>
<?php $component = App\View\Components\Testimonial::resolve(['count' => pagesetting('testionmonial_count'),'sorting' => pagesetting('testionmonial_sorting')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('testimonial'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Testimonial::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06cf8767fb67761f17058e74be611369)): ?>
<?php $attributes = $__attributesOriginal06cf8767fb67761f17058e74be611369; ?>
<?php unset($__attributesOriginal06cf8767fb67761f17058e74be611369); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06cf8767fb67761f17058e74be611369)): ?>
<?php $component = $__componentOriginal06cf8767fb67761f17058e74be611369; ?>
<?php unset($__componentOriginal06cf8767fb67761f17058e74be611369); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php if (! $__env->hasRenderedOnce('4ae7f924-ef55-438d-91ef-5fee475d1407')): $__env->markAsRenderedOnce('4ae7f924-ef55-438d-91ef-5fee475d1407');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/edulia/packages/carousel/owl.carousel.min.js')); ?>"></script>
    <script>
        $('.tesimonials_slider').owlCarousel({
            nav: false,
            navText: ['<i class="fal fa-angle-left"></i>', '<i class="fal fa-angle-right"></i>'],
            dots: true,
            dotsData: true,
            items: 1,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/testimonial/view.blade.php ENDPATH**/ ?>