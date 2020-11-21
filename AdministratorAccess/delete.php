<?php
//attempts connection to mySQL database
include_once "../includes/dbh.inc.php";
//sets variables from post form
$product_id = $_POST['pID'];

$sql = "DELETE FROM products WHERE Product_ID=" . $product_id;

//attempt to delete from products
if (mysqli_query($conn, $sql)) {
    echo "<br>SUCCESSFULLY DELETED:";
    $sql = "DELETE FROM products_has_designer WHERE Product_ID=".$product_id;
    //attempt to delete from products_has_designers for full deletion
    if (mysqli_query($conn, $sql)) {
        echo "<br>FULLY DELETED";
    }
    else{
        echo "<br>ERROR: Could not execute". $sql. mysqli_error($conn);
    }
}
else {
    echo "<br>ERROR: Could not execute".$sql . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
<html>
<head>
    <meta http-equiv="refresh" content="3;url=DeletePage.html"/>
</head>
<body>
<h1>Redirecting in a few seconds...</h1>
</body>
</html>

