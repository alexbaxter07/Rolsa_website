<?php
//page that inputs booking data to the database

    session_start(); //session start so that the page can connect to session data

    // if the user is not logged in go to index
    if (!isset($_SESSION["user_login"])) {

        header("Location: ../index.php");

    }

    // include statements so that this page can use the functions provided by those pages
    include("../../db_connect.php");
    include("../../functions.php");

    try{// try this block of code to catch any errors

        $conn = dbconnect(); // get the connection status

        $product = $_POST["product"];

        $date = $_POST['date']; // YYYY-MM-DD
        $time = $_POST['time']; // HH:MM

        // Combine date and time into a string
        $dateTimeString = $date . ' ' . $time . ':00'; // Add seconds for full format

        // Convert to epoch time using strtotime()
        $epochTime = strtotime($dateTimeString);

        //get staff to do the job
        $sql="SELECT staff_id from staff where s_type = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['staff']);
        $stmt->execute();
        $result = $stmt->fetch();
        $staff_id = $result["staff_id"];

        //put the booking into the table
        $sql = "INSERT INTO booking (date, made_on, user_id, staff_id,type) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$epochTime);
        $now= time();
        $stmt->bindParam(2,$now);
        $stmt->bindParam(3,$_SESSION['userid']);
        $stmt->bindParam(4,$staff_id);
        $stmt->bindParam(5,$_POST['product']);
        $stmt->execute();

        echo "<meta http-equiv='refresh' content='4;url=../appointments.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../../styles.css'>";
        echo "Booking completed"; // clear message

    } catch (PDOException $e) { // catch error in case it fails

    //        echo "<meta http-equiv='refresh' content='4;url=../booking.php'>"; //redirect
    //        echo "<link rel='stylesheet' type='css' href='../../styles.css'>";
        echo "Booking failed: " . $e->getMessage(); //output the error
    }