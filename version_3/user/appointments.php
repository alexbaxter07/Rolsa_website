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
        <title>Appointments</title>

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

                    <h2>Appointments</h2>

                </div>

                <?php

                    include("../db_connect.php");

                    $conn = dbconnect(); // get the connection status

                    //sql select statement to get information from the database
                    $sql = "SELECT booking.date, booking.type, staff.first_name, staff.s_email, staff.s_type  
                            FROM booking
                            INNER JOIN staff ON staff.staff_id = booking.staff_id
                            WHERE booking.user_id = ? 
                            order by booking.date asc ";

                    //prepare and bind to help with security against sql injections
                    $stmt = $conn->prepare($sql);
                    $stmt -> bindparam(1, $_SESSION['userid']);
                    $stmt -> execute();

                    //custom heading for the user so that they can understand what information they are being given
                    $custom_headings = [
                        'date' => 'Date',
                        'type' => 'Product',
                        'first_name' => 'Staff Name',
                        's_email' => 'Staff Email',
                        's_type' => 'Appointment Type',
                    ];

                    //get the results in an array
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // if there is results do the next block of code
                    if ($results) {

                        //start a table so that the results are organised
                        echo "<table id='appointments'>";
                        echo "<tr>";

                        //set the cutom headings as the collumn headings
                        foreach ($custom_headings as $heading) {
                            echo "<th>" . htmlspecialchars($heading, ENT_QUOTES) . "</th>";
                        }

                        //make each set of results into a row
                        foreach ($results as $row) {
                            echo "<tr>";
                            foreach ($custom_headings as $column => $heading) {
                                $value = isset($row[$column]) ? $row[$column] : '';

                                //changing shorthand of product to longhand for easier readability for user
                                if ($column == 'type'){
                                    if ($value == 'solar'){
                                        $value = "Solar Panel";
                                    }elseif ($value == 'ev'){
                                        $value = "Electric Vehicle Charging System";
                                    }else{
                                        $value = 'Home Energy Management System';
                                    }
                                }

                                //changing the shorthand of appointment type to longhand for easier readability for user
                                if ($column == 's_type') {
                                    if ($value == 'ins'){
                                        $value= "Installation";
                                    }else{
                                        $value = "Consultation";
                                    }
                                }

                                // date formatting
                                if ($column == 'date') {
                                    $formatted_date = date('d-m-y', $value);
                                    $value = $formatted_date;
                                }

                                echo "<td>" . htmlspecialchars($value, ENT_QUOTES) . "</td>";
                            }
                            echo "</tr>"; // Close the row properly
                        }
                        echo "</table>";

                    }else{ // if there is no results

                        //give a clear message
                        echo "You have not booked an appointment yet.";

                    }

                ?>

            </div>

        </div>

    </body>

</html>
