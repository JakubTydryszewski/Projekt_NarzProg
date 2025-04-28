<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_login.css">
        <title>Strona startowa</title>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="arch_logo.png" alt="arch_logo" id="arch_logo"></a>
            <h1 id="header">Serwer Arch Linux</h1>
            <a href="login.php"><p id="zaloguj">zaloguj się</p></a>
        </header>
        <section id="logowanie">
            <h3>Zaloguj się</h3>
            <form method="POST" action="login2.php">
                Login:<br>
                <input type="text" name="login"><br><br>
                Hasło:<br>
                <input type="password" name="password"><br><br>
                <?php
                    if (isset($_SESSION['invalid_passwd_msg'])){
                        echo $_SESSION['invalid_passwd_msg'];
                        unset($_SESSION['invalid_passwd_msg']);
                    }
                ?>
                <input type="submit" value="Zaloguj">
            </form>
        </section>
        <section id="rejestracja">
            <h3>Nie masz konta? Nic straconego!</h3>
            <h4>Zarejestruj się za darmo</h4>
            <a href="register.php"><button>Zarejestruj się</button></a>
        </section>
        <footer>
            <p>&copy; 2025 Jakub Tydryszewski</p> 
        </footer>
    </body>
</html>