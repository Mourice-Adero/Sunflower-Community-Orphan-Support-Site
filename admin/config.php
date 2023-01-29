<?php
    $host = 'localhost';
    $dbname = 'sunflowercommunity';
    $username = 'root';
    $password = '';
    
    // Connect to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>