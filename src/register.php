<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_register.css">
        <title>Rejestracja</title>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="arch_logo.png" alt="arch_logo" id="arch_logo"></a>
            <h1 id="header">Serwer Arch Linux</h1>
            <a href="login.php"><p id="zaloguj">zaloguj się</p></a>
        </header>
        <section>
            <h3>Utwórz konto</h3>
            <form method="POST" action="register2.php" onsubmit="checkPassword(event)">
                Login:<br>
                <input type="text" name="login" required><br><br>
                Hasło:<br>
                <input type="password" id="password" name="password" required><br><br>
                Powtórz hasło:<br>
                <input type="password" id="confirmPassword" required><br><br>
                <p id='passwds_dont_match' style='color: red;'></p>
                <?php
                    if (isset($_SESSION['user_added_msg'])){
                        echo $_SESSION['user_added_msg'];
                        unset($_SESSION['user_added_msg']);
                    }
                ?>
                <input type="submit" value="Zarejestruj się">
            </form>
            <script>
                 function checkPassword(ev){
                    ev.preventDefault();
                    var passValue = document.getElementById("password").value;
                    var confpassValue = document.getElementById("confirmPassword").value;

                    if (passValue !== confpassValue) {
                        document.getElementById("passwds_dont_match").innerHTML = "Wprowadzone hasła są różne! Spróbuj jeszcze raz"; 
                    } else {
                        ev.target.submit();
                    }
                }
            </script>
        </section>
        <footer>
            <p>&copy; 2025 Jakub Tydryszewski</p> 
        </footer>
    </body>
</html>