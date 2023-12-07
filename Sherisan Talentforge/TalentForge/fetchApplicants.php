<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "talentforge";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jid = $_POST['jid'];

    // Fetch applicants using JOIN
    $query = "SELECT ja.JID, ja.RUID, ja.Status, ru.Name, ru.Surname, ru.Email
              FROM tbljobsapplied ja
              JOIN tblregusers ru ON ja.RUID = ru.RUID
              WHERE ja.JID = '$jid'";

    $result = mysqli_query($conn, $query);

    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Fetch Applicants - TalentForge.UI</title>';
    
    echo '</head>';
    echo '<body>';

    echo '<style>';
    echo 'body { margin: 0; padding: 0; }';
    //echo 'table { width: 90%; }'; // Set the table width to 100%
    echo '</style>';

    echo '<div class="container d-flex flex-column align-items-center justify-content-center flex-grow-1">';
	echo '<div>&nbsp</div>';
	echo '<h1 class="display-4 text-center mb-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; APPLICANTS</h1>';
	echo '<div>&nbsp</div>';
	echo '<h2 class="display-4 text-center mb-4">Job ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  User ID  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Email</h2>';
    echo '<table style="width: 85%">';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
       echo '<tr>';
    echo '<td>' . $row['JID'] . '</td>';
    echo '<td>' . $row['RUID'] . '</td>';
    echo '<td>' . $row['Name'] . ' ' . $row['Surname'] . '</td>';
    echo '<td>' . $row['Email'] . '</td>';
    echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    echo '</body>';
    echo '</html>';
}

mysqli_close($conn);
?>
