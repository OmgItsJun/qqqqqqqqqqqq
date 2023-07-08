<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "";
$database = "project"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$rqtby = $_POST['rqtby'];
$itemN = $_POST['itemN'];
$quantity = $_POST['quantity'];
$itemR = $_POST['itemR'];
$reqdate = $_POST['reqdate'];
$status = $_POST['status'];


if (empty($rqtby)) {
  echo "Name cannot be empty.";
  exit;
}


$sql = "INSERT INTO jcani (RequestedBy, ItemName, Quantity, ItemRecipient, RequestDate, Status) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssss", $rqtby, $itemN, $quantity, $itemR, $reqdate, $status);

// Execute the statement
if ($stmt->execute()) {
  echo "Form data saved successfully.";
} else {
  echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();

?>
