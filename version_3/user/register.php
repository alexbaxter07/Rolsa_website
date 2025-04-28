<?php
// page so that the user can register themselves

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if (isset($_SESSION["user_login"])) {

        header("Location: ../homepage.php");

    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Register</title>

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

                    <h2>Registration</h2>

                </div>

                <!-- user register form which will send results to separate page for reg to the db -->
                <form id="user_register" method="post" action="register_reg.php">

                    <!--table to organise form contents-->
                    <table id="user_reg">

                        <!--Form title-->
                        <legend><h2>User Register</h2></legend>

                        <tr>

                            <!--Label so that the user knows what to enter-->
                            <td><label for="first_name">First Name: </label></td>
                            <!--input box so that the user can enter information-->
                            <td><input type="text" id="first_name" name="first_name" placeholder="Enter First name" required></td>

                        </tr>

                        <tr>

                            <td><label for="last_name">Surname: </label></td>
                            <td><input type="text" id="last_name" name="last_name" placeholder="Enter Surname" required></td>

                        </tr>

                        <tr>

                            <td><label for="email">Email: </label></td>
                            <td><input type="email" id="email" name="email" placeholder="Enter Email" required></td> <!-- type is email because it does automatic email validation-->

                        </tr>

                        <tr>

                            <td><label for="password">Password: </label></td>
                            <td><input type="password" id="password" name="password" placeholder="Enter password" required></td> <!-- type is password as it means that the password cannot be seen when it is being entered-->

                        </tr>

                        <tr>

                            <td><label for="cpassword">Confirm password: </label></td>
                            <td><input type="password" id="cpassword" name="cpassword" placeholder="Confirm password" required></td> <!-- type is password as it means that the password cannot be seen when it is being entered-->

                        </tr>

                        <tr>

                            <td><label for="al1">Address line 1: </label></td>
                            <td><input type="text" id="al1" name="al1" placeholder="Enter Address Line 1" required></td>

                        </tr>

                        <tr>

                            <td><label for="al2">Address line 2: </label></td>
                            <td><input type="text" id="al2" name="al2" placeholder="Enter Address Line 2"></td> <!--not required as not everyone has a line 2 in address-->

                        </tr>

                        <tr>

                            <td><label for="city">City: </label></td>
                            <td><input type="text" id="city" name="city" placeholder="Enter City" required></td>

                        </tr>

                        <tr>

                            <td><label for="postcode">Postcode: </label></td>
                            <td><input type="text" id="postcode" name="postcode" placeholder="Enter Postcode" required></td>

                        </tr>

                        <tr>

                            <!--button so that the information can be sent to the next page-->
                            <td><button id="submit" type="submit">Register</button></td>

                        </tr>

                    </table>

                </form>

            </div>

        </div>

    </body>

</html>