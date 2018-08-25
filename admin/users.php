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
                    <li><span>Users</span></li>    
                </ul>
            </div>
        <div id="page_content_inner">
            <h2>Counter</h2>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                    
                <a href="#">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-small-right"><i class="uk-icon-small uk-icon-plus md-color-green-800"></i></div>
                            <h4 class="uk-margin-remove uk-margin-small-left"> <ADDRESS>ADD USER</ADDRESS></h4>
                        </div>
                    </div>
                </a>                 
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-input-group uk-width-medium-1-4">
                           <h4 class="heading_a uk-margin-bottom"></h4>
                        </div>    
                    </div>   
                    <div class="uk-margin-medium-bottom">
                        <div class="md-card-content">
                            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No.</th>  
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>  
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>No.</th>  
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>  
                                    <th>Action</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                    <tr>
                                        <td><!-- <?php echo $i; ?> -->1</td>
                                        <td>NULL</td>
                                        <td>NULL</td>
                                        <td>NULL</td>
                                        <td>NULL</td>
                                        <td>
                                            <!-- <div class="hidden"><?php echo $users_list_result->user_is_active ?></div> -->
                                            <a   href='#'><i class="md-icon material-icons md-color-blue-gray-500">remove_red_eye</i></a>
                                            <span  onclick="" data-uk-tooltip="{pos:'top'}" title='Delete User'><i class="md-icon material-icons md-color-red-500">delete_forever</i></span>
                                        </td>
                                    </tr>     
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

   

     <!-- ======================= JQuery libs =========================== -->
     <?php include_once 'footer_script.php'; ?>
     <!-- ======================= End JQuery libs =========================== -->

</body>
</html>