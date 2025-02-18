<?php if (! $__env->hasRenderedOnce('8ec0b7e3-b210-4848-bac1-0067676d004c')): $__env->markAsRenderedOnce('8ec0b7e3-b210-4848-bac1-0067676d004c');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/packages/zeynep/zeynep.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/themify/themify-icons.min.css')); ?>">
<?php $__env->stopPush(); endif; ?>
<?php
    $generalSetting = generalSetting();
    $is_registration_permission = false;
    if (moduleStatusCheck('ParentRegistration')) {
        $reg_setting = Modules\ParentRegistration\Entities\SmRegistrationSetting::where('school_id', $generalSetting->school_id)->first();
        $is_registration_position = $reg_setting ? $reg_setting->position : null;
        $is_registration_permission = $reg_setting ? $reg_setting->registration_permission == 1 : false;
    }
?>
<header class="heading">
    <div class="heading_sub">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <nav class="heading_sub_left">
                        <ul>
                            <?php if(!empty(pagesetting('header-left-menus'))): ?>
                                <?php $__currentLoopData = pagesetting('header-left-menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rightMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(gv($rightMenu, 'header-left-menu-icon-url')); ?>">
                                            <i class="<?php echo e(gv($rightMenu, 'header-left-menu-icon-class')); ?>"></i>
                                            <?php echo e(gv($rightMenu, 'header-left-menu-label')); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-7 text-end">
                    <nav class="heading_sub_right">
                        <ul class='social-links'>
                            <?php if(!empty(pagesetting('header-right-menus'))): ?>
                                <?php $__currentLoopData = pagesetting('header-right-menus'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class='social-links-list'>
                                        <a href="<?php echo e(gv($icon, 'header-right-icon-url')); ?>" target='_blank' class='social-links-list-link'>
                                            <i class="<?php echo e(gv($icon, 'header-right-icon-class')); ?>"></i>
                                            <?php echo e(gv($icon, 'header-right-menu-label')); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>

                        <ul>
                            <li>
                                <?php if(!auth()->check()): ?>
                                    <a href="<?php echo e(url('/login')); ?>">
                                        <i class="far fa-user"></i>
                                        <?php echo e(__('edulia.login')); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/admin-dashboard')); ?>">
                                        <i class="far fa-user"></i>
                                        <?php echo e(__('edulia.dashboard')); ?>

                                    </a>
                                <?php endif; ?>
                            </li>
                            <?php if(moduleStatusCheck('ParentRegistration') && $is_registration_permission && $is_registration_permission == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('parentregistration/registration', $reg_setting->url)); ?>">
                                        <i class="far">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16.5"
                                                viewBox="0 0 15 16.5">
                                                <g id="archive-book" transform="translate(-2.25 -1.25)">
                                                    <path id="Path_1912" data-name="Path 1912"
                                                        d="M16.5,5.75v7.5c0,2.25-1.125,3.75-3.75,3.75h-6C4.125,17,3,15.5,3,13.25V5.75C3,3.5,4.125,2,6.75,2h6C15.375,2,16.5,3.5,16.5,5.75Z"
                                                        transform="translate(0)" fill="none" stroke="#fff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-miterlimit="10" stroke-width="1.5" />
                                                    <path id="Path_1913" data-name="Path 1913"
                                                        d="M13.758,2V7.9a.377.377,0,0,1-.631.278L11.385,6.575a.372.372,0,0,0-.511,0L9.131,8.182A.377.377,0,0,1,8.5,7.9V2Z"
                                                        transform="translate(-1.379)" fill="none" stroke="#fff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-miterlimit="10" stroke-width="1.5" />
                                                    <path id="Path_1914" data-name="Path 1914" d="M13.25,14h3.192"
                                                        transform="translate(-2.566 -3)" fill="none" stroke="#fff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-miterlimit="10" stroke-width="1.5" />
                                                    <path id="Path_1915" data-name="Path 1915" d="M9,18h6.385"
                                                        transform="translate(-1.506 -4.005)" fill="none" stroke="#fff"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-miterlimit="10" stroke-width="1.5" />
                                                </g>
                                            </svg>
                                        </i>
                                        <?php echo e(__('edulia.student_registration')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div class="heading_mobile">
        <div>
            <div class="heading_mobile_thum"><i class="far fa-bars"></i></div>
        </div>
        <div class='text-center'>
            <a href='<?php echo e(url('/')); ?>' class="heading_logo">
                <img src="<?php echo e(pagesetting('header_menu_image') ? pagesetting('header_menu_image')[0]['thumbnail'] : defaultLogo($generalSetting->logo)); ?>" alt="">
            </a>
        </div>
        <form action="#" class='heading_main_search m_s'>
            <div class="input-control">
                <label for="search" class="input-control-icon"><i class="far fa-search"></i></label>
                <input type="search" name='search' id='search' class="input-control-input"
                    placeholder='Search for course, skills and Videos' required>
            </div>
        </form>
    </div>

    <div class="heading_main">
        <div class="container">
            <div class="row">
                <div class="col-md-2 my-auto">
                    <a href="<?php echo e(url('/')); ?>" class="heading_main_logo mobile-menu-left">
                        <img src="<?php echo e(pagesetting('header_menu_image') ? pagesetting('header_menu_image')[0]['thumbnail'] : defaultLogo($generalSetting->logo)); ?>" alt="">
                    </a>
                </div>
                <div class="col-md-7">
                    <?php if (isset($component)) { $__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a = $attributes; } ?>
<?php $component = App\View\Components\HeaderContentMenu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-content-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HeaderContentMenu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a)): ?>
<?php $attributes = $__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a; ?>
<?php unset($__attributesOriginald1d1e93615eaa7a2066ee87b0b8d976a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a)): ?>
<?php $component = $__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a; ?>
<?php unset($__componentOriginald1d1e93615eaa7a2066ee87b0b8d976a); ?>
<?php endif; ?>
                </div>
                <?php if(!empty(pagesetting('header_menu_search')) && pagesetting('header_menu_search') == 1): ?>
                    <div class="col-md-3 text-end mobile-none">
                        <form action='#' methods='GET' class="heading_main_search">
                            <div class="input-control">
                                <input type="search" class="input-control-input" placeholder='<?php echo e(pagesetting('header_menu_search_placeholder')); ?>' required>
                                <button type='submit' class="input-control-icon"><i class="far fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<div class="clear_head"></div>


