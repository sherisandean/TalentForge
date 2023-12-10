<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporting</title>
</head>
<body>

<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "talentforge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count records in tblregusers
$sqlRegUsers = "SELECT COUNT(*) as regUserCount FROM tblregusers";
$resultRegUsers = $conn->query($sqlRegUsers);

if ($resultRegUsers->num_rows > 0) {
    $rowRegUsers = $resultRegUsers->fetch_assoc();
    $regUserCount = $rowRegUsers['regUserCount'];
} else {
    $regUserCount = 0;
}

// Query to count records in tblCompUsers
$sqlCompUsers = "SELECT COUNT(*) as compUserCount FROM tblCompUsers";
$resultCompUsers = $conn->query($sqlCompUsers);

if ($resultCompUsers->num_rows > 0) {
    $rowCompUsers = $resultCompUsers->fetch_assoc();
    $compUserCount = $rowCompUsers['compUserCount'];
} else {
    $compUserCount = 0;
}

// Close connection
$conn->close();
?>

<h2>Reporting</h2>
<p>Total records in tblregusers: <?php echo $regUserCount; ?></p>
<p>Total records in tblCompUsers: <?php echo $compUserCount; ?></p>

</body>
</html>
