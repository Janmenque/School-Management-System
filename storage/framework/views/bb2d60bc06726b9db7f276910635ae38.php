<?php
    $generalSetting = generalSetting();
    $languages = systemLanguage();
    $styles = userColorThemes(auth()->user()->id);

?>

<?php
    $coltroller_role = 1;
?>

<style>
    .fas.fa-robot.menu-only {
        font-size: 20px;
        color: #828bb2;
        margin-right: 5px;
    }

    a.pulse.theme_color.bell_notification_clicker {
        margin-right: 15px !important;
    }

    @media (min-width: 1350px) {
        .header_middle {
            display: block !important;
        }
    }
</style>

<div class="container-fluid no-gutters" id="main-nav-for-chat">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="small_logo_crm d-lg-none">
                    <a href="#">
                        <?php if(!is_null($generalSetting->logo)): ?>
                            <img src="<?php echo e(asset($generalSetting->logo)); ?>" alt="logo">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>" alt="logo">
                        <?php endif; ?>
                    </a>
                </div>
                <div id="sidebarCollapse" class="sidebar_icon  d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="collaspe_icon open_miniSide">
                    <i class="ti-menu"></i>
                </div>

                <div class="serach_field-area ml-40">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" class="form-control primary_input_field input-left-icon"
                                    placeholder="Search" id="search" onkeyup="showResult(this.value)">
                            </div>
                            <button type="submit" style="padding-top: 3px"><i
                                    style="font-size: 13px; padding-left: 13px;" class="ti-search"></i></button>
                        </form>
                    </div>
                    <div id="livesearch" style="display: none;"></div>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="serach_field-area mr-10">
                        <div class="search_inner">
                            <div class="search_field">
                                <input type="text" class="form-control primary_input_field input-left-icon"
                                    placeholder="Name/Admission No." id="searchStudent"
                                    onkeyup="showStudent(this.value)">
                            </div>
                            <button type="submit" style="padding-top: 3px"><i
                                    style="font-size: 13px; padding-left: 13px;" class="ti-search"></i></button>
                        </div>
                        <div id="liveStudentSearch" style="display: none;"></div>
                    </div>
                    <select name="#" class="nice_Select bgLess mb-0 infix_session" id="infix_session">
                        <?php $__currentLoopData = academicYears(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(moduleStatusCheck('University')): ?>
                                <option value="<?php echo e(@$academic_year->id); ?>"
                                    <?php echo e(getAcademicId() == @$academic_year->id ? 'selected' : ''); ?>>
                                    <?php echo e(@$academic_year->name); ?> </option>
                            <?php else: ?>
                                <option value="<?php echo e(@$academic_year->id); ?>"
                                    <?php echo e(getAcademicId() == @$academic_year->id ? 'selected' : ''); ?>>
                                    <?php echo e(@$academic_year->year); ?> [<?php echo e(@$academic_year->title); ?>]
                                </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    
                    <?php if(generalSetting()->lang_btn == 1): ?>
                        <select class="nice_Select bgLess mb-0 languageChange" id="languageChange">
                            <option data-display="<?php echo app('translator')->get('common.select_language'); ?>"
                                value="0"><?php echo app('translator')->get('common.select_language'); ?>
                            </option>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option data-display="<?php echo e($lang->language_universal); ?>" value="<?php echo e($lang->language_universal); ?>"
                                    <?php echo e($lang->language_universal == userLanguage() ? 'selected' : ''); ?>>
                                    <?php echo e($lang->native); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php endif; ?>

                    <?php if(moduleStatusCheck('AiContent')): ?>
                        <?php echo $__env->make('aicontent::inc.menu_btn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <ul class="header_notification_warp d-flex align-items-center">

                        <?php if(app('general_settings')->get('chatting_method') == null || app('general_settings')->get('chatting_method') == 'log'): ?>
                            <jquery-notification-component
                                :unreads="<?php echo e(json_encode($notifications_for_chat)); ?>"
                                :user_id="<?php echo e(json_encode(auth()->id())); ?>"
                                :redirect_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                :check_new_notification_url="<?php echo e(json_encode(route('chat.notification.check'))); ?>"
                                :asset_type="<?php echo e(json_encode(asset('/public'))); ?>"
                                :mark_all_as_read_url="<?php echo e(json_encode(route('chat.notification.allRead'))); ?>">
                            </jquery-notification-component>
                        <?php else: ?>
                            <notification-component
                                :unreads="<?php echo e(json_encode($notifications_for_chat)); ?>"
                                :user_id="<?php echo e(json_encode(auth()->id())); ?>"
                                :redirect_url="<?php echo e(json_encode(route('chat.index'))); ?>"
                                :asset_type="<?php echo e(json_encode(asset('/public'))); ?>"
                                :mark_all_as_read_url="<?php echo e(json_encode(route('chat.notification.allRead'))); ?>">
                            </notification-component>
                        <?php endif; ?>
                        
                        <li class="scroll_notification_list">
                            <a class="pulse theme_color bell_notification_clicker show_notifications" href="#">
                                <!-- bell   -->
                                <img src="<?php echo e(asset('public/backEnd/assets/img/icons/notification.svg')); ?>" alt="">

                                <!--/ bell   -->
                                <span
                                    class="notificationCount notification_count"><?php echo e(count($notifications ?? [])); ?></span>
                                <span class="pulse-ring notification_count_pulse"></span>
                            </a>
                            <!-- Menu_NOtification_Wrap  -->
                            <div class="Menu_NOtification_Wrap notifications_wrap">
                                <div class="notification_Header">
                                    <h4><?php echo e(__('common.no_unread_notification')); ?></h4>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->
                                    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="single_notify d-flex align-items-center"
                                            id="menu_notification_show_<?php echo e($notification->id); ?>">
                                            <div class="notify_thumb">
                                                <i class="fa fa-bell"></i>
                                            </div>
                                            <a href="#" class="unread_notification flex-grow-1" title="Mark As Read"
                                                data-notification_id="<?php echo e($notification->id); ?>">
                                                <div class="notify_content">
                                                    <p class="notification_title"><?php echo strip_tags(\Illuminate\Support\Str::limit(@$notification->message, 70, $end = '...')); ?></p>
                                                </div>
                                            </a>
                                            <h5 class="notification_time text-nowrap"><?php echo e(formatedDate($notification->created_at)); ?></h5>
                                            <a href="<?php echo e(route('view-single-notification', $notification->id)); ?>">
                                                <svg width="20" height="20" class="notification_close_icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span class="text-center"><?php echo e(__('common.no_unread_notification')); ?></span>
                                    <?php endif; ?>

                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="<?php echo e(route('view/all/notification', Auth()->user()->id)); ?>"
                                            class="primary-btn radius_30px text_white  fix-gr-bg mark-all-as-read"><?php echo e(__('common.mark_all_as_read')); ?></a>
                                        <a href="<?php echo e(route('all-notification')); ?>"
                                            class="primary-btn radius_30px text_white  fix-gr-bg see_all_notification"><?php echo e(__('common.see_more')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Menu_NOtification_Wrap  -->
                        </li>
                        


                    </ul>

                    <div class="redirect_links">
                        <div class="select_style d-flex">
                            <?php if(generalSetting()->website_btn == 1): ?>
                                <a target="_blank" class=" mr-10 tab_hide"
                                    href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public/backEnd/assets/img/icons/globe.svg')); ?>" alt=""></a>
                            <?php endif; ?>
                            
                            <?php if(generalSetting()->report_btn == 1): ?>
                                <?php if(Auth::user()->role_id == $coltroller_role): ?>
                                    <a class="mr-10 tab_hide"
                                        href="<?php echo e(route('student_report')); ?>"><img src="<?php echo e(asset('public/backEnd/assets/img/icons/report.svg')); ?>" alt=""></a>
                                <?php endif; ?>
                            <?php endif; ?>
                            
    
    
                        </div>
                    </div>

                    
                    <div class="profile_info">

                        <div class="user_avatar_div">
                            <img id="profile_pic"
                                src="<?php echo e(@profile() && file_exists(@profile()) ? asset(profile()) : asset('public/backEnd/assets/img/avatar.png')); ?>"
                                alt="">
                        </div>

                        <div class="profile_info_iner">
                            <p class="email"> <?php echo e(Auth::user()->email); ?></p>
                            <h5><?php echo e(Auth::user()->full_name); ?> <?php if(isset(Auth::user()->wallet_balance)): ?>
                                    <?php if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3): ?>
                                        <p class="message">
                                            <strong>
                                                <?php echo app('translator')->get('common.balance'); ?>:
                                                <?php echo e(Auth::user()->wallet_balance != null ? currency_format(Auth::user()->wallet_balance) : currency_format(0.0)); ?>

                                            </strong>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </h5>
                            <div class="profile_info_details">
                                <?php if(Auth::user()->is_saas == 1): ?>
                                    <a href="<?php echo e(route('saasStaffDashboard')); ?>">

                                        <?php echo app('translator')->get('common.saas_dashboard'); ?>
                                        <span class="fa fa-home"></span>
                                    </a>
                                <?php endif; ?>
                                <?php if(Auth::user()->role_id == '2' && Auth::user()->is_saas == 0): ?>
                                    <a href="<?php echo e(route('student-profile')); ?>">
                                        <img src="<?php echo e(asset('public/backEnd/assets/img/icons/profile.svg')); ?>" class="mr-1" alt="">
                                        <?php echo app('translator')->get('common.view_profile'); ?>
                                        
                                    </a>
                                <?php elseif(Auth::user()->role_id != '3' && Auth::user()->is_saas == 0 && Auth::user()->staff): ?>
                                    <a href="<?php echo e(route('viewStaff', Auth::user()->staff->id)); ?>">
                                        <img src="<?php echo e(asset('public/backEnd/assets/img/icons/profile.svg')); ?>" alt="">
                                        <?php echo app('translator')->get('common.view_profile'); ?>
                                        
                                    </a>
                                <?php endif; ?>
                                <?php if(config('app.app_sync') && auth()->user()->role_id != 1): ?>
                                    <?php if(auth()->user()->staff && auth()->user()->staff->parent_id && auth()->user()->role_id == 3): ?>
                                        <a href="<?php echo e(route('viewAsRole')); ?>">

                                            <img src="<?php echo e(asset('public/backEnd/assets/img/icons/key.svg')); ?>" alt="" class="mr-1">
                                            <?php echo app('translator')->get('common.VIEW_AS_' . strtoupper(auth()->user()->staff->previousRole->name)); ?>
                                        </a>
                                    <?php elseif(auth()->user()->staff && auth()->user()->staff->parent_id): ?>
                                        <a href="<?php echo e(route('viewAsParent')); ?>">

                                            <img src="<?php echo e(asset('public/backEnd/assets/img/icons/key.svg')); ?>" alt="" class="mr-1">
                                            <?php echo app('translator')->get('common.VIEW_AS_PARENT'); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(moduleStatusCheck('Saas') == true &&
                                        Auth::user()->is_administrator == 'yes' &&
                                        Auth::user()->role_id == 1 &&
                                        Auth::user()->is_saas == 0): ?>

                                    <a href="<?php echo e(route('viewAsSuperadmin')); ?>">
                                        <img src="<?php echo e(asset('public/backEnd/assets/img/icons/key.svg')); ?>" alt="">

                                        <?php if(Session::get('isSchoolAdmin') == true): ?>
                                            <?php echo app('translator')->get('common.view_as_saas_admin'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('common.view_as_school_admin'); ?>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('updatePassowrd')); ?>">
                                    <img src="<?php echo e(asset('public/backEnd/assets/img/icons/password.svg')); ?>" alt="">
                                    <?php echo app('translator')->get('common.password'); ?>
                                    
                                </a>


                                <a href="<?php echo e(Auth::user()->role_id == 2 ? route('student-logout') : route('logout')); ?>"
                                    onclick="event.preventDefault();

                                              document.getElementById('logout-form').submit();">
                                    <img src="<?php echo e(asset('public/backEnd/assets/img/icons/logout.svg')); ?>" alt="">
                                    <?php echo app('translator')->get('common.logout'); ?>
                                    
                                </a>

                                <form id="logout-form"
                                    action="<?php echo e(Auth::user()->role_id == 2 ? route('student-logout') : route('logout')); ?>"
                                    method="POST" class="d-none">

                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(moduleStatusCheck('AiContent')): ?>
    <?php echo $__env->make('aicontent::content_generator_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(moduleStatusCheck('WhatsappSupport')): ?>
    <?php echo $__env->make('whatsappsupport::partials._popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

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
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/partials/menu.blade.php ENDPATH**/ ?>