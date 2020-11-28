<table id="inventory">
    <tr>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Designer</th>
    </tr>
    
<?php
include_once './includes/dbh.inc.php';
if(isset($_POST['submit'])){
    $Product_Name = $_POST['Product_Name'];
    $Product_Price = $_POST['Product_Price'];
    $Designer_FName = $_POST['Designer_FName'];

    if($Product_Name != "" || $Product_Price != "" || $Designer_FName != "")
    {
    $query = "SELECT * FROM products WHERE Product_Name = '$Product_Name' OR Product_Price = '$Product_Price' OR Designer_FName = '$Designer_FName'";
    $data = mysqli_query($conn, $query) or die('error');
    if(mysqli_num_rows($data) > 0){
        while ($row = mysqli_fetch_assoc($data)){
            $Product_Name = $row['Product_Name'];
            $Product_Price = $row['Product_Price'];
            $Designer_FName = $row['Designer_FName'];
            ?>
            <tr>
                <td><?php echo $Product_Name;?></td>
                <td><?php echo $Product_Price;?></td>
                <td><?php echo $Designer_FName;?></td>
        </tr>
        <?php
        }
    }
    else{
        ?>
        <tr>
             <td>Records Not Found</td>
        </tr>
        <?php
    }
   }

}
?>
</table>