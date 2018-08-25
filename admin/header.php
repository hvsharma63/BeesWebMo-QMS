<header id="header_main">    
    <div class="header_main_content">
        <nav class="uk-navbar">
            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>

            </a>

            
            <!-- secondary sidebar switch -->
            <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                <span class="sSwitchIcon"></span>
            </a>
            
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" id="" class=""><i class="material-icons md-24 md-light">link</i></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a style="pointer-events: none;cursor: default;text-decoration: none;color: black;">LINKS</a></li><hr>
                                <li><a href="page_settings.html">Display URL</a></li>
                                <li><a href="login.html">Issue Token URL</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a>
                    </li>
                            
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="page_settings.html"><span><i class="material-icons">settings</i></span> Settings</a></li>
                                <li><a href="logout.php"><span><i class="material-icons">call_missed_outgoing</i></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
            <input type="text" class="header_main_search_input" />
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
            <script type="text/autocomplete">
                <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                    {{~items}}
                    <li data-value="{{ $item.value }}">
                        <a href="{{ $item.url }}" class="needsclick">
                            {{ $item.value }}<br>
                            <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                        </a>
                    </li>
                    {{/items}}
                    <li data-value="autocomplete-value">
                        <a class="needsclick">
                            Autocomplete Text<br>
                            <span class="uk-text-muted uk-text-small">Helper text</span>
                        </a>
                    </li>
                </ul>
            </script>
        </form>
    </div>
</header>