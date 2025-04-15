<?php
// Get DB connection details from environment variables (set in docker-compose)
$host = getenv('DB_HOST') ?: 'db';
$user = getenv('DB_USER') ?: 'myuser';
$pass = getenv('DB_PASS') ?: 'mypassword';
$db   = getenv('DB_NAME') ?: 'myapp';

// Establish a connection to the database
$conn = mysqli_connect($host, $user, $pass, $db);

// Set the character set to UTF-8
mysqli_set_charset($conn, "utf8");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if username and password are set
if (isset($_POST['login']) && isset($_POST['passwd'])) {
    $username = $_POST['login'];
    $password = $_POST['passwd'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>