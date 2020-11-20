<?php
include_once './includes/dbh.inc.php';

if(isset($_POST['search'])){
    $input = $_POST['search'];
    echo "SUCCESS! YOU ENTERED: " . $input;
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
<h1>The Coat Factory</h1>
</a>
</div>

<div class="navbar">
<ul>
  <li><a href="Homepage.php" class="Home">Home</a></li>
  <li><a href="Loginpage.php" class="Login">Login</a></li>
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
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
     <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
     <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
     <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
     <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>

  <div class="footer">
    <h2>
    CSI 3450 Database Design Project<br>
    The Coat Factory<br>
    Darius Banks<br>
    Andy Lu
    </h2>
    </div>

</body>
</html>
