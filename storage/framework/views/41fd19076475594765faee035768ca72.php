<?php
    $gs = generalSetting();
?>
<!DOCTYPE html>
<?php
    App::setLocale(getUserLanguage());
    $ttl_rtl = userRtlLtl();

    $login_background = App\SmBackgroundSetting::where([['is_default', 1], ['title', 'Login Background']])->first();

    if (empty($login_background)) {
        $css = 'background: url(' . url('public/backEnd/img/edulia-login-bg.jpg') . ') no-repeat center; background-size: cover; ';
    } else {
        if (!empty($login_background->image)) {
            $css = "background: url('" . url($login_background->image) . "') no-repeat center; background-size: cover;";
        } else {
            $css = 'background:' . $login_background->color;
        }
    }
?>
<html lang="<?php echo e(app()->getLocale()); ?>" <?php if(isset($ttl_rtl) && $ttl_rtl == 1): ?> dir="rtl" class="rtl" <?php endif; ?>>

<head>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset(generalSetting()->favicon)); ?>" type="image/png" />
    <title><?php echo app('translator')->get('auth.login'); ?></title>
    <meta name="_token" content="<?php echo csrf_token(); ?>" />

    <!-- Fonts -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/bootstrap.min.css')); ?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/fontawesome.all.min.css')); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/theme/edulia/css/style.css')); ?>">
    <style>
        .row_gap_24 {
            row-gap: 24px;
        }

        .login{
            height: auto;
            min-height: 100vh;
            padding: 50px 0px;
        }

        .row_gap_24 input.input-control-input {
            font-size: 12px;
        }

        .login_wrapper {
            width: 550px;
            background: #fff;
            padding: 30px;
        }

        .text-danger.text-left {
            font-size: 14px;
        }
        .row.row-gap-10 {
            row-gap: 10px;
            --bs-gutter-x: 10px;
        }

        .row.row-gap-10 .input-control-input{
            padding: 10px;
        }

        .row.row-gap-10 [class*=col-]{
            --bs-gutter-x: 10px;
        }

        .row-gap-10 input.input-control-input {
            font-size: 11px;
        }
        @media only screen and (max-width: 767px){
                section.login {
                    place-content: center;
                    align-content: center;
                    justify-content: center;
            }
        }
        @media (max-width: 480px){
            .row.row-gap-10 [class*=col-]{
                width: 50%;
                max-width: 50%;
            }
        }
    </style>
</head>

<body>

    <section class="login" style="<?php echo e($css); ?>">
        <div class="login_wrapper">
            <!-- login form start -->
            <div class="login_wrapper_login_content">
                <div class="login_wrapper_logo text-center"><img src="<?php echo e(asset(generalSetting()->logo)); ?>"
                        alt=""></div>
                <div class="login_wrapper_content">
                    <h4><?php echo app('translator')->get('auth.login_details'); ?></h4>
                    <form action="<?php echo e(route('login')); ?>" method='POST'>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="username" id="username-hidden">
                        <div class="input-control">
                            <label for="#" class="input-control-icon"><i class="fal fa-envelope"></i></label>
                            <input type="text" name="email" class="input-control-input"
                                placeholder="<?php echo app('translator')->get('auth.enter_email_address'); ?>" value="<?php echo e(old('email')); ?>">
                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="text-danger text-left mb-15" role="alert">
                                <?php echo e($errors->first('email')); ?>

                            </span>
                        <?php endif; ?>
                        <div class="input-control">
                            <label for="#" class="input-control-icon"><i class="fal fa-lock-alt"></i></label>
                            <input type="password" name='password' class="input-control-input"
                                placeholder='<?php echo app('translator')->get('auth.enter_password'); ?>'>
                        </div>
                        <?php if($errors->has('password')): ?>
                            <span class="text-danger text-left mb-15" role="alert">
                                <?php echo e($errors->first('password')); ?>

                            </span>
                        <?php endif; ?>
                        <div class="input-control d-flex flex-wrap row_gap_24">
                            <label for="#" class="checkbox">
                                <input type="checkbox" class="checkbox-input" name="remember" id="rememberMe"
                                    <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <span class="checkbox-title"><?php echo app('translator')->get('auth.remember_me'); ?></span>
                            </label>
                            <a href="<?php echo e(route('recoveryPassord')); ?>" id='forget'><?php echo app('translator')->get('auth.forget_password'); ?>?</a>
                        </div>
                        <div class="input-control">
                            <input type="submit" class='input-control-input' value="Sign In">
                        </div>
                    </form>
                </div>
            </div>

            <?php if(config('app.app_sync')): ?>
                <div class="row justify-content-center align-items-center" style="">
                    <div class="col-lg-6 col-md-8">
                        <div class="grid__button__layout">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user): ?>
                                    <form method="POST" class="loginForm" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="email" value="<?php echo e($user[0]->email); ?>">
                                        <input type="hidden" name="auto_login" value="true">
                                        
                                    </form>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- login form end -->
            <?php if(config('app.app_sync')): ?>
                <div class="row justify-content-center align-items-center mt-20">
                    <div class="col-lg-12">
                        <div class="row row-gap-10">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user): ?>
                                    <div class="col-4 col-sm-4 col-md-3">
                                        <form method="POST" class="loginForm" action="<?php echo e(route('login')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="email" value="<?php echo e($user[0]->email); ?>">
                                            <input type="hidden" name="auto_login" value="true">
                                            <input type="submit" class='input-control-input'
                                                value="<?php echo e($user[0]->roles->name); ?>">
                                        </form>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </section>


    <!-- jQuery JS -->
    <script src="<?php echo e(asset('public/theme/edulia/js/jquery.min.js')); ?>"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Toastr JavaScript file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Main Script JS -->
    <script src="<?php echo e(asset('public/theme/edulia/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/js/login.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#email-address").keyup(function() {
                $("#username-hidden").val($(this).val());
            });
        });
    </script>
     <script>
        <?php if(Session::has('toast_message')): ?>
            toastr.<?php echo e(Session::get('toast_message')['type']); ?>('<?php echo e(Session::get('toast_message')['message']); ?>');
        <?php endif; ?>
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\immersion\resources\views/frontEnd/theme/edulia/login/login.blade.php ENDPATH**/ ?>