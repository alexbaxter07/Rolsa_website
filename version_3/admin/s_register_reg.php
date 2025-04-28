<?php
// page to register the new user to the database

    session_start();  //session start so that the page can connect to session data

    // include statements so that this page can use the functions provided by those pages
    include("../db_connect.php");
    include("../functions.php");
    include("s_functions.php");

    try{ // try this block of code to catch any errors

        $conn = dbconnect(); // get the connection status

        //get function to check password
        if (password_check($_POST["password"], $_POST["cpassword"]) == false) { // if password is not the sam e

            echo "<meta http-equiv='refresh' content='2;url=s_reg.php'>"; //redirect
            echo "Password issue";

        }else{ // if password is valid

            $hpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password for security

            if (valid_email($_POST["email"])){

                //address line 2 is optional but still need data in database
                if (!empty($_POST['al2'])) {
                    $al2 = $_POST['al2'];
                }else {
                    $al2 = " ";
                }

                $hpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password for security

                $signup_date = time(); // get current time

                // sql insert statement to put data into the database
                $sql = "Insert into staff (first_name, last_name, s_email, password, signup_date, address_line_1, address_line_2, postcode, city, s_type) values(?,?,?,?,?,?,?,?,?,?)";

                //prepare and bind the sql to help security against sql injection
                $stmt = $conn->prepare($sql); // prepare sql

                //securley bind the parameters for the sql insert
                $stmt -> bindParam(1,$_POST['first_name']);
                $stmt -> bindParam(2,$_POST['last_name']);
                $stmt -> bindParam(3,$_POST['email']);
                $stmt -> bindParam(4,$hpassword);
                $stmt -> bindParam(5,$signup_date);
                $stmt -> bindParam(6,$_POST['al1']);
                $stmt -> bindParam(7,$al2);
                $stmt -> bindParam(8,$_POST['postcode']);
                $stmt -> bindParam(9,$_POST['city']);
                $stmt -> bindParam(10,$_POST['type']);

                $stmt -> execute(); // run query to insert

                echo "<meta http-equiv='refresh' content='2;url=s_homepage.php'>"; //redirect
                echo "<link rel='stylesheet' type='css' href='../styles.css'>";
                echo "Successfully registered"; // clear message

            } else{// if email isnt valid

                echo "<meta http-equiv='refresh' content='2;url=s_reg.php'>"; //redirect
                echo "<link rel='stylesheet' type='css' href='../styles.css'>";
                echo "email is not valid"; // clear message
            }

        }

    } catch (PDOException $e) { // catch error in case it fails

        echo "Registration failed: " . $e->getMessage(); //output the error
    }