<?php
	$page_name = 'index';	
	
	include_once '../config.php';
    $user->check_userlogin();
    $user->check_adminlogin();
    
	$depts = $dept->all_deptdata();

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
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2" data-uk-grid-margin>
                    
                <a href="department-add.php">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-small-right"><i class="uk-icon-small uk-icon-plus md-color-green-800"></i></div>
                            <h4 class="uk-margin-remove uk-margin-small-left"> <ADDRESS>ADD DEPARTMENT</ADDRESS></h4>
                        </div>
                    </div>
                </a>                 
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-input-group uk-width-medium-1-4">
                           <h4 class="heading_a uk-margin-bottom">Product Master</h4>
                        </div>    
                    </div>   
                    <div class="uk-margin-medium-bottom">
                        <div class="md-card-content">
                    <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No.</th>  
                            <th>Name</th>  
                            <th>Letter</th>  
                            <th>Start</th> 
                            <th>Action</th>  
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>No.</th>  
                            <th>Name</th>  
                            <th>Letter</th>  
                            <th>Start</th> 
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                            <?php
                                $i=1;
                                foreach($depts as $current_dept)
                                {
                                    $dep_id = $current_dept->id;
                                    $dep_name = $current_dept->department_name;
                                    $dep_label = $current_dept->department_label;
                                    $dep_start = $current_dept->today_start;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $dep_name; ?></td>
                                <td><?php echo $dep_label; ?></td>  
                                <td><?php echo $dep_start; ?></td>  
                                <td>
                                    <!-- <div class="hidden"><?php echo $users_list_result->user_is_active ?></div> -->
                                    <form action="department-edit.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dep_id; ?>">
                                        <button type="submit" name="idsubmit" class="md-icon material-icons md-color-blue-gray-500">edit</button>

                                        <span  onclick="return confirm_department_delete(<?php echo $current_dept->id; ?>);" data-uk-tooltip="{pos:'top'}" title='Delete Department'><i class="md-icon material-icons md-color-red-500">delete_forever</i></span>
                                    </form>

                                    <!-- <a href="department-delete.php?deleteid=<?php echo $dep_id; ?>"><span  onclick="return confirm('Are you sure you want to Delete Department?')" data-uk-tooltip="{pos:'top'}" title='Delete User'><i class="md-icon material-icons md-color-red-500">delete_forever</i></span></a> -->

                                    
                                </td>
                            </tr>         
                            <?php
                                $i++;
                                }
                               
                            ?>

                        </tbody>
                    </table>
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

   
    <!-- ======================= Color Switcher =========================== -->
     <?php include_once 'colorswitcher.php'; ?>
     <!-- ======================= Color Switcher =========================== -->

    <!-- ======================= JQuery libs =========================== -->
    <?php include_once 'footer_script.php'; ?>
    <!-- ======================= End JQuery libs =========================== -->

</body>
</html>

<script type="text/javascript">
    function confirm_department_delete( delete_department_id ){                 

    UIkit.modal.confirm(
        'You will not be able to recover this Department!', 
        function(){ 
            $.post(ajax_url, { action: 'delete_department', id: delete_department_id }, function ( result ) {          
                
                modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Department has been deleted.!<br/><img class=\'uk-margin-top\' src=\''+site_url + '/admin/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                setTimeout(function () {
                    modal.hide();   
                    window.location.href =  ( site_url + '/admin/department.php' );  
                }, 3500);
        });
    });     
}
</script>