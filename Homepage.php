<?php
include_once './includes/dbh.inc.php';

include_once './includes/login.inc.php';

if(isset($_POST['search'])){
    $input = $_POST['search'];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coat Factory Database Project Homepage</title>
    <link href="PageLayout.css" rel="stylesheet" />
    </head>
<body>

<div class="header">
    <a href="Homepage.php">
        <h1>The Coat Factory</h1></a>
    <h2>CSI 3450 Database Design Project<br>
        Darius Banks<br>
        Andy Lu<br></h2>
        <h2><a href = "process-logout.php">Sign Out</a></h2>
</div>


<div class="navbar">
<ul>
  <li><a href="Homepage.php" class="Home">Home</a></li>
  <li><a href="Loginpage.php" class="Login">Login</a></li>
</ul>
</div>

<div class="search-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name = "filterForm" method="post">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="myFunction()">
    <input type="submit" value="Submit">
   <div class="dropdown">
  <div id="myDropdown" class="dropdown-content">
  <a href="#name">
  <input type="radio" name="product" value="Product_Name">
  <label for="coat">Coat</label>
  </a>
  
  <a href="#price">
  <input type="radio" name="product" value="Product_Price">
  <label for="price">Price</label>
  </a>
  
  <a href="#designer">
  <input type="radio" name="product" value="Designer_FName">
  <label for="designer">Designer</label>
  </a>
  </div>
  </div>
    </form>
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

                  //retrieves designer id of the current product
                  $sql = "SELECT * FROM products_has_designer WHERE PRODUCT_ID='" . $row['PRODUCT_ID'] . "'";
                  $temp = mysqli_query($conn, $sql);
                  $designer_info = mysqli_fetch_assoc($temp);

                  //retrieves other designer information based off designer id above
                  $sql = "SELECT * FROM designer WHERE DESIGNER_ID='" . $designer_info['DESIGNER_ID'] . "'";
                  $temp = mysqli_query($conn, $sql);
                  $designer_info = mysqli_fetch_assoc($temp);
                  //produces the table
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
