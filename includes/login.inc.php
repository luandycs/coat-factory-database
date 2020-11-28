<?php
//checks if globals has a username set
if(isset($GLOBALS['username']))
{
    //if it does store that locally
    $username = $GLOBALS['username'];
    //displays login/logout options depending whether user is logged in
    if(isset($_SESSION[$username])){
        $display_log_options = "<li><a href='process-logout.php' class='Logout'>Logout</a></li>";
    }
    else{
        $display_log_options = "<li><a href='process-logout.php' class='Logout'>Logout</a></li>";
    }
}
else{
    $display_log_options = "<li><a href='../Loginpage.php' class='Login'>Login</a></li>";
}

