<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
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


    if (empty($orderDate)) {
        die("Error: Order Date cannot be empty.");
    }


    $sql = "INSERT INTO inbound_transact (supplier_name, address, country_code, contact_information, email_address, product_name, description, units, quantity, amount, currency, payment_method, terms_of_payment, ordered_by, order_date, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);


    $stmt->bind_param("ssssssssiiisssss", $supplierName, $address, $countryCode, $contactInformation, $emailAddress, $productName, $description, $units, $quantity, $amount, $currency, $paymentMethod, $termsOfPayment, $orderedBy, $orderDate, $message);


    if ($stmt->execute()) {
        header("Location: SAS_SCM_inbound_results.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();
}
?>