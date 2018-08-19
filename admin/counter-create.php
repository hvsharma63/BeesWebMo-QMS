<?php
    $page_name = 'index';	
        
	include_once '../config.php';

    if(isset($_POST['value'])){
        $_SESSION['oldId'] = $_POST['value'];
        $_SESSION['editText'] = 1;
    }

    if(isset($_POST['save'])){
        $counterName = $_POST['counter_name'];
        if(!$counterName){
            $error = 1;
        }
        else if($cnt->chkCounterName($counterName)){
            $error = 2;
        }
        else if($counterName != NULL){
            $cnt->setCounterName($counterName);
            header("Location: counter.php");
        }
    }
    else if(isset($_POST['update'])){
        $oldId = $_SESSION['oldId'];
        $newCounterName = $_POST['counter_name'];
        if(!$newCounterName){
            $error = 1;
        }
        else if($cnt->chkCounterName($newCounterName)){
            $error = 2;
        }
        else if($newCounterName != NULL && $cnt->chkCounterName($newCounterName) == FALSE){
            echo $oldId;
            $cnt->setUpdatedName($oldId,$newCounterName); 
            session_unset($_SESSION['oldId']);
            session_unset($_SESSION['editText']);
            header("Location: counter.php");
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
        <div id="page_content_inner">
            <form action="" method="post">
                <h3 class="heading_b uk-margin-bottom">
                    <?php
                    if(isset($_SESSION['editText'])){
                        if($_SESSION['editText'] == 1){
                            echo "Edit Counter";
                        }
                    }
                    else{
                        echo "Add Counter";
                    }
                    ?>
                </h3>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>
                                <?php
                                    if(isset($_SESSION['editText'])){
                                        if($_SESSION['editText'] == 1){
                                            echo "Enter the Updated Counter Name";
                                        }
                                    }
                                    else{
                                        echo "Enter Counter Name";
                                    }
                                ?>
                                </label>
                                <input type="text" class="md-input" name="counter_name"/>
                            </div>
                            <div class="uk-width-medium-1">
                                <a class="md-btn md-btn-flat md-btn-flat-warning md-btn-wave" href="counter.php">Back</a>
                                <?php
                                    if(isset($_SESSION['editText'])){
                                        if($_SESSION['editText'] == 1){
                                            echo "<button class='md-btn md-btn-success md-btn-wave-light' name='update' type='submit'>Update</button>";
                                        }
                                    }
                                    else{
                                        echo "<button class='md-btn md-btn-success md-btn-wave-light' name='save' type='submit'>Save</button>";
                                    }
                                ?>
                                <?php 
                                    if(isset($error)){
                                        if($error == 1){
                                            echo "<a class='md-btn md-btn-flat md-btn-flat-warning md-btn-wave'>Counter Name cannot be empty!</a>";
                                        }
                                        else if($error == 2){
                                            echo "<a class='md-btn md-btn-flat md-btn-flat-warning md-btn-wave'>Counter Name already exists, Try something else!</a>";
                                        }
                                    }
                                ?>
                            </div> 
                        </div>
                    </div>        
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- ======================= JQuery libs =========================== -->
    <?php include_once 'footer_script.php'; ?>
    <!-- ======================= End JQuery libs =========================== -->

</body>
</html>