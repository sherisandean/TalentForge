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

	$ruid = $_POST["ruid"];
    // Retrieve username and password from the form
    $companyName = $_POST["companyName"];
    $position = $_POST["position"];
    $reference = $_POST["reference"];
    $referenceContact = $_POST["referenceContact"];
    // Validate and sanitize user inputs (you should enhance this based on your requirements)
    $companyName = mysqli_real_escape_string($conn, $companyName);
    $position = mysqli_real_escape_string($conn, $position);
	$reference = mysqli_real_escape_string($conn, $reference);
		$referenceContact = mysqli_real_escape_string($conn, $referenceContact);

    $sql ="INSERT INTO tblemployeehistory (RUID,Company, Position, Reference, ReferenceContact)
VALUES ('$ruid','$companyName', '$position', '$reference', '$referenceContact');";

    if (mysqli_query($conn, $sql)) {
		           echo '<script>alert("successfully");</script>';


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
		            <form name="ReturnToLogin" action="LoginRegUser.php" method="POST">

                <input type="submit" value="Submit">

        </div>
          </form>
        </div>
    </div>
</body>
</html>
