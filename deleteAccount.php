<?php
session_start();

if (isset($_POST['cuid'])) {
    $cuid = $_POST['cuid'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforgedb";
    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete rows from tbljobs and tblcompusers based on CUID
    $deleteJobsQuery = "DELETE FROM tbljobs WHERE CUID = '$cuid'";
    $deleteCompUsersQuery = "DELETE FROM tblcompusers WHERE CUID = '$cuid'";

    if ($conn->query($deleteJobsQuery) === TRUE && $conn->query($deleteCompUsersQuery) === TRUE) {
        // Successful deletion
        echo "success";
    } else {
        // Handle error
        echo "error";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle invalid request
    echo "invalid request";
}
?>
