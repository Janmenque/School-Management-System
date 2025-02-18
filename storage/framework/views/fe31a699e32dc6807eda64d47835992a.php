<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php if( ! is_null(schoolConfig() )): ?>
            <link rel="icon" href="<?php echo e(asset(schoolConfig()->favicon)); ?>" type="image/png"/>
        <?php else: ?>
            <link rel="icon" href="<?php echo e(asset('public/uploads/settings/favicon.png')); ?>" type="image/png"/>
        <?php endif; ?>
        <?php if( !empty($page->title) ): ?>
            <title><?php echo e($page->title); ?> </title>
        <?php endif; ?>

        <?php if(!empty($page->description) ): ?>
            <meta name="description" content="<?php echo e($page->description); ?>" />
        <?php endif; ?>

        <?php if( config('pagebuilder.add_bootstrap') === 'yes' ): ?>
            <link rel="stylesheet" href="<?php echo e(asset('public/vendor/optionbuilder/css/bootstrap.min.css')); ?>">
        <?php endif; ?>

        
        
        <!-- Main css -->
        <link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/css/fontawesome.all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/css/dataTables.jqueryui.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/css/responsive.jqueryui.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/theme/'.activeTheme().'/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/whatsapp-support/style.css')); ?>">

        <?php echo $__env->yieldPushContent(config('pagebuilder.style_var')); ?>

    </head>
    <body>
        <div class="bg-shade"></div>

        <main class="mainbag">
            
            <?php echo $__env->yieldContent(config('pagebuilder.site_section')); ?>
        </main>

        
        <!-- background overlay -->
            <div class="bg-shade"></div>
        <!-- background overlay -->

        <?php if( config('pagebuilder.add_jquery') === 'yes' ): ?>
            <script src="<?php echo e(asset('public/vendor/optionbuilder/js/jquery.min.js')); ?>"></script>
        <?php endif; ?>

        <?php if( config('pagebuilder.add_bootstrap') === 'yes' ): ?>
            <script defer src="<?php echo e(asset('public/vendor/optionbuilder/js/bootstrap.min.js')); ?>"></script>
        <?php endif; ?>
        <script>
            window._locale = '<?php echo e(app()->getLocale()); ?>';
            window._rtl = <?php echo e(userRtlLtl() == 1 ? 'true' : 'false'); ?>;
        </script>
        <script src="<?php echo e(asset('public/theme/'.activeTheme().'/js/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/theme/'.activeTheme().'/js/dataTables.responsive.min.js')); ?>"></script>
        <script>
            $('body').append('<!--back to top btn--><a href="#" class="backtop"><i class="far fa-long-arrow-alt-up"</i>');
            $(window).on('scroll', function() {
                var x = $(window).scrollTop();
                if (x > 700) {
                    $('.backtop').addClass('show')
                } else {
                    $('.backtop').removeClass('show')
                }
            });
            
            $(".common_data_table table").DataTable({
                responsive: true,
                stripeClasses:[],
                language: {
                    searchPlaceholder: "Search ...",
                    search: "<i class='far fa-search datatable-search'></i>",
                },
            });

            $(window).on('scroll', function() {
                var x = $(window).scrollTop();
                if (x > 500) {
                    $('.heading_main').addClass('fixed-nav');
                } else {
                    $('.heading_main').removeClass('fixed-nav')

                }
            })
        </script>

        <script src="<?php echo e(asset('public/whatsapp-support/scripts.js')); ?>"></script>
        <?php echo $__env->yieldPushContent(config('pagebuilder.script_var')); ?>

        <style>
            .messengerContainer:hover {
                cursor: pointer;
            }
        </style>
        <?php if($messenger_position == 'right'): ?> 
            <style>
                .messengerContainer {
                    position: fixed;
                    bottom: 85px;
                    right: 22px;
                    width: 48px;
                    height: 45px;
                    border-radius: 50%;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 24px;
                    z-index: 3;
                    box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
                }
            </style>
        <?php elseif($messenger_position == 'left'): ?> 
            <style>
                .messengerContainer {
                    position: fixed;
                    bottom: 85px;
                    width: 48px;
                    height: 45px;
                    left: 22px;
                    border-radius: 50%;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 24px;
                    z-index: 3;
                    box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
                }
            </style>
        <?php endif; ?>

        <?php
            $school_id = @Auth::user()->school_id;
            $tawk_is_enable = @App\Models\Plugin::where('school_id', $school_id)->where('name', 'tawk')->first()->is_enable;
            $messenger_is_enable = @App\Models\Plugin::where('school_id', $school_id)->where('name', 'messenger')->first()->is_enable;
        ?>

        <?php if($tawk_is_enable == 1): ?>
            <div class="tawk-min-container tawk-test">
                <script type="text/javascript">
                    var Tawk_API=Tawk_API||{},
                    Tawk_LoadStart=new Date();
                    (function(){ var s1=document.createElement("script"),
                    s0=document.getElementsByTagName("script")[0];
                    s1.async=true; s1.src=`https://embed.tawk.to/<?php echo $__env->make('plugins.tawk_to', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`;
                    s1.charset='UTF-8'; s1.setAttribute('crossorigin','*');
                    s0.parentNode.insertBefore(s1,s0); })();
                </script>
            </div>
        <?php endif; ?>
        
        <?php if($messenger_is_enable == 1): ?>
            <div class="messengerContainer">
                <!-- Messenger Chat Plugin Code -->
                <div id="fb-root"></div>
            
                <!-- Your Chat Plugin code -->
                <div id="fb-customer-chat" class="fb-customerchat">
                </div>
            
                <script>
                var chatbox = document.getElementById('fb-customer-chat');
                chatbox.setAttribute("page_id", "<?php echo $__env->make('plugins.messenger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>");
                chatbox.setAttribute("attribution", "biz_inbox");
                </script>
            
                <!-- Your SDK code -->
                <script>
                window.fbAsyncInit = function() {
                    FB.init({
                    xfbml            : true,
                    version          : 'v18.0'
                    });
                };
            
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
            </div>
        <?php endif; ?>
        <script>
            var position = '<?php echo e($position); ?>';
            var tawkposition = '';
        
            if(position == 'left'){
                tawkposition = 'bl';
            }else{
                tawkposition = 'br';
            }
            var Tawk_API = Tawk_API || {};
        
            Tawk_API.customStyle = {
                visibility : {
                    desktop : {
                        position : tawkposition,
                        xOffset : 0,
                        yOffset : 20
                    },
                    mobile : {
                        position : tawkposition,
                        xOffset : 0,
                        yOffset : 0
                    },
                    bubble : {
                        rotate : '0deg',
                         xOffset : -20,
                         yOffset : 0
                    }
                }
            };
        </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/layouts/pb-site.blade.php ENDPATH**/ ?>