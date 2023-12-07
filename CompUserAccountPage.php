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
        // Update the user data in the database based on CUID

        // Fetch updated values from POST data
        $updatedName = $_POST['Name'];
        $updatedSurname = $_POST['Surname'];
        $updatedNationality = $_POST['Nationality'];
        $updatedIDNumber = $_POST['IDNumber'];
        $updatedCompany = $_POST['Company'];
        $updatedEmail = $_POST['Email'];
        $updatedPassword = $_POST['Password'];

        // Update the database with the new values
        $updateQuery = "UPDATE tblcompusers SET 
            Name = '$updatedName',
            Surname = '$updatedSurname',
            Nationality = '$updatedNationality',
            IDNumber = '$updatedIDNumber',
            Company = '$updatedCompany',
            Email = '$updatedEmail',
            Password = '$updatedPassword'
            WHERE CUID = '$cuid'";

        if ($conn->query($updateQuery) === TRUE) {
            // Successful update
            echo "Record updated successfully.";
			header("Location: CUHome.php");
        exit();
        } else {
            // Handle error
            echo "Error updating record: " . $conn->error;
			header("Location: PostJobs.php");
        exit();
        }
        // Close the database connection
        mysqli_close($conn);
    }
} else {
    // Redirect to the login page if CUID is not set
    header("Location: LoginPage.php");
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

        button[type="submit"],
        button[type="button"][onclick="confirmDelete()"],
        button[type="button"][onclick="enableEdit()"]{
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover,
        button[type="button"][onclick="confirmDelete()"]:hover {
            opacity: 0.8;
        }

        button[type="button"][onclick="enableEdit()"] {
            background-color: black;
        }

        button[type="button"][onclick="confirmDelete()"] {
            background-color: red;
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

    function confirmDelete() {
        var result = confirm("Are you sure you want to delete your account?");
        if (result) {
            // If user clicks 'OK', proceed with deletion
            deleteAccount();
        }
    }

    // Add this JavaScript function to send an AJAX request for account deletion
    function deleteAccount() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response if needed
                var response = xhr.responseText;
                if (response === "success") {
                    alert("Account deleted successfully.");
                    // Redirect or perform any other action after deletion
                    window.location.href = "LoginPage.php";
                } else {
                    alert("Error deleting account.");
                }
            }
        };

        // Send an AJAX request to the PHP script that handles account deletion
        xhr.open("POST", "deleteAccount.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("cuid=<?php echo $cuid; ?>");
    }
</script>

</head>
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
<body>
    <form method="post" asp-controller="Account" asp-action="Edit" action="CompUserAccountPage.php">
        <h1>My Account</h1>
        <label for="name">Name:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $userData['Name']; ?>" required readonly>

        <label for="surname">Surname:</label>
        <input type="text" id="Surname" name="Surname" value="<?php echo $userData['Surname']; ?>" required readonly>

        <label for="nationality">Nationality:</label>
        <input type="text" id="Nationality" name="Nationality" value="<?php echo $userData['Nationality']; ?>" required readonly>

        <label for="idnumber">ID Number:</label>
        <input type="text" id="IDNumber" name="IDNumber" value="<?php echo $userData['IDNumber']; ?>" required readonly>

        <label for="company">Company:</label>
        <input type="text" id="Company" name="Company" value="<?php echo $userData['Company']; ?>" required readonly>

        <label for="email">Email:</label>
        <input type="text" id="Email" name="Email" value="<?php echo $userData['Email']; ?>" required readonly>

        <label for="password">Password:</label>
        <input type="text" id="Password" name="Password" value="<?php echo $userData['Password']; ?>" required readonly>

        <!-- Hidden fields for updated values -->
        <input type="hidden" id="updatedName" name="updatedName" value="<?php echo $userData['Name']; ?>">
        <input type="hidden" id="updatedSurname" name="updatedSurname" value="<?php echo $userData['Surname']; ?>">
        <input type="hidden" id="updatedNationality" name="updatedNationality" value="<?php echo $userData['Nationality']; ?>">
        <input type="hidden" id="updatedIDNumber" name="updatedIDNumber" value="<?php echo $userData['IDNumber']; ?>">
        <input type="hidden" id="updatedCompany" name="updatedCompany" value="<?php echo $userData['Company']; ?>">
        <input type="hidden" id="updatedEmail" name="updatedEmail" value="<?php echo $userData['Email']; ?>">
        <input type="hidden" id="updatedPassword" name="updatedPassword" value="<?php echo $userData['Password']; ?>">

        <button type="button" onclick="enableEdit()">Edit</button>
        <button type="submit" disabled>Save Changes</button>
		<button type="button" onclick="confirmDelete()">Delete Account</button>
    </form>
</body>
</html>

