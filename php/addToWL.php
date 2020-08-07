<?php
$email = $_REQUEST['email'];
$item_id = $_REQUEST['item_id'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT item_id FROM wishlist WHERE email='$email'";


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result);

for ($i = 0 ; $i < mysqli_num_rows($result) ; $i++)
{
    if($row[$i][0] == $item_id)
    {
        echo ("Already Added in Wishlist");
        die();
    }
}

$sql = "INSERT INTO wishlist (email, item_id) VALUES ('$email','$item_id')";

mysqli_query($conn, $sql);

mysqli_close($conn);

echo "Added to Wishlist";
?>