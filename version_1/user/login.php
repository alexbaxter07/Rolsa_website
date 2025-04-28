<?php
// page so that the user can login

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if ($_SESSION["user_login"] ==true) {

        echo "<meta http-equiv='refresh' content='4;url=homepage.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../styles.css'>";
        echo "User already logged in"; // clear message

    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <title>Login</title>
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

                    <h2>Login</h2>

                </div>

                <form id="user_login" method="post" action="login_val.php"> <!-- user login form which will send results to separate page for validation -->

                    <fieldset>

                        <legend><h2>User Login</h2></legend>

                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="Enter email">

                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" placeholder="Enter password"><!-- type is password as it means that the password cannot be seen when it is being entered-->

                        <button type="submit">Login</button>

                    </fieldset>

                </form>

            </div>

        </div>

    </body>

</html>