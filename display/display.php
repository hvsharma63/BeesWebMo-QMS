<?php 
    include_once '../config.php'; 

    $data=array();
    $data=$disp->show_display();
?>

<!doctype html>

<html lang="en">

<head>

	
    

	<?php include_once 'head.php'; ?>
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    
    <!-- main header -->    
    <?php include_once 'header.php'; ?> 

    <!-- main header end -->
    

    
        <div id="page_content_inner">

            <div class="uk-grid" data-uk-grid-margin>
                
                <div class="uk-width-medium-1-3">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div>
                                <center><p class="display_wait_big">Queue Details</p>
                                    <p class="display_wait_small"><?php if($data['one']=="NIL"){echo "NIL";}else{echo $data['one']->token;} ?></p>
                                    <hr>
                                    <p class="display_wait_big">Queue Details</p>
                                    <p class="display_wait_small"><?php if($data['two']=="NIL"){echo "NIL";}else{echo $data['two']->token;} ?></p>
                                    <hr>
                                    <p class="display_wait_big">Queue Details</p>
                                    <p class="display_wait_small"><?php if($data['three']=="NIL"){echo "NIL";}else{echo $data['three']->token;} ?></p>
                                </center>
                            </div>
                            <div class="queuevsserved"></div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-2-3">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-input-group uk-width-medium-4-4">
                                   <center><h1>Token Number</h1>
                                   <p class="first_nill"><?php echo $data['current']->token; ?></p>
                                   <h1>Please Proceed To</h1>
                                   <p class="second_nill"><?php echo $data['current']->counter; ?></p></center>
                                </div>     
                            </div>   
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="trending-line-chart-wrapper uk-width-medium-1-1">
                    <span style="font-size:<?php echo $mrq->get_values()->size; ?>px;color:<?php echo $mrq->get_values()->color; ?>">
                            <marquee><?php echo $mrq->get_values()->title; ?></marquee>
                        </span>
                </div>
            </div>

        </div> 
        <footer>
            <div class="container" style="background-color: #444; height: 45px;">
                <span style="color: white;">Powered by BeesWebmo. All rights reserved.</span>
                <span class="right" style="color: white;"> <span class="grey-text text-lighten-3">Version</span> 0.0.1</span>
            </div>
        </footer>
    </div>
    <!-- ======================= Theme Support =========================== -->
    <?php include_once '../admin/theme_support.php'; ?>

    <!-- ======================= End Theme Support =========================== -->

    <!-- ======================= JQuery libs =========================== -->
    <?php include_once '../admin/footer_script.php'; ?>
    <!-- ======================= End JQuery libs =========================== -->

</body>
</html>