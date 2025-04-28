<?php
// page so that the admin staff can add staffs

    session_start(); //session start so that the page can connect to session data

     //if the staff is not logged in go to index
    if (!isset($_SESSION["staff_login"])) {

        header("Location: ../index.php");
        exit;

    }

    // if the staff type does not equal admin they cannot access this page
    if (!isset($_SESSION["type"]) || $_SESSION["type"] != 'admin'){

        header("Location: s_homepage.php");
        exit();

    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Staff Registration</title>

    </head>

    <body>

        <div id="container">

            <!-- Title bar section containing the company name -->
            <div id="title_bar">

                <h1>Rolsa Technologies</h1>

            </div>

            <!-- Navigation bar containing links to various login/register pages -->
            <div id="nav_bar">

                <!--link for homepage-->
                <a href="s_homepage.php">Homepage</a>
                <!--link to staff register-->
                <a href="s_reg.php">Register Staff</a>
                <!--link to logout-->
                <a href="../logout.php">Logout</a>

            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">

                <!-- Page bar section containing the page name -->
                <div id="page_title">

                    <h2>Staff Registration</h2>

                </div>

                <!--form to get user input-->
                <form id="staff_reg" method="post" action="s_register_reg.php"> <!-- user register form which will send results to separate page for reg to the db -->

                    <table>

                        <!--form title -->
                        <legend><h2>Staff Register</h2></legend>

                        <tr>

                            <!--label so user knows what information to give-->
                            <td><label for="first_name">First Name: </label></td>
                            <!--input box so the user can enter information-->
                            <td><input type="text" id="first_name" name="first_name" placeholder="Enter First name" required></td>

                        </tr>

                        <tr>

                            <td><label for="last_name">Surname: </label></td>
                            <td><input type="text" id="last_name" name="last_name" placeholder="Enter Surname" required></td>

                        </tr>

                        <tr>

                            <td><label for="email">Email: </label>
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
                            <!--input not required as not everyone as 2 line addresses-->
                            <td><input type="text" id="al1" name="al1" placeholder="Enter Address Line 2"></td>

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

                            <td><label for="type"> Select the type of staff: </label></td>
                            <td>
                                <!--select input so that there is only set inputs-->
                                <select name="type" required>
                                    <option value="ins">installation engineer</option>
                                    <option value="con">Consultation staff</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <!--button to send information to the next page-->
                            <td><button id="submit" type="submit">Register</button></td>

                        </tr>

                    </table>

                </form>

            </div>

        </div>

    </body>

</html>