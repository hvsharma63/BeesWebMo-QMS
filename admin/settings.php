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
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Account</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Name</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>User Name</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Role</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Email</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Password</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Confirm Password</label>
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
                            <h3 class="heading_a">Company Setting</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Name</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Email</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Addreess</label>
                                    <textarea cols="30" rows="3" class="md-input"></textarea>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Phone</label>
                                    <input type="text" class="md-input" />
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <label>Location</label>
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
                </div>
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