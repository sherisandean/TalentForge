
<!DOCTYPE html>
<html>
<head>
    <title>TalentForge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0px;
        }

        h1 {
            font-size: 66px;
            font-weight: bold;
            font-family: 'ALGERIAN', sans-serif;
            margin-bottom: 0px;
        }

        #logo {
            width: 430px; /* Adjust the width as needed */
            height: auto;
        }

        .tile:nth-child(1) {
            background-color: #e6ccff; /* Light Purple */
        }

        .tile:nth-child(2) {
            background-color: #ffb3e6; /* Pink */
        }

        .tile:nth-child(3) {
            
            background-color: #b3e0ff; /* Light Blue */
        }

        .tile:nth-child(4) {
           
            background-color: #ffff00; /* Orange */
        }

        .tile:nth-child(5) {
            background-color: #cc9900; /* Dark Yellow */

        }

        .tile:nth-child(6) {
            background-color: #ffddb3; /* Light Orange */
        }

        .tile {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: left;
        }


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
</head>
<header>
  <nav>
        <a href="TalentForgeHomePage">Home</a>
        <a href="LoginPage.php">Login</a>
		<a href="#Privacy">Privacy</a>
    </nav>
    </header>
<body>
    <h1>TalentForge</h1>
    <img id="logo" src="@Url.Content("~/IMG-20230819-WA0002-removebg-preview.png")" alt="TalentForge Logo">

    <div id="description">
        <div class="tile">
            <p><strong>Unlock Your Potential with Personalized CVs:</strong> TalentForge empowers users to effortlessly input their personal and professional details, creating customized CVs or resumes using a variety of default company templates. Craft professional profiles that stand out and streamline your job application process.</p>
        </div>

        <div class="tile">
            <p><strong>Seamless CV Download and Sharing:</strong> TalentForge enables users to download and save their CVs in digital formats, facilitating easy sharing with potential employers. Say goodbye to printed materials and physical distribution—disseminate job-related information efficiently in the digital realm.</p>
        </div>

        <div class="tile">
            <p><strong>Talent Repository for Streamlined Recruitment:</strong> TalentForge introduces the Talent Box, a repository where users voluntarily share their CVs. Company users access and review this centralized database, simplifying talent acquisition. Elevate your recruitment process with a diverse pool of potential candidates.</p>
        </div>

        <div class="tile">
            <p><strong>Enhanced Company User Functionality:</strong> Tailored for company users, TalentForge offers a dedicated login space. Create and customize CV templates aligned with your organization's requirements, fostering brand consistency and efficiency in the hiring process.</p>
        </div>

        <div class="tile">
            <p><strong>Job Advertisement and Seamless Interaction:</strong> TalentForge's "Jobs Tab" empowers company users to post job advertisements. Regular users access these listings, applying for positions seamlessly. Foster direct communication through an integrated emailing service, providing valuable feedback on job applications.</p>
        </div>

        <div class="tile">
            <p><strong>Embrace Environmental Friendliness:</strong> TalentForge is committed to environmental sustainability. By reducing paper waste associated with traditional CVs and application processes, it operates in a digital environment, minimizing the need for physical documents and lowering the environmental impact of job seeking and recruitment travel.</p>
        </div>
        <div>
            <p>&nbsp;&nbsp;</p>
        </div>
    </div>
</body>
</html>
//s

