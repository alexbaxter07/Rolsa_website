<?php
//used as a function so that the connection and passwords are passed around the system securley and are only being used when needed=
function dbconnect(){

    $servername = "localhost";
    $dbusername = "rolsa";
    $dbpassword = "password";
    $dbname = "rolsa";

    try{ //attempt this block of code

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword); // creates connection to the database
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // sends  connection status to where it was called from

    }catch(PDOException $e){ // catch error in case it fails

        echo "Connection failed: " . $e->getMessage(); //output the error

    }

}