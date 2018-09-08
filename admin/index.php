<?php 

$page_name = "index";
include_once '../config.php';
$user->check_userlogin();


/* Get currenlty logged in user all details */
$user_getinfo = $user->get_userinfo();
$cnts=$cnt->all_cntdata();

if(isset($_POST['notification_set'])){
    setcookie('NOTIFICATION_TEXT',$_POST['notification_text'],'/');
    setcookie('NOTIFICATION_SIZE',$_POST['notification_size'],'/');
    setcookie('NOTIFICATION_COLOR',$_POST['notification_color'],'/');
    
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
            <h2>Dashboard</h2>

            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium "  data-uk-grid-margin>

                <?php
                if($user_getinfo->user_role == 1){
                    ?>

                </div>


                <?php
            } else {
                ?>

                <!-- #################### Statistics #################### -->

                <!-- ******************** Today Queue Starts ******************** -->
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span><a href="#">      More Info</a></span>
                            </div>
                            <span class="uk-text-muted uk-text-small">Today Queue</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $call->today_queue(); ?></noscript></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- ******************** Today Queue Ends ******************** -->

                <!-- ******************** Today Missed Starts ******************** -->
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span><a href="#">      More Info</a></span>
                            </div>
                            <span class="uk-text-muted uk-text-small">Today Served</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $call->today_missed(); ?></noscript></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- ******************** Today Missed Ends ******************** -->

                <!-- ******************** Today Served Starts ******************** -->
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span><a href="#">      More Info</a></span>
                            </div>
                            <span class="uk-text-muted uk-text-small">Today Served</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $call->today_served(); ?></noscript></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- ******************** Today Served Ends ******************** -->

                <!-- ******************** Today Overtime Starts ******************** -->
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span><a href="#">      More Info</a></span>
                            </div>
                            <span class="uk-text-muted uk-text-small">Over Time</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $call->today_served(); ?></noscript></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- ******************** Today Overtime Ends ******************** -->

            </div>  

            <!-- ******************** Graph Starts ******************** -->
            <div class="uk-grid" data-uk-grid-margin>

                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div>
                                <h3>Queue Details</h3>
                            </div>
                            <div class="queuevsserved"></div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div>
                                <h3>Today Vs Yesterday</h3>
                            </div>
                            <div class="todayvsyseterday">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ******************** Graph Ends ******************** -->
            <?php
        }
        ?>
        <!-- Notifications Area -->

        <div class="md-card" style="margin-top: 80px;">
            <div class="md-card-content">
                <div><h3>Notification</h3></div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="trending-line-chart-wrapper uk-width-medium-1-1">
                        <p>Preview:</p>
                        <span style="font-size:<?php echo $_COOKIE['NOTIFICATION_SIZE']; ?>;color:<?php echo $_COOKIE['NOTIFICATION_COLOR']; ?>">
                            <marquee><?php echo $_COOKIE['NOTIFICATION_TITLE']; ?></marquee>
                        </span>
                    </div>
                </div>

                           <!--  

                                <div class="uk-width-medium-1-3">
                                    <div class="uk-form-row">
                                        <label>Notification Text</label>
                                        <input type="text" class="md-input" name="notification_text"/>
                                    </div>
                                </div>

                                <div class="uk-width-medium-1-3">
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Font Size</label>
                                                    <input type="text" class="md-input" name="notification_size"/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>Color</label>
                                                <input type="text" class="md-input" name="notification_color"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>   

                                <div class="uk-width-medium-1-3">
                                    <div class="uk-form-row">
                                       <button type="submit" name="notification_set" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="#">Go</button>
                                    </div>
                                </div>

                            </form>
                        -->
                        <form method="POST">
                        <div class="uk-grid" data-uk-grid-margin="">
                            
                                <div class="uk-width-medium-1-2">
                                    <label>Notification Text</label>
                                    <input type="text" class="md-input" name="notification_text"/>
                                </div>
                                <div class="uk-width-medium-1-6">
                                 <label>Font Size</label>
                                 <input type="text" class="md-input" name="notification_size"/>
                             </div>
                             <div class="uk-width-medium-1-6">
                                <label>Color</label>
                                <input type="text" class="md-input" name="notification_color"/>
                            </div>
                            <div class="uk-width-medium-1-6 uk-text-center">
                                <button type="submit" name="notification_set" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="#">Go</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <footer>
        <div class="container" style="background-color: #444; height: 45px;">
            <span style="color: white;">Powered by BeesWebmo. All rights reserved.
            </span>
            <span class="right" style="color: white;"> <span class="grey-text text-lighten-3">Version</span> 0.0.1</span>
        </div>
    </footer>

</div> 


<!-- ******************** Color Switcher ******************** -->
<?php include_once 'colorswitcher.php'; ?>
<!-- ******************** End Color Switcher ******************** -->

<!-- ******************** JQuery libs ******************** -->
<?php include_once 'footer_script.php'; ?>
<!-- ******************** End JQuery libs ******************** -->


<script>
    var data = {
      labels: [
      <?php  

      foreach($cnts as $current_cnt){
        echo "'".$current_cnt->counter_name."'";
        echo ",";
    }

    ?>
    ],
    series: [
    [

    <?php  

    foreach($cnts as $current_cnt){
        echo $cnt->yesterday_served($current_cnt->id);
        echo ",";
    }

    ?>

    ],
    [

    <?php  

    foreach($cnts as $current_cnt){
        echo $cnt->today_served($current_cnt->id);
        echo ",";
    }

    ?>




    ]
    ]
};

var options = {
  seriesBarDistance: 10
};

var responsiveOptions = [
['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
    }
}
}]
];

new Chartist.Bar('.todayvsyseterday', data, options, responsiveOptions);
</script>

<script type="text/javascript">
    var data = {
      labels: [

      'Served','Queue'

      ],
      series: [

      <?php  

      echo $call->today_served().",".$call->today_queue();

      ?>

      ]
  };

  var options = {
      labelInterpolationFnc: function(value) {
        return value[0]
    }
};

var responsiveOptions = [
['screen and (min-width: 640px)', {
    chartPadding: 30,
    labelOffset: 100,
    labelDirection: 'explode',
    labelInterpolationFnc: function(value) {
      return value;
  }
}],
['screen and (min-width: 1024px)', {
    labelOffset: 80,
    chartPadding: 20
}]
];

new Chartist.Pie('.queuevsserved', data, options, responsiveOptions);
</script>
</body>
</html>