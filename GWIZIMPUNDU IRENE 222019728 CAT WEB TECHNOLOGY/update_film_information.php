<?php
include('database_connection.php');

// Check if Actor Id is set
if(isset($_REQUEST['Film_Info_Id'])) {
    $flmInfoid = $_REQUEST['Film_Info_Id'];
    //actors (Actor_Id,Names, Email, Phone, Gender
    $stmt = $connection->prepare("SELECT * FROM film_information WHERE Film_Info_Id=?");
    $stmt->bind_param("i", $flmInfoid); // Corrected variable name
    $stmt->execute();
    $result = $stmt->get_result();
    //film_information (Film_Info_Id,Actor_Id, Director_Id,Title, Duration, Release_Date
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Film_Info_Id'];
        $c = $row['Actor_Id'];
        $d = $row['Director_Id'];
        $e = $row['Title'];
        $f = $row['Duration'];
        $g = $row['Release_Date'];
    } else {
        echo "film_information not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update film_information</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update film_information form -->
    <h2><u>Update Form of film_information</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="actid">Actor Id:</label>
        <input type="number" name="actid" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="dirid">Director Id:</label>
        <input type="number" name="dirid" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

         <label for="dur">Duration:</label>
        <input type="time" name="dur" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>

         <label for="reldate">Release Date:</label>
        <input type="date" name="reldate" value="<?php echo isset($g) ? $g : ''; ?>">
        <br><br>

       
        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Actor_Id = $_POST['actid'];
    $Director_Id = $_POST['dirid'];
    $Title = $_POST['title'];
    $Duration = $_POST['dur'];
    $Release_Date = $_POST['reldate'];
    
    // Update the film_information in the database
    $stmt = $connection->prepare("UPDATE film_information SET Actor_Id=?, Director_Id=?, Title=?, Duration=?, Release_Date=? WHERE Film_Info_Id=?");
    $stmt->bind_param("sisssi", $Actor_Id, $Director_Id, $Title, $Duration, $Release_Date, $flmInfoid);
    $stmt->execute();
    
    // Redirect to film_information.php
    header('Location: film_information.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
