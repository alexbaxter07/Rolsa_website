<?php
//staff homepage for appointments

    session_start(); //session start so that the page can connect to session data

    // if the staff is not logged in go to index
    if (!isset($_SESSION["staff_login"])) {

        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Linking the external stylesheet for styling the webpage -->
        <link rel="stylesheet" href="../styles.css">
        <!-- Setting the title of the webpage -->
        <title>Staff Homepage</title>

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
                <a href="s_homepage.php">Homepage</a>
                <!--link to staff register-->
                <a href="s_reg.php">Register Staff</a>
                <!--link to logout-->
                <a href="../logout.php">Logout</a>

            </div>

            <!-- Main content section displaying a message for users -->
            <div id="content">

                <!-- Page bar section containing the page name -->
                <div id="page_title">

                    <h2>Staff Home Page</h2>

                </div>

                <?php

                    //include statements so that the system can use information from that page
                    include("../db_connect.php");

                    $conn = dbconnect(); // get the connection status

                    //if user is an admin do the next section of code
                    if ($_SESSION["type"] == 'admin') {

                        //select ststement to get information, inner joins to connect tables so it can use information from both tables in the database
                        $sql = "SELECT users.first_name, users.last_name, users.email, users.address_line_1, users.address_line_2, users.postcode, users.city, booking.date,booking.type, staff.s_email, staff.s_type
                        FROM users
                        inner join booking on booking.user_id = users.user_id
                        INNER JOIN staff ON staff.staff_id = booking.staff_id
                        order by booking.date asc";

                        //prepare statement to help security against sql injections
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        //custom headings to help the information be clearer to the user
                        $custom_headings = [
                            'first_name' => 'Customer First Name',
                            'last_name' => 'Customer Last Name',
                            'email' => 'Customer Email',
                            'address_line_1' => 'Customer Address line 1',
                            'address_line_2' => 'Customer Address line 2',
                            'postcode' => 'Customer Postcode',
                            'city' => 'Customer City',
                            'date' => 'Booking Date',
                            'type' => 'Booking Type',
                            's_type' => 'Staff Type',
                            's_email' => 'Staff Email',
                        ];

                        //get results in array
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        //if there is results
                        if ($results) {

                            //table to organise information
                            echo "<table id='s_homepage'>";
                            echo "<tr>";

                            //set custom headings as collumn headings
                            foreach ($custom_headings as $heading) {
                                echo "<th>" . htmlspecialchars($heading, ENT_QUOTES) . "</th>";
                            }

                            //set the results in rows
                            foreach ($results as $row) {
                                echo "<tr>";
                                foreach ($custom_headings as $column => $heading) {
                                    $value = isset($row[$column]) ? $row[$column] : '';

                                    //changing shorthand of product to longhand for easier readability for user
                                    if ($column == 'type') {
                                        if ($value == 'solar') {
                                            $value = "Solar Panel";
                                        } elseif ($value == 'ev') {
                                            $value = "Electric Vehicle Charging System";
                                        } else {
                                            $value = 'Home Energy Management System';
                                        }
                                    }

                                    // date formatting
                                    if ($column == 'date') {
                                        $formatted_date = date('d-m-y', $value);
                                        $value = $formatted_date;
                                    }

                                    //changing the shorthand of appointment type to longhand for easier readability for user
                                    if ($column == 's_type') {
                                        if ($value == 'ins'){
                                            $value= "Installation";
                                        }else{
                                            $value = "Consultation";
                                        }
                                    }

                                    echo "<td>" . htmlspecialchars($value, ENT_QUOTES) . "</td>";
                                }
                                echo "</tr>"; //Close the row properly
                            }
                            echo "</table>";

                        } else { // if there are no results

                            echo "there are no booked appointments."; //message instead of results

                        }

                    }else{ // if user is not an admin

                        //select statement to get information from the database, inner joins so that 2 tables can be used together
                        $sql = "SELECT users.first_name, users.last_name, users.email, users.address_line_1, users.address_line_2, users.postcode, users.city, booking.date,booking.type
                        FROM users
                        inner join booking on booking.user_id = users.user_id
                        inner join staff on staff.staff_id = booking.staff_id
                        where booking.staff_id = ?
                        ORDER BY booking.date asc";

                        //prepare and bind statement to help with security against sql injection
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(1, $_SESSION["staff_id"]);
                        $stmt->execute();

                        //set custom heading to help user understand the information
                        $custom_headings = [
                            'first_name' => 'Customer First Name',
                            'last_name' => 'Customer Last Name',
                            'email' => 'Customer Email',
                            'address_line_1' => 'Customer Address',
                            'address_line_2' => 'Customer Address',
                            'postcode' => 'Customer Postcode',
                            'city' => 'Customer City',
                            'date' => 'Booking Date',
                            'type' => 'Booking Type',
                        ];

                        //get results as array
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($results) { // if there is results

                            echo "<table class='appointments'>";
                            echo "<tr>";

                            //set ustom headings as collumn headings
                            foreach ($custom_headings as $heading) {
                                echo "<th>" . htmlspecialchars($heading, ENT_QUOTES) . "</th>";
                            }

                            //set results as row
                            foreach ($results as $row) {
                                echo "<tr>";
                                foreach ($custom_headings as $column => $heading) {
                                    $value = isset($row[$column]) ? $row[$column] : '';

                                    //changing shorthand of product to longhand for easier readability for user
                                    if ($column == 'type') {
                                        if ($value == 'solar') {
                                            $value = "Solar Panel";
                                        } elseif ($value == 'ev') {
                                            $value = "Electric Vehicle Charging System";
                                        } else {
                                            $value = 'Home Energy Management System';
                                        }
                                    }

                                    // date formatting
                                    if ($column == 'date') {
                                        $formatted_date = date('d-m-y', $value);
                                        $value = $formatted_date;
                                    }

                                    echo "<td id='appointments'>" . htmlspecialchars($value, ENT_QUOTES) . "</td>";
                                }
                                echo "</tr>"; //Close the row properly
                            }
                            echo "</table>";

                        } else { // if there is no results

                            echo "You have no Booked appointments."; // clear message
                        }

                    }

                ?>

        </div>

    </body>

</html>