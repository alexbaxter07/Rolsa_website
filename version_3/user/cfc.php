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

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Carbon Footprint Calculator</title>

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

                    <h2>Carbon Footprint Calculator</h2>

                </div>

                <!--form to get user input-->
                <form id="cfc" method="post" action="cfc.php"> <!-- user login form which will send results to separate page for validation -->
                    <table>
                        <!--form title-->
                        <legend id="cfc"><h2>Carbon Footprint Calculator</h2></legend>

                        <tr>

                            <td><label for="lecy">Electricity Usage Total (KWh):</label></td>
                            <td><input type="number" name="lecy" id="lecy"</td>

                        </tr>

                        <tr>

                            <td><label for="drive">Total distance travelled in car (miles):</label></td>
                            <td><input type="number" name="drive" id="drive"</td>

                        </tr>

                        <tr>

                            <td><label for="fly">Total distance travelled in plane (miles):</label></td>
                            <td><input type="number" name="fly" id="fly"</td>

                        </tr>

                        <tr>
                            <!--button to send information to the next page-->
                            <td><button id="submit" type="submit">Calculate</button></td>

                        </tr>

                    </table>

                </form>

                <?php

                // section for the carbon footprint calculator maths

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        //get post values
                        $lecy = $_POST["lecy"];
                        $driving = $_POST["drive"];
                        $flight = $_POST["fly"];

                        // Emission factors (in kg CO₂e per unit)
                        $ef_electricity = 0.45;  // kg CO₂e per kWh
                        $ef_driving = 0.309;     // kg CO₂e per mile
                        $ef_flights = 0.241;     // kg CO₂e per mile (short haul)
                        $ef_beef = 27;           // kg CO₂e per kg

                        // Total emissions
                        $emissions = (

                            $lecy * $ef_electricity +
                            $driving * $ef_driving +
                            $flight * $ef_flights

                        );

                        echo "<h3>Total Estimated Carbon Footprint: " . round($emissions, 2) . " kg CO₂e</h3>";
                    }
                ?>

            </div>

        </div>

    </body>

</html>