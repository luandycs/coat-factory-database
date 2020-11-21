<?php
//attempts connection to mySQL database
include_once "../includes/dbh.inc.php";
//sets variables from post form
$product_id = $_POST['pID'];

$sql = "DELETE FROM products WHERE Product_ID=" . $product_id;

//attempt to delete from products
if (mysqli_query($conn, $sql)) {
    echo "SUCCESSFULLY DELETED:";
    echo "<br>Product ID:".$product_id;
    echo "<br>Product Name:".$temp['PRODUCT_NAME'];
    echo "<br>Product Price:".$temp['PRODUCT_PRICE'];

    $sql = "DELETE FROM products_has_designer WHERE Product_ID=".$product_id;
    //attempt to delete from products_has_designers for full deletion
    if (mysqli_query($conn, $sql)) {
        echo "FULLY DELETED";
    }
    else{
        echo "ERROR: Could not execute". $sql. mysqli_error($conn);
    }
}
else {
    echo "ERROR: Could not execute".$sql . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
<html>
<head>
    <meta http-equiv="refresh" content="3;url=InsertPage.html"/>
</head>
<body>
<h1>Redirecting in a few seconds...</h1>
</body>
</html>

