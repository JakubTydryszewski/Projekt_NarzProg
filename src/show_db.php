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

//Send a query to the database
$query = "SELECT * FROM Users";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch all rows from the result set
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Display the rows in a table
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Username</th><th>Password</th></tr>";
foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
?>