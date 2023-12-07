<?php
error_reporting(0);

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
    <div class="container">
        <div class="tile">
            <h2>Tile 1: User Information</h2>
            <form name="Personaldetails" action="skills.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" required>

                
				<label for="gender"> Gender : </label> 
				 <Input  type = 'Radio' Name ='gender' value='male' >Male<Input type = 'Radio' Name ='gender' value= 'female' required>Female

         
				
				<label for="MaritalStatus">Marital Status: </label> 
				 <Input type = 'Radio' Name ='MaritalStatus' value='Single'>Single<Input type = 'Radio' Name ='MaritalStatus' value= 'Married' required>Married

                
                <label for="contactNumber">Contact Number:</label>
                <input type="text" id="contactNumber" name="contactNumber" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
				
				<label for="password">Password :</label>
                <input type="text" id="pass" name="pass" required> 

                <label for="residentialAddress">Residential Address:</label>
                <input type="text" id="residentialAddress" name="residentialAddress" required>

                <label for="postalAddress">Postal Address:</label>
                <input type="text" id="postalAddress" name="postalAddress" required>

                <label for="IDNumber">ID Number:</label>
                <input type="text" id="IDNumber" name="IDNumber" required>
				
				                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
<?php

?>




