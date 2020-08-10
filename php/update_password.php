<?php
$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$query = "UPDATE user_info Set password = '$password' WHERE email='$email'";

if(mysqli_query($conn,$query))
    echo "Updated";
else
    echo "Failed To Update";

mysqli_close($conn);

?>