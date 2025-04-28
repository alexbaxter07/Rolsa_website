<?php
// page to register the new user to the database

    session_start();  //session start so that the page can connect to session data

    include("../db_connect.php");
    include("../functions.php");
    include("s_functions.php");

    try{ // try this block of code to catch any errors

        $conn = dbconnect(); // get the connection status

        //get function to check password
        if (password_check($_POST["password"], $_POST["cpassword"]) == false) {

            echo "<meta http-equiv='refresh' content='4;url=register.php'>"; //redirect
            echo "Password issue";

        }else{

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

                $sql = "Insert into staff (first_name, last_name, s_email, password, signup_date, address_line_1, address_line_2, postcode, city, s_type) values(?,?,?,?,?,?,?,?,?,?)";
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
                $stmt -> bindParam(10,$_POST['type']);

                $stmt -> execute(); // run query to insert

                //create session variables
                $_SESSION['fname'] = $_POST['first_name'];
                $_SESSION['type'] = $_POST['type'];
                $_SESSION['staff_login'] = true;

                //get staff id
                $sql = "select staff_id from staff where s_email=?";
                $stmt = $conn->prepare($sql);
                $stmt->bindparam(1,$_POST['email']);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION["staff_id"] = $result["staff_id"];

                echo "<meta http-equiv='refresh' content='4;url=s_homepage.php'>"; //redirect
                echo "<link rel='stylesheet' type='css' href='../styles.css'>";
                echo "Heading to homepage"; // clear message

            } else{

                echo "<meta http-equiv='refresh' content='4;url=s_login.php'>"; //redirect
                echo "<link rel='stylesheet' type='css' href='../styles.css'>";
                echo "email is not valid"; // clear message
            }

        }

    } catch (PDOException $e) { // catch error in case it fails

        echo "Registration failed: " . $e->getMessage(); //output the error
    }