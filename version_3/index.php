<?php
// page so that the user can select if they want to login or register

    session_start();  //session start so that the page can connect to session data
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="styles.css">
        <!-- Setting the title of the webpage -->
        <title>Index</title>

    </head>

    <body>

        <div id="container">

            <!-- Title bar section containing the company name -->
            <div id="title_bar">

                <h1>Rolsa Technologies</h1>

            </div>

            <!-- Navigation bar containing links to various login/register pages -->
            <div id="nav_bar">

                <!-- Link for user login -->
                <a href="user/login.php">Login</a>
                <!-- Link for user registration -->
                <a href="user/register.php">Register</a>
                <!-- Link for staff login -->
                <a href="admin/s_login.php">Staff Login</a>
                <!-- Link for user logout -->
                <a href="logout.php">Logout</a>

            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">
                <p>Please choose an option to login or to register yourself as a user</p>
            </div>

        </div>

    </body>

</html>