<?php
// page so that the user can select if they want to login or register

    session_start();  //session start so that the page can connect to session data
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="styles.css">
        <title>index</title>
    </head>

    <body>

        <div id="container">

            <div id="title_bar">

                <h1>Rosla Technologies</h1>

            </div>

            <div id="nav_bar">

                <ul id="nav">
                    <li><a href="user/login.php">Login</a></li>
                    <li><a href="user/register.php">Register</a></li>
                    <li><a href="admin/s_login.php">Staff Login</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>

            </div>

            <div id="content">
                <p>Please choose an option to login or to register yourself as a user </p>
            </div>

        </div>

    </body>

</html>