<!-- mobile menu -->
<div class="heading_mobile_menu zeynep">
    <?php if (isset($component)) { $__componentOriginal0d898a5792386818de89a20070606c42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d898a5792386818de89a20070606c42 = $attributes; } ?>
<?php $component = App\View\Components\HeaderContentMobileMenu::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-content-mobile-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\HeaderContentMobileMenu::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d898a5792386818de89a20070606c42)): ?>
<?php $attributes = $__attributesOriginal0d898a5792386818de89a20070606c42; ?>
<?php unset($__attributesOriginal0d898a5792386818de89a20070606c42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d898a5792386818de89a20070606c42)): ?>
<?php $component = $__componentOriginal0d898a5792386818de89a20070606c42; ?>
<?php unset($__componentOriginal0d898a5792386818de89a20070606c42); ?>
<?php endif; ?>
</div>
<!-- mobile menu -->


<?php if (! $__env->hasRenderedOnce('e068dddb-709a-4631-a351-d679698dee05')): $__env->markAsRenderedOnce('e068dddb-709a-4631-a351-d679698dee05');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script src="<?php echo e(asset('public/theme/'.activeTheme().'/packages/zeynep/zeynep.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            // MOBILE MENU ACTIVE JS
            var zeynep = $('.zeynep').zeynep({})
            $('.heading_mobile_thum').on('click', function() {
                zeynep.open()
                $('.bg-shade').fadeIn();
            })
            $('.bg-shade').on('click', function() {
                zeynep.close()
                $('.bg-shade').fadeOut();
            })

            $('[data-mobile-search]').on('click', function(e) {
                e.stopPropagation();
                $('.m_s').fadeToggle('fast')
            });
            $(document).on('click', function(e) {
                if (!$(e.target).is('.m_s *')) {
                    $('.m_s').fadeOut('fast')
                }
            })
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\xampp\htdocs\immersion\resources\views/themes/edulia/pagebuilder/header-content/view.blade.php ENDPATH**/ ?>