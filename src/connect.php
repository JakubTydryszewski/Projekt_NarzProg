<?php
    $host = "db"; // MySQL service name in docker-compose.yml
    $db_user = "root";
    $db_password = "root_password";
    $db_name = "serwer_arch";

    $conn = mysqli_connect($host, $db_user, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>