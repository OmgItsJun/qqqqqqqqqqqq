<?php
include "SAS_SCM_inventory_data.php";

if (isset($_POST["submit"])) {
   $product_name = $_POST['product_name'];
   $in_count = $_POST['in_count'];
   $out_count = $_POST['out_count'];
   $current_stocks = $_POST['current_stocks'];
   $price = $_POST['price'];
   
   $sql = "INSERT INTO `inventory`(`id`, `product_name`, `in_count`, `out_count`, `current_stocks`, `price`) VALUES (NULL, '$product_name', '$in_count', '$out_count', '$current_stocks', '$price')";

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
      <div>
         Warehouse Inventory
      </div>
      <div class="navbar-buttons">
         <a href="SAS_SCM_inbound_index.html" class="btn-link">Inbound</a>
         <a href="SAS_SCM_view_outbound.html" class="btn-link">Outbound</a>
      </div>
   </nav>

   <div class="container">
      <div class="text-center">
         <h3>Add New Product</h3>
       
      </div>

      <div class="container">
         <form action="" method="post">
            <div class="row">
               <div class="col">
                  <label class="form-label">Product Name:</label>
                  <input type="text" class="form-control" name="product_name" placeholder="Poduct Name">
               </div>

               <div class="col">
                  <label class="form-label">In Count:</label>
                  <input type="number" class="form-control" name="in_count" placeholder="In Count">
               </div>
            </div>

            <div class="">
               <label class="form-label">Out Count:</label>
               <input type="number" class="form-control" name="out_count" placeholder="Out Count">
            </div>           
            <div>
            <div class="">
               <label class="form-label">Current Stocks:</label>
               <input type="number" class="form-control" name="current_stocks" placeholder="Current Stocks">
            </div>           
            <div>
            <div class="">
               <label class="form-label">Price:</label>
               <input type="number" class="form-control" name="price" placeholder="Price">
            </div>           
            <div class="text-center">
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="SAS_SCM_inbound_index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

</body>
</html>