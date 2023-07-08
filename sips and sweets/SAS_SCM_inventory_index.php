<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Warehouse Inventory</title>
   <link rel="stylesheet" href="SAS_SCM_inventory_stylesheet.css">

</head>

<body>
  <nav class="navbar">
    Warehouse Inventory
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <a href="SAS_SCM_inventory_view.php" class="btn btn-dark btn-space">Add New</a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">In Count</th>
          <th scope="col">Out Count</th>
          <th scope="col">Current Stocks</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "SAS_SCM_inventory_data.php";
        $sql = "SELECT * FROM `inventory`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["Id"] ?></td>
            <td><?php echo $row["Product_Name"] ?></td>
            <td><?php echo $row["In_Count"] ?></td>
            <td><?php echo $row["Out_Count"] ?></td>
            <td><?php echo $row["Current_stocks"] ?></td>
            <td><?php echo $row["Price"] ?></td>
            <td>
              <a href="SAS_SCM_inventory_edit.php?id=<?php echo $row["Id"] ?>" class="link-dark edit-link">Edit</a>
              <a href="SAS_SCM_inventory_delete.php?id=<?php echo $row["Id"] ?>" class="link-dark delete-link">Delete</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    var close = document.querySelectorAll(".btn-close");

    for (var i = 0; i < close.length; i++) {
      close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
      }
    }
  </script>

</body>
</html>
