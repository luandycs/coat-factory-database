<?php
include_once './includes/dbh.inc.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = " SELECT * FROM login WHERE USERNAME='" . $username . "'";
$result = mysqli_query($conn, $sql);
$temp = mysqli_fetch_assoc($result);

if($temp['PASSWORD'] == $password){
    http_redirect('homepage.php');
}
else{
    echo "<br>ERROR: INCORRECT PASSWORD<br>";
}
