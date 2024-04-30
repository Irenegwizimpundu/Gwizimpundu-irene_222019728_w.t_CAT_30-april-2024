
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Production Details Page</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;

      background-color: yellow;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
header{
    background-color:skyblue;
    padding: 20px;
}
footer{
    text-align: center;
    padding: 15px;
    background-color:skyblue;
}
  </style>
   
     <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  
<header>
   

</head>

<body bgcolor="greenyellow">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/logo.jpg" width="90" height="60" alt="Logo">
  </li>
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a>
    <li style="display: inline; margin-right: 10px;"><a href="./ABOUT US.html">ABOUT US</a>
      <li style="display: inline; margin-right: 10px;"><a href="./CONTACT US.html">CONTACT US</a>
    <li style="display: inline; margin-right: 10px;"><a href="./actors.php">Actors</a>
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./directors.php">directors</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./film_information.php">Film_information</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./financial_management.php">Financial_management</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./production_details.php">Production_details</a>
  </li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
  </ul>
</header>
<section>
<h1>Production_details Form</h1>

    <form method="post" onsubmit="return confirmInsert();">
        <label for="Production_Details_Id">Production_Details_Id:</label>
        <input type="number" id="fus_Id" name="fus_Id"><br><br>

        <label for="Budget">Budget:</label>
        <input type="number" id="actid" name="actid" required><br><br>

        <label for="Marketing_Location">Marketing_Location:</label>
        <input type="number" id="dn" name="dn" required><br><br>

        <label for="Production_Start_Line">Production_Start_Line:</label>
        <input type="time" id="txt" name="txt" required><br><br>

        <label for="Production_End_Line">Production_End_Line:</label>
        <input type="time" id="PEL" name="PEL" required><br><br>


        <input type="submit" name="add" value="Insert">
    </form>

    
    <?php
    include('database_connection.php');
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO production_details (Production_Details_Id,Budget, Marketing_Location,Production_Start_Line, Production_End_Line) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $Production_Details_Id, $Budget, $Marketing_Location, $Production_Start_Line, $roduction_End_Line);

        // Set parameters from POST data with validation (optional)
        $Production_Details_Id = intval($_POST['fus_Id']); // Ensure integer for ID
        $Budget = htmlspecialchars($_POST['actid']); // Prevent XSS
        $Marketing_Location = htmlspecialchars($_POST['dn']); 
        $Production_Start_Line = filter_var($_POST['txt'], FILTER_SANITIZE_EMAIL);
        $Production_End_Line = htmlspecialchars($_POST['PEL']); 
        // Execute prepared statement with error handling
        if ($stmt->execute()) {
            echo "New record has been added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $connection->close();
    ?>

<?php
// Connection details
include('database_connection.php');

// SQL query to fetch data from Production_Details
$sql = "SELECT * FROM production_details";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of production_details.</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <center><h2>Table of Production_details</h2></center>
    <table border="5">
        <tr>
            <th>Production_Details_Id</th>
            <th>Film_Info_Id</th>
            <th>Budget</th>
            <th>Marketing_Location</th>
            <th>Production_Start_Line</th>
            <th>Production_End_Line</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "movie_studio_mgt_system";

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        // Prepare SQL query to retrieve Production_Details.
        $sql = "SELECT * FROM production_details";
        $result = $connection->query($sql);
        // Check if there are any Production_Details.
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $did = $row['Production_Details_Id']; // Fetch the Production_Details
                echo "<tr>
                    <td>" . $row['Production_Details_Id'] . "</td>
                    <td>" . $row['Budget'] . "</td>
                    <td>" . $row['Marketing_Location'] . "</td>
                    <td>" . $row['Production_Start_Line'] . "</td>
                    <td>" . $row['Production_End_Line'] . "</td>
                    <td><a style='padding:4px' href='delete_production_details.php?Production_Details_Id=$did'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_production_details.php?Production_Details_Id=$did'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 & reg, Designer by: @IRENE GWIZIMPUNDU</h2></b>
  </center>
</footer>
</body>
</html>