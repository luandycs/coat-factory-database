<?php
include_once '../includes/dbh.inc.php';

if(isset($_POST['search'])){
    $input = $_POST['search'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Home Page</title>
<link href="AdminPageLayout.css" rel="stylesheet" />  
</head>
<body>
    <<div class="header">
        <a href="AdminHomepage.php">
            <h1>The Coat Factory</h1></a>
        <h2>CSI 3450 Database Design Project<br>
            Darius Banks<br>
            Andy Lu<br></h2>
    </div>

    <div class="page">
        <div class="navbar">
        <ul>
          <li><a href="AdminHomepage.php" class="Home">Home</a></li>
          <li><a href="AdminLoginpage.html" class="Login">Login</a></li>
          <li><a href="InsertPage.html" class="Insert">Insert</a></li>
          <li><a href="UpdatePage.html" class="Update">Update</a></li>
          <li><a href="DeletePage.html" class="Delete">Delete</a></li>
        </ul>
        </div>

        <div class="search-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name = "searchForm" method="post">
                <input type="text" placeholder="Search.." name="search" onkeypress="myFunction()">
            <button type="submit">Submit</button>
            </form>
        </div>

  <div class="dropdown">
  <div id="myDropdown" class="dropdown-content">
    <a href="#pname">Product</a>
    <a href="#pprice">Price</a>
    <a href="#designer">Designer</a>
    <a href="#company">Company</a>
  </div>
</div>

<script>
function myFunction() {
document.getElementById("myDropdown").classList.toggle("show");
}
</script>
  
<table id="inventory">
  <tr>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Designer</th>
     <th>Company</th>
  </tr>
    <?php
    //finds all products that contain the substring of the user's input and executes
    if(isset($_POST['search'])) {
        $sql = "SELECT * FROM products WHERE PRODUCT_NAME LIKE '%" . $input . "%'";
        $result = mysqli_query($conn, $sql);

        //prints data if there are results
        $resultCheck = mysqli_num_rows($result);
        echo "<br>YOU ENTERED: " . $input."<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                //retrieves designer information of the current product
                $sql = "SELECT * FROM products_has_designer WHERE PRODUCT_ID='" . $row['PRODUCT_ID'] . "'";
                $temp = mysqli_query($conn, $sql);
                $designer_info = mysqli_fetch_assoc($temp);
                $sql = "SELECT * FROM designer WHERE DESIGNER_ID='" . $designer_info['DESIGNER_ID'] . "'";
                $temp = mysqli_query($conn, $sql);
                $designer_info = mysqli_fetch_assoc($temp);
                $html = "<tr><th>" . $row['PRODUCT_NAME'] . "</th>";
                $html .= "<th>$" . $row['PRODUCT_PRICE'] . "</th>";
                $html .= "<th>".$designer_info['DESIGNER_FNAME']." ".$designer_info['DESIGNER_LNAME']."</th></tr>";
                echo $html;
            }

        }
    }
    ?>
</table>
</body>
</html>