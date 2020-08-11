<?php
session_start();

if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}

// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "Logged Out";
?>