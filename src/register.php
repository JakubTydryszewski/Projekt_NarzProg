<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_register.css">
        <title>Strona startowa</title>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="arch_logo.png" alt="arch_logo" id="arch_logo"></a>
            <h1 id="header">Serwer Arch Linux</h1>
            <a href="login.html"><p id="zaloguj">zaloguj się</p></a>
        </header>
        <section>
            <h3>Utwórz konto</h3>
            <form method="POST" action="register2.php" onsubmit="checkPassword(event)">
                Login:<br>
                <input type="text" name="login"><br><br>
                Hasło:<br>
                <input type="password" id="password" name="password"><br><br>
                Powtórz hasło:<br>
                <input type="password" id="confirmPassword"><br><br>
                <p id='passwds_dont_match' style='color: red;'></p>
                <input type="submit" value="Zarejestruj się">
            </form>
            <script>
                 function checkPassword(ev){
                    ev.preventDefault(); // Call preventDefault with parentheses
                    var passValue = document.getElementById("password").value;
                    var confpassValue = document.getElementById("confirmPassword").value;

                    if (passValue !== confpassValue) {
                        document.getElementById("passwds_dont_match").innerHTML = "Wprowadzone hasła są różne! Spróbuj jeszcze raz"; 
                    } else {
                        // If passwords match, submit the form
                        ev.target.submit(); // This submits the form
                    }
                }
            </script>
        </section>
        <footer>
            <p>&copy; 2025 Jakub Tydryszewski</p> 
        </footer>
    </body>
</html>