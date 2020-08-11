<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}

$cart_wl = $_REQUEST['cart_wl'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
$ID = mysqli_real_escape_string($conn,$_REQUEST['ID']);

$sql = "DELETE FROM $cart_wl WHERE ID =? AND email=?";
// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"ss",$ID,$email);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);


if(mysqli_stmt_num_rows($selectresult) <= 0)
    echo "Removed From ".$cart_wl;
else
    echo "Failed to Remove";

mysqli_close($conn);
mysqli_stmt_close($selectresult);

?>