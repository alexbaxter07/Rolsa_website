<?php

function valid_email($email){
    $phrase = "@rtechnologies.com";
    if(strpos($email, $phrase) == false){
        return false;
    } else {
        return true;
    }
}