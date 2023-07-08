<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

$id = $_GET['id']; 

$sql = "SELECT id, RequestedBy, ItemName, Quantity, ItemRecipient, RequestDate, Status FROM jcani WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Form Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: ffb3c6;
        }

        h2 {
            color: #333;
        }

        .form-data {
            background-color: #ffc2d1;
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
            background-color: #9e6003;
        }

        .action-buttons {
            margin-top: 10px;
        }

        .action-buttons a {
            margin-right: 10px;
        }

        .form-container {
            width: 400px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .form-container input[type="submit"] {
            background-color: #fb6f92;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Edit Form Data</h2>

    <div class="form-container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
            <label for="requestedBy">Requested By:</label>
            <input type="text" id="requestedBy" name="requestedBy" value="<?php echo $row["RequestedBy"]; ?>" required>

            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" name="itemName" value="<?php echo $row["ItemName"]; ?>" required>

            <label for="quantity">Quantity:</label>
            <label for="itemRecipient">Item Recipient:</label>
            <input type="text" id="itemRecipient" name="itemRecipient" value="<?php echo $row["ItemRecipient"]; ?>" required>

            <label for="requestDate">Request Date:</label>
            <input type="date" id="requestDate" name="requestDate" value="<?php echo $row["RequestDate"]; ?>" required>

            <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending" <?php if ($row["Status"] == "Pending") echo "selected"; ?>>Pending</option>
            <option value="Approved" <?php if ($row["Status"] == "Approved") echo "selected"; ?>>Approved</option>
            <option value="Rejected" <?php if ($row["Status"] == "Rejected") echo "selected"; ?>>Rejected</option>
        </select>

        <input type="submit" value="Update">
    </form>
</div>

<div class="action-buttons">
    <a href="SAS_SCM_outbound_results.php">Back to View</a>
</div>

</body>
</html>