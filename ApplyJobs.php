<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Jobs - TalentForge.UI</title>
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css?v=AKvNjO3dCPPS0eSU1Ez8T2wI280i08yGycV9ndytL-c">
    <link rel="stylesheet" href="/TalentForge.UI.styles.css?v=BOevtv_u0DTDcc45o9LezKTwcQIkWJVzWz5aAxaDFhw">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        

        table label {
            font-size: 30px; /* 20% bigger */
        }

        table button {
            font-size: 20px; /* 50% smaller */
        }

        .btn-md {
            font-size: 20px; /* 50% smaller */
            padding: 5px 10px; /* Adjust padding for width and height */
        }

        tbody tr {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 110%; /* Set the width to 100% */
            background-color: #f5f5f5; /* Background color for rows */
            margin-bottom: 10px; /* Margin between rows */
            padding: 20px; /* Increase padding for height */
            border-radius: 30px; /* Border radius for rows */
        }

        tbody td {
            flex-basis: calc(25% - 20px); /* Adjust width of columns (25% minus margin) */
        }

        @media (max-width: 768px) {
            tbody td {
                flex-basis: 100%; /* Full width on smaller screens */
            }
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #444;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav>
            <a href="RUHome.php">Home</a>
            <a href="RegUserAccountPage.php">My Account</a>
            <a href="CreateCVs.php">Create CV</a>
            <a href="ViewCVs.php">My CVs</a>
            <a href="ApplyJobs.php">Jobs</a>
            <a href="AppliedJobs.php">Applications</a>
        </nav>
    </header>

    <div class="container d-flex flex-column align-items-center justify-content-center flex-grow-1">
        <h1 class="display-4 text-center mb-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APPLY TO JOBS</h1>
        <table class="table">
		<div>
		  &nbsp;
		</div>
            <h2 class="display-4 text-center mb-4">Job Field &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Job Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Job Description</h2>
            <tbody>
                <?php
session_start(); // Start the session

// Re-establish the database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "talentforgedb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you are receiving the jid in the POST data
    $jid = $_POST['jid'];

    // Fetch user information or use session data to get RUID
    $ruid = $_SESSION['ruid'];

    $status = "pending";

    $insertQuery = "INSERT INTO tbljobsapplied (JID, RUID, Status) VALUES ('$jid', '$ruid', '$status')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Application successful";
    } else {
        echo "Error updating database: " . mysqli_error($conn);
    }
} else {
    // Fetch job records from tbljobs
    $query = "SELECT * FROM tbljobs";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['JobField'] . '</td>';
        echo '<td>' . $row['JobType'] . '</td>';
        echo '<td>' . $row['JobDesc'] . '</td>';
        echo '<td><button class="btn btn-primary btn-md" onclick="applyJob(' . $row['JID'] . ')" data-jid="' . $row['JID'] . '">Apply</button></td>';
        echo '</tr>';
    }
}

mysqli_close($conn);
?>


            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function applyJob(jid) {
            // Change the button appearance
            var button = document.querySelector('button[data-jid="' + jid + '"]');
            button.classList.remove('btn-primary');
            button.classList.add('btn-success');
            button.innerText = 'Applied';

            // Send AJAX request to update the database
            $.ajax({
                type: 'POST',
                url: 'ApplyJobs.php',
                data: { jid: jid }, // Pass the JID to the server
                success: function(response) {
                    console.log(response); // Log the response from the server (for debugging purposes)
                },
                error: function(error) {
                    console.error('Error:', error); // Log any errors (for debugging purposes)
                }
            });
        }
    </script>
</body>

</html>
