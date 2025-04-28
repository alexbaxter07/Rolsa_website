<?php
// Page containing commonly used functions to avoid code repetition across the system

// Function to check password validity
function password_check($password, $cpassword){

    // Check if passwords match
    if($password != $cpassword){
        return false;
    }
    // Check if password length is at least 8 characters
    elseif (strlen($password)<8){
        return false;
    }
    // If both conditions are met, return true
    else{
        return true;
    }
}