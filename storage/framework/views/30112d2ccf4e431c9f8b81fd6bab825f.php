 
<?php
    $isApplicable = false;

    if (Auth::check()) {
        $user = Auth::user();

        if ($user) {
            $userRole = $user->role_id;
            $applicableRoles = $tawk_setting->applicable_for;
            $isApplicable = is_array($applicableRoles) && in_array($userRole, $applicableRoles);
        }
    }
?>

 <?php if($tawk_setting->is_enable == 1): ?>
    <?php if($tawk_setting->showing_page == 'all'): ?>
        <?php if( ($tawk_setting->availability == 'mobile' && $agent->isMobile()) ||
        ($tawk_setting->availability == 'desktop' && $agent->isDesktop()) ||      
            $tawk_setting->availability == 'both'): ?>

            <?php if($isApplicable): ?>
                <?php if($tawk_setting->show_admin_panel == 1 || $tawk_settin->show_website == 1): ?>        
                    <?php echo e($tawk_setting->short_code); ?>

                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif($tawk_setting->showing_page == 'homepage' && Str::startsWith(Route::currentRouteName(), 'frontEnd.home')): ?>
        <?php if(($tawk_setting->availability == 'mobile' && $agent->isMobile()) ||
            ($tawk_setting->availability == 'desktop' && $agent->isDesktop()) ||      
                $tawk_setting->availability == 'both'): ?>

            <?php if($isApplicable): ?>
                <?php if($tawk_setting->show_admin_panel == 1 || $tawk_settin->show_website == 1): ?>
                        <?php echo e($tawk_setting->short_code); ?>

                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\immersion\resources\views/plugins/tawk_to.blade.php ENDPATH**/ ?>