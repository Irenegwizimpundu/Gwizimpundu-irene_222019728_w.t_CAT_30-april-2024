<?php
include('database_connection.php');

    // Check if Production_Details_Id is set
    if(isset($_REQUEST['Production_Details_Id'])) {
        $prodDetId = $_REQUEST['Production_Details_Id'];
        
        // Prepare and execute the DELETE statement
        $stmt = $connection->prepare("DELETE FROM production_details WHERE Production_Details_Id=?");
        $stmt->bind_param("i", $prodDetId);
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
            <input type="hidden" name="prodDetId" value="<?php echo $prodDetId; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if ($stmt->execute()) {
            echo "Record deleted successfully.<br><br>";
            echo "<a href='production_details.php'>OK</a>";
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
        echo "Production_Details_Id is not set.";
    }

    $connection->close();
?>