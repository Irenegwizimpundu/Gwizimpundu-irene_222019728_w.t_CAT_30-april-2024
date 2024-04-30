    <?php
    include('database_connection.php');
   
// Check if financial_management_Id is set
if(isset($_REQUEST['Financial_Mgt_Id'])) {
    $fin_mgtId = $_REQUEST['Financial_Mgt_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM financial_management WHERE Financial_Mgt_Id=?");
    $stmt->bind_param("i", $fin_mgtId);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="fin_mgtId" value="<?php echo $fin_mgtId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>echo 
             <a href='financial_management.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "financial_management Id is not set.";
}

$connection->close();
?>
