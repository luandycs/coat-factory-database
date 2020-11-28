<?php
$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "password";
$dbName = "csi3450";

// Create connection
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

