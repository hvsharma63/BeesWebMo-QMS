<?php
	$page_name = 'index';	
	
    

	include_once '../config.php';
    $user->check_userlogin();
   
	$users=$user->all_userdata();
    $depts=$dept->all_deptdata();
    $cnts=$cnt->all_cntdata();
    $calls=$call->all_calldata();


    foreach($depts as $current_dept){
        $_SESSION[$current_dept->department_name]=1;
    }
    if(isset($_POST['call_next']))
    {
        $call->call_next($_POST['user'],$_POST['dept'],$_POST['cnt']);
        //header('Location:call.php');
    }

    if(isset($_POST['reject']))
    {
        $call->reject($_POST['user'],$_POST['dept'],$_POST['cnt']);
        //header('Location:call.php');
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
                <li><span>Call</span></li>             
            </ul>
        </div>
        <div id="page_content_inner">
            <h2>Call</h2>
            <form method="POST">
             <div class="uk-grid" data-uk-grid-margin>
             
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">New Call</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <span class="uk-form-help-block">User</span>
                                    <select id="select_demo_4" name="user" data-md-selectize>
                                        <option value="">Select User</option>
                                        <?php
                                            foreach($users as $current_user)
                                            {
                                        ?>
                                        <option value="<?php echo $current_user->id;?>"><?php echo $current_user->user_name;?></option>
                                        <!-- <option value="a1">Item A1</option>
                                        <option value="b1">Item B1</option>
                                        <option value="c1">Item C1</option>    -->
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <span class="uk-form-help-block">Department</span>
                                    <select id="select_demo_4" name="dept" data-md-selectize>
                                        <option value="">Select Department</option>
                                        <?php
                                            foreach($depts as $current_dept)
                                            {
                                        ?>
                                        <option value="<?php echo $current_dept->id;?>"><?php echo $current_dept->department_name;?></option>
                                        <!-- <option value="a1">Item A1</option>
                                        <option value="b1">Item B1</option>
                                        <option value="c1">Item C1</option>    -->
                                        <?php } ?>   
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-1">
                                    <span class="uk-form-help-block">Counter</span>
                                    <select id="select_demo_4" name="cnt" data-md-selectize>
                                        <option value="">Select Counter</option>
                                        <?php
                                            foreach($cnts as $current_cnt)
                                            {
                                        ?>
                                        <option value="<?php echo $current_cnt->id;?>"><?php echo $current_cnt->counter_name;?></option>
                                        <!-- <option value="a1">Item A1</option>
                                        <option value="b1">Item B1</option>
                                        <option value="c1">Item C1</option>    -->
                                        <?php } ?>         
                                    </select>
                                </div>
                                
                                <div class="uk-width-medium-1-1">
                                    <button type="submit" name="call_next" class="md-btn md-btn-primary md-btn-large md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)" style="float: right;">Call Next<i class="material-icons">&#xE315;</i></a>
                                    <button type="submit" name="reject" class="md-btn md-btn-primary md-btn-large md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)" style="float: right;">Reject</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Today's Queue</h3>
                            <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Number</th>
                                <th>Called</th>
                                <th>Counter</th>
                               
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Number</th>
                                <th>Called</th>
                                <th>Counter</th>
                                
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php
                            $x=1;
                            foreach($calls as $current_call){
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $dept->deptdata($current_call->department)->department_name; ?></td>
                                <td><?php echo $dept->deptdata($current_call->department)->department_name."-".$current_call->number; ?></td>
                                <td><?php if($current_call->call_status==0){echo "Yes";}else{echo "No";} ?></td>
                                <td><?php if($current_call->counter==0){echo "NIL";}else{echo $cnt->cntdata($current_call->counter)->counter_name;} ?></td>
                                
                            </tr>
                            <?php
                            $x++;
                            }
                            ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Click one department to Issue Token</h3>
                            <div class="uk-grid" data-uk-grid-margin >
                                <?php
                                    foreach($depts as $current_dept){ 
                                ?>
                                <div class="uk-width-large-1-3">
                                    <form action="print.php" method="POST">
                                        <button type="submit" class="md-btn md-btn-primary  md-btn-wave-light waves-effect waves-button waves-light" name="dept" value="<?php echo $current_dept->id;?>"><?php echo $current_dept->department_name;?></button>
                                    </form>
                                </div>
                                    <?php } ?>
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

     <!-- ======================= JQuery libs =========================== -->
     <?php include_once 'footer_script.php'; ?>
     <!-- ======================= End JQuery libs =========================== -->

</body>
</html>