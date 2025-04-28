<?php
//user homepage for information#

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if ($_SESSION["user_login"] ==false) {

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

                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="booking/booking.php">Booking</a></li>
                    <li><a href="appointments.php">Appointments</a></li>
                    <li><a href="cfc.php">Carbon footprint Calculator</a></li>
                    <li><a href="../logout.php">Logout</a></li>

                </ul>

            </div>

            <div id="content">

                <div id="page_title">

                    <h2>Home Page</h2>

                </div>

                <div id="intro">
                    <p>Welcome to Rosla Technologies! We are a green technology company specialising in solar panel installation and maintenance, electric vehicle charging stations and smart home energy management systems. We also offer a Carbon footprint calculator that we will then give you information about how to make your carbon footprint smaller. Below is information about our products</p>
                </div>

                <div id="Solar_Panels">

                    <img src="../assetts/solar1.jfif">
                    <h4>Solar Panels</h4>
                    <br>
                    <p>Solar panels, also known as photovoltaic (PV) panels,convert sunlight into electricity, reducing carbon footprints by lessening our reliance on fossil fuels and their associated emissions.</p>

                </div>

                <div id="ev">

                    <img src="../assetts/ev1.jpg">
                    <h4>EV Charging</h4>
                    <br>
                    <p>Electric vehicle (EV) charging stations are infrastructure that provides electricity to recharge EVs, and they contribute to reducing carbon footprints by facilitating the adoption of EVs, which produce zero tailpipe emissions, and by enabling the use of renewable energy sources for charging.</p>

                </div>

                <div id="hems">

                    <img src="../assetts/hems.webp">
                    <h4>HEMS</h4>
                    <br>
                    <p>Home Energy Management Systems (HEMS) are technologies that monitor and manage energy consumption, ultimately reducing your carbon footprint by optimizing energy use and promoting efficiency bon footprints by facilitating the adoption of EVs, which produce zero tailpipe emissions, and by enabling the use of renewable energy sources for charging.</p>

                </div>

            </div>

        </div>

    </body>

</html>