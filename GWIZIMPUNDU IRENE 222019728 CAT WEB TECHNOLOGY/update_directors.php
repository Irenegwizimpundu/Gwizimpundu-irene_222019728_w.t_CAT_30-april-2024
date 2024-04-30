   <?php
  include('database_connection.php');
  
//directors (Director_Id, Names, Telephone, Email
if(isset($_REQUEST['Director_Id'])) {
    $dirctid = $_REQUEST['Director_Id'];
    
    $stmt = $connection->prepare("SELECT * FROM directors WHERE Director_Id=?");
    $stmt->bind_param("i",$dirctid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['Director_Id'];
        $b = $row['Names'];
        $c = $row['Telephone'];
        $d = $row['Email'];
        
    } else {
        echo "Director not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update directors</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update directors form -->
    <h2><u>Update Form of directors</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        
        <label for="dname">Names:</label>
        <input type="text" name="dname" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="dphone">Telephone:</label>
        <input type="text" name="dphone" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="deml">Email:</label>
        <input type="text" name="deml" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $directName = $_POST['dname'];
    $directPhone = $_POST['dphone'];
    $directEmail = $_POST['deml'];
    
    // Update the directors in the database
    $stmt = $connection->prepare("UPDATE directors SET  Names=?, Telephone=?, Email=? WHERE Director_Id=?");
    $stmt->bind_param("sssi", $directName, $directPhone, $directEmail, $dirctid);
    $stmt->execute();
     
    // Redirect to directors.php
    header('Location: directors.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
 