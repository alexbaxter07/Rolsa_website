<?php
//page that inputs booking data to the database

    session_start(); //session start so that the page can connect to session data

    // include statements so that this page can use the functions provided by those pages
    include("../../db_connect.php");
    include("../../functions.php");

    try { // try this block of code to catch any errors

        $conn = dbconnect(); // get the connection status

        $product = $_POST["product"];

        $date = $_POST['date']; // YYYY-MM-DD
        $time = $_POST['time']; // HH:MM

        // Combine date and time into a string
        $dateTimeString = $date . ' ' . $time . ':00'; // Add seconds for full format

        // Convert to epoch time using strtotime()
        $epochTime = strtotime($dateTimeString);

        // Ensure the epoch time conversion was successful
        if ($epochTime === false) {

            throw new Exception("Invalid date/time format.");

        }

        //put the booking into the table

        //sql insert to put data into the database
        $sql = "INSERT INTO booking (date, made_on, user_id, staff_id, type) VALUES (?,?,?,?,?)";

        //prepare and bind sql to help with security against sql injections
        $stmt = $conn->prepare($sql);
        $now = time(); // get current time
        $stmt->bindParam(1, $epochTime);
        $stmt->bindParam(2, $now);
        $stmt->bindParam(3, $_SESSION['userid']);
        $stmt->bindParam(4,$_POST['staff'] );
        $stmt->bindParam(5, $_POST['product']);
        $stmt->execute();

        echo "<meta http-equiv='refresh' content='2;url=../appointments.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../../styles.css'>";
        echo "Booking completed"; // clear message

    } catch (PDOException $e) { // catch error in case it fails

        echo "Booking failed: " . $e->getMessage(); //output the error

    } catch (Exception $e) { // catch any other errors

        echo "Booking failed: " . $e->getMessage(); //output the error

    }

?>
