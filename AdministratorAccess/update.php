<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include_once "../includes/dbh.inc.php";
//Sets variables
if(isset($_POST['pID']))
{
    $pid= $_POST['pID'];
}
if(isset($_POST['pname']))
{
    $pname = $_POST['pname'];
}
if(isset($_POST['price']))
{
    $price = $_POST['price'];
}
if(isset($_POST['designer']))
{
    $designer_name = $_POST['designer'];
}

$sql = "SELECT * FROM products_has_designer WHERE PRODUCT_ID='".$pid."'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_fetch_assoc($result);

//checks if product id exits
if($resultCheck['PRODUCT_ID'] != NULL){
    //updates the new product into products table
    $sql = "UPDATE products SET PRODUCT_NAME='".$pname."', PRODUCT_PRICE=".$price." WHERE PRODUCT_ID=".$pid;
    $result = mysqli_query($conn, $sql);
    $temp = 0;
    //finds space in between the first and last name
    for($i=0;$i<=strlen($designer_name); $i++){
        if($designer_name[$i]==' '){
            $temp = $i;
            break;
        }
    }

    //splits strings into first and last name
    //removes spaces as well
    $designer_first = substr($designer_name, 0,$temp);
    $designer_last = substr($designer_name, $temp, strlen($designer_name)-$temp);
    $designer_first = str_replace(' ','',$designer_first);
    $designer_last = str_replace(' ','',$designer_last);

    //looks for designer id and stores that designer's information into temp
    $sql = "SELECT * FROM designer WHERE DESIGNER_FNAME='".$designer_first."' AND DESIGNER_LNAME='".$designer_last."'";
    $result = mysqli_query($conn, $sql);
    $temp = mysqli_fetch_assoc($result);

    //stores the product id and designer id into the products_has_designer table
    $sql = "UPDATE products_has_designer SET DESIGNER_ID=".$temp['DESIGNER_ID']." WHERE PRODUCT_ID=".$pid;
    $result = mysqli_query($conn, $sql);
    echo "<br>SUCCESSFUL UPDATE<br>";
}
else{
    echo "<br> ERROR: UPDATE IS UNAVAILABLE<br>";

}
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

