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
                    <li><span>Reports</span></li>
                    <li><span>User Reports</span></li>    
                </ul>
            </div>
        <div id="page_content_inner">
            <h2>Queue List</h2>
           
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-input-group uk-width-medium-1-4">
                            <h4 class="heading_a uk-margin-bottom">Report</h4>
                            <label for="user_edit_position_control">Date</label>
                            <input type="text"  name="tipster_dob" class="md-input" data-uk-datepicker="{format:'DD-MM-YYYY'}" required>
                        </div>    
                    </div>   
                    <div class="uk-margin-medium-bottom">
                        <div class="md-card-content">
                    <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No.</th>  
                            <th>Department</th>  
                            <th>Number</th>
                            <th>Called</th>
                            <th>User</th>
                            <th>Counter</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>No.</th>  
                            <th>Department</th>  
                            <th>Number</th>
                            <th>Called</th>
                            <th>User</th>
                            <th>Counter</th>
                        </tr>
                        </tfoot>

                        <tbody>
                            
                        </tbody>
                    </table>
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