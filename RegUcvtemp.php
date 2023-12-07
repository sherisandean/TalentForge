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
    </nav>

    <div>
        <h4>Select Template:</h4>
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
    <h1>CV FOR Your Name</h1>
    
  </div>

    <div class="section">
      <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
      </div>
      <div class="field">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
      </div>
      <div class="field">
        <label for="dob">ID Number:</label>
        <input type="text" id="idnum" name="idnum" required>
      </div>
    
      <div class="field">
        <label for="gender">Gender:</label>
		 <input type="text" id="gender" name="gender" required>
      </div>
      <div class="field">
        <label for="maritalStatus">Marital Status:</label>
        <select id="maritalStatus" name="maritalStatus" required>
           <input type="text" id="ms" name="ms" required>
        </select>
      </div>
      <div class="field">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" required>
      </div>
      <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="field">
        <label for="residentialAddress">Residential Address:</label>
        <textarea id="residentialAddress" name="residentialAddress" rows="2" required></textarea>
      </div>
      <div class="field">
        <label for="postalAddress">Postal Address:</label>
        <textarea id="postalAddress" name="postalAddress" rows="2" required></textarea>
      </div>
    </div>


  <div class="section">
    <h2>Education</h2>
    <div class="field">
      <label for="school">Latest School Attended:</label>
      <input type="text" id="school" name="school" required>
    </div>
    <div class="field">
      <label for="grade">Highest Grade Passed:</label>
      <input type="text" id="grade" name="grade" required>
    </div>
    <div class="field">
      <label for="finalYear">Final Year of Schooling:</label>
      <input type="text" id="finalYear" name="finalYear" required>
    </div>

    <!-- Fields for each subject and its marks -->
    <div class="field">
      <label for="subject1">Subject 1:</label>
      <input type="text" id="subject1" name="subject1" placeholder="Enter subject name">
      <input type="text" id="marks1" name="marks1" placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject2">Subject 2:</label>
      <input type="text" id="subject2" name="subject2" placeholder="Enter subject name">
      <input type="text" id="marks2" name="marks2" placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject3">Subject 3:</label>
      <input type="text" id="subject3" name="subject3" placeholder="Enter subject name">
      <input type="text" id="marks3" name="marks3" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject4">Subject 4:</label>
      <input type="text" id="subject4" name="subject4" placeholder="Enter subject name">
      <input type="text" id="marks4" name="marks4" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject5">Subject 5:</label>
      <input type="text" id="subject5" name="subject5" placeholder="Enter subject name">
      <input type="text" id="marks5" name="marks5" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject6">Subject 6:</label>
      <input type="text" id="subject6" name="subject6" placeholder="Enter subject name">
      <input type="text" id="marks6" name="marks6" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject7">Subject 7:</label>
      <input type="text" id="subject7" name="subject7" placeholder="Enter subject name">
      <input type="text" id="marks7" name="marks7" placeholder="Enter marks">
    </div>

  </div>
  
  <div class="section">
    <h2>Higher Education</h2>
    <div class="field">
      <label for="college">College or University Name:</label>
      <input type="text" id="college" name="college" required>
    </div>
    <div class="field">
      <label for="location">College or University Location:</label>
      <input type="text" id="location" name="location" required>
    </div>
    <div class="field">
      <label for="fieldOfStudy">Field of Study:</label>
      <input type="text" id="fieldOfStudy" name="fieldOfStudy" placeholder="What is your elective or major" required>
    </div>

    <div class="field">
      <label for="completionStatus">Tertiary Study Completion Status:</label>
      <select id="completionStatus" name="completionStatus">
        <option value="ongoing">Ongoing</option>
        <option value="completed">Completed</option>
      </select>
    </div>
  </div>
  
  
  

  <div class="section">
    <h2>Experience</h2>
   
    <div class="field">
      <label for="jobTitle1">Job Title 1:</label>
      <input type="text" id="jobTitle1" name="jobTitle1" placeholder="Enter job title">
      <input type="text" id="company1" name="company1" placeholder="Enter company name">
      <input type="text" id="year1" name="year1" placeholder="Enter year">
    </div>

    <div class="field">
      <label for="jobTitle2">Job Title 2:</label>
      <input type="text" id="jobTitle2" name="jobTitle2" placeholder="Enter job title">
      <input type="text" id="company2" name="company2" placeholder="Enter company name">
      <input type="text" id="year2" name="year2" placeholder="Enter year">
    </div>

    

  </div>

  <div class="section">
    <h2>Skills</h2>
  
    <div class="field">
      <label for="skill1">Skill 1:</label>
      <input type="text" id="skill1" name="skill1" placeholder="Enter skill">
    </div>

    <div class="field">
      <label for="skill2">Skill 2:</label>
      <input type="text" id="skill2" name="skill2" placeholder="Enter skill">
    </div>

  

  </div>
  
  
  
  

  <div class="section personal-statement">
    <h2>Personal Statement</h2>
    <textarea id="personalStatement" name="personalStatement" rows="4" placeholder="Write a brief personal statement"></textarea>
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
    <h1>Curriculum Vitae Your Name</h1>
    
  </div>

    <div class="section">
      <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
      </div>
      <div class="field">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
      </div>
      <div class="field">
        <label for="dob">ID number</label>
        <input type="text" id="idnum" name="idnumber" required>
      </div>
      <div class="field">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="field">
        <label for="maritalStatus">Marital Status:</label>
        <select id="maritalStatus" name="maritalStatus" required>
          <option value="single">Single</option>
          <option value="married">Married</option>
        </select>
      </div>
      <div class="field">
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" required>
      </div>
      <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="field">
        <label for="residentialAddress">Residential Address:</label>
        <textarea id="residentialAddress" name="residentialAddress" rows="2" required></textarea>
      </div>
      <div class="field">
        <label for="postalAddress">Postal Address:</label>
        <textarea id="postalAddress" name="postalAddress" rows="2" required></textarea>
      </div>
    </div>


  <div class="section">
    <h2>Education</h2>
    <div class="field">
      <label for="school">Latest School Attended:</label>
      <input type="text" id="school" name="school" required>
    </div>
    <div class="field">
      <label for="grade">Highest Grade Passed:</label>
      <input type="text" id="grade" name="grade" required>
    </div>
    <div class="field">
      <label for="finalYear">Final Year of Schooling:</label>
      <input type="text" id="finalYear" name="finalYear" required>
    </div>

    
    <div class="field">
      <label for="subject1">Subject 1:</label>
      <input type="text" id="subject1" name="subject1" placeholder="Enter subject name">
      <input type="text" id="marks1" name="marks1" placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject2">Subject 2:</label>
      <input type="text" id="subject2" name="subject2" placeholder="Enter subject name">
      <input type="text" id="marks2" name="marks2" placeholder="Enter marks">
    </div>

    <div class="field">
      <label for="subject3">Subject 3:</label>
      <input type="text" id="subject3" name="subject3" placeholder="Enter subject name">
      <input type="text" id="marks3" name="marks3" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject4">Subject 4:</label>
      <input type="text" id="subject4" name="subject4" placeholder="Enter subject name">
      <input type="text" id="marks4" name="marks4" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject5">Subject 5:</label>
      <input type="text" id="subject5" name="subject5" placeholder="Enter subject name">
      <input type="text" id="marks5" name="marks5" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject6">Subject 6:</label>
      <input type="text" id="subject6" name="subject6" placeholder="Enter subject name">
      <input type="text" id="marks6" name="marks6" placeholder="Enter marks">
    </div>
	
	<div class="field">
      <label for="subject7">Subject 7:</label>
      <input type="text" id="subject7" name="subject7" placeholder="Enter subject name">
      <input type="text" id="marks7" name="marks7" placeholder="Enter marks">
    </div>

  </div>
  
  <div class="section">
    <h2>Higher Education</h2>
    <div class="field">
      <label for="college">College or University Name:</label>
      <input type="text" id="college" name="college" required>
    </div>
    <div class="field">
      <label for="location">College or University Location:</label>
      <input type="text" id="location" name="location" required>
    </div>
    <div class="field">
      <label for="fieldOfStudy">Field of Study:</label>
      <input type="text" id="fieldOfStudy" name="fieldOfStudy" placeholder="What is your elective or major" required>
    </div>

    <div class="field">
      <label for="completionStatus">Tertiary Study Completion Status:</label>
      <select id="completionStatus" name="completionStatus">
        <option value="ongoing">Ongoing</option>
        <option value="completed">Completed</option>
		<option value="dns">Did not study</option>
      </select>
    </div>
  </div>
  
  
  

  <div class="section">
    <h2>Experience</h2>
   
     <div class="field">
      <label for="jobTitle1">latest job experience</label>
      <input type="text" id="position" name="position" placeholder="Enter your position">
      <input type="text" id="company1" name="company1" placeholder="Enter company name">
      <input type="text" id="ref" name="reference" placeholder="Enter your reference ">
	  <input type="text" id="refcon" name="referencecontact" placeholder="reference contact @email/cell ">
    </div>

  
  </div>

  <div class="section">
    <h2>Skills</h2>
  
    <div class="field">
      <label for="skill1">Skill 1:</label>
      <input type="text" id="skill1" name="skill1" placeholder="Enter skill">
    </div>

    <div class="field">
      <label for="skill2">Skill 2:</label>
      <input type="text" id="skill2" name="skill2" placeholder="Enter skill">
    </div>
	
	<div class="field">
      <label for="skill2">Skill 3:</label>
      <input type="text" id="skill3" name="skill3" placeholder="Enter skill">
    </div>
	
	<div class="field">
      <label for="skill2">Skill 4:</label>
      <input type="text" id="skill4" name="skill4" placeholder="Enter skill">
    </div>
  </div>
    
  </div>

  </div>
  
 <div class="section personal-statement">
    <h2>Personal Statement</h2>
    <textarea id="personalStatement" name="personalStatement" rows="4" placeholder="Write a brief personal statement"></textarea>
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
        <h1>Your Name</h1>
        <h2>Curriculum Vitae</h2>
    </header>

    <section>
        <h2>Personal Information</h2>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="dob">ID Number:</label>
        <input type="text" id="idnum" name="idnumber" placeholder="ID Number" required>

        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
		
		 <label for="maritalStatus">Marital Status:</label>
        <select id="maritalStatus" name="maritalStatus" required>
          <option value="single">Single</option>
          <option value="married">Married</option>
        </select>

        <label for="residentialAddress">Residential Address:</label>
        <textarea id="residentialAddress" name="residentialAddress" rows="4" required></textarea>

        <label for="postalAddress">Postal Address:</label>
        <textarea id="postalAddress" name="postalAddress" rows="4" required></textarea>
    </section>

    <section>
        <h2>Education</h2>
        <label for="school">Latest School Attended:</label>
        <input type="text" id="school" name="school" required>

        <label for="grade">Highest Grade Passed:</label>
        <input type="text" id="grade" name="grade" required>

        <label for="year">Final Year of Schooling:</label>
        <input type="text" id="year" name="year" required>

        <h3>Subjects</h3>
        
        <label for="subject1">Subject 1:</label>
        <input type="text" id="subject1" name="subject1">


        <label for="marks1">Marks for Subject 1:</label>
        <input type="text" id="marks1" name="marks1">

      
        <label for="subject2">Subject 2:</label>
        <input type="text" id="subject2" name="subject2">
		
		 <label for="marks1">Marks for Subject 2:</label>
        <input type="text" id="marks2" name="marks2">

       
        <label for="subject3">Subject 3:</label>
        <input type="text" id="subject3" name="subject3">

        <label for="marks3">Marks for Subject 3:</label>
        <input type="text" id="marks3" name="marks3">

        <label for="subject4">Subject 4:</label>
        <input type="text" id="subject4" name="subject4">

        <label for="marks4">Marks for Subject 4:</label>
        <input type="text" id="marks4" name="marks4">

        <label for="subject5">Subject 5:</label>
        <input type="text" id="subject5" name="subject5">

        <label for="marks5">Marks for Subject 5:</label>
        <input type="text" id="marks5" name="marks5">

        <label for="subject6">Subject 6:</label>
        <input type="text" id="subject6" name="subject6">

        <label for="marks6">Marks for Subject 6:</label>
        <input type="text" id="marks6" name="marks6">

        <label for="subject7">Subject 7:</label>
        <input type="text" id="subject7" name="subject7">

        <label for="marks7">Marks for Subject 7:</label>
        <input type="text" id="marks7" name="marks7">
    </section>

    <section>
        <h2>College</h2>
        <label for="collegeName">College Name:</label>
        <input type="text" id="collegeName" name="collegeName" required>

        <label for="fieldOfStudy">Field of Study:</label>
        <input type="text" id="fieldOfStudy" name="fieldOfStudy" required>

        <label for="currentlyStudying">Currently Studying:</label>
        <input type="checkbox" id="currentlyStudying" name="currentlyStudying">

        <label for="completionYear">Year of Completion:</label>
        <input type="text" id="completionYear" name="completionYear">
    </section>
	

  <div class="section">
    <h2>Experience</h2>
   
    <div class="field">
      <label for="jobTitle1">latest job experience</label>
      <input type="text" id="position" name="position" placeholder="Enter your position">
      <input type="text" id="company1" name="company1" placeholder="Enter company name">
      <input type="text" id="ref" name="reference" placeholder="Enter your reference ">
	  <input type="text" id="refcon" name="referencecontact" placeholder="reference contact @email/cell ">
    </div>

  
  </div>

  <div class="section">
    <h2>Skills</h2>
  
    <div class="field">
      <label for="skill1">Skill 1:</label>
      <input type="text" id="skill1" name="skill1" placeholder="Enter skill">
    </div>

    <div class="field">
      <label for="skill2">Skill 2:</label>
      <input type="text" id="skill2" name="skill2" placeholder="Enter skill">
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
