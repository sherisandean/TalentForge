
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
		            <form name="Personaldetails" action="LoginPage.php" method="POST" enctype="multipart/formdata">

	                    <label for="collegeName">College Name and Location:</label>
                    <input type="text" id="collegeName" name="collegeName">

                    <label for="fieldOfStudy">Field Of Study:</label>
                    <input type="text" id="fieldOfStudy" name="fieldOfStudy">

              
					
					<label for="Active">Active: </label> 
				 <Input type = 'Radio' Name ='Active' value='Yes'>Yes<Input type = 'Radio' Name ='Active' value= 'NO'>NO

					<label for="Completed">Completed: </label> 
				 <Input type = 'Radio' Name ='Completed' value='Yes'>Yes<Input type = 'Radio' Name ='Completed' value= 'NO'>NO
                <input type="submit" value="Submit">

        </div>
          </form>
        </div>
    </div>
</body>
</html>

<?php
error_reporting(0);

    $companyName = $_POST["companyName"];
    $position = $_POST["position"];
    $reference = $_POST["reference"];
    $referenceContact = $_POST["referenceContact"];
  
?>

<?php
//Inserting Vaild data
if ($Check===True){

$sql= "INSERT INTO tblemployeehistory (RUID,Company, Position, Reference, ReferenceContact)
VALUES ('$ruid','$companyName', '$position', '$reference', '$referenceContact');";

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