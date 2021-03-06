<?php

    // TODO:
    // [x] add disabled button displaying verified token's emailid
    // [x] update password function 
    // [x] 
    include_once '../config.php';
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        if($user->check_token($token)){
            $data = $user->check_token($token);
        }
        else{
            header("Location: forgotPassword.php");
        }
    }
    else{
        header("Location: forgotPassword.php");
    }
    
    if( isset($_POST['submit_login']) ){
        
        //$_POST = array_map("TrimData", $_POST );
        //var_dump($_POST);
        $new_password = $_POST['user_password'];
        if( $user->update_password( $new_password, $token ) ){
            $message = 1;
        }
        else{
            $message = 2;
        }
    }
?>

<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 May 2018 05:32:12 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

   <!--  <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32"> -->

    <title>Password Reset</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <!-- <div class="user_avatar"></div> -->
                    <div>
                        <h2>Create New Password</h2>
                        <h5>ENTER THE NEW PASSWORD</h5>
                    </div>
                </div>
                <form method="POST">
                    <div class="uk-form-row">
                        <label for="email">E-mail</label>
                        <input class="md-input" type="email" id="user_email" value="<?php echo $data->user_email ?>" disabled/>
                    </div>
                    <div class="uk-form-row">
                        <h2 class="heading_c">Password</h2>
                        <input type="password" class="md-input" name="user_password" />
                        <a href="#" class="uk-form-password-toggle" data-uk-form-password>show</a>
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" name="submit_login" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Reset Password" />
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($message)){
            if($message == 1){
        ?>
            <div class="uk-margin-medium-top">
                <div class="uk-width-medium-1">
                    <a class="md-btn md-btn-success md-btn-wave-light">Password has been reset</a>
                </div>
            </div>
        <?php 
            }
            else if($message == 2){
        ?>
            <div class="uk-margin-medium-top">
                <div class="uk-width-medium-1">
                    <a class="md-btn md-btn-danger md-btn-wave-light">Sorry, Failed!</a>
                </div>
            </div>
        <?php        
            }
        }
        ?>
    </div>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="assets/js/pages/login.min.js"></script>

    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>

<!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 May 2018 05:32:15 GMT -->
</html>