<?php
include('database_connection.php');

// Check if Actor Id is set
if(isset($_REQUEST['Actor_Id'])) {
    $actid = $_REQUEST['Actor_Id'];
    //actors (Actor_Id,Names, Email, Phone, Gender
    $stmt = $connection->prepare("SELECT * FROM actors WHERE Actor_Id=?");
    $stmt->bind_param("i", $actid); // Corrected variable name
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Actor_Id'];
        $c = $row['Names'];
        $d = $row['Email'];
        $e = $row['Phone'];
        $f = $row['Gender'];
    } else {
        echo "Actor not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update actors</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update actors form -->
    <h2><u>Update Form of actors</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        
        <label for="actname">Names:</label>
        <input type="text" name="actname" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="eml">Email:</label>
        <input type="email" name="eml" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="actphone">Phone Number:</label>
        <input type="number" name="actphone" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="gend">Gender:</label>
        <select name="gend">
            <option value="Male" <?php if(isset($f) && $f == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if(isset($f) && $f == 'Female') echo 'selected'; ?>>Female</option>
        </select>
        
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $actorName = $_POST['actname'];
    $actorEmail = $_POST['eml'];
    $phoneNmbr = $_POST['actphone'];
    $gender = $_POST['gend'];
    
    // Update the actor in the database
    $stmt = $connection->prepare("UPDATE actors SET Names=?, Email=?, Phone=?, Gender=? WHERE Actor_Id=?");
    $stmt->bind_param("ssssi", $actorName, $actorEmail, $phoneNmbr, $gender, $actid);
    $stmt->execute();
    
    // Redirect to actors.php
    header('Location: actors.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
