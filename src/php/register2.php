<?php
    session_start();
    require_once "connect.php";

    $conn = mysqli_connect($host, $db_user, $db_password, $db_name);

    if ($conn->connect_errno != 0) {
        echo "Error: " . $conn->connect_errno;
    } else {
        // Check if POST variables are set
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $plaintext_passwd = $_POST['password'];
            $passwd = password_hash($plaintext_passwd, PASSWORD_DEFAULT);

            // Check if the username is taken
            $select_query = "SELECT username FROM users WHERE username = ?";
            $select_stmt = $conn->prepare($select_query);
            $select_stmt->bind_param("s", $login);
            $select_stmt->execute();
            $result = $select_stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION['user_added_msg'] = "<p style='color:red;'>Nazwa użytkownika jest zajęta</p>";
                header('Location: ../html/register.php');
                exit();
            }

            // Prepare the insert statement
            $insert_stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($insert_stmt === false) {
                echo "Nie udało się przygotować zapytania ($insert_stmt): " . $conn->error;
            } else {
                $insert_stmt->bind_param("ss", $login, $passwd);

                // Execute the insert query
                if ($insert_stmt->execute()) {
                    $_SESSION['user_added_msg'] = 
                    "<script>
                        window.alert('Użytkownik dodany prawidłowo! Zaloguj się');
                    </script>";
                    header('Location: ../html/index.php');
                    exit();
                } else {
                    echo "Nie udało się wykonać zapytania: " . $insert_stmt->error;
                    exit();
                }

                $insert_stmt->close();
            }
            $select_stmt->close();
        } else {
            echo "Login and password must be provided.";
        }
        mysqli_close($conn);
}
?>