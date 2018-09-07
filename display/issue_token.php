
<!doctype html>

<html lang="en">

<head>

	<?php include_once 'head.php'; ?>
    <?php include_once '../config.php'; ?>
    <?php 
        $depts=$dept->all_deptdata();
	?>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    
    <!-- main header -->    
    <?php include 'header.php'; ?>    
    <!-- main header end -->
    

        <div id="page_content_inner">

       <div class="uk-width-medium-1-1">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Click one department to Issue Token</h3>
                    <div class="uk-grid" data-uk-grid-margin >
                        <?php
                            foreach($depts as $current_dept){ 
                        ?>
                        <div class="uk-width-large-1-6">
                            <a class="md-btn md-btn-primary  md-btn-wave-light waves-effect waves-button waves-light" href="print.php?dept=<?php echo $current_dept->id;?>"><?php echo $current_dept->department_name;?></a>
                        </div>
                        
                        <?php } ?>
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
   
    <!-- ======================= Theme Support =========================== -->
    <?php include_once '../admin/theme_support.php'; ?>

    <!-- ======================= End Theme Support =========================== -->

    <!-- ======================= JQuery libs =========================== -->
    <?php include_once '../admin/footer_script.php'; ?>
    <!-- ======================= End JQuery libs =========================== -->

</body>
</html>