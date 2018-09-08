<?php
	$page_name = "user_edit";
	include_once '../config.php';
    $user->check_userlogin();
    $user->check_adminlogin();
    /*To get data of particular user from DB*/
    $get_selected_user_data = $user->get_selected_user_data( $_GET['id'] );

    if( isset( $_POST['update_user_password'] ) ) {                  
        $_POST = array_map("TrimData", $_POST );      

        /*To update the password*/   
         $user->update_user_profile( $_POST ); 
    }          
	
?>

<!doctype html>

<html lang="en">

<head>

	<?php include_once 'head.php'; ?>
	
    

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    
    <!-- main header -->    
    <?php include 'header.php'; ?>    
    <!-- main header end -->
    
    <!-- main sidebar -->
    <?php include 'side_bar.php'; ?>
    <!-- main sidebar end -->

    <div id="page_content">
        <div id="top_bar">
                <ul id="breadcrumbs">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="users.php">Users</a></li>    
                    <li><span>Change Password</span></li>
                </ul>
            </div>
        <div id="page_content_inner">
            <h2>Change Password</h2>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1" style="width: 50%;">
                    <div class="md-card">
                        <div class="md-card-content">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <input type="hidden" name="id" value="<?php echo $get_selected_user_data->id; ?>">
                                    <div class="uk-width-medium-1-1">
                                        <label for="user_edit_position_control">Password</label>
                                        <input type="password" name="user_password" id="user_password" class="md-input" placeholder="" required>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <label for="user_edit_position_control">Confirm Password</label>
                                        <input type="password" name="user_confirmpass" id="user_confirmpass" class="md-input" onfocus="return validatePassword();" placeholder="" required>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <button type="submit" name="update_user_password" class="md-btn md-btn-primary md-btn-small md-btn-wave-light" ><i class="material-icons">&#xE2C6;</i>Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================= Color Switcher =========================== -->
     <?php include_once 'colorswitcher.php'; ?>
     <!-- ======================= Color Switcher =========================== -->

     <!-- ======================= JQuery libs =========================== -->
     <?php include_once 'footer_script.php'; ?>
     <!-- ======================= End JQuery libs =========================== -->
</body>
</html>

<script type="text/javascript">
    /* To check if pass. and conf. pass. are same or not */
    /*function validatePassword(){
        var password = document.getElementById("user_password")
      , confirm_password = document.getElementById("user_confirmpass"); 
        if (password.value == '') {
            password.setCustomValidity("Password can't be empty");
        }
        else{
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
            
    }*/
</script>