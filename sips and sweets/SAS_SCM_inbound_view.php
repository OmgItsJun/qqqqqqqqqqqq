<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['id'])){
  $id=$_GET['id'];
  $delete=mysqli_query($conn,"DELETE FROM `inbound_transact` WHERE `id`='$id' ");
}

$sql = "SELECT * FROM inbound_transact";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Retrieved Form Data</title>
  
<style>
body {
  font-family: Arial, sans-serif;
  margin: 20px;
  background-color: lightpink;
}

h2 {
  color: #333;
}

.form-data {
  background-color: #f5f5f5;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-data p {
  margin: 0;
}

hr {
  margin: 20px 0;
  border: 0;
  border-top: 1px solid #ccc;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #fb6f92;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #45a049;
}

.delbtn {
      display: inline-block;
      padding: 10px 20px;
      background-color: darkred;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      margin-left: 90%;
    }

.delbtn:hover {
      background-color: #4c55af;
    }
    
</style>
</head>
<body>

  <h2>Retrieved Form Data</h2>

<?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='form-data'>";
    
    echo "<p><strong>ID : </strong> " . $row["id"] . "</p>";
    
    echo "<p><strong>Supplier Name:</strong> " . $row["supplierName"] . "</p>";
    echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
    echo "<p><strong>Country Code:</strong> " . $row["countryCode"] . "</p>";
    echo "<p><strong>Contact Information:</strong> " . $row["contactInformation"] . "</p>";
    echo "<p><strong>Email Address:</strong> " . $row["emailAddress"] . "</p>";
    echo "<p><strong>Product Name:</strong> " . $row["productName"] . "</p>";
    echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
    echo "<p><strong>Units:</strong> " . $row["units"] . "</p>";
    echo "<p><strong>Quantity:</strong> " . $row["quantity"] . "</p>";
    echo "<p><strong>Amount:</strong> " . $row["amount"] . "</p>";
    echo "<p><strong>Currency:</strong> " . $row["currency"] . "</p>";
    echo "<p><strong>Payment Method:</strong> " . $row["paymentMethod"] . "</p>";
    echo "<p><strong>Terms of Payment:</strong> " . $row["termsOfPayment"] . "</p>";
    echo "<p><strong>Ordered By:</strong> " . $row["orderedBy"] . "</p>";
    echo "<p><strong>Order Date:</strong> " . $row["orderDate"] . "</p>";
    echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
    
    echo "
        <a href='SAS_SCM_inbound_view.php?id=". $row['id'] ."' class='delbtn'>Delete</a>
      ";
      
    echo "</div>";
    echo "<hr>";
  }
} else {
    echo "<p>No form data found.</p>";
}

$conn->close();
?>

<a href="SAS_SCM_inbound_index.html" class="btn">New Entry</a>

</body>
</html>
