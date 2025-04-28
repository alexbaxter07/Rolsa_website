<?php
// page so that the user can login

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if (isset($_SESSION["user_login"])) {

        header("Location: homepage.php");

    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Login</title>

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
                <a href="login.php">Login</a>
                <!-- Link for user registration -->
                <a href="register.php">Register</a>
                <!-- Link for staff login -->
                <a href="../admin/s_login.php">Staff Login</a>
                <!-- Link for user logout -->
                <a href="../logout.php">Logout</a>

            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">

                <!-- Page bar section containing the page name -->
                <div id="page_title">

                    <h2>Login</h2>

                </div>

                <!-- user register form which will send results to separate page for reg to the db -->
                <form id="user_login" method="post" action="login_val.php">

                    <!--table to organise form contents-->
                    <table id="user_login">
                            <!--Form title-->
                            <legend><h2>User Login</h2></legend>

                            <tr>

                                <!--Label so that the user knows what to enter-->
                                <td><label for="email">Email: </label></td>
                                <!--input box so that the user can enter information-->
                                <td><input type="email" id="email" name="email" placeholder="Enter email" required></td>

                            </tr>

                            <tr>

                                <td><label for="password">Password: </label></td>
                                <td><input type="password" id="password" name="password" placeholder="Enter password" required></td><!-- type is password as it means that the password cannot be seen when it is being entered-->

                            </tr>

                            <!--button so that the information can be sent to the next page-->
                            <tr>
                                <td><button id="submit" type="submit">Login</button></tr>
                            </tr>

                    </table>

                </form>

            </div>

        </div>

    </body>

</html>