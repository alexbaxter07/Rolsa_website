<?php
//page for functions to only be used by staff pages

//function to check for valid email
function valid_email($email){

    //valid email phrase
    $phrase = "@rtechnologies.com";

    //if email does not contain valid phrase
    if(strpos($email, $phrase) == false){

        //send false to where it has been called
        return false;

    } else { // if email does contain valid phrase

        //send true back to where it has been called from
        return true;

    }

}