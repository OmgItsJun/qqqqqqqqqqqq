<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, RequestedBy, ItemName, Quantity, ItemRecipient, RequestDate, Status FROM jcani";
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
    </style>
</head>
<body>
<h2>Retrieved Form Data</h2>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='form-data'>";

        echo "<p><strong>Requested By:</strong> " . $row["RequestedBy"] . "</p>";
        echo "<p><strong>Item Name:</strong> " . $row["ItemName"] . "</p>";
        echo "<p><strong>Quantity:</strong> " . $row["Quantity"] . "</p>";
        echo "<p><strong>Item Recipient:</strong> " . $row["ItemRecipient"] . "</p>";
        echo "<p><strong>Request Date:</strong> " . $row["RequestDate"] . "</p>";
        echo "<p><strong>Status:</strong> " . $row["Status"] . "</p>";

        echo "<div class='action-buttons'>";
        echo "<a href='edit.php?id=" . $row["id"] . "' class='btn'>Edit</a>";
        echo "<a href='delete.php?id=" . $row["id"] . "' class='btn'>Delete</a>";
        echo "</div>";

        echo "</div>";
        echo "<hr>";
    }
} else {
    echo "<p>No form data found.</p>";
}

$conn->close();
?>

<a href="SAS_SCM_view_outbound.html" class="btn">New Entry</a>

</body>
</html>
