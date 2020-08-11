<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$email = $_REQUEST['email'];
$ID = $_REQUEST['ID'];
$cart_wl = $_REQUEST['cart_wl'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "DELETE FROM $cart_wl WHERE ID ='$ID' AND email='$email'";

$result = (mysqli_query($conn, $sql));

if($result)
    echo "Removed";
else
    echo $sql;




mysqli_close($conn);

?>