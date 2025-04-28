<?php
//user homepage for information#

    session_start(); //session start so that the page can connect to session data

    // if the user is not logged in go to index
    if (!isset($_SESSION["user_login"])) {

        header("Location: ../index.php");

    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Home Page</title>

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
                    <a href="homepage.php">Homepage</a>
                    <!--link for booking-->
                    <a href="booking/booking.php">Booking</a>
                    <!--link for appointments-->
                    <a href="appointments.php">Appointments</a>
                    <!--link for carbon footprint calculator-->
                    <a href="cfc.php">Carbon footprint Calculator</a>
                    <!--link to logout-->
                    <a href="../logout.php">Logout</a>

            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">

                <!-- Page bar section containing the page name -->
                <div id="page_title">

                    <h2>Home Page</h2>

                </div>

                <!-- section for an introduction to the company-->
                <div id="intro">
                    <p>Welcome to Rolsa Technologies! We are a green technology company specialising in solar panel installation and maintenance, electric vehicle charging stations and smart home energy management systems. We also offer a Carbon footprint calculator that we will then give you information about how to make your carbon footprint smaller. Below is information about our products</p>
                </div>

                <!-- section for solar pannels-->
                <div id="solar_panels">

                    <img id="solar_img" src="../assetts/solar1.jfif">

                    <div id="solar_content">
                        <h4>Solar Panels</h4>
                        <p>Solar panels, also known as photovoltaic (PV) panels,convert sunlight into electricity, reducing carbon footprints by lessening our reliance on fossil fuels and their associated emissions.</p>
                    </div>

                </div>

                <!--section for electric vehicle charging stations-->
                <div id="ev">

                    <img id="ev_img" src="../assetts/ev1.jpg">

                    <div id="ev_content">

                        <h4>EV Charging</h4>
                        <p>Electric vehicle (EV) charging stations are infrastructure that provides electricity to recharge EVs, and they contribute to reducing carbon footprints by facilitating the adoption of EVs, which produce zero tailpipe emissions, and by enabling the use of renewable energy sources for charging.</p>

                    </div>

                </div>

                <!--section for home energy management system-->
                <div id="hems">

                    <img id="hems_img" src="../assetts/hems.webp">

                    <div id="hems_content">
                        <h4>HEMS</h4>
                        <p>Home Energy Management Systems (HEMS) are technologies that monitor and manage energy consumption, ultimately reducing your carbon footprint by optimizing energy use and promoting efficiency bon footprints by facilitating the adoption of EVs, which produce zero tailpipe emissions, and by enabling the use of renewable energy sources for charging.</p>
                    </div>

                </div>

            </div>

        </div>

    </body>

</html>