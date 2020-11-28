<?php
//retrieves username from global variables and unsets it
$username = $GLOBALS['username'];
unset($_SESSION[$username]);

echo "LOGOUT SUCCESSFUL";
?>
<html>
<head>
    <meta http-equiv="refresh" content="3;url=homepage.php"/>
</head>
<body>
<h1>Redirecting in a few seconds...</h1>
</body>
</html>
