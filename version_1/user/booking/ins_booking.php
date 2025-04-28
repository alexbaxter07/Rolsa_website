<?php
// page so that the user can book consults for solar pannels

    session_start(); //session start so that the page can connect to session data

        // if the user is logged in to go straight to homepage
        if ($_SESSION["user_login"] == false) {

            echo "<meta http-equiv='refresh' content='url=login.php'>"; //redirect
            echo "<link rel='stylesheet' type='css' href='../../styles.css'>";

        }
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <link rel="stylesheet" href="../../styles.css">
        <title>Solar Installation</title>
    </head>

    <body>

        <div id="container">

            <div id="title_bar">

                <h1>Rosla Technologies</h1>

            </div>

            <div id="nav_bar">

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

                    <h2>Booking Installation</h2>

                </div>

                <form id="instal" method="post" action="book_val.php"> <!-- user login form which will send results to separate page for validation -->

                    <table>

                        <fieldset>

                            <legend><h2>Installation Booking</h2></legend>

                            <tr><td><input type="hidden" name="staff" value="ins"</td></tr>

                            <tr>
                                <td><label for="product"> Select the product you would like</label></td>
                                <td>
                                    <select name="product" required>
                                        <option value="solar">Solar Panels</option>
                                        <option value="ev">Electric vehicle Charging Station</option>
                                        <option value="hems">Home Energy Management System</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="date">Date you would like:</label></td>
                                <td><input type="date" id="date" name="date" required></td>
                            </tr>

                            <tr>
                                <td><label for="time">Time you would like:</label></td>
                                <td><input type="time" id="time" name="time" required></td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="submit">book</button>
                                </td>
                            </tr>

                        </fieldset>

                    </table>

                </form>

            </div>

        </div>

    </body>

</html>