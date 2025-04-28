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

                    <li><a href="s_homepage.php">Homepage</a></li>
                    <li><a href="s_reg.php">Register staff</a></li>
                    <li><a href="../logout.php">Logout</a></li>

                </ul>

            </div>

            <div id="content">

                <div id="page_title">

                    <h2>Staff Home Page</h2>

                </div>

                <?php

                    include("../db_connect.php");

                    $conn = dbconnect(); // get the connection status

                    if ($_SESSION["type"] == 'admin') {

                        $sql = "SELECT users.first_name, users.last_name, users.email, users.address_line_1, users.address_line_2, users.postcode, users.city, booking.date,booking.type, staff.s_email, staff.s_type
                        FROM users
                        inner join booking on booking.user_id = users.user_id
                        INNER JOIN staff ON staff.staff_id = booking.staff_id";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

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

                                    echo "<td id='appointments'>" . htmlspecialchars($value, ENT_QUOTES) . "</td>";
                                }
                                echo "</tr>"; //Close the row properly
                            }
                            echo "</table>";

                        } else {

                            echo "there are no booked appointments.";

                        }
                    }else{

                        $sql = "SELECT users.first_name, users.last_name, users.email, users.address_line_1, users.address_line_2, users.postcode, users.city, booking.date,booking.type
                        FROM users
                        inner join booking on booking.user_id = users.user_id
                        inner join staff on staff.staff_id = booking.staff_id
                        where
                            booking.staff_id = ?";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(1, $_SESSION["staff_id"]);
                        $stmt->execute();

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

                        } else {

                            echo "You have no Booked appointments.";
                        }

                    }

                ?>

        </div>

    </body>

</html>