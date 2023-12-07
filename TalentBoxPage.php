<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "talentforgedb2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from tblregusers and tbicvs
$sql = "SELECT tblregusers.RUID, tblregusers.Name, tblregusers.Surname, tblregusers.ContactNum, tblregusers.Email, tbicvs.FileLocation FROM tblregusers LEFT JOIN tbicvs ON tblregusers.RUID = tbicvs.RUID";
$result = $conn->query($sql);
?>

<!-- ... Your PHP code remains unchanged ... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
  <style>
	
	   body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        .block-container {
            margin-top: 20px;
        }

         .block {
        margin-bottom: 10px; /* Adjusted margin */
        background-color: white;
        padding: 10px; /* Adjusted padding */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

        .block:hover {
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #1a5276;
        }

        
        .search-container {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

       
        #searchButton,
        #undoButton {
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #searchButton {
           background-color: #4B0082;
            color: white;
			cursor: pointer;
        }

        #searchButton:hover {
            background-color: #1a5276;
        }

        #undoButton {
            background-color: #e67e22;
            color: white;
			cursor: pointer;
            display: none;
        }

        #undoButton:hover {
            background-color: #a04000;
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
		
		 input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

		
		
    </style>
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



    <!-- Search container -->
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Enter Email">
        <button id="searchButton" onclick="searchByEmail()">Search</button>
        <button id="undoButton" onclick="undoSearch()" style="margin-left: 10px;">Undo Search</button>
    </div>

    <!-- Block container -->
    <div class="block-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
				
                echo "<div class='block' data-email='" . $row["Email"] . "'>";
                echo "<p><strong>Name:</strong> " . $row["Name"] . "</p>";
                echo "<p><strong>Surname:</strong> " . $row["Surname"] . "</p>";
                echo "<p><strong>Contact Number:</strong> " . $row["ContactNum"] . "</p>";
                echo "<p><strong>Email:</strong> " . $row["Email"] . "</p>";
                echo "<p><a href='" . $row["FileLocation"] . "' target='_blank'>View CV</a></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No data found</p>";
        }

        $conn->close();
        ?>
    </div>

<script>
    // Store the original state when the page loads
    var originalState;

    // Function to set the original state
    function setOriginalState() {
        originalState = document.querySelector('.block-container').innerHTML;
    }

    // Initial call to set the original state
    setOriginalState();

    // Function to search blocks by email
    function searchByEmail() {
        var searchInput = document.getElementById("searchInput").value.toLowerCase();
        var blocks = document.querySelectorAll('.block');

        blocks.forEach(function (block) {
            var blockEmail = block.getAttribute('data-email').toLowerCase();

            if (blockEmail.includes(searchInput) || searchInput === '') {
                block.style.display = 'block';
            } else {
                block.style.display = 'none';
            }
        });

        // Show the Undo Search button
        document.getElementById("undoButton").style.display = 'block';
    }

    // Function to undo the search
    function undoSearch() {
        document.querySelector('.block-container').innerHTML = originalState;
        document.getElementById("searchInput").value = '';
        document.getElementById("undoButton").style.display = 'none';

        // Reset the display property for all blocks
        var blocks = document.querySelectorAll('.block');
        blocks.forEach(function (block) {
            block.style.display = 'block';
        });
    }
</script>


</body>
</html>
