<?php
session_start(); // Start a session to store user information

// Include the database connection code here (modify as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "talentforgedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Check if the email exists in tblRegUsers
    $query = "SELECT * FROM tblRegUsers WHERE Email = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["Password"];

        // Check if the password is correct
        if (password_verify($password, $hashedPassword)) {
            // Redirect to RUHome.php
            $_SESSION["user_type"] = "registered";
            header("Location: TalentForge/RUHome.php");
            exit();
        } else {
            $error_message = "Password Incorrect";
        }
    } else {
        // Check if the email exists in tblCompUsers
        $query = "SELECT * FROM tblCompUsers WHERE Email = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["Password"];

            // Check if the password is correct
            if (password_verify($password, $hashedPassword)) {
                // Redirect to CUHome.php
                $_SESSION["user_type"] = "company";
                header("Location: TalentForge/CUHome.php");
                exit();
            } else {
                $error_message = "Password Incorrect";
            }
        } else {
            $error_message = "Account does not exist. Please create an account.";
        }
    }
}

$conn->close();
?>


<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - TalentForge.UI</title>
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css?v=AKvNjO3dCPPS0eSU1Ez8T2wI280i08yGycV9ndytL-c">
    <link rel="stylesheet" href="/TalentForge.UI.styles.css?v=BOevtv_u0DTDcc45o9LezKTwcQIkWJVzWz5aAxaDFhw">
</head>
          <style>
    table label {
        font-size: 24px; /* Adjust the font size as needed */
    }

    table button {
        font-size: 30px;
    }

    .btn-md {
        font-size: 34px; /* Adjust the font size to make the button bigger */
        padding: 10px 20px; /* Adjust padding for width and height */
    }

    .nav-item {
        list-style-type: none;
    }
	
	 header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #444;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

</style>
<body>
    <header>
	<nav>
        <a href="TalentForgeHomePage.php">Home</a>
        <a href="LoginPage.php">Login</a>
		<a href="#Privacy">Privacy</a>
    </nav>
 
    </header>
    <div class="container">
  
<div class="container">
    <h1 class="display-4 text-center">TalentForge Login</h1>

    <form method="post" action="/Home/Login">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <!-- First Column -->
            </div>
            <div class="col-md-6">
                <!-- Second Column (Centered) -->

                <table class="table">
                    <tbody><tr>
                        <td>
                            <label></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Username">Username:</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter your username" required="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Password">Password:</label>
                        </td>
                        <td>
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter your password" required="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label></label>
                        </td>
                    </tr>
                </tbody></table>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-md">Login</button>
                </div>

                <!-- "Create an account" link -->
                <li class="nav-item">
                    <a class="nav-link text-primary" href="CreateAccountHomePage.php">  Create an account</a>
                </li>
            </div>
            <div class="col-md-3">
                <!-- Third Column -->
            </div>
        </div>
</div>

        </main>
    </div>

</body>




</html>