<?php  
session_start(); // Start the session

// Check if RUID is set in the session
if (isset($_SESSION['ruid'])) {
    $ruid = $_SESSION['ruid'];
  // Check if the form is submitted
      // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforge";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

  
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Start a transaction
        $conn->begin_transaction();// Fetch updated values from POST data
        $updatedName = $_POST['Name'];
        $updatedSurname = $_POST['Surname'];
        $updatedIDNumber = $_POST['IDNumber'];
        $updatedGender = $_POST['Gender'];
        $updatedMaritalstatus = $_POST['MaritalStatus'];
		$updatedContactNum = $_POST['ContactNum'];
		$updatedEmail = $_POST['Email']; 
		$updatedResAddress = $_POST['ResAddress'];
		$updatedPostalAddress = $_POST['PostalAddress'];
        $updatedPassword = $_POST['Password'];
        $updatedSkill1 = $_POST['skill1'];
		$updatedSkill2 = $_POST['skill2'];
		$updatedLastSchool = $_POST['LastSchool'];
		$updatedHighestGrade = $_POST['highestGrade'];
		$updatedFinalYear = $_POST['finalYear'];
		$updatedSubject1 = $_POST['Subject1'];
		$updatedMark1 = $_POST['Mark1'];
		$updatedSubject2 = $_POST['Subject2'];
		$updatedMark2 = $_POST['Mark2'];
		$updatedSubject3 = $_POST['Subject3'];
		$updatedMark3 = $_POST['Mark3'];
		$updatedSubject4 = $_POST['Subject4'];
		$updatedMark4 = $_POST['Mark4'];
		$updatedSubject5 = $_POST['Subject5'];
		$updatedMark5 = $_POST['Mark5'];
		$updatedSubject6 = $_POST['Subject6'];
		$updatedMark6 = $_POST['Mark6'];
		$updatedSubject7 = $_POST['Subject7'];
		$updatedMark7 = $_POST['Mark7'];
		$updatedCollegeName = $_POST['collegeName'];
		$updatedFieldOfStudy = $_POST['fieldOfStudy'];
		$updatedActive = $_POST['Active'];
		$updatedCompleted = $_POST['Completed'];
		$updatedCompany = $_POST['Company'];
		$updatedPosition = $_POST['Position'];
		$updatedReference = $_POST['Reference'];
		$updatedReferenceContact = $_POST['ReferenceContact'];

      
            // Update the user data in the tblregusers table
            $updateUserQuery = "UPDATE tblregusers SET 
                Name = '$updatedName',
                Surname = '$updatedSurname',
                IDNumber = '$updatedIDNumber',
                Gender ='$updatedGender',
                MaritalStatus ='$updatedMaritalstatus',
                ContactNum='$updatedContactNum', 
                Email = '$updatedEmail',
                ResAddress = '$updatedResAddress',
                PostalAddress = '$updatedPostalAddress'
                WHERE tblregusers.RUID = '$ruid'";
//$conn->query($updateUserQuery);
        
        if ($conn->query($updateUserQuery) === TRUE) {
            // Successful update
			           echo '<script>alert("successfully");</script>';

			              //  header("Location: PostJobs.php");

        } else {
            // Handle error
			           echo '<script>alert("Unsuccessfully");</script>';

        }
        // Close the database connection
        mysqli_close($conn);
    }
}
?>


<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - TalentForge.UI</title>
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css?v=AKvNjO3dCPPS0eSU1Ez8T2wI280i08yGycV9ndytL-c">
    <link rel="stylesheet" href="/TalentForge.UI.styles.css?v=BOevtv_u0DTDcc45o9LezKTwcQIkWJVzWz5aAxaDFhw">
</head>
          <style>
    table label {
        font-size: 24px; /* Adjust the font size as needed */
    }

    table button {
        font-size: 30px;
    }

    .btn-md {
        font-size: 34px; /* Adjust the font size to make the button bigger */
        padding: 10px 20px; /* Adjust padding for width and height */
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
<body>
    <header>
	<nav>
        <a href="TalentForgeHomePage.php">Home</a>
        <a href="LoginPage.php">Login</a>
		<a href="#Privacy">Privacy</a>
    </nav>
 
    </header>
    <div class="container">
  
<div class="container">
    <h1 class="display-4 text-center"> User Login</h1>
     <img src="TalentForge.png" alt="Your Image">
    <form method="post" >
        <div class="row justify-content-center">
            <div class="col-md-3">
                <!-- First Column -->
            </div>
            <div class="col-md-6">
                <!-- Second Column (Centered) -->

                <table class="table">
                    <tbody><tr>
                        <td>
                            <label></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Username">Email:</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter your username" required="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Password">Password:</label>
                        </td>
                        <td>
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter your password" required="">
                        </td>
						  <td>
                            <input type="text" class="form-control" id="hd" name="hd" placeholder="Enter your password" required="" value="<?php echo $updatedName; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label></label>
                        </td>
                    </tr>
                </tbody></table>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-md">Login</button>
                </div>

                <!-- "Create an account" link -->
                <li class="nav-item">
                    <a class="nav-link text-primary" href="CreateAccountHomePage.php">  Create an account</a>
                </li>
            </div>
            <div class="col-md-3">
                <!-- Third Column -->
            </div>
        </div>
</div>

        </main>
    </div>

</body>




</html>