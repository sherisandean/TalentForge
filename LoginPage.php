<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - TalentForge.UI</title>
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/site.css?v=AKvNjO3dCPPS0eSU1Ez8T2wI280i08yGycV9ndytL-c">
    <link rel="stylesheet" href="/TalentForge.UI.styles.css?v=BOevtv_u0DTDcc45o9LezKTwcQIkWJVzWz5aAxaDFhw">
</head>
 <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
        }

        /* Style for the buttons */
        .huge-button {
            display: inline-block;
            width: 45%; /* Adjust the width as needed */
            margin: 10px;
            padding: 20px;
            text-align: center;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            position: relative; /* Add relative positioning */
            left: 20px; /* Move the button 20px to the right */
        }

        /* Style for the headings */
        .button-heading {
            font-family: 'Stencil', sans-serif;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: black; /* Set text color to black */
        }

        /* Style for the text below the headings */
        .button-text {
            line-height: 1.5;
            color: black; /* Set text color to black */
            margin-left: 1px; /* Adjust the margin for indentation */
            list-style-type: none; /* Remove the dot/point */
            padding-left: 0; /* Remove padding for the list */
        }

        /* Style for the User button */
        .user-button {
            background-color: #8CC84B; /* Light green color */
            color: black; /* Black text */
        }

        /* Style for the Company button */
        .company-button {
            background-color: #FFA500; /* Medium orange color */
            color: black; /* Black text */
        }

        /* Style for the centered image */
        .centered-image {
            display: block;
            margin: 0 auto; /* Center the image */
            max-width: 100%; /* Ensure the image doesn't exceed its container */
        }

        /* Style for the heading */
        .account-heading {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px; /* Add margin to separate from the image */
            color: black; /* Set text color to black */
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
    <div  class="container">
        <main role="main" class="pb-3">
            


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
   


    <div>
        <!-- Centered Image -->
        <img src="TalentForge.png" alt="TalentForge Image" class="centered-image" width="250">

        <div class="account-heading">Choose a login type:</div>

        <!-- First Button - User Account -->
        <button class="huge-button user-button" onclick="redirectTo('TalentForge/LoginRegUser.php')">
            <div class="button-heading">User Account</div>
            
        </button>

        <!-- Second Button - Company Account -->
        <button class="huge-button company-button" onclick="redirectTo('TalentForge/LoginCompUser.php')">
            <div class="button-heading">Company Account</div>
            
        </button>

        <script>
            function redirectTo(action) {
                window.location.href = '/' + action;
            }
        </script>
    </div>

<!-- Visual Studio Browser Link -->
<script type="text/javascript" src="/_vs/browserLink" async="async" id="__browserLink_initializationData" data-requestid="4c0ca29d30cc4786b4314ca11e09c51d" data-requestmappingfromserver="false" data-connecturl="http://localhost:57002/6f204c6b5f104e8c94ae5f34065da800/browserLink"></script>
<!-- End Browser Link -->

<script src="/_framework/aspnetcore-browser-refresh.js"></script>


        </main>
    </div>

    <footer b-89rpdq017y="" class="border-top footer text-muted">
        <div b-89rpdq017y="" class="container">
            © 2023 - TalentForge.UI - <a href="/Home/Privacy">Privacy</a>
        </div>
    </footer>
    <script src="/lib/jquery/dist/jquery.min.js"></script>
    <script src="/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/site.js?v=4q1jwFhaPaZgr8WAUSrux6hAuh0XDg9kPS3xIVq36I0"></script>
    


</body></html>