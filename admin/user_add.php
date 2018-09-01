<?php
	$page_name = 'index';	
	
	include_once '../config.php';

	if (isset($_POST['add_user'])) {
		$_POST = array_map("TrimData", $_POST );

		/*Calling function of add user to add the user into the database*/
		$user -> add_user( $_POST );
		
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
                <li><span>Add</span></li>             
            </ul>
        </div>
        <div id="page_content_inner">
            <h2>Add Users</h2>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1" style="width: 50%;">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">New User</h3>
                            <form method="POST" enctype="multipart/form-data">
                            	<div class="uk-grid" data-uk-grid-margin>
                            		<div class="uk-width-medium-1-1">
	                                   <label for="user_edit_position_control">Name</label>
	                                    <input type="text" name="user_name" class="md-input" placeholder="" required>
	                                </div>
	                                <div class="uk-width-medium-1-1">
	                                    <label for="user_edit_position_control">Username</label>
	                                    <input type="text" name="user_username" class="md-input" placeholder="" required>
	                                </div>
	                                <div class="uk-width-medium-1-1">
	                                    <label for="user_edit_position_control">Email</label>
	                                    <input type="email" name="user_email" class="md-input" placeholder="" required>
	                                </div>
	                                <div class="uk-width-medium-1-1">
	                                    <span for="user_edit_position_control">Role</span>
	                                    <input type="number" name="user_role" class="md-input" placeholder="Staff" value="1" readonly>
	                                </div>
	                                <div class="uk-width-medium-1-1">
	                                    <label for="user_edit_position_control">Password</label>
	                                    <input type="password" name="user_password" id="user_password" class="md-input" placeholder="" required>
	                                </div>
	                                <div class="uk-width-medium-1-1">
	                                    <label for="user_edit_position_control">Confirm Password</label>
	                                    <input type="password" name="user_confirmpass" id="user_confirmpass" class="md-input" onfocus="return validatePassword();" placeholder="" required>
	                                </div>

	                                <div class="uk-width-medium-1-1">
	                                  <button type="submit" name="add_user" class="md-btn md-btn-primary md-btn-small md-btn-wave-light" ><i class="material-icons">&#xE2C6;</i>Add</button>
	                                </div>
	                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <footer>
            <div class="container" style="background-color: #368f8b; height: 45px;">
                <span style="color: white;">Powered by BeesWebmo. All rights reserved.</span>
                <span class="right" style="color: white;"> <span class="grey-text text-lighten-3">Version</span> 0.0.1</span>
            </div>
        </footer>
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
	function validatePassword(){
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
			
	}
</script>
