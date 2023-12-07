<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs - TalentForge.UI</title>
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
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav>
        <a href="CUHome.php">Home</a>
        <a href="CompUserAccountPage.php">My Account</a>
		<a href="TalentBoxPage.php">TalentBox</a>
		<a href="PostJobs.php">Post Jobs</a>
		<a href="ViewApplicants.php">My Jobs</a>
		<a href="CreateTemplate.php">Create Template</a>
        </nav>
    </header>

    <div class="container d-flex flex-column align-items-center justify-content-center flex-grow-1">
      
        <table class="table">
          
	        <h1 class="display-4 text-center mb-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MY JOBS</h1>
	      <div>&nbsp</div>
	       <h2 class="display-4 text-center mb-4">Job Field &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Job Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Job Description</h2>
            <tbody>
               <?php
                // Fetch jobs where CUID is the same as the session CUID
				session_start(); // Start the session

// Check if CUID is set in the session
if (isset($_SESSION['cuid'])) {
    $cuid = $_SESSION['cuid'];

    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforge";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}
                $jobsQuery = "SELECT * FROM tbljobs WHERE CUID = '$cuid'";
                $jobsResult = mysqli_query($conn, $jobsQuery);

                while ($job = mysqli_fetch_assoc($jobsResult)) {
                    echo '<tr>';
                    echo '<td>' . $job['JobField'] . '</td>';
                    echo '<td>' . $job['JobType'] . '</td>';
                    echo '<td>' . $job['JobDesc'] . '</td>';
                    echo '<td><button class="btn btn-primary btn-md" onclick="viewApplicants(' . $job['JID'] . ')">View Applicants</button></td>';
                    echo '</tr>';
                }
                ?>
				<script>
    function viewApplicants(jid) {
        // Send AJAX request to fetch applicants
        $.ajax({
            type: 'POST',
            url: 'fetchApplicants.php', // New PHP file for fetching applicants
            data: { jid: jid },
            success: function (response) {
                // Display the fetched data in the applicantsSection
                $('#applicantsSection').html(response);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
</script>
            </tbody>
        </table>

        <!-- Display applicants section -->
        <div id="applicantsSection"></div>
    </div>

    <!-- Your existing HTML and PHP code -->



</body>

</html>
