<?php
// Connection to database
$servername="localhost";
$username="root";
$password ="";
$db="talentforge";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
die("Connection fa1led:" . mysqli_connect_error ());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$skill1 = $_POST["skill1"];
    $skill2 = $_POST["skill2"];
	$ruid = $_POST["ruid"];
    // Validate and sanitize user inputs (you should enhance this based on your requirements)
    $skill1 = mysqli_real_escape_string($conn, $skill1);
    $skill2 = mysqli_real_escape_string($conn, $skill2);

    $sql = "INSERT INTO tblskills (RUID,Skill1,Skill2) VALUES
	('$ruid','$skill1','$skill2')";

    if (mysqli_query($conn, $sql)) {
           echo '<script>alert("Registration successfully");</script>';
    } else {
		     echo '<script>alert("Unsuccessfully Registration Try again");</script>';
    }
}
$conn->close();// Close connection
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .tile {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            border-radius: 5px;
        }
	

        label {
            display: block;
        }

        input,
        select {
            width: 50%;
            padding: 10px;
            margin-bottom: 15px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 10px;
        }

          

            input[type="submit"] {
                background-color: #4caf50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }
				
				
    </style>
    <title>Form</title>
</head>
<body>
		            <form name="SchoolInformationdetails" action="HigherEducation.php" method="POST">

	        <div class="tile">
            <h2>Tile 4: School Information</h2>
                <label for="lastSchool">Last School Attended:</label>
                <input type="text" id="lastSchool" name="lastSchool">

                <label for="highestGrade">Highest Grade Passed:</label>
                <input type="text" id="highestGrade" name="highestGrade">

                <label for="finalYear">Final Year:</label>
                <input type="text" id="finalYear" name="finalYear">

				
        <label for="subject1">Subject 1:</label>
        <input type="text" id="subject1" name="subject1" required>

        <label for="mark1">Mark 1:</label>
        <input type="text" id="mark1" name="mark1" required>

        <label for="subject2">Subject 2:</label>
        <input type="text" id="subject2" name="subject2" required>

        <label for="mark2">Mark 2:</label>
        <input type="text" id="mark2" name="mark2" required>

        <label for="subject3">Subject 3:</label>
        <input type="text" id="subject3" name="subject3" required>

        <label for="mark3">Mark 3:</label>
        <input type="text" id="mark3" name="mark3" required>

        <label for="subject1">Subject 4:</label>
        <input type="text" id="subject4" name="subject4" required>

        <label for="mark4">Mark 4:</label>
        <input type="text" id="mark4" name="mark4" required>

        <label for="subject2">Subject 5:</label>
        <input type="text" id="subject5" name="subject5" required>

        <label for="mark2">Mark 5:</label>
        <input type="text" id="mark5" name="mark5" required>

        <!-- Subject 3 -->
        <label for="subject3">Subject 6:</label>
        <input type="text" id="subject6" name="subject6" required>

        <label for="mark3">Mark 6:</label>
        <input type="text" id="mark6" name="mark6" required>

<!-- Subject 1 -->
        <label for="subject1">Subject 7:</label>
        <input type="text" id="subject7" name="subject7" required>

        <label for="mark1">Mark 7:</label>
        <input type="text" id="mark7" name="mark7" required>
				<input type="hidden" name="email" value="<?php echo $email;?>">
				<input type="hidden" name="password" value="<?php echo $password;?>">
		<input type="hidden" name="ruid" value="<?php echo $ruid;?>">
        </div>
		
 <input type="submit" value="Submit">

          </form>
        </div>
    </div>
</body>
</html>

<?php
error_reporting(0);
?>
