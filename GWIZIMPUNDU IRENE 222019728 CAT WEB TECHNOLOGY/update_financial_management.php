    <?php
  include('database_connection.php');
  
// Check if financial_management Id is set
if(isset($_REQUEST['Financial_Mgt_Id'])) {
    $fin_mgtId = $_REQUEST['Financial_Mgt_Id'];
    //financial_management (Financial_Mgt_Id,Film_Info_Id, Budget,Expenses, Revenue, profit
    $stmt = $connection->prepare("SELECT * FROM financial_management WHERE Financial_Mgt_Id=?");
    $stmt->bind_param("i", $fin_mgtId); // Corrected variable name
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Financial_Mgt_Id'];
        $c = $row['Film_Info_Id'];
        $d = $row['Budget'];
        $e = $row['Expenses'];
        $f = $row['Revenue'];
        $g = $row['profit'];
    } else {
        echo "financial_management not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update financial_management</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update financial_management form -->
    <h2><u>Update Form of financial_management</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="flminfId">Film Info Id:</label>
        <input type="number" name="flminfId" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="bgt">Budget:</label>
        <input type="number" name="bgt" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="exp">Expenses:</label>
        <input type="text" name="exp" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="rev">Revenue:</label>
        <input type="text" name="rev" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>

        <label for="prft">Profit:</label>
        <input type="number" name="prft" value="<?php echo isset($g) ? $g : ''; ?>">
        <br><br>

        
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form></center> 
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Film_Info_Id = $_POST['flminfId'];
    $Budget = $_POST['bgt'];
    $Expenses = $_POST['exp'];
    $Revenue = $_POST['rev'];
    $profit = $_POST['prft'];
    
    // Update the financial_management in the database
    $stmt = $connection->prepare("UPDATE financial_management SET Film_Info_Id=?, Budget=?, Expenses=?, Revenue=?, profit=? WHERE Financial_Mgt_Id=?");
    $stmt->bind_param("sssssi", $Film_Info_Id, $Budget, $Expenses, $Revenue, $profit, $fin_mgtId);
    $stmt->execute();
    
    // Redirect to financial_management.php
    header('Location: financial_management.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
