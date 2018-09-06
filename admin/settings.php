<?php
	$page_name = 'index';	
	
	include_once '../config.php';
	
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
                <li><span>Settings</span></li>    
            </ul>
        </div>
        <div id="page_content_inner">
            <h2>Settings</h2>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <?php 
                        if(isset($_POST['update_account'])){
                            $user->update_detail($_POST['username'],$_POST['user_name'],$_POST['email'],$_POST['password']);
                        }
                    ?>
                    <form method="post">
                    <div class="md-card">

                        <div class="md-card-content">
                            <h3 class="heading_a">Account</h3>
                            <div class="uk-grid" data-uk-grid-margin>

                                <div class="uk-width-medium-1-1">
                                    <label>Name</label>
                                    <input type="text" name="username" value="<?php echo $user->userdata($_SESSION['user_id'])->user_name; ?>" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>User Name</label>
                                    <input type="text" name="user_name"  value="<?php echo $user->userdata($_SESSION['user_id'])->user_username; ?>" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Role</label>
                                    <?php if($user->userdata($_SESSION['user_id'])->user_role == 1){ ?>
                                        <input type="text" class="md-input" value="Staff" readonly="" />
                                <?php }else{ ?><input type="text" class="md-input" value="Admin" readonly="" /><?php } ?>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $user->userdata($_SESSION['user_id'])->user_email; ?>" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Password</label>
                                    <input type="text" name="password" class="md-input" />
                                </div>
                                
                                <div class="uk-width-medium-1-1">
                                    <button type="submit" name="update_account" class="md-btn md-btn-primary md-btn-large md-btn-wave-light waves-effect waves-button waves-light"> Update </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="uk-width-medium-1-2">
                    <?php 
                        if(isset($_POST['update_company'])){
                            $user->update_company_detail($_POST['cname'],'1',$_POST['cemail'],$_POST['caddress'],$_POST['cphone'],$_POST['clocation']);
                        }
                        $data = $user->companyData();
                    ?>
                    <form method="post">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Company Setting</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Name</label>
                                    <input type="text" value="<?php echo $data->company_name; ?>" name="cname" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Email</label>
                                    <input type="text" value="<?php echo $data->company_email; ?>" name="cemail" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Addreess</label>
                                    <textarea cols="30" name="caddress" rows="3" class="md-input"><?php echo $data->company_address; ?></textarea>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Phone</label>
                                    <input type="text"  value="<?php echo $data->company_phone; ?>" name="cphone" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Location</label>
                                    <input type="text"  value="<?php echo $data->company_location; ?>" name="clocation" class="md-input" />
                                </div>

                                <div class="uk-width-medium-1-1">
                                    <button type="submit" name="update_company" class="md-btn md-btn-primary md-btn-large md-btn-wave-light waves-effect waves-button waves-light"> Update </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <!-- <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Set Missed And Overtime</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Overtime (In Seconds)</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Missed Time (In Seconds)</label>
                                    <input type="text" class="md-input" />
                                </div>

                                <div class="uk-width-medium-1-1">
                                    <a class="md-btn md-btn-primary md-btn-large md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)" style="float: right;">Update<i class="material-icons">update</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Change Default Language</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <lable>Select Language</lable>
                                    <select id="select_demo_4" data-md-selectize>
                                        <option value="">Select Language</option>
                                        <option value="a1">Item A1</option>
                                        <option value="b1">Item B1</option>
                                        <option value="c1">Item C1</option>   
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <a class="md-btn md-btn-primary md-btn-large md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)" style="float: right;">Update<i class="material-icons">update</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
    
    <footer>
        <div class="container" style="background-color: #368f8b; height: 45px;">
            <span style="color: white;">Powered by BeesWebmo. All rights reserved.</span>
            <span class="right" style="color: white;"> <span class="grey-text text-lighten-3">Version</span> 0.0.1</span>
        </div>
    </footer>

     <!-- ======================= JQuery libs =========================== -->
     <?php include_once 'footer_script.php'; ?>
     <!-- ======================= End JQuery libs =========================== -->

    
    
</body>
</html>