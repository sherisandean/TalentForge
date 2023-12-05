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
	$name = $_POST["name"];
    $surname = $_POST["surname"];
    $gender = $_POST["gender"];
    $maritalStatus = $_POST["MaritalStatus"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
	$pass = $_POST["pass"];
    $residentialAddress = $_POST["residentialAddress"];
    $postalAddress = $_POST["postalAddress"];
	$IDNumber = $_POST["IDNumber"];

    // Validate and sanitize user inputs (you should enhance this based on your requirements)
    $name = mysqli_real_escape_string($conn, $name);
    $surname = mysqli_real_escape_string($conn, $surname);
    $gender = mysqli_real_escape_string($conn, $gender);
    $maritalStatus = mysqli_real_escape_string($conn, $maritalStatus);
    $contactNumber = mysqli_real_escape_string($conn, $contactNumber);
    $email = mysqli_real_escape_string($conn, $email);
    $username = mysqli_real_escape_string($conn, $username);
    $pass = mysqli_real_escape_string($conn, $pass);
	$residentialAddress = mysqli_real_escape_string($conn, $residentialAddress);
    $postalAddress = mysqli_real_escape_string($conn, $postalAddress);
	$IDNumber = mysqli_real_escape_string($conn, $IDNumber);


    $sql = "INSERT INTO tblregusers (Name,Surname,Gender,MaritalStatus,ContactNum,Email,Password,ResAddress,PostalAddress,IDNumber) VALUES
	('$name', '$surname', '$gender', '$maritalStatus', '$contactNumber', '$email','$pass','$residentialAddress', '$postalAddress','$IDNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
////RUID
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form

// Query to search for the user
$sql = "SELECT RUID FROM tblregusers WHERE Email = '$email' AND Password = '$pass'";
$result = $conn->query($sql);

// Check if a matching record was found
if ($result->num_rows > 0) {
    // Fetch the id from the result
    $row = $result->fetch_assoc();
    $ruid = $row['RUID'];
  echo "Login successful! RUID: $ruid";
} 
}
// Close connection
$conn->close();// Close connection
?>


<?php
/*  //Connection to database
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
 */
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
		            <form name="skillsdetails" action="SchoolInformation.php" method="POST" enctype="multipart/formdata">

		<div class="tile">
            <h2>Tile 2: Skills</h2>           
                <label for="skill1">Skill 1:</label>
                <input type="text" id="skill1" name="skill1">
                <label for="skill2">Skill 2:</label>
                <input type="text" id="skill2" name="skill2">
				<input type="hidden" name="email" value="<?php echo $email;?>">
				<input type="hidden" name="password" value="<?php echo $password;?>">
				<input type="hidden" name="ruid" value="<?php echo $ruid;?>">
				<input type="submit" value="Submit">
          </form>
        </div>
    </div>
</body>
</html>





<?php
error_reporting(0);
/* 	$skill1 = $_POST["skill1"];
	$skill2 = $_POST["skill2"];
    $Check=True;
?>

<?php
//Inserting Vaild data
if ($Check===True){

$sql= "INSERT INTO tblskills (RUID,Skill1,Skill2) VALUES ('$ruid',$skill1', '$skill2');";

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
 */
?>