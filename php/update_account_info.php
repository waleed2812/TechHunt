<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$email = $_POST['email'];
$oemail = $_POST['oemail'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone_code = $_POST['phone_code'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$street_address = $_POST['street_address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM user_info WHERE email='$oemail'";


$result =mysqli_fetch_array(mysqli_query($conn, $sql));
if($email == "")
    $email = $oemail;
if($fname == "")
    $fname = $result[1];
if($lname == "")
    $lname = $result[2];
if($phone_code == "")
    $phone_code = $result[3];
if($phone == "")
    $phone = $result[4];
if($street_address == "")
    $street_address = $result[7];
if($city == "")
    $city = $result[8];
if($zip == "")
    $zip = $result[9];

if($oemail != $email)
{
    $query = "SELECT email FROM user_info WHERE email='$email'";

    $result = mysqli_num_rows(mysqli_query($conn,$query));

    if($result != 0)
    {
        echo "Email Already Exists";
        mysqli_close($conn);
        die();
    }
}
$phone += 0;
$phone_code +=0;
$zip += 0;

$query = "
UPDATE user_info 

Set email = '$email', first_name='$fname', last_name='$lname', 
    phone_code=$phone_code, phone=$phone , gender = '$gender' , 
    address = '$street_address' , city = '$city' , zip = $zip , 
    country = '$country'

WHERE email='$oemail'";

if(mysqli_query($conn,$query))
    echo "Updated";
else
    echo "Failed To Update";

mysqli_close($conn);

?>