<?php
    include_once '../config.php';
    $call->call_entry($_GET['dept'],$dept->deptdata($_GET['dept'])->next_entry,date("Y-m-d"),date("h:m:s"));
    $dept->increment_token($_GET['dept']);

    ?>

    <style>#printarea{display:none;text-align:center}@media  print{#loader-wrapper,header,#main,footer,#toast-container{display:none}#printarea{display:block;}}@page{margin:0}</style>
    <div id="printarea" style="line-height:1.25">
            <span style="font-size:27px; font-weight: bold">Danspark &amp; Co.</span><br>
            <span style="font-size:25px"><?php echo $_GET['dept']; ?></span><br>
            <span style="font-size:20px">Your Token Number</span><br>
            <span><h3 style="font-size:70px;font-weight:bold;margin:0;line-height:1.5"><?php echo $_GET['dept']."-".$_SESSION['']; ?></h3></span>
            <span style="font-size:20px">Please wait for your turn</span><br>
            <span style="font-size:20px">Total customer(s) waiting: 1</span><br>
            <span style="float:left"><?php echo date("d/m/y"); ?></span><span style="float:right"><?php echo date("h:m:s a"); ?></span>
        </div>
        <script>
            window.onload = function(){window.print();}
        </script>
    <?php
?>