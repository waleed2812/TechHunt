<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$email = $_REQUEST['email'];
$item_id = $_REQUEST['item_id'];
$cart_wl = $_REQUEST['cart_wl'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT ID FROM $cart_wl WHERE email='$email'";


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result);

for ($i = 0 ; $i < mysqli_num_rows($result) ; $i++)
{
    if($row[$i][0] == $item_id)
    {
        echo ("Already Added in ".$cart_wl);
        die();
    }
}

if($cart_wl == "cart")
{
    $sql = 'SELECT available,title FROM item_info WHERE ID ="' . $item_id . '"';

    $result = mysqli_query($conn, $sql);

    $item_info = mysqli_fetch_array($result);

    if($item_info[0] <= 0)
    {
        echo $item_info[1].': Not Enough Units Available';
        mysqli_close($conn);
        die();
    }
}

$sql = "INSERT INTO $cart_wl (email, ID) VALUES ('$email','$item_id')";

if(mysqli_query($conn, $sql))
    echo "Added to ".$cart_wl;
else
    echo "Failed to Add";

mysqli_close($conn);


?>