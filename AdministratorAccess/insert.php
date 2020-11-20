<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include_once "../includes/dbh.inc.php";

 
// Escape user inputs for security
$Product_ID = mysqli_real_escape_string($link, $_REQUEST['Product_ID']);
$Product_Name = mysqli_real_escape_string($link, $_REQUEST['Product_Name']);
$Designer_Name = mysqli_real_escape_string($link, $_REQUEST['Designer_Name']);
 
// Attempt insert query execution
$sql = "INSERT INTO products (Product_ID, Product_Name, Designer_Name) VALUES ('$Product_ID', '$Product_Name', '$Designer_Name')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>