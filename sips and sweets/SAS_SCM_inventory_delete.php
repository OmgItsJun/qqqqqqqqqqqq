<?php
include "SAS_SCM_inventory_data.php";
$id = $_GET["id"];
$sql = "DELETE FROM `inventory` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: SAS_SCM_inventory_index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}