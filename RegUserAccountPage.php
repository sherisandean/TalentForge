<?php
session_start(); // Start the session

// Check if RUID is set in the session
if (isset($_SESSION['ruid'])) {
    $ruid = $_SESSION['ruid'];

    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforgedb";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch user data from tblcompusers based on RUID
    $result = $conn->query("SELECT * FROM tblregusers WHERE RUID = '$ruid'");
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        // Handle error or redirect to login page
        header("Location: LoginPage.php");
        exit();
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update the user data in the database based on RUID

        // Fetch updated values from POST data
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

        // Update the database with the new values
        $updateQuery = "UPDATE tblregusers SET 
            Name = '$updatedName',
            Surname = '$updatedSurname',
            IDNumber = '$updatedIDNumber',
            Gender ='$updatedGender',
            MaritalStatus ='$updatedMaritalstatus',
		    ContactNum='$updatedContactNum', 
            Email = '$updatedEmail',
			ResAddress = '$updatedResAddress',
			PostalAddress = '$updatedPostalAddress',
            Password = '$updatedPassword'
            WHERE RUID = '$ruid'";

        if ($conn->query($updateQuery) === TRUE) {
            // Successful update
            echo "Record updated successfully.";
			header("Location: RUHome.php");
        exit();
        } else {
            // Handle error
            echo "Error updating record: " . $conn->error;
			header("Location: RegUserAccountPage.php");
        exit();
        }
        // Close the database connection
        mysqli_close($conn);
    }
} else {
    // Redirect to the login page if RUID is not set
    header("Location: LoginRegUser.php");
    exit();
}
?>

<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            opacity: 0.8;
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
    <script>
        function enableEdit() {
            var inputs = document.querySelectorAll('input[type="text"]');
            var hiddenInputs = document.querySelectorAll('input[type="hidden"]');
            var saveChangesButton = document.querySelector('button[type="submit"]');

            // Enable inputs
            inputs.forEach(function (input) {
                input.removeAttribute('readonly');
            });

            // Update hidden inputs with current values
            hiddenInputs.forEach(function (hiddenInput) {
                var fieldName = hiddenInput.id.replace("updated", "");
                hiddenInput.value = document.getElementById(fieldName).value;
            });

            // Enable the Save Changes button
            saveChangesButton.removeAttribute('disabled');
        }

        function disableEdit() {
            var inputs = document.querySelectorAll('input[type="text"]');
            var saveChangesButton = document.querySelector('button[type="submit"]');

            // Disable inputs
            inputs.forEach(function (input) {
                input.setAttribute('readonly', true);
            });

            // Disable the Save Changes button
            saveChangesButton.setAttribute('disabled', true);
        }
    </script>
</head>
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
<body>
    <form method="post" asp-controller="Account" asp-action="Edit" action="RegUserAccountPage.php">
        <h1>My Account</h1>
        <label for="name">Name:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $userData['Name']; ?>" required readonly>

        <label for="surname">Surname:</label>
        <input type="text" id="Surname" name="Surname" value="<?php echo $userData['Surname']; ?>" required readonly>

        <label for="idnumber">ID Number:</label>
        <input type="text" id="IDNumber" name="IDNumber" value="<?php echo $userData['IDNumber']; ?>" required readonly>

        <label for="gender">Nationality:</label>
        <input type="text" id="Gender" name="Gender" value="<?php echo $userData['Gender']; ?>" required readonly>
		
		 <label for="maritalstatus">Marital Status:</label>
        <input type="text" id="MaritalStatus" name="MaritalStatus" value="<?php echo $userData['MaritalStatus']; ?>" required readonly>
		
        <label for="contactnum">Contact Number:</label>
        <input type="text" id="ContactNum" name="ContactNum" value="<?php echo $userData['ContactNum']; ?>" required readonly>

        <label for="email">Email:</label>
        <input type="text" id="Email" name="Email" value="<?php echo $userData['Email']; ?>" required readonly>
		
		 <label for="resaddress">Residential Address::</label>
        <input type="text" id="ResAddress" name="ResAddress" value="<?php echo $userData['ResAddress']; ?>" required readonly>
		
		 <label for="postalAddress">Nationality:</label>
        <input type="text" id="PostalAddress" name="PostalAddress" value="<?php echo $userData['PostalAddress']; ?>" required readonly>

        <label for="password">Password:</label>
        <input type="text" id="Password" name="Password" value="<?php echo $userData['Password']; ?>" required readonly>

        <!-- Hidden fields for updated values -->
        <input type="hidden" id="updatedName" name="updatedName" value="<?php echo $userData['Name']; ?>">
        <input type="hidden" id="updatedSurname" name="updatedSurname" value="<?php echo $userData['Surname']; ?>">
        <input type="hidden" id="updatedIDNumber" name="updatedIDNumber" value="<?php echo $userData['IDNumber']; ?>">
        <input type="hidden" id="updatedGender" name="updatedGender" value="<?php echo $userData['Gender']; ?>">
		 <input type="hidden" id="updatedMaritalStatus" name="updatedMaritalStatus" value="<?php echo $userData['MaritalStatus']; ?>">
		 <input type="hidden" id="updatedContactNum" name="updatedContactNum" value="<?php echo $userData['ContactNum']; ?>">
        <input type="hidden" id="updatedEmail" name="updatedEmail" value="<?php echo $userData['Email']; ?>">
		 <input type="hidden" id="updatedResAddress" name="updatedResAddress" value="<?php echo $userData['ResAddress']; ?>">
		  <input type="hidden" id="updatedPostalAddress" name="updatedPostalAddress" value="<?php echo $userData['PostalAddress']; ?>">
        <input type="hidden" id="updatedPassword" name="updatedPassword" value="<?php echo $userData['Password']; ?>">

        <button type="button" onclick="enableEdit()">Edit</button>
        <button type="submit" disabled>Save Changes</button>
    </form>
</body>
</html>

