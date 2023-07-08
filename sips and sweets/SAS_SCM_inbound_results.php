<!DOCTYPE html>
<html>
<head>
  <title>Form Submission Result</title>
  
<style>
 
body {
  font-family: Arial, sans-serif;
  background-color: #ffb3c6;
  margin: 0;
}

.container {
  max-width: 500px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #333;
  margin-top: 0;
}

p {
  margin-bottom: 10px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4c55af;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #45a049;
}

</style>
</head>

<body>
  
  <div class="container">
  <h2>Form Submission Result</h2>

<?php 


if (isset($_POST['supplierName']) &&  isset($_POST['address']) && isset($_POST['countryCode']) && isset($_POST['contactInformation']) && isset($_POST['emailAddress']) && isset($_POST['productName']) && isset($_POST['description']) && isset($_POST['units']) && isset($_POST['quantity']) && isset($_POST['amount']) && isset($_POST['currency']) && isset($_POST['paymentMethod']) && isset($_POST['termsOfPayment']) && isset($_POST['  orderedBy']) && isset($_POST['orderDate'])) {
  include 'SAS_SCM_inbound_data.php';

  $supplierName = $_POST['supplierName'];
  $address = $_POST['address'];
  $countryCode = $_POST['countryCode'];
  $contactInformation = $_POST['contactInformation'];
  $emailAddress = $_POST['emailAddress'];
  $productName = $_POST['productName'];
  $description = $_POST['description'];
  $units = $_POST['units'];
  $quantity = $_POST['quantity'];
  $amount = $_POST['amount'];
  $currency = $_POST['currency'];
  $paymentMethod = $_POST['paymentMethod'];
  $termsOfPayment = $_POST['termsOfPayment'];
  $orderedBy = $_POST['orderedBy'];
  $orderDate = $_POST['orderDate'];
  $message = $_POST['message'];

        echo "<p><strong>Supplier Name: </strong> " . $supplierName . "<p>";
        echo "<p><strong>Address:</strong> " . $emailAddress . "<p>";
        echo "<p><strong>Country Code: </strong> " . $countryCode . "<p>";
        echo "<p><strong>Contact Information: </strong> " . $contactInformation . "<p>";
        echo "<p><strong>Email Address:</strong> " . $emailAddress . "<p>";
        echo "<p><strong>Product Name:</strong> " . $productName . "<p>";
        echo "<p><strong>Description: </strong> " . $description . "<p>";
        echo "<p><strong>Units:</strong> " . $units . "<p>";
        echo "<p><strong>Quantity:</strong> " . $quantity . "<p>";
        echo "<p><strong>Amount: </strong> " . $amount . "<p>";
        echo "<p><strong>Currency:</strong> " . $currency . "<p>";
        echo "<p><strong>Payment Method:</strong> " . $paymentMethod . "<p>";
        echo "<p><strong>Terms of Payment: </strong> " . $termsOfPayment . "<p>";
        echo "<p><strong>Ordered By:</strong> " . $orderedBy . "<p>";
        echo "<p><strong>Order Date:</strong> " . $orderDate . "<p>";
        echo "<p><strong>Message:</strong> " . $message . "<p>";
        
        echo "<h1 id='countdown'></h1>";

} else {
  echo "<p>No form data submitted.</p>";
}
?>
  
</div>

    <script>
        
        var countdownTime = 3;

        
        function updateCountdown() {
            var countdownElement = document.getElementById("countdown");
            countdownElement.innerHTML = "Redirecting in " + countdownTime + " seconds...";

            
            countdownTime--;

            
            if (countdownTime < 0) {
               
                window.location.href = "SAS_SCM_inbound_view.php";
            } else {
                
                setTimeout(updateCountdown, 500);
            }
        }

       
        updateCountdown();
    </script>
</body>
</html>