
<?php
 //Connection to database
$servername="localhost";
$username="root";
$password ="";
$db="talentforge";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
die("Connection fa1led:" . mysqli_connect_error ());
}
?>
<?php
//to get ruid use email and password from createRegAccount
$email = $_POST['email'];
$password = $_POST['password'];


// Construct the SQL query
$sql = "SELECT RUID FROM tblregusers WHERE Email = '$email' AND Password = '$password'";
 mysqli_query($conn,$sql);

// Check if a matching record was found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ruid = $row['RUID'];
} 

// Close the connection
$conn->close();

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
		            <form name="SchoolInformationdetails" action="HigherEducation.php" method="POST" enctype="multipart/formdata">

	        <div class="tile">
            <h2>Tile 4: School Information</h2>
                <label for="lastSchool">Last School Attended:</label>
                <input type="text" id="lastSchool" name="lastSchool">

                <label for="highestGrade">Highest Grade Passed:</label>
                <input type="text" id="highestGrade" name="highestGrade">

                <label for="finalYear">Final Year:</label>
                <input type="text" id="finalYear" name="finalYear">

				
				<!-- Subject 1 -->
        <label for="subject1">Subject 1:</label>
        <input type="text" id="subject1" name="subjects[]" required>

        <label for="mark1">Mark 1:</label>
        <input type="text" id="mark1" name="marks[]" required>

        <!-- Subject 2 -->
        <label for="subject2">Subject 2:</label>
        <input type="text" id="subject2" name="subjects[]" required>

        <label for="mark2">Mark 2:</label>
        <input type="text" id="mark2" name="marks[]" required>

        <!-- Subject 3 -->
        <label for="subject3">Subject 3:</label>
        <input type="text" id="subject3" name="subjects[]" required>

        <label for="mark3">Mark 3:</label>
        <input type="text" id="mark3" name="marks[]" required>

<!-- Subject 4 -->
        <label for="subject1">Subject 4:</label>
        <input type="text" id="subject4" name="subjects[]" required>

        <label for="mark1">Mark 4:</label>
        <input type="text" id="mark4" name="marks[]" required>

        <!-- Subject 2 -->
        <label for="subject2">Subject 5:</label>
        <input type="text" id="subject5" name="subjects[]" required>

        <label for="mark2">Mark 5:</label>
        <input type="text" id="mark5" name="marks[]" required>

        <!-- Subject 3 -->
        <label for="subject3">Subject 6:</label>
        <input type="text" id="subject6" name="subjects[]" required>

        <label for="mark3">Mark 6:</label>
        <input type="text" id="mark6" name="marks[]" required>

<!-- Subject 1 -->
        <label for="subject1">Subject 7:</label>
        <input type="text" id="subject7" name="subjects[]" required>

        <label for="mark1">Mark 7:</label>
        <input type="text" id="mark7" name="marks[]" required>
		
						<input type="hidden" name="email" value="<?php echo $email;?>">
				<input type="hidden" name="password" value="<?php echo $password;?>">




        </div>
		
 <input type="submit" value="Submit">

          </form>
        </div>
    </div>
</body>
</html>

<?php
error_reporting(0);
		$lastSchool = $_POST["lastSchool"];
				$highestGrade = $_POST["highestGrade"];
				
				$finalYear = $_POST["finalYear"];
				


	$sub1 = $_POST["subject1"];
	$mrk1 = $_POST["mark1"];
		$sub2 = $_POST["subject2"];
	$mrk2 = $_POST["mark2"];
		$sub3 = $_POST["subject3"];
	$mrk3 = $_POST["mark3"];
		$sub4 = $_POST["subject4"];
	$mrk4 = $_POST["mark4"];
		$sub5 = $_POST["subject5"];
	$mrk5 = $_POST["mark5"];
		$sub6 = $_POST["subject6"];
	$mrk6 = $_POST["mark6"];
		$sub7 = $_POST["subject7"];
	$mrk7 = $_POST["mark7"];

    $Check=True;
?>

<?php
//Inserting Vaild data
if ($Check===True){

$sql= "INSERT INTO tblskills (RUID,LastSchoolAttended, HighestGradePassed, FinalYear, Subject1, Mark1, Subject2, Mark2, Subject3, Mark3, Subject4, Mark4, Subject5, Mark5, Subject6, Mark6, Subject7, Mark7) 
        VALUES ('$ruid','$lastSchool', '$highestGrade', '$finalYear', '$sub1', '$mrk1', '$sub2', '$mrk2', '$sub3', '$mrk3', '$sub4', '$mrk4', '$sub5', '$mrk5', '$sub6', '$mrk6', '$sub7', '$mrk7')";

if (mysqli_query($conn,$sql)){
 echo "Succesfull";
 echo '<script>alert("Succesfull")</script>';
}else{
 echo "Error: ".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);
 }
 else{
 //Non Vaild data
 echo '<script>alert("Please Enter Correct Details")</script>';
}
