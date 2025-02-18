<?php if (! $__env->hasRenderedOnce('c2452733-4796-4fc5-b65f-56289015d0d6')): $__env->markAsRenderedOnce('c2452733-4796-4fc5-b65f-56289015d0d6');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        a.event_title h4 {
            max-width: 15ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<section class="section_padding events index-events">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <?php if(!empty(pagesetting('event_img'))): ?>
                    <div class="events_preview_img">
                        <img src="<?php echo e(pagesetting('event_img')[0]['thumbnail']); ?>" alt="<?php echo e(__('edulia.Image')); ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-7">
                <div class="section_title">
                    <span class="section_title_meta"><?php echo e(pagesetting('event_sub_heading')); ?></span>
                    <h2><?php echo e(pagesetting('event_heading')); ?></h2>
                    <p><?php echo pagesetting('event_description'); ?></p>
                </div>
                <?php if (isset($component)) { $__componentOriginal3e44a1debe6d6271311241e49c6d5fd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3e44a1debe6d6271311241e49c6d5fd4 = $attributes; } ?>
<?php $component = App\View\Components\Event::resolve(['count' => pagesetting('event_count')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('event'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Event::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3e44a1debe6d6271311241e49c6d5fd4)): ?>
<?php $attributes = $__attributesOriginal3e44a1debe6d6271311241e49c6d5fd4; ?>
<?php unset($__attributesOriginal3e44a1debe6d6271311241e49c6d5fd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3e44a1debe6d6271311241e49c6d5fd4)): ?>
<?php $component = $__componentOriginal3e44a1debe6d6271311241e49c6d5fd4; ?>
<?php unset($__componentOriginal3e44a1debe6d6271311241e49c6d5fd4); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/event/view.blade.php ENDPATH**/ ?>