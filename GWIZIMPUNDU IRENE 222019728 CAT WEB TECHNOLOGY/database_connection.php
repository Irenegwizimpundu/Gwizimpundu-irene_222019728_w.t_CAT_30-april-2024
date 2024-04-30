<?php
    // Connection details
    $host = "localhost";
    $user = "IreneGwiza";
    $pass = "irene123";
    $database = "movie_studio_mgt_system";

    // Creating connection
    $connection = new mysqli($host, $user, $pass, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>