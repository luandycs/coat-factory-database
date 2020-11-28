<?php
//attempt connection
include_once './includes/dbh.inc.php';

//stores all variables locally
$username = $_POST['username2'];
$password = $_POST['password2'];
$email = $_POST['address'];

//retrieve highest login id
$sql = "SELECT * FROM login ORDER BY LOGIN_ID DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$loginINFO = mysqli_fetch_assoc($query);

//add one
$loginID = $loginINFO['LOGIN_ID'] + 1;

//use that new login id for new user and insert
$sql = "INSERT INTO login VALUES(" .$loginID. " ,'" .$username. "' ,'" .$password. "' ,'" .$email. "', 0)";
$query = mysqli_query($conn, $sql);
echo "SUCCESSFUL SIGN-UP";
?>
<html>
<head>
    <meta http-equiv="refresh" content="3;url=homepage.php"/>
</head>
<body>
<h1>Redirecting in a few seconds...</h1>
</body>
</html>
