<?php 
    include_once '../config.php';
    $user->check_userlogin();
    
    /*Get currenlty logged in user all details*/
    $user_getinfo = $user->get_userinfo();

?>

<aside id="sidebar_main">
        
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="index.php" class="sSidebar_hide sidebar_logo_large">
                   <!--  <img class="logo_regular" src="assets/img/logo_main.png" alt="" height="15" width="71"/>
                    <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/> -->
                    <h3 style="color: white;">BeesWebmo</h3>
                </a>
                <a href="index.php" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
                </a>
            </div>
            

            <div class="sidebar_actions" id="google_translate_element"></div>
            <script type="text/javascript">
                function googleTranslateElementInit() {
                  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ar,hi,ur', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
        
        <div class="menu_section">
            <ul>


                <?php
                    if( $user_getinfo->user_role == 0  ){
                        ?>
                       
                         <li title="Dashboard">
                            <a href="index.php" class="waves-effect waves-cyan truncate">
                                <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                                <span class="menu_title">Dashboard</span>
                            </a>
                        </li> 

                        <li title="Call">
                            <a href="call.php" class="waves-effect waves-cyan truncate">
                                <span class="menu_icon"><i class="material-icons">message</i></span>
                                <span class="menu_title">Call</span>
                            </a>
                        </li>

                        <li title="Department">
                            <a href="department.php" class="waves-effect waves-cyan truncate">
                                <span class="menu_icon"><i class="material-icons">business</i></span>
                                <span class="menu_title">Department</span>
                            </a>
                        </li>

                        <li title="Counter">
                            <a href="counter.php" class="waves-effect waves-cyan truncate">
                                <span class="menu_icon"><i class="material-icons">view_compact</i></span>
                                <span class="menu_title">Counter</span>
                            </a>
                        </li> 

                        <li title="Forms">
                            <a href="#">
                                <span class="menu_icon"><i class="material-icons">assessment</i></span>
                                <span class="menu_title">Reports</span>
                            </a>
                            <ul>
                                <li><a href="user_report.php" class="waves-effect waves-cyan truncate">User Reports</a></li>
                                <li><a href="queue_list.php" class="waves-effect waves-cyan truncate">Queue List</a></li>
                                <li><a href="monthly.php" class="waves-effect waves-cyan truncate">Monthly</a></li>
                                <li><a href="statistical.php" class="waves-effect waves-cyan truncate">Statistical</a></li>
                                <li><a href="missed.php" class="waves-effect waves-cyan truncate">Missed / Overtime</a></li>
                            </ul>
                        </li>

                        <li title="Users">
                            <a href="users.php">
                                <span class="menu_icon"><i class="material-icons">person</i></span>
                                <span class="menu_title">Users</span>
                            </a>
                        </li>

                        <li title="Settings">
                            <a href="settings.php">
                                <span class="menu_icon"><i class="material-icons">settings</i></span>
                                <span class="menu_title">Settings</span>
                            </a>
                        </li>
                        <?php
                    } else{
                        ?>
                        <li title="Dashboard">
                            <a href="index.php" class="waves-effect waves-cyan truncate">
                                <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                                <span class="menu_title">Dashboard</span>
                            </a>
                        </li> 

                        <li title="Call">
                            <a href="call.php" class="waves-effect waves-cyan truncate">
                                <span class="menu_icon"><i class="material-icons">message</i></span>
                                <span class="menu_title">Call</span>
                            </a>
                        </li>
                        <li title="Settings">
                            <a href="settings.php">
                                <span class="menu_icon"><i class="material-icons">settings</i></span>
                                <span class="menu_title">Settings</span>
                            </a>
                        </li>
                        <?php
                    }
                ?>
                
            </ul>
        </div>
    </aside>