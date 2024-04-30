
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Page</title>
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
<h1>ACTORS Form</h1>

    <form method="post" onsubmit="return confirmInsert();">
        <label for="Actor_Id">Actor_Id:</label>
        <input type="number" id="Cus_Id" name="Cus_Id"><br><br>

        <label for="Names">Names:</label>
        <input type="text" id="Ft_Nm" name="Ft_Nm" required><br><br>

        <label for="Email">Email:</label>
        <input type="email" id="eml" name="eml" required><br><br>

        <label for="Phone">Phone:</label>
        <input type="number" id="phn" name="phn" required><br><br>

        <label for="Gender">Gender:</label>
        <textarea id="Gendr" name="Gendr" required></textarea><br><br>

        <input type="submit" name="add" value="Insert">
    </form>
    <?php
include('database_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO actors (Actor_Id,Names, Email, Phone, Gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $Actor_Id, $Names, $Email, $Phone, $Gender);

        // Set parameters from POST data with validation (optional)
        $Actor_Id = intval($_POST['Cus_Id']); // Ensure integer for ID
        $Names = htmlspecialchars($_POST['Ft_Nm']); // Prevent XSS
        $Email = filter_var($_POST['eml'], FILTER_SANITIZE_EMAIL); // Validate email
        $Phone = filter_var($_POST['phn'], FILTER_SANITIZE_NUMBER_INT); // Sanitize phone number
        $Gender = htmlspecialchars($_POST['Gendr']); // Prevent XSS
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
include('database_connection.php');

// SQL query to fetch data from actorstable
$sql = "SELECT * FROM actors";
$result = $connection->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of actors</title>
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
    <center><h2>Table of Actors</h2></center>
    <table border="5">
        <tr>
            <th>Actor_Id</th>
            <th>Names</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
   include('database_connection.php');

        // Prepare SQL query to retrieve actors.
        $sql = "SELECT * FROM actors";
        $result = $connection->query($sql);
        // Check if there are any actors
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $acid = $row['Actor_Id']; // Fetch the Actor_Id
                echo "<tr>
                    <td>" . $row['Actor_Id'] . "</td>
                    <td>" . $row['Names'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Phone'] . "</td>
                    <td>" . $row['Gender'] . "</td>
                    <td><a style='padding:4px' href='delete_actors.php?Actor_Id=$acid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_actors.php?Actor_Id=$acid'>Update</a></td> 
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