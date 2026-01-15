<?php
    $server_name = "localhost";
    $username = "root";
    $password = ""; // or your actual password
    $database_name = "db1";
    $port = 3307;

    $conn = mysqli_connect($server_name, $username, $password, $database_name, $port);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
