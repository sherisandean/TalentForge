<?php
session_start(); // Start the session

// Check if RUID is set in the session
if (isset($_SESSION['ruid'])) {
    $ruid = $_SESSION['ruid'];

    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforge";
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

    // Fetch additional data from other tables
    $skillsResult = $conn->query("SELECT * FROM tblskills WHERE RUID = '$ruid'");
    $skillsData = $skillsResult->fetch_assoc();

    $schoolInfoResult = $conn->query("SELECT * FROM tblschoolinfo WHERE RUID = '$ruid'");
    $schoolInfoData = $schoolInfoResult->fetch_assoc();

    $higheredResult = $conn->query("SELECT * FROM tblhighered WHERE RUID = '$ruid'");
    $higheredData = $higheredResult->fetch_assoc();

    $employeeHistoryResult = $conn->query("SELECT * FROM tblemployeehistory WHERE RUID = '$ruid'");
    $employeeHistoryData = $employeeHistoryResult->fetch_assoc();

    // ... (Repeat for other tables)

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['deleteAccount']) && $_POST['deleteAccount'] == 1) {
            // Delete account logic here
            $deleteSkillsQuery = "DELETE FROM tblskills WHERE RUID = '$ruid'";
            $deleteSchoolQuery = "DELETE FROM tblschoolinfo WHERE RUID = '$ruid'";
            $deleteHigherEdQuery = "DELETE FROM tblhighered WHERE RUID = '$ruid'";
            $deleteEmpHistQuery = "DELETE FROM tblemployeehistory WHERE RUID = '$ruid'";
            $deleteUserQuery = "DELETE FROM tblregusers WHERE RUID = '$ruid'";


            try {
                // Execute the delete queries
                $conn->query($deleteUserQuery);
                $conn->query($deleteSkillsQuery);
                $conn->query($deleteSchoolQuery);
                $conn->query($deleteHigherEdQuery);
                $conn->query($deleteEmpHistQuery);
                

                // Successful delete
                echo "Account deleted successfully.";
                header("Location: LoginPage.php");
                exit();
            } catch (Exception $e) {
                // Handle error
                echo "Error deleting account: " . $e->getMessage();
                header("Location: RegUserAccountPage.php");
                exit();
            }
        } else {
            // Update logic here (replace the placeholder with your actual update logic)
            $conn->begin_transaction();

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

            try {
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
                WHERE RUID = '$ruid'";

            // Update the skills table
            $updateSkillsQuery = "UPDATE skills SET 
                skill1 = '$updatedSkill1',
                skill2 = '$updatedSkill2'
                WHERE RUID = '$ruid'";

            // Update the tblschoolinfo table
            $updateSchoolInfoQuery = "UPDATE tblschoolinfo SET 
                LastSchool = '$updatedLastSchool',
                highestGrade = '$updatedHighestGrade',
                finalYear = '$updatedFinalYear'
				Subject1='$updatedSubject1',
		        Mark1='$updatedMark1',
		        Subject2='$updatedSubject2', 
		        Mark2='$updatedMark2',
		        Subject3='$updatedSubject3',
		        Mark3='$updatedMark3',
		        Subject4='$updatedSubject4',
		        Mark4='$updatedMark4',
		        Subject5='$updatedSubject5',
		        Mark5='$updatedMark5',
		        Subject6='$updatedSubject6',
		        Mark6='$updatedMark6',
		        Subject7='$updatedSubject7',
		        Mark7='$updatedMark7'
                WHERE RUID = '$ruid'";

            $updateHigherEdQuery = "UPDATE tblhighered SET 
                collegeName='$updatedCollegeName',
		        fieldOfStudy='$updatedFieldOfStudy',
		        Active='$updatedActive',
		        Completed='$updatedCompleted'
                WHERE RUID = '$ruid'";
			
            $updateEmpHistoryQuery = "UPDATE tblemployeehistory SET 
                Company='$updatedCompany',
		        Position='$updatedPosition',
		        Reference='$updatedReference',
		        ReferenceContact='$updatedReferenceContact'
                WHERE RUID = '$ruid'";			

                // Commit the transaction
                $conn->commit();

                // Successful update
                echo "Record updated successfully.";
                header("Location: RUHome.php");
                exit();
            } catch (Exception $e) {
                // Rollback the transaction on error
                $conn->rollback();

                // Handle error
                //echo "Error updating record: " . $e->getMessage();
				echo '<script>alert("Error updating record: ");</script>';

                header("Location: RegUserAccountPage.php");
                exit();
            }
        }
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

        button[type="submit"],
        button[type="button"][onclick="showDeleteConfirmation()"],
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
	     function showDeleteConfirmation() {
            var confirmed = confirm("Are you sure you want to delete your account?");
            if (confirmed) {
                // If user clicks 'OK', submit the form with an additional parameter
                document.getElementById("deleteForm").submit();
            }
        }
	
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
		            <a href="logout.php">Logout</a>

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

       <!--Added stuff-->
	    <h1>My Skills</h1>
        <label for="skill1">Skill 1:</label>
        <input type="text" id="skill1" name="skill1" value="<?php echo $skillsData['skill1']; ?>" required readonly>

        <label for="skill2">Skill 2:</label>
        <input type="text" id="skill2" name="skill2" value="<?php echo $skillsData['skill2']; ?>" required readonly>

         <h1>School Information</h1>
        <label for="LastSchool">Last School:</label>
        <input type="text" id="LastSchool" name="LastSchool" value="<?php echo $schoolInfoData['LastSchool']; ?>" required readonly>

        <label for="highestGrade">HighestGrade:</label>
        <input type="text" id="highestGrade" name="highestGrade" value="<?php echo $schoolInfoData['highestGrade']; ?>" required readonly>

        <label for="finalYear">Final Year:</label>
        <input type="text" id="finalYear" name="finalYear" value="<?php echo $schoolInfoData['finalYear']; ?>" required readonly>
		
		<label for="Subject1">Subject1:</label>
        <input type="text" id="Subject1" name="Subject1" value="<?php echo $schoolInfoData['Subject1']; ?>" required readonly>

        <label for="Mark1">Mark 1:</label>
        <input type="text" id="Mark1" name="Mark1" value="<?php echo $schoolInfoData['Mark1']; ?>" required readonly>
		
		<label for="Subject2">Subject2:</label>
        <input type="text" id="Subject2" name="Subject2" value="<?php echo $schoolInfoData['Subject2']; ?>" required readonly>

        <label for="Mark2">Mark 2:</label>
        <input type="text" id="Mark2" name="Mark2" value="<?php echo $schoolInfoData['Mark2']; ?>" required readonly>
		
		<label for="Subject3">Subject3:</label>
        <input type="text" id="Subject3" name="Subject3" value="<?php echo $schoolInfoData['Subject3']; ?>" required readonly>

        <label for="Mark3">Mark 3:</label>
        <input type="text" id="Mark3" name="Mark3" value="<?php echo $schoolInfoData['Mark3']; ?>" required readonly>
		
		<label for="Subject4">Subject4:</label>
        <input type="text" id="Subject4" name="Subject4" value="<?php echo $schoolInfoData['Subject4']; ?>" required readonly>

        <label for="Mark4">Mark 4:</label>
        <input type="text" id="Mark4" name="Mark4" value="<?php echo $schoolInfoData['Mark4']; ?>" required readonly>
		
		<label for="Subject5">Subject5:</label>
        <input type="text" id="Subject5" name="Subject5" value="<?php echo $schoolInfoData['Subject5']; ?>" required readonly>

        <label for="Mark5">Mark 5:</label>
        <input type="text" id="Mark5" name="Mark5" value="<?php echo $schoolInfoData['Mark5']; ?>" required readonly>
		
		<label for="Subject6">Subject6:</label>
        <input type="text" id="Subject6" name="Subject6" value="<?php echo $schoolInfoData['Subject6']; ?>" required readonly>

        <label for="Mark6">Mark 6:</label>
        <input type="text" id="Mark6" name="Mark6" value="<?php echo $schoolInfoData['Mark6']; ?>" required readonly>
		
		<label for="Subject7">Subject7:</label>
        <input type="text" id="Subject7" name="Subject7" value="<?php echo $schoolInfoData['Subject7']; ?>" required readonly>

        <label for="Mark7">Mark 7:</label>
        <input type="text" id="Mark7" name="Mark7" value="<?php echo $schoolInfoData['Mark7']; ?>" required readonly>


        <h1>Higher Education</h1>
        <label for="collegeName">College Name:</label>
        <input type="text" id="collegeName" name="collegeName" value="<?php echo $higheredData['collegeName']; ?>" required readonly>

        <label for="fieldOfStudy">Field Of Study:</label>
        <input type="text" id="fieldOfStudy" name="fieldOfStudy" value="<?php echo $higheredData['fieldOfStudy']; ?>" required readonly>
		
		<label for="Active">Active:</label>
        <input type="text" id="Active" name="Active" value="<?php echo $higheredData['Active']; ?>" required readonly>
		
		<label for="Completed">Completed:</label>
        <input type="text" id="Completed" name="Completed" value="<?php echo $higheredData['Completed']; ?>" required readonly>
		
		<h1>Latest Employment</h1>
        <label for="Company">Company:</label>
        <input type="text" id="Company" name="Company" value="<?php echo $employeeHistoryData['Company']; ?>" required readonly>

        <label for="Position">Position:</label>
        <input type="text" id="Position" name="Position" value="<?php echo $employeeHistoryData['Position']; ?>" required readonly>
		
		<label for="Reference">Reference:</label>
        <input type="text" id="Reference" name="Reference" value="<?php echo $employeeHistoryData['Reference']; ?>" required readonly>
		
		<label for="ReferenceContact">Reference Contact:</label>
        <input type="text" id="ReferenceContact" name="ReferenceContact" value="<?php echo $employeeHistoryData['ReferenceContact']; ?>" required readonly>


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
        <input type="hidden" id="updatedSkill1" name="updatedSkill1" value="<?php echo $skillsData['skill1']; ?>">  
        <input type="hidden" id="updatedSkill2" name="updatedSkill2" value="<?php echo $skillsData['skill2']; ?>">
        <input type="hidden" id="updatedLastSchool" name="updatedLastSchool" value="<?php echo $schoolInfoData['LastSchool']; ?>">
        <input type="hidden" id="updatedHighestGrade" name="updatedHighestGrade" value="<?php echo $schoolInfoData['highestGrade']; ?>">
        <input type="hidden" id="updatedFinalYear" name="updatedFinalYear" value="<?php echo $schoolInfoData['finalYear']; ?>">
        <input type="hidden" id="updatedSubject1" name="updatedSubject1" value="<?php echo $schoolInfoData['Subject1']; ?>">
        <input type="hidden" id="updatedMark1" name="updatedMark1" value="<?php echo $schoolInfoData['Mark1']; ?>">
        <input type="hidden" id="updatedSubject2" name="updatedSubject2" value="<?php echo $schoolInfoData['Subject2']; ?>">
        <input type="hidden" id="updatedMark2" name="updatedMark2" value="<?php echo $schoolInfoData['Mark2']; ?>">
        <input type="hidden" id="updatedSubject3" name="updatedSubject3" value="<?php echo $schoolInfoData['Subject3']; ?>">
        <input type="hidden" id="updatedMark3" name="updatedMark3" value="<?php echo $schoolInfoData['Mark3']; ?>">
        <input type="hidden" id="updatedSubject4" name="updatedSubject4" value="<?php echo $schoolInfoData['Subject4']; ?>">
        <input type="hidden" id="updatedMark4" name="updatedMark4" value="<?php echo $schoolInfoData['Mark4']; ?>">
        <input type="hidden" id="updatedSubject5" name="updatedSubject5" value="<?php echo $schoolInfoData['Subject5']; ?>">
        <input type="hidden" id="updatedMark5" name="updatedMark5" value="<?php echo $schoolInfoData['Mark5']; ?>">
        <input type="hidden" id="updatedSubject6" name="updatedSubject6" value="<?php echo $schoolInfoData['Subject6']; ?>">
        <input type="hidden" id="updatedMark6" name="updatedMark6" value="<?php echo $schoolInfoData['Mark6']; ?>">
        <input type="hidden" id="updatedSubject7" name="updatedSubject7" value="<?php echo $schoolInfoData['Subject7']; ?>">
        <input type="hidden" id="updatedMark7" name="updatedMark7" value="<?php echo $schoolInfoData['Mark7']; ?>">
        <input type="hidden" id="updatedCollegeName" name="updatedCollegeName" value="<?php echo $higheredData['collegeName']; ?>">
        <input type="hidden" id="updatedFieldOfStudy" name="updatedFieldOfStudy" value="<?php echo $higheredData['fieldOfStudy']; ?>">
        <input type="hidden" id="updatedActive" name="updatedActive" value="<?php echo $higheredData['Active']; ?>">
        <input type="hidden" id="updatedCompleted" name="updatedCompleted" value="<?php echo $higheredData['Completed']; ?>">
        <input type="hidden" id="updatedCompany" name="updatedCompany" value="<?php echo $employeeHistoryData['Company']; ?>">
        <input type="hidden" id="updatedPosition" name="updatedPosition" value="<?php echo $employeeHistoryData['Position']; ?>">
        <input type="hidden" id="updatedReference" name="updatedReference" value="<?php echo $employeeHistoryData['Reference']; ?>">
        <input type="hidden" id="updatedReferenceContact" name="updatedReferenceContact" value="<?php echo $employeeHistoryData['ReferenceContact']; ?>">
        <input type="hidden" name="deleteAccount" value="1">

        <button type="button" onclick="enableEdit()">Edit</button>
        <button type="submit" disabled>Save Changes</button>
		 <button type="button" onclick="showDeleteConfirmation()">Delete Account</button>
    </form>
</body>
</html>

