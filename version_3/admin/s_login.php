<?php
// page so that the user can login

    session_start(); //session start so that the page can connect to session data

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Staff Login</title>

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
                <a href="../user/login.php">Login</a>
                <!-- Link for user registration -->
                <a href="../user/register.php">Register</a>
                <!-- Link for staff login -->
                <a href="s_login.php">Staff Login</a>
                <!-- Link for user logout -->
                <a href="logout.php">Logout</a>


            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">

                <!-- Page bar section containing the page name -->
                <div id="page_title">

                    <h2>Staff Login</h2>

                </div>

                <!--form to get user input-->
                <form id="staff_login" method="post" action="staff_val.php"> <!-- user login form which will send results to separate page for validation -->
                    <table>
                        <!--form title-->
                        <legend><h2>Staff Login</h2></legend>
                        <tr>

                            <td><label for="email">Email: </label></td>
                            <td><input type="email" id="email" name="email" placeholder="Enter Email" required></td>

                        </tr>

                        <tr>

                            <td><label for="password">Password: </label></td>
                            <td><input type="password" id="password" name="password" placeholder="Enter Password" required></td><!-- type is password as it means that the password cannot be seen when it is being entered-->

                        </tr>

                        <tr>
                            <!--button to send information to the next page-->
                            <td><button id="submit" type="submit">Login</button></td>

                        </tr>

                    </table>

                </form>

            </div>

        </div>

    </body>

</html>