<?php
    session_start();
    require_once "connect.php";

    $conn = mysqli_connect($host, $db_user, $db_password, $db_name);

    if ($conn->connect_errno != 0) {
        echo "Error: " . $conn->connect_errno;
    } else {
        // Prepare the statement
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=?"); // Specify columns

        if ($stmt === false) {
            echo "Failed to prepare statement: " . $conn->error;
        } else {
            $login = $_POST['login'];
            $plaintext_passwd = $_POST['password'];

            // Bind parameters
            $stmt->bind_param("s", $login);

            // Execute the statement
            if ($stmt->execute()) {
                // Store the result
                $stmt->store_result();
                $num_rows = $stmt->num_rows;

                if ($num_rows > 0) {
                    // Bind the result variables
                    $stmt->bind_result($id, $username, $hashed_passwd); // Adjust based on your table structure

                    // Fetch the result
                    if ($stmt->fetch()) {
                        // Verify the password
                        if (password_verify($plaintext_passwd, $hashed_passwd)) {
                            $_SESSION['username'] = $username;
                            header('Location: index.php');
                            exit();
                        } else {
                            $_SESSION['invalid_passwd_msg'] = "<p style='color:red;'>Wprowadzono nieprawidłowy login lub hasło!</p>";
                            header('Location: login.php');
                            exit();
                        }
                    } 
                } else {
                    $_SESSION['invalid_passwd_msg'] = "<p style='color:red;'>Wprowadzono nieprawidłowy login lub hasło!</p>";
                    header('Location: login.php');
                    exit();
                }
            } else {
                echo "Failed to execute query: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }

        // Close the connection
        mysqli_close($conn);
    }
?>