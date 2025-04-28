<?php

    session_start(); //session start so that the page can connect to session data

    // if the user is not logged in go to index
    if (!isset($_SESSION["user_login"])) {

        header("Location: ../index.php");

    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="../styles.css">
        <title>Carbon Footprint Calculator</title>
    </head>

    <body>

        <div id="container">

            <div id="title_bar">

                <h1>Rosla Technologies</h1>

            </div>

            <div id="nav_bar"> <!-- universal across all pages-->

                <ul id="nav">

                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="booking/booking.php">Booking</a></li>
                    <li><a href="appointments.php">Appointments</a></li>
                    <li><a href="cfc.php">Carbon footprint Calculator</a></li>
                    <li><a href="../logout.php">Logout</a></li>

                </ul>

            </div>

            <div id="content">

                <div id="page_title">

                    <h2>Carbon Footprint Calculator</h2>

                </div>

                <p>coming soon</p>

            </div>

        </div>

    </body>

</html>