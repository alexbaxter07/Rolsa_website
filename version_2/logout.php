<?php
//page to logout and destroy all session variables and data being held
session_start();
session_destroy();
header("Location: index.php");