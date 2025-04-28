<?php
// Page to register a new user to the database

    session_start(); // Start session to track user data

    // If the user is already logged in, redirect to the homepage
    if (isset($_SESSION["user_login"])) {

        header("Location: homepage.php");

    }

    include("../db_connect.php"); // Include database connection file
    include("../functions.php"); // Include functions file

    try {

        $conn = dbconnect(); // Establish database connection

        // Validate password using the password_check function
        if (password_check($_POST["password"], $_POST["cpassword"]) == false) {

            echo "<meta http-equiv='refresh' content='2;url=register.php'>"; // Redirect after 4 seconds
            echo "Password issue. Make sure it is at least 8 characters and matches.";

        } else {
            $hpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

        }

        // Address line 2 is optional, set a default value if empty
        $al2 = !empty($_POST['al2']) ? $_POST['al2'] : " ";

        $signup_date = time(); // Capture current timestamp

        // SQL statement to insert user data into the database
        $sql = "INSERT INTO users (first_name, last_name, email, password, signup_date, address_line_1, address_line_2, postcode, city) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql); // Prepare SQL query

        // Securely bind parameters to prevent SQL injection
        $stmt->bindParam(1, $_POST['first_name']);
        $stmt->bindParam(2, $_POST['last_name']);
        $stmt->bindParam(3, $_POST['email']);
        $stmt->bindParam(4, $hpassword);
        $stmt->bindParam(5, $signup_date);
        $stmt->bindParam(6, $_POST['al1']);
        $stmt->bindParam(7, $al2);
        $stmt->bindParam(8, $_POST['postcode']);
        $stmt->bindParam(9, $_POST['city']);

        $stmt->execute(); // Execute the query to insert user data

        // Set session variables for user login
        $_SESSION['user_login'] = true;
        $_SESSION['email'] = $_POST["email"];

        // Retrieve user ID based on email
        $sql = "SELECT user_id FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $_POST['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        $userid = $result["user_id"];

        $_SESSION['userid'] = $userid; // Store user ID in session

        echo "<meta http-equiv='refresh' content='2;url=homepage.php'>"; // Redirect after 4 seconds
        echo "<link rel='stylesheet' type='css' href='../styles.css'>";
        echo "Heading to homepage"; // Display message

    } catch (PDOException $e) {

        // Output error message if registration fails
        echo "Registration failed: " . $e->getMessage();
    }