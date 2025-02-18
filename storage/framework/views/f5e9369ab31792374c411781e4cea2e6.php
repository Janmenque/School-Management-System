<?php
    $isApplicable = false;

    if (Auth::check()) {
        $user = Auth::user();

        if ($user) {
            $userRole = $user->role_id;
            $applicableRoles = $messenger_setting->applicable_for;
            $isApplicable = is_array($applicableRoles) && in_array($userRole, $applicableRoles);
        }
    }
?>
<?php if($messenger_setting->is_enable == 1): ?>

    <?php if($messenger_setting->showing_page == 'all'): ?>

        <?php if( ($messenger_setting->availability == 'mobile' && $agent->isMobile()) ||
        ($messenger_setting->availability == 'desktop' && $agent->isDesktop()) ||      
            $messenger_setting->availability == 'both'): ?>

            <?php if($isApplicable): ?>
                <?php if($messenger_setting->show_admin_panel == 1 || $tawk_settin->show_website == 1): ?>
                    <?php echo $messenger_setting->short_code; ?>

                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif($messenger_setting->showing_page == 'homepage' && Str::startsWith(Route::currentRouteName(), 'frontEnd.home')): ?>
        <?php if(($messenger_setting->availability == 'mobile' && $agent->isMobile()) ||
            ($messenger_setting->availability == 'desktop' && $agent->isDesktop()) ||      
                $messenger_setting->availability == 'both'): ?>

            <?php if($isApplicable): ?>
                <?php if($messenger_setting->show_admin_panel == 1 || $tawk_settin->show_website == 1): ?>
                  
                        <?php echo $messenger_setting->short_code; ?>

                   
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/plugins/messenger.blade.php ENDPATH**/ ?>