<?php
// Connection to database
$servername="localhost";
$username="root";
$password ="";
$db="talentforgedb";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
die("Connection fa1led:" . mysqli_connect_error ());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
	$email = $_POST["Email"];
	$pass = $_POST["Password"];
	$ruid = $_POST["RUID"];
	$lastSchool = $_POST["lastSchool"];
	$highestGrade = $_POST["highestGrade"];	
	$finalYear = $_POST["finalYear"];
	$sub1 = $_POST["Subject1"];
	$mrk1 = $_POST["Mark1"];
	$sub2 = $_POST["Subject2"];
	$mrk2 = $_POST["Mark2"];
	$sub3 = $_POST["Subject3"];
	$mrk3 = $_POST["Mark3"];
	$sub4 = $_POST["Subject4"];
	$mrk4 = $_POST["Mark4"];
	$sub5 = $_POST["Subject5"];
	$mrk5 = $_POST["Mark5"];
	$sub6 = $_POST["Subject6"];
	$mrk6 = $_POST["Mark6"];
	$sub7 = $_POST["Subject7"];
	$mrk7 = $_POST["Mark7"];
    // Validate and sanitize user inputs (you should enhance this based on your requirements)
    $lastSchool = mysqli_real_escape_string($conn, $lastSchool);
    $highestGrade = mysqli_real_escape_string($conn, $highestGrade);
	$finalYear = mysqli_real_escape_string($conn, $finalYear);
		$sub1 = mysqli_real_escape_string($conn, $sub1);
		$mrk1 = mysqli_real_escape_string($conn, $mrk1);
		$sub2 = mysqli_real_escape_string($conn, $sub2);
		$mrk2 = mysqli_real_escape_string($conn, $mrk2);
		$sub3 = mysqli_real_escape_string($conn, $sub3);
		$mrk3 = mysqli_real_escape_string($conn, $mrk3);
		$sub4 = mysqli_real_escape_string($conn, $sub4);
		$mrk4 = mysqli_real_escape_string($conn, $mrk4);
		$sub5 = mysqli_real_escape_string($conn, $sub5);
		$mrk5 = mysqli_real_escape_string($conn, $mrk5);
		$sub6 = mysqli_real_escape_string($conn, $sub6);
		$mrk6 = mysqli_real_escape_string($conn, $mrk6);
		$sub7 = mysqli_real_escape_string($conn, $sub7);
		$mrk7 = mysqli_real_escape_string($conn, $mrk7);

    $sql = "INSERT INTO tblschoolinfo (RUID,LastSchool,highestGrade,finalYear, 
	Subject1, Mark1, Subject2, Mark2, Subject3, Mark3, Subject4, Mark4, Subject5, Mark5, 
	Subject6, Mark6, Subject7, Mark7)
        VALUES ('$ruid','$lastSchool', '$highestGrade', '$finalYear', '$sub1', '$mrk1', '$sub2', '$mrk2',
		'$sub3', '$mrk3', '$sub4', '$mrk4', '$sub5', '$mrk5', '$sub6', '$mrk6', '$sub7', '$mrk7')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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


    <form  name="HigerEducation" action="EmployeeHistory.php" method="POST" >
		

               
                    <label for="collegeName">College Name and Location:</label>
                    <input type="text" id="collegeName" name="collegeName">

                    <label for="fieldOfStudy">Field Of Study:</label>
                    <input type="text" id="fieldOfStudy" name="fieldOfStudy">
					
					<label for="Active">Active: </label> 
				 <Input type = 'Radio' Name ='Active' value='Yes'>Yes<Input type = 'Radio' Name ='Active' value= 'NO'>NO

					<label for="Completed">Completed: </label> 
				 <Input type = 'Radio' Name ='Completed' value='Yes'>Yes<Input type = 'Radio' Name ='Completed' value= 'NO'>NO
				 
						<input type="hidden" name="Email" value="<?php echo $email;?>">
						<input type="hidden" name="Password" value="<?php echo $password;?>">
						<input type="hidden" name="RUID" value="<?php echo $ruid;?>">

				
				 <input type="submit" value="Submit">
    </form>

</body>
</html>

<?php
 /* //Connection to database
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
error_reporting(0);
//Retrieving Data

    $collegeName = $_POST["collegeName"];
    $fieldOfStudy = $_POST["fieldOfStudy"];
    $active = $_POST["Active"];
    $completed = $_POST["Completed"];
    $Check=True;

?>

<?php
//Inserting Vaild data
if ($Check===True){
$sql= "INSERT INTO tblhighered (RUID,CollegeName&Loc, FieldOfStudy, Active, Complete)
VALUES ('$ruid','$collegeName', '$fieldOfStudy', '$active', '$completed);";

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
} */
?>