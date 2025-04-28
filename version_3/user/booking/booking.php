<?php
// page so that the user can book appointments

    session_start(); //session start so that the page can connect to session data

// if the user is not logged in go to index
    if (!isset($_SESSION["user_login"])) {

        header("Location: ../../index.php");

    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Booking</title>

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
                    <a href="../homepage.php">Homepage</a>
                    <!--link for booking-->
                    <a href="booking.php">Booking</a>
                    <!--link for appointments-->
                    <a href="../appointments.php">Appointments</a>
                    <!--link for carbon footprint calculator-->
                    <a href="../cfc.php">Carbon footprint Calculator</a>
                    <!--link to logout-->
                    <a href="../../logout.php">Logout</a>


            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">

                <!-- Page bar section containing the page name -->
                <div id="page_title">
                    <h2>Booking</h2>

                </div>

                <!--information for the page-->
                <p>At Rolsa Technologies we offer different products so we would suggest booking a consultation for the product you like before booking an installation. We have a wonderful selection of engineers and consultants that would be happy to help and answer any questions you may have about our systems</p>

                <!--table to organise options-->
                <table id="booking_options">

                        <tr>
                            <!--link to take you to installaition booking-->
                            <td><a href="ins_booking.php"> Installation  </a></td>
                            <!--link for consultaition booking-->
                            <td><a href="con_booking.php"> Consultation  </a></td>
                        </tr>

                </table>

            </div>

        </div>

    </body>

</html>
