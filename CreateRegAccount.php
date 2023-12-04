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
    <div class="container">
        <div class="tile">
            <h2>Tile 1: User Information</h2>
            <form name="Personaldetails" action="skills.php" method="POST" enctype="multipart/formdata">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">

                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname">

                
				<label for="gender"> Gender : </label> 
				 <Input  type = 'Radio' Name ='gender' value='male' >Male<Input type = 'Radio' Name ='gender' value= 'female'>Female

         
				
				<label for="MaritalStatus">Marital Status: </label> 
				 <Input type = 'Radio' Name ='MaritalStatus' value='Single'>Single<Input type = 'Radio' Name ='MaritalStatus' value= 'female'>Married

                
                <label for="contactNumber">Contact Number:</label>
                <input type="text" id="contactNumber" name="contactNumber">

                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
				
				<label for="password">Password :</label>
                <input type="password" id="password" name="password">

                <label for="residentialAddress">Residential Address:</label>
                <input type="text" id="residentialAddress" name="residentialAddress">

                <label for="postalAddress">Postal Address:</label>
                <input type="text" id="postalAddress" name="postalAddress">
				
				                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
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
error_reporting(0);
//Retrieving Data
	$name = $_POST["name"];
    $surname = $_POST["surname"];
    $gender = $_POST["gender"];
    $maritalStatus = $_POST["MaritalStatus"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
	$password = $_POST["password"];
    $residentialAddress = $_POST["residentialAddress"];
    $postalAddress = $_POST["postalAddress"];
    $Check=False;

?>

<?php
//Inserting Vaild data
if ($Check===True){
$sql= "INSERT INTO tblregusers (Name, Surname, Gender, MaritalStatus, ComtactNum, Email, ResAddress, PostalAddress)
        VALUES ('$name', '$surname', '$gender', '$maritalStatus', '$contactNumber', '$email', '$residentialAddress', '$postalAddress')";

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
?>