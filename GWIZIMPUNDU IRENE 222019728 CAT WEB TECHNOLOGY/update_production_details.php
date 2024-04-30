    <?php
include('database_connection.php');

// Check if Production_Details_Id is set
if(isset($_REQUEST['Production_Details_Id'])) {
    $prodDet_Id = $_REQUEST['Production_Details_Id'];
    //production_details (Production_Details_Id,Budget, Marketing_Location,Production_Start_Line, Production_End_Line)
    $stmt = $connection->prepare("SELECT * FROM production_details WHERE Production_Details_Id=?");
    $stmt->bind_param("i", $prodDet_Id); // Corrected variable name
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Production_Details_Id'];
        $c = $row['Budget'];
        $d = $row['Marketing_Location'];
        $e = $row['Production_Start_Line'];
        $f = $row['Production_End_Line'];
    } else {
        echo "production_details not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Form of production details</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update production details form -->
    <h2><u>Update Form of production details</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="bgt">Budget:</label>
        <input type="number" name="bgt" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="mrktlctn">Marketing Location:</label>
        <input type="text" name="mrktlctn" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="prdStartL">Production Start Line:</label>
        <input type="date" name="prdStartL" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="prdEndL">Production End Line:</label>
        <input type="date" name="prdEndL" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $budget = $_POST['bgt'];
    $marketLocation = $_POST['mrktlctn'];
    $prodStartLine = $_POST['prdStartL'];
    $prodEndLine = $_POST['prdEndL'];
    
    // Update the production_details in the database
    $stmt = $connection->prepare("UPDATE production_details SET Budget=?, Marketing_Location=?, Production_Start_Line=?, Production_End_Line=? WHERE Production_Details_Id=?");
    $stmt->bind_param("ssssi", $budget, $marketLocation, $prodStartLine, $prodEndLine, $prodDet_Id);
    $stmt->execute();
    //production_details (Production_Details_Id,Budget, Marketing_Location,Production_Start_Line, Production_End_Line)
    // Redirect to production_details.php
    header('Location: production_details.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
