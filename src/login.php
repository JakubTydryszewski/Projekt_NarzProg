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

// Check if login and password are set
if (isset($_POST['login']) && isset($_POST['passwd'])) {
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM Users WHERE username = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($passwd, $hashed_password)) {
            echo "Zalogowano pomyślnie!";
        } else {
            echo "Niepoprawny login lub hasło.";
        }
    } else {
        echo "Niepoprawny login lub hasło.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>