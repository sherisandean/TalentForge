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
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">

                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname">

                
				<label for="gender"> Gender : </label> 
				 <Input  type = 'Radio' Name ='gender' value='male' >Male<Input type = 'Radio' Name ='gender' value= 'female'>Female

         
				
				<label for="MaritalStatus">Marital Status: </label> 
				 <Input type = 'Radio' Name ='MaritalStatus' value='Single'>Single<Input type = 'Radio' Name ='MaritalStatus' value= 'female'>Married

                
                <label for="contactNumber">Contact Number:</label>
                <input type="text" id="contactNumber" name="contactNumber">

                <label for="email">Email:</label>
                <input type="text" id="email" name="email">

                <label for="residentialAddress">Residential Address:</label>
                <input type="text" id="residentialAddress" name="residentialAddress">

                <label for="postalAddress">Postal Address:</label>
                <input type="text" id="postalAddress" name="postalAddress"
                
            </form>
        </div>

        <div class="tile">
            <h2>Tile 2: Skills</h2>           
                <label for="skill1">Skill 1:</label>
                <input type="text" id="skill1" name="skill1">

                
                <label for="skill2">Skill 2:</label>
                <input type="text" id="skill2" name="skill2">

          
        </div>

        <div class="tile">
            <h2>Tile 3: Employee History</h2>
                <label for="companyName">Company Name:</label>
                <input type="text" id="companyName" name="companyName">

                <label for="position">Position:</label>
                <input type="text" id="position" name="position">

                <label for="reference">Reference:</label>
                <input type="text" id="reference" name="reference">

                <label for="referenceContact">Reference Contact details:</label>
                <input type="text" id="referenceContact" name="referenceContact">

        </div>

        <div class="tile">
            <h2>Tile 4: School Information</h2>
                <label for="lastSchool">Last School Attended:</label>
                <input type="text" id="lastSchool" name="lastSchool">

                <label for="highestGrade">Highest Grade Passed:</label>
                <input type="text" id="highestGrade" name="highestGrade">

                <label for="finalYear">Final Year:</label>
                <input type="text" id="finalYear" name="finalYear">

                <label for="lastSchool">Last School Attended:</label>
                <input type="text" id="lastSchool" name="lastSchool">

                <label for="highestGrade">Highest Grade Passed:</label>
                <input type="text" id="highestGrade" name="highestGrade">

                <label for="finalYear">Final Year:</label>
                <input type="text" id="finalYear" name="finalYear">
				
				<!-- Subject 1 -->
        <label for="subject1">Subject 1:</label>
        <input type="text" id="subject1" name="subjects[]" required>

        <label for="mark1">Mark 1:</label>
        <input type="text" id="mark1" name="marks[]" required>

        <!-- Subject 2 -->
        <label for="subject2">Subject 2:</label>
        <input type="text" id="subject2" name="subjects[]" required>

        <label for="mark2">Mark 2:</label>
        <input type="text" id="mark2" name="marks[]" required>

        <!-- Subject 3 -->
        <label for="subject3">Subject 3:</label>
        <input type="text" id="subject3" name="subjects[]" required>

        <label for="mark3">Mark 3:</label>
        <input type="text" id="mark3" name="marks[]" required>

<!-- Subject 4 -->
        <label for="subject1">Subject 4:</label>
        <input type="text" id="subject4" name="subjects[]" required>

        <label for="mark1">Mark 4:</label>
        <input type="text" id="mark4" name="marks[]" required>

        <!-- Subject 2 -->
        <label for="subject2">Subject 5:</label>
        <input type="text" id="subject5" name="subjects[]" required>

        <label for="mark2">Mark 5:</label>
        <input type="text" id="mark5" name="marks[]" required>

        <!-- Subject 3 -->
        <label for="subject3">Subject 6:</label>
        <input type="text" id="subject6" name="subjects[]" required>

        <label for="mark3">Mark 6:</label>
        <input type="text" id="mark6" name="marks[]" required>

