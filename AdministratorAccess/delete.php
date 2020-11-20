<?php
//attempts connection to mySQL database
include_once "../includes/dbh.inc.php";
$product_id = $_POST['productID'];

// Attempt delete query execution
$sql = "SELECT FROM products WHERE PRODUCT_ID=".$product_id;
$result = mysqli_query($conn, $sql);
$temp = mysqli_fetch_assoc($result);


$sql = "DELETE FROM products WHERE Product_ID=".$product_id;
if(mysqli_query($conn, $sql)){
    echo "Records were deleted successfully.";
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);