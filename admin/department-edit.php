<?php
	$page_name = 'index';	
	
	include_once '../config.php';
    $user->check_userlogin();
    $user->check_adminlogin();
    if(isset($_POST['update']))
    {
        
        $dept->update_deptdata($_POST['dep_id'], $_POST['dep_name'], $_POST['dep_letter']);
        header('Location: department.php');

    }

    if(isset($_POST['idsubmit']))
    {
        $id = $_POST['id'];
    }    
        $deptdata = $dept->deptdata($id);
        foreach($deptdata as $current_dept)
        {
            $dep_id = $deptdata->id;
            $dep_name = $deptdata->department_name;
            $dep_label = $deptdata->department_label;
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
                    <form action="department-edit.php" method="post">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-input-group uk-width-medium-1-4">
                           <h4 class="heading_a uk-margin-bottom">Edit Department No. <?php echo $id; ?></h4>
                        </div>             
                    </div>   
                    <?php
                        echo '<input type="hidden" class="md-input" name="dep_id" value="'.$id.'"/>';
                    ?>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1">
                            <label>Old name was '<?php echo $dep_name; ?>'</label>
                            <input type="text" class="md-input" name="dep_name"/>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1">
                            <label>Old letter was '<?php echo $dep_label; ?>'</label>
                            <input type="text" class="md-input" name="dep_letter" />
                        </div>
                    </div>
                    
                    <div class="uk-width-medium-1">
                          
                        <button class='md-btn md-btn-primary md-btn-small md-btn-wave-light' name='update' type='submit'>Update</button> 
                        <button class='md-btn md-btn-danger md-btn-wave-light' name='cancel' type='submit' onclick="ClearFields()";>
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