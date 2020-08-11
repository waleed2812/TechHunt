<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn,$email) ;
$password = mysqli_real_escape_string($conn,$password) ;

$sql = " SELECT password FROM user_info WHERE email=?";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"s",$email);

//Binding Result
$result = "";
mysqli_stmt_bind_result($selectresult, $result);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

if(mysqli_stmt_num_rows($selectresult) <= 0)
{
    echo "Email Does Not Exists";
    mysqli_stmt_close($selectresult);
    die();
}
// Fetching Result
mysqli_stmt_fetch($selectresult);

if($result != $password)
{
    echo "Password Does Not Match";
    mysqli_stmt_close($selectresult);
    die();
}
echo "Successfully Logged in";

mysqli_stmt_close($selectresult);
$_SESSION['email'] = $email;
?>