<?php
//page to logout and destroy all session variables and data being held

// get session variables
session_start();
//destroy session variables
session_destroy();
// take the user to index
header("Location: index.php");