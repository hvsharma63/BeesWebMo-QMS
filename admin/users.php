<?php
	$page_name = 'index';	
	
	include_once '../config.php';

    /*To get all user list from DB*/
    $get_all_user_data = $user->get_all_user_data();
	
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
            <h2>Users</h2>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                    
                <a href="user_add.php">
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
                                    <?php
                                        if ( $get_all_user_data ) {
                                            $i=1;
                                            foreach ($get_all_user_data as $user_data) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $user_data->user_name; ?></td>
                                                    <td><?php echo $user_data->user_username; ?></td>
                                                    <td><?php echo $user_data->user_email; ?></td>
                                                    <td>
                                                        <?php 
                                                            if($user_data->user_role == 1){
                                                                echo "Staff";
                                                            } else{
                                                                echo "Admin";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a   href='<?php echo  SITE_URL; ?>/admin/user_edit.php?id=<?php echo $user_data->id; ?>'   ><i class="md-icon material-icons md-color-blue-gray-500">remove_red_eye</i></a>
                                                        
                                                        <span  onclick="return confirm_user_delete(<?php echo $user_data->id ?>);" data-uk-tooltip="{pos:'top'}" title='Delete User'><i class="md-icon material-icons md-color-red-500">delete_forever</i></span>
                                                    </td>
                                                </tr>    
                                            
                                            <?php $i++; 
                                            }
                                        }
                                    ?>
                                    
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

    
    
     <!-- ======================= Color Switcher =========================== -->
     <?php include_once 'colorswitcher.php'; ?>
     <!-- ======================= Color Switcher =========================== -->

     <!-- ======================= JQuery libs =========================== -->
     <?php include_once 'footer_script.php'; ?>
     <!-- ======================= End JQuery libs =========================== -->

</body>
</html>

<script type="text/javascript">
    function confirm_user_delete( delete_user_id ){                 

    UIkit.modal.confirm(
        'You will not be able to recover this user!', 
        function(){ 
            $.post(ajax_url, { action: 'delete_user', id: delete_user_id }, function ( result ) {          
                
                modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>User has been deleted.!<br/><img class=\'uk-margin-top\' src=\''+site_url + '/admin/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                setTimeout(function () {
                    modal.hide();   
                    window.location.href =  ( site_url + '/admin/users.php' );  
                }, 3500);
        });
    });     
}
</script>