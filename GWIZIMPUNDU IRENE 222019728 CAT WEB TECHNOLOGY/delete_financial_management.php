    <?php
   include('database_connection.php');
   
// Check if actor_Id is set
if(isset($_REQUEST['Financial_Mgt_Id'])) {
    $finid = $_REQUEST['Financial_Mgt_Id'];
    //financial_management (Financial_Mgt_Id
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM financial_management WHERE Financial_Mgt_Id=?");
    $stmt->bind_param("i", $finid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>echo 
             <a href='financial_management.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "financial_management Id is not set.";
}

$connection->close();
?>
