<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$email = $_POST['email'];
$oemail = $_POST['oemail'];
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$phone_code = $_POST['phone_code'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['street_address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM user_info WHERE email=?";

$oemail = mysqli_real_escape_string($conn,$email);

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"s",$email);

//Binding Result
$result = array();
mysqli_stmt_bind_result($selectresult, $result[0],$result[1],$result[2],$result[3],$result[4],$result[5],
    $result[6],$result[7],$result[8],$result[9],$result[10],);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);

if($email == "")
    $email = $oemail;
if($first_name == "")
    $first_name = $result[1];
if($last_name == "")
    $last_name = $result[2];
if($phone_code == "")
    $phone_code = $result[3];
if($phone == "")
    $phone = $result[4];
if($address == "")
    $address = $result[7];
if($city == "")
    $city = $result[8];
if($zip == "")
    $zip = $result[9];

if($oemail != $email)
{
    $sql = "SELECT email FROM user_info WHERE email=?";

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"s",$email);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    // Fetching Result
    mysqli_stmt_fetch($selectresult);

    if(mysqli_stmt_num_rows($selectresult) != 0)
    {
        echo "Email Already Exists";
        mysqli_close($conn);
        die();
    }
}
$phone += 0;
$phone_code +=0;
$zip += 0;

$email = mysqli_real_escape_string($conn,$email);
$first_name = mysqli_real_escape_string($conn,$first_name);
$last_name = mysqli_real_escape_string($conn,$last_name);
$gender = mysqli_real_escape_string($conn,$gender);
$city = mysqli_real_escape_string($conn,$city);
$country = mysqli_real_escape_string($conn,$country);
$zip = mysqli_real_escape_string($conn,$zip);
$address = mysqli_real_escape_string($conn,$address);
$phone = mysqli_real_escape_string($conn,$phone);
$phone_code = mysqli_real_escape_string($conn,$phone_code);


$sql = "
UPDATE user_info 

Set email =?, first_name=?, last_name=?,phone_code=?,phone=?,gender=?,address=?,city=?,zip=?,country=?

WHERE email=?";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"sssssssssss",$email,$first_name,$last_name,$phone_code,$phone,
    $gender,$address,$city,$zip,$country,$oemail);

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

mysqli_stmt_close($selectresult);
mysqli_close($conn);
?>