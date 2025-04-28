<?php
//page that inputs login data to the database

    session_start(); //session start so that the page can connect to session data

    // if the user is logged in to go straight to homepage
    if (isset($_SESSION["user_login"])) {

        header("Location: ../homepage.php");

    }

    // include statements so that this page can use the functions provided by those pages
    include("../db_connect.php");
    include("../functions.php");

    try{// try this block of code to catch any errors

        $conn = dbconnect(); // get the connection status

        $sql = "SELECT email, password,user_id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt -> bindParam(1, $_POST["email"]);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result != null){

            if(password_verify($_POST["password"], $result["password"])) { // if password matches one in database do next section of code

                $_SESSION["email"] = $_POST["email"];
                $_SESSION["user_login"] = true;
                $_SESSION["userid"] = $result["user_id"];

                echo "<meta http-equiv='refresh' content='4;url=homepage.php'>"; //redirect
                echo "<link rel='stylesheet' type='css' href='../styles.css'>";
                echo "Heading to homepage"; // clear message

            }else{

                echo "<meta http-equiv='refresh' content='4;url=login.php'>"; //redirect
                echo "<link rel='stylesheet' type='css' href='../styles.css'>";
                echo "Password incorrect"; // clear message

            }

        }else{

            echo "<meta http-equiv='refresh' content='4;url=register.php'>"; //redirect
            echo "<link rel='stylesheet' type='css' href='../styles.css'>";
            echo "User Not found"; // clear message

        }

    }catch (PDOException $e) { // catch error in case it fails

        echo "Login failed: " . $e->getMessage(); //output the error
    }