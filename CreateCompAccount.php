<!DOCTYPE html>
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

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

            button[type="submit"]:hover {
                opacity: 0.8;
            }
    </style>
</head>
<body>


    <form method="post" asp-controller="Home" asp-action="Login" action="ReturnToLoginComp.php">
        <h1>Company Registration Form</h1>

        <label for="name">Name:</label>
        <input type="text" id="Name" name="Name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="Surname" name="Surname" required>

        <label for="nationality">Nationality:</label>
        <input type="text" id="Nationality" name="Nationality" required>

        <label for="idnumber ">ID Number:</label>
        <input type="text" id="IDNumber" name="IDNumber" required>

        <label for="company">Company:</label>
        <input type="text" id="Company" name="Company" required>
		
		 <label for="company">Email:</label>
        <input type="text" id="Email" name="Email" required>
		
		 <label for="company">Password:</label>
        <input type="text" id="Password" name="Password" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>