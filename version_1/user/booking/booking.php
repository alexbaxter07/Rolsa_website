<?php
// page so that the user can book appointments

    session_start(); //session start so that the page can connect to session data

     //if the user is not logged in go to login
    if ($_SESSION["user_login"] ==false) {

        echo "<meta http-equiv='refresh' content='url=../login.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../../styles.css'>";

    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="../../styles.css">
        <title>Register</title>
    </head>

    <body>

        <div id="container">

            <div id="title_bar">

                <h1>Rosla Technologies</h1>

            </div>

            <div id="nav_bar"> <!-- universal across all pages-->

                <ul id="nav">

                    <li><a href="../homepage.php">Homepage</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="../appointments.php">Appointments</a></li>
                    <li><a href="../cfc.php">Carbon footprint Calculator</a></li>
                    <li><a href="../../logout.php">Logout</a></li>

                </ul>

            </div>

            <div id="content">

                <div id="page_title">

                    <h2>Booking</h2>

                </div>

                <p>At Rosla Technologies we offer different products so we would suggest booking a consultation for the product you like before booking an installation. We have a wonderful selection of engineers and consultants that would be happy to help and answer any questions you may have about our systems</p>

                <table id="booking_options">

                        <tr>
                            <td><a href="ins_booking.php"> Installation  </a></td>
                            <td><a href="con_booking.php"> Consultation  </a></td>
                        </tr>

                </table>

            </div>

        </div>

    </body>

</html>
