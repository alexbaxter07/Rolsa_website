<?php
// page so that the user can book consults

    session_start(); //session start so that the page can connect to session data

    include("../../db_connect.php");

    // if the user is not logged in go to index
    if (!isset($_SESSION["user_login"])) {

        header("Location: ../../index.php");

    }

    $conn = dbconnect();

    $s_type = 'con';

    $sql = "select staff_id,first_name,last_name from staff where s_type = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $s_type);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";

        echo "<head>";

            // Linking the external stylesheet for styling the webpage -->
            echo "<link rel='stylesheet' href='../../styles.css'>";
            //Setting the title of the webpage -->
            echo "<title>Consultation Booking</title>";

        echo "</head>";

        echo "<body>";

            echo "<div id='container'>";

                //Title bar section containing company name
                echo "<div id='title_bar'>";

                    echo "<h1>Rolsa Technologies</h1>";

                echo "</div>";

                // navigation bar containing links to various pages
                echo "<div id='nav_bar'>";

                    //link to homepage
                    echo "<a href='../homepage.php'>Homepage</a>";
                    //link to booking page
                    echo "<a href='booking.php'>Booking</a>";
                    //link to appointment page
                    echo "<a href='../appointments.php'>Appointments</a>";
                    //link to carbon footprint calculator
                    echo "<a href='../cfc.php'>Carbon footprint Calculator</a>";
                    //link to log out
                    echo "<a href='../../logout.php'>Logout</a>";

                echo "</div>";

                //main content section for users
                echo "<div id='content'>";

                    //page name bar
                    echo "<div id='page_title'>";

                    echo "<h2>Booking Consultation</h2>";

                    echo "</div>";

                    //Consultation form which will send results to a separate page
                    echo "<form id='consul' method='post' action='book_val.php'>";

                        // table to organise form contents
                        echo "<table>";

                            //form title
                            echo "<legend><h2>Consultation Booking</h2></legend>";

                            //select so that inputs are limited
                            echo "<tr>";

                                echo "<td><label for='product'>Select the product you would like</label></td>";

                                echo "<td><select name='product' required>";

                                    echo "<option value='solar'>Solar Panels</option>";
                                    echo "<option value='ev'>Electric vehicle Charging Station</option>";
                                    echo "<option value='hems'>Home Energy Management System</option>";

                                echo "</select></td>";

                            echo "</tr>";

                            echo "<tr>";

                                echo "<td><label for='date'>Date you would like:</label></td>";
                                echo "<td><input type='date' id='date' name='date' required></td>";

                            echo "</tr>";

                            echo "<tr>";

                                echo "<td><label for='time'>Time you would like:</label></td>";
                                echo "<td><input type='time' id='time' name='time' required></td>";

                            echo "</tr>";

                            echo "<tr>";

                                echo "<td><label for='staff'>Select Staff Member you would like:</label></td>";
                                echo "<td><select name='staff' id='staff'>";
                                foreach ($results as $result){
                                    echo "<option value='".$result['staff_id']."'>".$result['first_name'].' '.$result['last_name']."</option>";
                                }
                                echo "</select></td>";

                            echo "</tr>";

                            echo "<tr>";

                                echo "<td><button id='book' type='submit'>Book</button></td>";

                            echo "</tr>";

                        echo "</table>";

                    echo "</form>";

                echo "</div>";

            echo "</div>";

        echo "</body>";

    echo "</html>";