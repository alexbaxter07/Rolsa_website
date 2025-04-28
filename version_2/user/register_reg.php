<?php
// page to register the new user to the database

    session_start();  //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if (isset($_SESSION["user_login"])) {

        header("Location: ../homepage.php");

    }

    include("../db_connect.php");
    include("../functions.php");

    try{ // try this block of code to catch any errors

        $conn = dbconnect(); // get the connection status

        //get function to check password
        if (password_check($_POST["password"], $_POST["cpassword"]) == false) {

            //auditor($conn, $_POST["username"], "paf", "Incorrectly assigned password");

            echo "<meta http-equiv='refresh' content='4;url=register.php'>"; //redirect
            echo "Password issue. make sure it is at least 8 characters and matches";

        }else{

            $hpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password for security

        }

        //address line 2 is optional but still need data in database
        if (!empty($_POST['al2'])) {
            $al2 = $_POST['al2'];
        }else {
            $al2 = " ";
        }

        $hpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password for security

        $signup_date = time(); // get current time

        $sql = "Insert into users ( first_name, last_name, email, password, signup_date,address_line_1, address_line_2, postcode, city) values(?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql); // prepare sql

        //securly bind the parameters for the sql instert
        $stmt -> bindParam(1,$_POST['first_name']);
        $stmt -> bindParam(2,$_POST['last_name']);
        $stmt -> bindParam(3,$_POST['email']);
        $stmt -> bindParam(4,$hpassword);
        $stmt -> bindParam(5,$signup_date);
        $stmt -> bindParam(6,$_POST['al1']);
        $stmt -> bindParam(7,$al2);
        $stmt -> bindParam(8,$_POST['postcode']);
        $stmt -> bindParam(9,$_POST['city']);

        $stmt -> execute(); // run query to insert

        $_SESSION['user_login'] = true;
        $_SESSION['email'] = $_POST["email"];

        $sql="SELECT user_id FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$_POST['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        $userid = $result["user_id"];

        $_SESSION['userid'] = $userid;

        echo "<meta http-equiv='refresh' content='4;url=homepage.php'>"; //redirect
        echo "<link rel='stylesheet' type='css' href='../styles.css'>";
        echo "Heading to homepage"; // clear message

    } catch (PDOException $e) { // catch error in case it fails

        echo "Registration failed: " . $e->getMessage(); //output the error
    }