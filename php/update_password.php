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

$email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
$opassword = mysqli_real_escape_string($conn,$opassword);

$sql = " SELECT password FROM user_info WHERE email=? ";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"s",$email);

// Binding Result
$pass_rec = "";
mysqli_stmt_bind_result($selectresult,$pass_rec);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);

if(mysqli_stmt_num_rows($selectresult) <= 0)
{
    echo "Email Does Not Exists";
    mysqli_stmt_close($selectresult);
    mysqli_close($conn);
    die();
}
if($pass_rec != $opassword)
{
    echo "Wrong Old Password";
    mysqli_stmt_close($selectresult);
    mysqli_close($conn);
    die();
}

$sql = "UPDATE user_info Set password =? WHERE email=? AND password=?";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"sss",$password,$email,$opassword);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);

if(mysqli_stmt_num_rows($selectresult) <= 0)
    echo "Updated";
else
    echo "Failed To Update";

mysqli_close($conn);
mysqli_stmt_close($selectresult);

?>