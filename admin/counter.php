<?php
	$page_name = 'index';	
	
	include_once '../config.php';
    $counters = $cnt->all_cntdata();
    
    if(isset($_POST['delete'])){
        echo '<script>confirm("Sure wanna Delete")</script>';
        $id = $_POST['delete'];
        if($cnt->deleteCounter($id)){
            $delete=1;
            header('counter.php');
        }
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
                    <li><span>Counter</span></li>    
                </ul>
            </div>
        <div id="page_content_inner">
            <h2>Counter</h2>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium" data-uk-grid-margin>
                <a href="counter-create.php">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-small-right"><i class="uk-icon-small uk-icon-plus md-color-green-800"></i></div>
                            <h4 class="uk-margin-remove uk-margin-small-left"> <ADDRESS>ADD COUNTER</ADDRESS></h4>
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
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>No.</th>  
                                <th>Name</th>  
                                <th>Action</th>
                            </tr>
                            </tfoot>

                            <tbody>
                                <tr>
                                <?php
                                    $i = 1;
                                    foreach($counters as $counter){
                                ?>  
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $counter->counter_name; ?></td>
                                    <td>
                                        <form action="counter-create.php" method="post" style="display:inline-block;">
                                            <span data-uk-tooltip="{pos:'top'}" title='Edit Counter'><button type="submit" name="value" class="md-icon material-icons md-color-blue-gray-500" value="<?php echo $counter->id; ?>">edit</button></span>
                                        </form>
                                        <form method="post" style="display:inline-block;">
                                           <span  onclick="return confirm_counter_delete(<?php echo $counter->id; ?>);" data-uk-tooltip="{pos:'top'}" title='Delete Department'><i class="md-icon material-icons md-color-red-500">delete_forever</i></span>
                                        </form>                     
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                                    }
                                    if(isset($delete)){
                                        if($delete == 1){
                                            echo "<a class='md-btn md-btn-flat md-btn-flat-success md-btn-wave'>Delete Successful!</a>";
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

<!-- MODAL FOR DELETE COUNTER -->
<script type="text/javascript">
    function confirm_counter_delete( delete_counter_id ){                 

    UIkit.modal.confirm(
        'You will not be able to recover this Department!', 
        function(){ 
            $.post(ajax_url, { action: 'delete_counter', id: delete_counter_id }, function ( result ) {          
                
                modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Counter has been deleted.!<br/><img class=\'uk-margin-top\' src=\''+site_url + '/admin/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                setTimeout(function () {
                    modal.hide();   
                    window.location.href =  ( site_url + '/admin/counter.php' );  
                }, 3500);
        });
    });     
}
</script>