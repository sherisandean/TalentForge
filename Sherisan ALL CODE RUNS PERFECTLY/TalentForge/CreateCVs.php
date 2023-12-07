<?php 
session_start();
if (isset($_SESSION['ruid'])) {
  $ruid = $_SESSION['ruid'];
    // Connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "talentforge";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	
    // Fetch additional data from other tables
	$result = $conn->query("SELECT * FROM tblregusers WHERE RUID = '$ruid'");
	$userData = $result->fetch_assoc();
	  
    $skillsResult = $conn->query("SELECT * FROM tblskills WHERE RUID = '$ruid'");
    $skillsData = $skillsResult->fetch_assoc();

    $schoolInfoResult = $conn->query("SELECT * FROM tblschoolinfo WHERE RUID = '$ruid'");
    $schoolInfoData = $schoolInfoResult->fetch_assoc();

    $higheredResult = $conn->query("SELECT * FROM tblhighered WHERE RUID = '$ruid'");
    $higheredData = $higheredResult->fetch_assoc();

    $employeeHistoryResult = $conn->query("SELECT * FROM tblemployeehistory WHERE RUID = '$ruid'");
    $employeeHistoryData = $employeeHistoryResult->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV template selection</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
	
	 #pdfButton {
    background-color: #4B0082;
    color: white;
    padding: 12px 24px; 
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px; 
}

 #pdfButton:hover {
    background-color: #bf55ec;
         }

        .cv {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
            color: #333;
        }

        .field {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
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
	
	
	
	
	  <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>







<body>



    <!-- Navigation Links -->
    <nav>
        <a href="RUHome.php">Home</a>
        <a href="RegUserAccountPage.php">My Account</a>
        <a href="CreateCVs.php">Create CV</a>
        <a href="ViewCVs.php">My CVs</a>
        <a href="ApplyJobs.php">Jobs</a>
        <a href="AppliedJobs.php">Applications</a>
		            <a href="logout.php">Logout</a>

    </nav>

    <div>
        <h4>Select Template: <?php echo $userData['Name']; ?> </h4>
        <select id="templateSelector" onchange="changeTemplate()">
            <option>Please select a template</option>
            <option value="template1">Template 1</option>
            <option value="template2">Template 2</option>
            <option value="template3">Template 3</option>
        </select>
    </div>
    <br>

    <button id="pdfButton" onclick="generatePDF()">Convert to PDF</button>

    <div id="templateContainer" class="cv"></div>

    <script>
        function changeTemplate() {
            const templateSelector = document.getElementById("templateSelector");
            const selectedTemplate = templateSelector.value;
            const templateContainer = document.getElementById("templateContainer");

            // Template data
            const templates = {
                template1: `

        <div id="template1" style="font-family: 'Helvetica', sans-serif;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Name - Curriculum Vitae</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
    }
    .cv {
      max-width: 800px;
      margin: 20px auto;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header h1 {
      margin: 0;
      font-size: 36px;
      color: #333;
    }
    .section {
      margin-bottom: 20px;
    }
    .section h2 {
      border-bottom: 2px solid #333;
      padding-bottom: 10px;
      font-size: 24px;
      color: #333;
    }
    .field {
      margin-bottom: 15px;
    }
    label {
      display: block;
      font-size: 16px;
      color: #333;
      margin-bottom: 5px;
    }
    input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .personal-statement {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="cv" id="CVtemp1">
  <div class="header">
    <h1>CV FOR Your <?php echo $userData['Name']; ?></h1>
    
  </div>

    <div class="section">
      <div>
	  <h1><?php echo $userData['Name']; ?></h1>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $userData['Name']; ?>" required readonly>
      </div>
      <div class="field">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $userData['Surname']; ?>" required readonly>
      </div>
      <div class="field">
        <label for="dob">ID Number:</label>
        <input type="text" id="idnum" name="idnum" value="<?php echo $userData['IDNumber']; ?>" required readonly>
      </div>
    
      <div class="field">
        <label for="gender">Gender:</label>
		 <input type="text" id="gender" name="gender" value="<?php echo $userData['Gender']; ?>" required readonly>
      </div>
      <div class="field">
        <label for="maritalStatus">Marital Status:</label>
           <input type="text" id="ms" name="ms" value="<?php echo $userData['MaritalStatus']; ?>" required readonly>
        </select>
      </div>
      <div class="field">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" value="<?php echo $userData['ContactNum']; ?>" required readonly>
      </div>
      <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userData['Email']; ?>" required readonly>
      </div>
      <div class="field">
        <label for="residentialAddress">Residential Address:</label>
        <input id="residentialAddress" name="residentialAddress" rows="2" value="<?php echo $userData['ResAddress']; ?>" required readonly>
      </div>
      <div class="field">
        <label for="postalAddress">Postal Address:</label>
        <input id="postalAddress" name="postalAddress" rows="2" value="<?php echo $userData['PostalAddress']; ?>" required readonly>
    </div>


  <div class="section">
    <h2>Education</h2>
    <div class="field">
      <label for="school">Latest School Attended:</label>
      <input type="text" id="school" name="school"value="<?php echo $schoolInfoData['LastSchool']; ?>" required readonly>
    </div>
    <div class="field">
      <label for="grade">Highest Grade Passed:</label>
      <input type="text" id="grade" name="grade" value= "<?php echo $schoolInfoData['highestGrade']; ?>" required readonly> 
    </div>
    <div class="field">
      <label for="finalYear">Final Year of Schooling:</label>
      <input type="text" id="finalYear" name="finalYear" value="<?php echo $schoolInfoData['finalYear']; ?>"  required>
    </div>

    <!-- Fields for each subject and its marks -->
    <div class="field">
      <label for="subject1">Subject 1:</label>
      <input type="text" id="subject1" name="subject1" value="<?php echo $schoolInfoData['Subject1']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks1" name="marks1" value="<?php echo $schoolInfoData['Mark1']; ?> "placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject2">Subject 2:</label>
      <input type="text" id="subject2" name="subject2" value="<?php echo $schoolInfoData['Subject2']; ?>" placeholder="Enter subject name">
      <input type="text" id="marks2" name="marks2" value="<?php echo $schoolInfoData['Mark2']; ?>" placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject3">Subject 3:</label>
      <input type="text" id="subject3" name="subject3" value="<?php echo $schoolInfoData['Subject3']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks3" name="marks3" value="<?php echo $schoolInfoData['Mark1']; ?>" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject4">Subject 4:</label>
      <input type="text" id="subject4" name="subject4" value="<?php echo $schoolInfoData['Subject4']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks4" name="marks4" value="<?php echo $schoolInfoData['Mark1']; ?> "placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject5">Subject 5:</label>
      <input type="text" id="subject5" name="subject5" value="<?php echo $schoolInfoData['Subject5']; ?>" placeholder="Enter subject name">
      <input type="text" id="marks5" name="marks5" value="<?php echo $schoolInfoData['Mark5']; ?> "placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject6">Subject 6:</label>
      <input type="text" id="subject6" name="subject6" value="<?php echo $schoolInfoData['Subject6']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks6" name="marks6" value="<?php echo $schoolInfoData['Mark6']; ?>" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject7">Subject 7:</label>
      <input type="text" id="subject7" name="subject7" value="<?php echo $schoolInfoData['Subject7']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks7" name="marks7" value="<?php echo $schoolInfoData['Mark7']; ?> "placeholder="Enter marks">
    </div>

  </div>
  
  <div class="section">
    <h2>Higher Education</h2>
    <div class="field">
      <label for="college">College or University Name:</label>
      <input type="text" id="college" value="<?php echo $higheredData['collegeName']; ?>" name="college" required>
    </div>
    <div class="field">
      <label for="fieldOfStudy">Field of Study:</label>
      <input type="text" id="fieldOfStudy" name="fieldOfStudy" value="<?php echo $higheredData['fieldOfStudy']; ?> "placeholder="What is your elective or major" required>
    </div>

    <div class="field">
      <label for="completionStatus">Tertiary Study Completion Status:</label>
	<input type="text" id="completionStatus" name="completionStatus" value="<?php echo $higheredData['Completed']; ?>" placeholder="completionStatus" required>
    
    </div>
  </div>
  
  
  

  <div class="section">
    <h2>Experience</h2>
   
    <div class="field">
      <label for="jobTitle1">Job Title 1:</label>
      <input type="text" id="jobTitle1" name="jobTitle1" value="<?php echo $employeeHistoryData['Position'];?>" required readonly >
      <input type="text" id="company1" name="company1" value="<?php echo $employeeHistoryData['Company']; ?>"  >
      <input type="text" id="Reference" name="Reference" value="<?php echo $employeeHistoryData['Reference']; ?>"  >
	        <input type="text" id="ReferenceContact" name="ReferenceContact" value="<?php echo $employeeHistoryData['ReferenceContact']; ?> " >

    </div>



    

  </div>

  <div class="section">
    <h2>Skills</h2>
  
    <div class="field">
      <label for="skill1">Skill 1:</label>
      <input type="text" id="skill1" name="skill1" value="<?php echo $skillsData['skill1']; ?> " >
    </div>

    <div class="field">
      <label for="skill2">Skill 2:</label>
      <input type="text" id="skill2" name="skill2" value="<?php echo $skillsData['skill2']; ?> ">
    </div>

  

  </div>


</div>
</body>
       
      </div>
                `,
				
                template2: `
  <div id="template2" style="font-family: 'Times New Roman', serif;">
        
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    
    .header2 {
      text-align: center;
      margin-bottom: 20px;
      color: #3498db;
    }
	.cv {
      max-width: 800px;
      margin: 20px auto;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section {
      margin-bottom: 30px;
      background-color: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    .field {
      margin-bottom: 15px;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    h2 {
      border-bottom: 2px solid #3498db;
      padding-bottom: 5px;
      margin-bottom: 15px;
      color: #3498db;
    }

    .personal-statement textarea {
      resize: vertical;
    }

  </style>
</head>

    <div class="header2">
      <h1>Professional CV</h1>
	  <div class="header2">
    <h1>Curriculum Vitae Your <?php echo $userData['Name']; ?></h1>
    
  </div>

    <div class="section">
      <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $userData['Name']; ?>"  required>
      </div>
      <div class="field">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $userData['Surname']; ?>" required>
      </div>
      <div class="field">
        <label for="dob">ID number</label>
        <input type="text" id="idnum" name="idnumber"  value="<?php echo $userData['IDNumber']; ?>" required>
      </div>
      <div class="field">
        <label for="gender">Gender:</label>
    <input type="text" id="Gender" name="Gender"     <input type="text" id="Gender" name="Gender" value="<?php echo $userData['Gender']; ?>"  required>    
      </div>
      <div class="field">
        <label for="maritalStatus">Marital Status:</label>
    <input type="text" id="maritalStatus" name="maritalStatus" value="<?php echo $userData['MaritalStatus']; ?>" required>

      </div>
      <div class="field">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" value="<?php echo $userData['ContactNum']; ?>" required>
      </div>
      <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userData['Email']; ?>"  required>
      </div>
      <div class="field">
        <label for="residentialAddress">Residential Address:</label>
        <textarea id="residentialAddress" name="residentialAddress" rows="2" required><?php echo $userData['ResAddress']; ?></textarea>
      </div>
      <div class="field">
        <label for="postalAddress">Postal Address:</label>
        <textarea id="postalAddress" name="postalAddress" rows="2" required><?php echo $userData['PostalAddress']; ?></textarea>
      </div>
    </div>


  <div class="section">
   <h2>Education</h2>
    <div class="field">
      <label for="school">Latest School Attended:</label>
      <input type="text" id="school" name="school"value="<?php echo $schoolInfoData['LastSchool']; ?>" required readonly>
    </div>
    <div class="field">
      <label for="grade">Highest Grade Passed:</label>
      <input type="text" id="grade" name="grade" value= "<?php echo $schoolInfoData['highestGrade']; ?>" required readonly> 
    </div>
    <div class="field">
      <label for="finalYear">Final Year of Schooling:</label>
      <input type="text" id="finalYear" name="finalYear" value="<?php echo $schoolInfoData['finalYear']; ?>"  required>
    </div>

    <!-- Fields for each subject and its marks -->
    <div class="field">
      <label for="subject1">Subject 1:</label>
      <input type="text" id="subject1" name="subject1" value="<?php echo $schoolInfoData['Subject1']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks1" name="marks1" value="<?php echo $schoolInfoData['Mark1']; ?> "placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject2">Subject 2:</label>
      <input type="text" id="subject2" name="subject2" value="<?php echo $schoolInfoData['Subject2']; ?>" placeholder="Enter subject name">
      <input type="text" id="marks2" name="marks2" value="<?php echo $schoolInfoData['Mark2']; ?>" placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject3">Subject 3:</label>
      <input type="text" id="subject3" name="subject3" value="<?php echo $schoolInfoData['Subject3']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks3" name="marks3" value="<?php echo $schoolInfoData['Mark1']; ?>" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject4">Subject 4:</label>
      <input type="text" id="subject4" name="subject4" value="<?php echo $schoolInfoData['Subject4']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks4" name="marks4" value="<?php echo $schoolInfoData['Mark1']; ?> "placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject5">Subject 5:</label>
      <input type="text" id="subject5" name="subject5" value="<?php echo $schoolInfoData['Subject5']; ?>" placeholder="Enter subject name">
      <input type="text" id="marks5" name="marks5" value="<?php echo $schoolInfoData['Mark5']; ?> "placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject6">Subject 6:</label>
      <input type="text" id="subject6" name="subject6" value="<?php echo $schoolInfoData['Subject6']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks6" name="marks6" value="<?php echo $schoolInfoData['Mark6']; ?>" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject7">Subject 7:</label>
      <input type="text" id="subject7" name="subject7" value="<?php echo $schoolInfoData['Subject7']; ?> "placeholder="Enter subject name">
      <input type="text" id="marks7" name="marks7" value="<?php echo $schoolInfoData['Mark7']; ?> "placeholder="Enter marks">
    </div>

  </div>
  
  
  

  <div class="section">
     <h2>Experience</h2>
   
    <div class="field">
      <label for="jobTitle1">Job Title 1:</label>
      <input type="text" id="jobTitle1" name="jobTitle1" value="<?php echo $employeeHistoryData['Position'];?>" required readonly >
      <input type="text" id="company1" name="company1" value="<?php echo $employeeHistoryData['Company']; ?>"  >
      <input type="text" id="Reference" name="Reference" value="<?php echo $employeeHistoryData['Reference']; ?>"  >
	        <input type="text" id="ReferenceContact" name="ReferenceContact" value="<?php echo $employeeHistoryData['ReferenceContact']; ?> " >

    </div>

  
  </div>

  <div class="section">
   <h2>Skills</h2>
  
    <div class="field">
      <label for="skill1">Skill 1:</label>
      <input type="text" id="skill1" name="skill1" value="<?php echo $skillsData['skill1']; ?> " >
    </div>

    <div class="field">
      <label for="skill2">Skill 2:</label>
      <input type="text" id="skill2" name="skill2" value="<?php echo $skillsData['skill2']; ?> ">
    </div>
    
  </div>

  </div>
  

</div>
	    	  
    </div>

    </div>		
		
      </div>
                `,
                template3: `
				
         <div id="template3" style="font-family: 'Courier New', monospace" >
        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Name - Curriculum Vitae</title>
    <style>
         <style>
       

		
		.cv {
               max-width: 800px;
               margin: 20px auto;
               background-color: #f9f9f9;
               padding: 20px;
               border-radius: 8px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
	
	.header3 {
      text-align: center;
      margin-bottom: 20px;
      color: #3498db;
    }
	
	
	
	
	 .section {
      margin-bottom: 20px;
      background-color: #fafafa;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
	
	  

        h2 {
		    font-family: 'Trebuchet MS', sans-serif;
            margin-top: 10px;
            font-size: 24px;
            color: #5555;
        }
		
		

        section {
            margin-bottom: 30px;
        }

        label {
		
		    font-family: 'Trebuchet MS', sans-serif;
            display: block;
            font-weight: bold;
            margin-top: 15px;
            color: #555;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            color: #333;
        }

        

        
    </style>


    <header>
        <h1><?php echo $userData['Name']; ?></h1>
        <h2>Curriculum Vitae</h2>
    </header>

    <section>
        <h2>Personal Information</h2>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $userData['Name']; ?>"  required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $userData['Surname']; ?>" required>

        <label for="dob">ID Number:</label>
        <input type="text" id="idnum" name="idnumber" placeholder="ID Number"  value="<?php echo $userData['IDNumber']; ?>" required>

        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber"  value="<?php echo $userData['IDNumber']; ?>"value="<?php echo $userData['ContactNum']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userData['Email']; ?>"  required>
		
		 <label for="maritalStatus">Marital Status:</label>
    <input type="text" id="maritalStatus" name="maritalStatus" value="<?php echo $userData['MaritalStatus']; ?>" required>

        </select>

        <label for="residentialAddress">Residential Address:</label>
        <textarea id="residentialAddress" name="residentialAddress" rows="4" required><?php echo $userData['ResAddress']; ?></textarea>

        <label for="postalAddress">Postal Address:</label>
        <textarea id="postalAddress" name="postalAddress" rows="4" required><?php echo $userData['PostalAddress']; ?></textarea>
    </section>

    <section>
        
    </section>

    <section>
        <h2>College</h2>
          <div class="field">
      <label for="college">College or University Name:</label>
      <input type="text" id="college" value="<?php echo $higheredData['collegeName']; ?>" name="college" required>
    </div>
    <div class="field">
      <label for="fieldOfStudy">Field of Study:</label>
      <input type="text" id="fieldOfStudy" name="fieldOfStudy" value="<?php echo $higheredData['fieldOfStudy']; ?> "placeholder="What is your elective or major" required>
    </div>

    <div class="field">
      <label for="completionStatus">Tertiary Study Completion Status:</label>
	<input type="text" id="completionStatus" name="completionStatus" value="<?php echo $higheredData['Completed']; ?>" placeholder="completionStatus" required>
    
    </div>
    </section>
	

  <div class="section">
   
 <h2>Experience</h2>
   
    <div class="field">
      <label for="jobTitle1">Job Title 1:</label>
      <input type="text" id="jobTitle1" name="jobTitle1" value="<?php echo $employeeHistoryData['Position'];?>" required readonly >
      <input type="text" id="company1" name="company1" value="<?php echo $employeeHistoryData['Company']; ?>"  >
      <input type="text" id="Reference" name="Reference" value="<?php echo $employeeHistoryData['Reference']; ?>"  >
	        <input type="text" id="ReferenceContact" name="ReferenceContact" value="<?php echo $employeeHistoryData['ReferenceContact']; ?> " >

    </div>


  
  </div>

  <div class="section">
    <h2>Skills</h2>
  
  
    <div class="field">
      <label for="skill1">Skill 1:</label>
      <input type="text" id="skill1" name="skill1" value="<?php echo $skillsData['skill1']; ?> " >
    </div>

    <div class="field">
      <label for="skill2">Skill 2:</label>
      <input type="text" id="skill2" name="skill2" value="<?php echo $skillsData['skill2']; ?> ">
    </div>
	

  </div>
        
      </div>  
  
                `, 
            };
			
			

            templateContainer.innerHTML = templates[selectedTemplate];
        }

         function generatePDF() {
    const templateContainer = document.getElementById("templateContainer");
    
    // Use html2pdf to convert the templateContainer to PDF
    html2pdf(templateContainer);
  }
 
    </script>

</body>

</html>
