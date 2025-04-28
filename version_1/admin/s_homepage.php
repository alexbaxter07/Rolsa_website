<?php
//staff homepage for appointments

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if ($_SESSION["staff_login"] ==false) {

        echo "<meta http-equiv='refresh' content='4;url=index.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../styles.css'>";
        echo "User not logged in"; // clear message

    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <title>Homepage</title>
    </head>

    <body>

        <div id="container">

            <div id="title_bar">

                <h1>Rosla Technologies</h1>

            </div>

            <div id="nav_bar">

                <ul id="nav">

                    <li><a href="s_homepage.php">Homepage</a></li>
                    <li><a href="s_reg.php">Register staff</a></li>

                </ul>

            </div>

            <div id="content">

                <div id="page_title">

                    <h2>Staff Home Page</h2>

                </div>

            <p>appointments will show here</p>

        </div>

    </body>

</html>