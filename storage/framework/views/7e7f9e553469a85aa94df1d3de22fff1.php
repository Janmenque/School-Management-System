<!DOCTYPE html>
<?php
    $generalSetting = generalSetting();
?>
<html lang="<?php echo e(app()->getLocale()); ?>" <?php if(userRtlLtl()==1): ?> dir="rtl" class="rtl" <?php endif; ?>>
<head>
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php if( ! is_null(schoolConfig() )): ?>
        <link rel="icon" href="<?php echo e(asset(schoolConfig()->favicon)); ?>" type="image/png"/>
    <?php else: ?>
        <link rel="icon" href="<?php echo e(asset('public/uploads/settings/favicon.png')); ?>" type="image/png"/>
    <?php endif; ?>
    <title><?php echo e(@schoolConfig()->school_name ? @schoolConfig()->school_name : 'Infix Edu ERP'); ?> |
        <?php echo $__env->yieldContent('title'); ?>
    </title>

    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <?php if(userRtlLtl() ==1): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/css/rtl/bootstrap.rtl.min.css')); ?>" />
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/bootstrap.min.css')); ?>" />
    <?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/jquery-ui.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/bootstrap-datepicker.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/font_awesome/css/all.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/themefy_icon/themify-icons.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/flaticon.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/fnt.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/nice-select.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/toastr.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/css/style.css')); ?>" />
<?php if(moduleStatusCheck('WhatsappSupport')): ?>
<link rel="stylesheet" href="<?php echo e(asset('public/whatsapp-support/style.css')); ?>">
<?php endif; ?> 
<?php if(\Request::route()->getName() == "fees.fees-invoice-settings"): ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/select2/css/select2.min.css')); ?>" />
<?php endif; ?> 
<?php echo $__env->make('backEnd.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(userRtlLtl() ==1): ?>
    <style>
        .demo_addons{
            float: left!important;
            margin-left: 30px!important;
        } 
    </style>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal05bb8265ee24cbda94049f193d0e88b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05bb8265ee24cbda94049f193d0e88b0 = $attributes; } ?>
<?php $component = App\View\Components\RootCss::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('root-css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RootCss::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05bb8265ee24cbda94049f193d0e88b0)): ?>
<?php $attributes = $__attributesOriginal05bb8265ee24cbda94049f193d0e88b0; ?>
<?php unset($__attributesOriginal05bb8265ee24cbda94049f193d0e88b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05bb8265ee24cbda94049f193d0e88b0)): ?>
<?php $component = $__componentOriginal05bb8265ee24cbda94049f193d0e88b0; ?>
<?php unset($__componentOriginal05bb8265ee24cbda94049f193d0e88b0); ?>
<?php endif; ?>
    <?php echo $__env->yieldPushContent('css'); ?>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
    <script>
        window.Laravel = {
            "baseUrl": '<?php echo e(url('/')); ?>' + '/',
            "current_path_without_domain": '<?php echo e(request()->path()); ?>'
        }

        window._locale = '<?php echo e(app()->getLocale()); ?>';
        window._rtl = <?php echo e(userRtlLtl()==1 ? "true" : "false"); ?>;
        window._translations = <?php echo cache('translations'); ?>;
    </script>
</head>
<?php
if (empty(color_theme())) {
//  $css = "background: url('".asset('/public/backEnd/img/body-bg.jpg')."')  no-repeat center; background-size: cover ; ";
    $css = "background: var(--background)";
} else {
 if (!empty(color_theme()->background_type == 'image')) {
     $css = "background: url('" . asset(color_theme()->background_image) . "')  no-repeat center; background-size: cover; background-attachment: fixed; background-position: top; ";
 } else {
     $css = "background:" . color_theme()->background_color;
 }
}

?>
<?php
    if(session()->has('homework_zip_file')){
        $file_path='public/uploads/homeworkcontent/'.session()->get('homework_zip_file');
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
?>

<body class="admin"  style="<?php echo $css; ?>">
          <?php echo $__env->make('backEnd.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php
            $chat_method = app('general_settings')->get('chatting_method');
        ?>
        <input type="hidden" id="chat_settings" value="<?php echo e($chat_method); ?>">
        <?php if($chat_method == 'pusher'): ?>
            <input type="hidden" id="pusher_app_key" value="<?php echo e(app('general_settings')->get('pusher_app_key')); ?>">
            <input type="hidden" id="pusher_app_cluster" value="<?php echo e(app('general_settings')->get('pusher_app_cluster')); ?>">
        <?php endif; ?>
        <input type="hidden" id="demoMode" value="<?php echo e(config('app.app_sync')); ?>">
    <?php
        if (file_exists($generalSetting->logo)) {
            $tt = file_get_contents(base_path($generalSetting->logo));
        } else {
            $tt = file_get_contents(base_path('public/uploads/settings/logo.png'));
        }
    ?>
<input type="text" hidden value="<?php echo e(base64_encode($tt)); ?>" id="logo_img">
<input type="text" hidden value="<?php echo e($generalSetting->school_name); ?>" id="logo_title">

<div class="main-wrapper" style="min-height: 600px">
    <input type="hidden" id="nodata" value="<?php echo app('translator')->get('common.no_data_available_in_table'); ?>">
    <!-- Sidebar  -->
<?php if(isSubscriptionEnabled()): ?>
    <?php if(\Modules\Saas\Entities\SmPackagePlan::isSubscriptionAutheticate()): ?>
        <?php echo $__env->make('backEnd.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('saas::menu.SaasSubscriptionSchool_trial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php else: ?>
    <?php echo $__env->make('backEnd.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!-- Page Content  -->
    <div id="main-content">
        <input type="hidden" name="url" id="url" value="<?php echo e(url('/')); ?>">
<?php echo $__env->make('backEnd.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(window).on('resize', function(){
        var win = $(this);
        if (win.width() <= 991){
            $('#sidebar.sidebar').removeClass('mini_sidebar');
            $('#main-content').removeClass('mini_main_content');
            $('.footer-area').removeClass('mini_main_content');
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/backEnd/partials/header.blade.php ENDPATH**/ ?>