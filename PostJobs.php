<?php
session_start(); // Start the session

// Check if CUID is set in the session
if (isset($_SESSION['cuid'])) {
    $cuid = $_SESSION['cuid'];

    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforgedb";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch user data from tblcompusers based on CUID
    $result = $conn->query("SELECT * FROM tblcompusers WHERE CUID = '$cuid'");
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        // Handle error or redirect to login page
        header("Location: LoginPage.php");
        exit();
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form data and insert into the database
        $JobField = $_POST["JobField"];
        $JobType = $_POST["JobType"];
        $JobDesc = $_POST["JobDesc"];

        // Perform the database insert operation here
        // Make sure to validate and sanitize user input

        $insertQuery = "INSERT INTO tbljobs (CUID, JobField, JobType, JobDesc) VALUES ('$cuid', '$JobField', '$JobType', '$JobDesc')";

        if ($conn->query($insertQuery) === TRUE) {
            // Successful job posting
            echo "Job posted successfully.";
        } else {
            // Handle error
            echo "Error posting job: " . $conn->error;
        }
    }
    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to the login page if CUID is not set
    header("Location: LoginPage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px; /* Adjust the height as needed */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
		
		.nav-item {
        list-style-type: none;
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
<header>
  <nav>
        <a href="CUHome.php">Home</a>
        <a href="CompUserAccountPage.php">My Account</a>
		<a href="TalentBoxPage.php">TalentBox</a>
		<a href="PostJobs.php">Post Jobs</a>
		<a href="CreateTemplate.php">Create Template</a>
    </nav>
</header>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Post a Job</h2>

    <label for="CUID">Company User ID:</label>
    <input type="text" name="CUID" value="<?php echo $cuid; ?>" readonly>

    <label for="JobField">Job Field:</label>
    <input type="text" name="JobField" required>

    <label for="JobType">Job Type:</label>
    <input type="text" name="JobType" required>

    <label for="JobDesc">Job Description:</label>
    <textarea name="JobDesc" rows="4" required></textarea>

    <input type="submit" value="Post Job">
</form>

</body>
</html>