<!-- Subject 1 -->
        <label for="subject1">Subject 7:</label>
        <input type="text" id="subject7" name="subjects[]" required>

        <label for="mark1">Mark 7:</label>
        <input type="text" id="mark7" name="marks[]" required>




        </div>

        <div class="tile">
            <h2>Tile 5: Higher Education</h2>
               
                    <label for="collegeName">College Name and Location:</label>
                    <input type="text" id="collegeName" name="collegeName">

                    <label for="fieldOfStudy">Field Of Study:</label>
                    <input type="text" id="fieldOfStudy" name="fieldOfStudy">

              
					
					<label for="Active">Active: </label> 
				 <Input type = 'Radio' Name ='Active' value='Yes'>Yes<Input type = 'Radio' Name ='Active' value= 'NO'>NO

					<label for="Completed">Completed: </label> 
				 <Input type = 'Radio' Name ='Completed' value='Yes'>Yes<Input type = 'Radio' Name ='Completed' value= 'NO'>NO
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
<?php
 //Connection to database
$servername="localhost";
$username="root";
$password ="";
$db="talentforge";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
die("Connection fa1led:" . mysqli_connect_error ());
}
?>

<?php
error_reporting(0);
//Retrieving Data
	$name = $_POST["name"];
    $surname = $_POST["surname"];
    $gender = $_POST["gender"];
    $maritalStatus = $_POST["MaritalStatus"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    $residentialAddress = $_POST["residentialAddress"];
    $postalAddress = $_POST["postalAddress"];
	$skill1 = $_POST["skill1"];
	$skill2 = $_POST["skill2"];
    $companyName = $_POST["companyName"];
    $position = $_POST["position"];
    $reference = $_POST["reference"];
    $referenceContact = $_POST["referenceContact"];
    $lastSchool = $_POST["lastSchool"];
    $highestGrade = $_POST["highestGrade"];
    $finalYear = $_POST["finalYear"];
    $collegeName = $_POST["collegeName"];
    $fieldOfStudy = $_POST["fieldOfStudy"];
    $active = $_POST["Active"];
    $completed = $_POST["Completed"];
    $Check=True;

?>

<?php
//Inserting Vaild data
if ($Check===True){
$sql= "INSERT INTO tblregusers (Name, Surname, Gender, MaritalStatus, ComtactNum, Email, ResAddress, PostalAddress)
        VALUES ('$name', '$surname', '$gender', '$maritalStatus', '$contactNumber', '$email', '$residentialAddress', '$postalAddress')";

if (mysqli_query($conn,$sql)){
 echo "Succesfull";
 echo '<script>alert("Succesfull")</script>';
}else{
 echo "Error: ".$sql."<br>".mysqli_error($conn);
}

$sql= "INSERT INTO tblskills (Skill1, Skill2) VALUES ('$skill1', '$skill2');";

if (mysqli_query($conn,$sql)){
 echo "Succesfull";
 echo '<script>alert("Succesfull")</script>';
}else{
 echo "Error: ".$sql."<br>".mysqli_error($conn);
}

$sql= "INSERT INTO tblemployeehistory (Company, Position, Reference, ReferenceContact)
VALUES ('$companyName', '$position', '$reference', '$referenceContact');";

if (mysqli_query($conn,$sql)){
 echo "Succesfull";
 echo '<script>alert("Succesfull")</script>';
}else{
 echo "Error: ".$sql."<br>".mysqli_error($conn);
}

$sql= "INSERT INTO tblhighered (`CollegeName&Loc`, `FieldOfStudy`, `Active`, `Complete`)
VALUES ('$collegeName', '$fieldOfStudy', '$active', '$completed);";

if (mysqli_query($conn,$sql)){
 echo "Succesfull";
 echo '<script>alert("Succesfull")</script>';
}else{
 echo "Error: ".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
 }
 else{
 //Non Vaild data
 echo '<script>alert("Please Enter Correct Details")</script>';
}
?>