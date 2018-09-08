<?php
	$page_name = 'index';	
	
	include_once '../config.php';
    $user->check_userlogin();
    $user->check_adminlogin();
    if(isset($_POST['save']))
    {
        $dept->add_deptdata($_POST['dep_name'],$_POST['dep_letter']);
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
                <li><span>Department</span></li>             
            </ul>
        </div>
        <div id="page_content_inner">
            <h2>Department</h2>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>                           
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <form action="department-add.php" method="post">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-input-group uk-width-medium-1-4">
                           <h4 class="heading_a uk-margin-bottom">Add Department</h4>
                        </div>             
                    </div>   
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1">
                            <label>Enter Department Name</label>
                            <input type="text" class="md-input" name="dep_name"/>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1">
                            <label>Enter Letter</label>
                            <input type="text" class="md-input" name="dep_letter" />
                        </div>
                    </div>
                    
                    <div class="uk-width-medium-1">
                           
                        <button class='md-btn md-btn-primary md-btn-small md-btn-wave-light' name='save' type='submit' style="margin-top:20px;">Save</button> 
                        <button class='md-btn md-btn-primary md-btn-small md-btn-wave-light' name='cancel' type='submit' style="margin-top:20px;" onclick="ClearFields()";>
                        Cancel</button>   
                        <!-- ClearField();   function is define in footer_script.php -->

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

    <!-- ======================= Theme Support =========================== -->
    <?php include_once 'theme_support.php'; ?>
    <!-- ======================= End Theme Support =========================== -->


     <!-- ======================= JQuery libs =========================== -->
     <?php include_once 'footer_script.php'; ?>
     <!-- ======================= End JQuery libs =========================== -->

</body>
</html>