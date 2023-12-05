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
    $Name = $_POST["Name"];
    $Surname = $_POST["Surname"];
    $Nationality = $_POST["Nationality"];
    $IDNumber = $_POST["IDNumber"];
	    $Company = $_POST["Company"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
	
    // Validate and sanitize user inputs (you should enhance this based on your requirements)
    $Name = mysqli_real_escape_string($conn, $Name);
    $Surname = mysqli_real_escape_string($conn, $Surname);
	$Nationality = mysqli_real_escape_string($conn, $Nationality);
		$IDNumber = mysqli_real_escape_string($conn, $IDNumber);
		    $Company = mysqli_real_escape_string($conn, $Company);
    $Email = mysqli_real_escape_string($conn, $Email);
	$Password = mysqli_real_escape_string($conn, $Password);
	
    $sql ="INSERT INTO tblcompusers( Name, Surname,Nationality,IDNumber,Company,Email,Password) 
VALUES ('$Name','$Surname','$Nationality','$IDNumber','$Company','$Email','$Password');";


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
		            <form name="ReturnToLogin" action="LoginCompUser.php" method="POST">

                <input type="submit" value="Submit">

        </div>
          </form>
        </div>
    </div>
</body>
</html>
