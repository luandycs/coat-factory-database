<?php
if(isset($GLOBALS['username']))
{
    $username = $GLOBALS['username'];
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

