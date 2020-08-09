<?php
$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(isset($_COOKIE['email']))
{
    if($_COOKIE['email'] == $email)
    {
        echo "Already Logged in";
        die();
    }
}

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
if($row[0][0] != $password)
{
    echo "Password Does Not Match";
    mysqli_close($conn);
    die();
}
echo "Successfully Logged in";
setcookie('email',$email);

mysqli_close($conn);

?>