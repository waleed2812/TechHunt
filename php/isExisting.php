<?php
$email = $_REQUEST['email'];

//echo $email;

$connection = mysqli_connect("localhost","root","","tech_hunt");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT email FROM user_info WHERE email='$email'";

$result = mysqli_num_rows(mysqli_query($connection,$query));

if($result != 0)
    echo "Exists";
else
    echo "Does Not Exists";

mysqli_close($connection);

?>