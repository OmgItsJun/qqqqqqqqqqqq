<?php
include "SAS_SCM_inventory_data.php";

if (!isset($_GET['id'])) {
   echo "No record found.";
   exit;
}

$id = $_GET["id"];

if (isset($_POST["submit"])) {
   $product_name = $_POST['product_name'];
   $in_count = $_POST['in_count'];
   $out_count = $_POST['out_count'];
   $current_stocks = $_POST['current_stocks'];
   $price = $_POST['price'];
   
   $sql = "INSERT INTO `inventory`(`id`, `product_name`, `in_count`, `out_count`, `current_stocks` , `price`) VALUES (NULL, '$product_name', '$in_count', '$out_count','$current_stocks','$price')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: SAS_SCM_inventory_index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Warehouse Inventory</title> 
   <link rel="stylesheet" type="text/css" href="SAS_SCM_inventory_edit.css">
    

   </head>

<body>

   <nav class="navbar">
      Warehouse Inventory
   </nav>

   <div class="container">
      <div class="text-center">
         <h3>Edit Product Information</h3>
      </div>

      <?php
      $sql = "SELECT * FROM `inventory` WHERE id = '$id' LIMIT 1"; 
      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) { 
         $row = mysqli_fetch_assoc($result);
      } else {
         echo "No record found.";
         exit;
      }
      ?>

      <div class="container">
         <form action="" method="post">
            <div class="product-container">
               <div class="row">
                  <div class="col">
                     <label class="form-label">Product Name:</label>
                     <input type="text" class="form-control" name="product_name" value="<?php echo $row['Product_Name'] ?>">
                  </div>

                  <div class="col">
                     <label class="form-label">In Count:</label>
                     <input type="number" class="form-control" name="in_count" value="<?php echo $row['In_Count'] ?>">
                  </div>
               </div>

               <div>
                  <label class="form-label">Out Count:</label>
                  <input type="number" class="form-control" name="out_count" value="<?php echo $row['Out_Count'] ?>">
               </div>

               <div>
                  <label class="form-label">Current Stocks:</label>
                  <input type="number" class="form-control" name="current_stocks" value="<?php echo $row['Current_stocks'] ?>">
               </div>

               <div>
                  <label class="form-label">Price:</label>
                  <input type="number" class="form-control" name="price" value="<?php echo $row['Price'] ?>">
               </div>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="SAS_SCM_inventory_index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>
</body>

</html>