<?php
include('database_connection.php');

    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'actors' => "SELECT Names FROM actors WHERE Names LIKE '%$searchTerm%'",
        'directors' => "SELECT Names FROM directors WHERE Names LIKE '%$searchTerm%'",
        'film_information' => "SELECT Film_Info_Id FROM film_information WHERE Film_Info_Id LIKE '%$searchTerm%'",
        'financial_management' => "SELECT Financial_Mgt_Id FROM financial_management WHERE Financial_Mgt_Id LIKE '%$searchTerm%'",
        'production_details' => "SELECT Production_Details_Id FROM production_details WHERE Production_Details_Id LIKE '%$searchTerm%'",
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
 else {
    echo "<p>No search term was provided.</p>";
}
?>
