<?php
	$page_name = 'index';	
	include_once '../config.php';
    $user->check_userlogin();
    $user->check_adminlogin();
    
    if(isset($_POST['value'])){
        $_SESSION['temp_id'] = $_POST['value'];
        $set = 1;
    }

    if(isset($_POST['save'])){
        if(isset($_POST['counter_name'])){
            $counterName = $_POST['counter_name'];
        }
        if(empty($counterName)){
            $message = 1;
        }
        else if($counterName == $cnt->chkCounterName($counterName)){
            $message = 2;
        }
        else{
            if($cnt->setUpdatedName($_SESSION['temp_id'],$counterName)){
                header("Location: counter.php");
            }
            else{
                $message = 1;
            }
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
            <div class="md-card">
                <div class="md-card-content">
                    <form method="post">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-input-group uk-width-medium-1-2">
                                <h4 class="heading_a uk-margin-bottom">Edit Counter</h4>
                            </div>             
                        </div>   
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1">
                                <label>Enter New Counter Name</label>
                                <input type="text" class="md-input" name="counter_name" value="<?php 
                                if(isset($set)){
                                    if($set == 1 ){
                                        echo $cnt->cntdata($_SESSION['temp_id'])->counter_name;
                                    }
                                }
                                ?>"/>
                            </div>
                        </div>
                        <div class="uk-width-medium-1">
                            <button class='md-btn md-btn-primary md-btn-small md-btn-wave-light' name='save' type='submit' style="margin-top:20px;">
                                Save
                            </button> 
                            <a class='md-btn md-btn-primary md-btn-small md-btn-wave-light' name='cancel' type='submit' style="margin-top:20px;" onclick="ClearFields()"; href="counter.php">
                                Cancel
                            </a>
                        </div> 
                    </form>
                </div>
            </div>
            <?php
            if(isset($message)){
                if($message == 1){
            ?>
                <div class="uk-margin-medium-top">
                    <div class="uk-width-medium-1">
                        <a class="md-btn md-btn-danger md-btn-wave-light">Something went wrong!</a>
                    </div>
                </div>
            <?php        
                }
            else if($message == 2){
            ?>
                <div class="uk-margin-medium-top">
                    <div class="uk-width-medium-1">
                        <a class="md-btn md-btn-warning md-btn-wave-light">Counter name is already in use!</a>
                    </div>
                </div>
            <?php
                }
            }
            $message = 0;
            ?>       
        </div>
    </div>
    <footer>
        <div class="container" style="background-color: #368f8b; height: 45px;">
            <span style="color: white;">Powered by BeesWebmo. All rights reserved.</span>
            <span class="right" style="color: white;"> <span class="grey-text text-lighten-3">Version</span> 0.0.1</span>
        </div>
    </footer>
    
    <!-- ======================= Theme Support =========================== -->
    <?php include_once 'theme_support.php'; ?>
    <!-- ======================= End Theme Support =========================== -->


    <!-- ======================= JQuery libs =========================== -->
    <?php include_once 'footer_script.php'; ?>
    <!-- ======================= End JQuery libs =========================== -->

</body>
</html>