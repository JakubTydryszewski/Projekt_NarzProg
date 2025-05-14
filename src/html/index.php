<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style1.css">
        <title>Strona startowa</title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['user_added_msg'])){
                echo $_SESSION['user_added_msg'];
                unset($_SESSION['user_added_msg']);
            }
        ?>
        <header>
            <a href="index.php"><img src="../arch_logo.png" alt="arch_logo" id="arch_logo"></a>
            <h1 id="header">Serwer Arch Linux</h1>
            <?php
                if (isset($_SESSION['username'])){
                    echo "<p id='zaloguj'>Zalogowany użytkownik: ".$_SESSION['username']."<br><a href='../php/logout.php'>wyloguj się</a></p>";
                } else {
                    echo "<a href='login.php'><p id='zaloguj'>zaloguj się</p></a>";
                }
            ?>
        </header>
        <nav>
            <h3>Spis treści</h3>
            <ul>
                <li><a href="ftp_server.php">Serwer FTP (work in progress)</a></li>
            </ul>
        </nav>
        <section>
            <h3>Witaj na pokładzie!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </section>
        <footer>
            <p>&copy; 2025 Jakub Tydryszewski</p> 
        </footer>
    </body>
</html>