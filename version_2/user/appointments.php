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
        <title>Appointments</title>
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

                    <h2>Appointments</h2>

                </div>

                <?php

                include("../db_connect.php");

                $conn = dbconnect(); // get the connection status

                $sql = "SELECT booking.date, booking.type, staff.first_name, staff.email, staff.s_type  
                        FROM booking
                        INNER JOIN staff ON staff.staff_id = booking.staff_id
                        WHERE booking.user_id = ?";

                $stmt = $conn->prepare($sql);
                $stmt -> bindparam(1, $_SESSION['userid']);
                $stmt -> execute();

                $custom_headings = [
                        'date' => 'Date',
                        'type' => 'Product',
                        'first_name' => 'Staff Name',
                        'email' => 'Staff Email',
                        's_type' => 'Appointment Type',
                ];

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($results) {

                    echo "<table class='appointments'>";
                    echo "<tr>";

                    foreach ($custom_headings as $heading) {
                        echo "<th>" . htmlspecialchars($heading, ENT_QUOTES) . "</th>";
                    }

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

                            echo "<td id='appointments'>" . htmlspecialchars($value, ENT_QUOTES) . "</td>";
                        }
                        echo "</tr>"; // Fix: Close the row properly
                    }
                    echo "</table>";

                }else{

                    echo "You have not booked an appointment yet.";

                }

                ?>

            </div>

        </div>

    </body>

</html>
