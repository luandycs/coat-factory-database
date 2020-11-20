<?php
include_once './includes/dbh.inc.php';

$username = $_POST['username'];
$password = $_POST['password'];

//finds username in database and dumps info into variable
$sql = " SELECT * FROM login WHERE USERNAME='" . $username . "'";
$result = mysqli_query($conn, $sql);
$temp = mysqli_fetch_assoc($result);

//checks if password matches; if yes, then starts session with username
if($temp['PASSWORD'] == $password){
    echo "SUCCESSFULLY LOGGED INTO: <br>".$username;
    session_start(['$username']);
}
else {
    echo "<br>ERROR: INCORRECT PASSWORD OR USERNAME<br>";
}
?>

//redirects after a few seconds regardless of logging in
<html>
    <head>
        <meta http-equiv="refresh" content="3;url=homepage.php"/>
    </head>
    <body>
        <h1>Redirecting in a few seconds...</h1>
    </body>
</html>