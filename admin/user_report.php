<?php
	$page_name = 'index';	
	
	include_once '../config.php';
    $users=$user->all_userdata();	
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
            <h2>User Reports</h2>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-3">
                            <select id="select_demo_4" data-md-selectize>
                                <option value="">Select User</option>
                                <?php
                                foreach($users as $current_user)
                                {
                                    ?>
                                    <option value="<?php echo $current_user->id;?>"><?php echo $current_user->user_name;?></option>
                                    <?php } ?>   
                            </select>
                        </div>
                        <div class="uk-width-medium-1-3">
                           <label>Date</label>
                            <input type="text" id="report_dt" class="md-input" data-uk-datepicker="{format:'DD-MM-YYYY'}" required>
                        </div>
                        <div class="uk-width-medium-1-3 uk-text-center">
                            <a href="#" class="md-btn md-btn-primary uk-margin-small-top" id="viewReport">GO</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="viewTable"></div>
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
     <script type="text/javascript">
        $(document).ready(function(){
            $("#viewReport").on('click', function(){
                var user_id = $("#select_demo_4").val();
                var date = $("#report_dt").val();
                $.ajax({
                    url: 'report_table.php',
                    type: 'POST',
                    data: ({ id: user_id, date: date }),
                    success: function(data){
                        $("#viewTable").html(data);
                    }
                });
            }); 
        });
     </script>
</body>
</html>