<?php
$email = $_REQUEST['email'];
$item_id = $_REQUEST['item_id'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT available FROM item_info WHERE id='$item_id'";

$result = mysqli_fetch_array(mysqli_query($conn, $sql));

if($result[0] <= 0) {
    echo ("Not Enough Items Available");
    die();
}

$sql = "INSERT INTO cart (email, item_id) VALUES ('$email','$item_id')";

mysqli_query($conn, $sql);

mysqli_close($conn);

echo "Added to cart";
?>