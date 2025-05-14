<?php
    session_start();
    if (!isset($_SESSION['username'])){
        echo '<script>
                alert("Aby uzyskać dostęp do tej strony musisz się zalogować!");
                window.location.href = "index.php";
              </script>';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style2.css">
        <title>Rejestracja</title>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="../arch_logo.png" alt="arch_logo" id="arch_logo"></a>
            <h1 id="header">Serwer Arch Linux</h1>
            <?php
                if (isset($_SESSION['username'])){
                    echo "<p id='zaloguj'>Zalogowany użytkownik: ".$_SESSION['username']."<br><a href='../php/logout.php'>wyloguj się</a></p>";
                } else {
                    echo '<script>
                            alert("Aby uzyskać dostęp do tej strony musisz się zalogować!");
                            window.location.href = "index.php";
                        </script>';
                }
            ?>
        </header>
        <section id="header2">
            <h2>Serwer FTP</h2>
        </section>
        <section class="half_section">
            <form method="POST" action="ftp_download.php">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </form>
        </section>
        <section class="half_section">
            <form method="POST" action="ftp_upload.php">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </form>
        </section>
        <footer>
            <p>&copy; 2025 Jakub Tydryszewski</p> 
        </footer>
    </body>
</html>