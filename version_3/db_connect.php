<?php
// Function to establish a secure database connection
function dbconnect(){

    // Database credentials
    $servername = "localhost";
    $dbusername = "rolsa";
    $dbpassword = "password";
    $dbname = "rolsa";

    try{ // Attempt to connect to the database

        // Creating a new PDO connection instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
        return $conn; // Return the connection object

    }catch(PDOException $e){ // Catch errors if connection fails

        // Output the error message
        echo "Connection failed: " . $e->getMessage();

    }

}