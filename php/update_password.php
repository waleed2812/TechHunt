<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}

$email = $_POST['email'];
$password = $_POST['password'];
$opassword = $_POST['opassword'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = " SELECT password FROM user_info WHERE email='$email' ";


$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_all($result);

if(mysqli_num_rows($result) <= 0)
{
    echo "Email Does Not Exists";
    mysqli_close($conn);
    die();
}
if($row[0][0] != $opassword)
{
    echo "Wrong Old Password";
    mysqli_close($conn);
    die();
}


$query = "UPDATE user_info Set password = '$password' WHERE email='$email' AND password='$opassword'";

if(mysqli_query($conn,$query))
    echo "Updated";
else
    echo "Failed To Update";

mysqli_close($conn);

?>