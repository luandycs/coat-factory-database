<?php
include_once '../includes/dbh.inc.php';

$username = $_POST['adminUsername'];
$password = $_POST['adminPassword'];

//finds username in database and dumps info into variable
$sql = " SELECT * FROM login WHERE USERNAME='" . $username . "'";
$result = mysqli_query($conn, $sql);
$temp = mysqli_fetch_assoc($result);

//checks if password matches; if yes, then starts session with username
if($temp != NULL) {
    if ($temp['PASSWORD'] == $password) {
        if ($temp['ADMIN'] == 1) {
            echo "<br>SUCCESSFULLY LOGGED INTO: <br>" . $username;
            session_start(['$username']);
            header("Location: AdminHomepage.php");
        } else {
            echo "<br> USER IS NOT AN ADMIN<br>";
            header("Refresh:3;Location: ../Loginpage.php");
        }
    }
}
else {
    echo "<br>ERROR: INCORRECT PASSWORD OR USERNAME<br>";
    header("Refresh:3; Location: ../Loginpage.php");
}
//Redirects page to home
?>
<html>
    <head>
    </head>
    <body>
        <h1>Redirecting in a few seconds...</h1>
    </body>
</html>