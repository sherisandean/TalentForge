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


    <form method="post" asp-controller="Home" asp-action="Login">
        <h1>Company Registration Form</h1>

        <label for="cuid">CUID:</label>
        <input type="text" id="cuid" name="cuid" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" required>

        <label for="idnumber ">ID Number:</label>
        <input type="text" id="idnumber" name="idnumber" required>

        <label for="company">Company:</label>
        <input type="text" id="company" name="company" required>

        <button type="submit">Submit</button>
    </form>

</body>
</html>