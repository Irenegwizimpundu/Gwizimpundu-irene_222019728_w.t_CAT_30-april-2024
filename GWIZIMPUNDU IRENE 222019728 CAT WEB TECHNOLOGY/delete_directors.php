    <?php
    include('database_connection.php');
   
// Check if director Id is set
if(isset($_REQUEST['Director_Id'])) {
    $dirctid = $_REQUEST['Director_Id'];
   
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM directors WHERE Director_Id=?");
    $stmt->bind_param("i", $dirctid);
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
            <input type="hidden" name="dirctid" value="<?php echo $dirctid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>echo 
             <a href='directors.php'>OK</a>";
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
    echo "director Id is not set.";
}

$connection->close();
?>
