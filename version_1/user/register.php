<?php
// page so that the user can register themselves

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if ($_SESSION["userlogin"] ==true) {

        echo "<meta http-equiv='refresh' content='4;url=homepage.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../styles.css'>";
        echo "User logged in"; // clear message

    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <title>Register</title>
    </head>

    <body>

        <div id="container">

            <div id="title_bar">

                <h1>Rosla Technologies</h1>

            </div>

            <div id="nav_bar">

                <ul id="nav">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="../admin/staff_login.php">Staff Login</a></li>
                </ul>

            </div>

            <div id="content">

                <div id="page_title">

                    <h2>Registration</h2>

                </div>

                <form id="user_register" method="post" action="register_reg.php"> <!-- user register form which will send results to separate page for reg to the db -->

                    <fieldset>

                        <legend><h2>User Register</h2></legend>

                        <label for="first_name">First Name: </label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter First name">

                        <label for="last_name">Surname: </label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter Surname">

                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="Enter Email"> <!-- type is email because it does automatic email validation-->

                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" placeholder="Enter password"> <!-- type is password as it means that the password cannot be seen when it is being entered-->

                        <label for="cpassword">Confirm password: </label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password"> <!-- type is password as it means that the password cannot be seen when it is being entered-->

                        <label for="al1">Address line 1: </label>
                        <input type="text" id="al1" name="al1" placeholder="Enter Address Line 1">

                        <label for="al2">Address line 2: </label>
                        <input type="text" id="al1" name="al1" placeholder="Enter Address Line 2">

                        <label for="city">City: </label>
                        <input type="text" id="city" name="city" placeholder="Enter City">

                        <label for="postcode">Postcode: </label>
                        <input type="text" id="postcode" name="postcode" placeholder="Enter Postcode">

                        <button type="submit">Register</button>

                    </fieldset>

                </form>

            </div>

        </div>

    </body>

</html>