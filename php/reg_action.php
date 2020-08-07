<?php
$connection=mysqli_connect("localhost","root","","tech_hunt");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST['fname']);
    $last_name = test_input($_POST['lname']);
    $email = test_input($_POST['email']);

    $password = $_POST['password'];

    $gender = test_input($_POST['gender']);

    $city = test_input($_POST['city']);

    $country = test_input($_POST['country']);

    $zip = test_input($_POST['zip']);

    $address = test_input($_POST['street_address']);

    $phone = $_POST['phone'];

    if(substr($phone,0,1) == '0')
        $phone = substr($phone,1);

    $phone = $_POST['phone_code'].$phone;

    $phone += 0;
    $zip += 0;




    $query = "INSERT INTO user_info
    (email,first_name, last_name, phone, gender, password, address, city, zip, country)
    VALUES
    ('$email','$first_name','$last_name',$phone,'$gender', '$password','$address','$city',$zip,'$country')";

    echo gettype($phone);

    $temp = mysqli_query($connection, $query);
    if ($temp)
        echo "Uploaded";
    else
        die("Query Failed");

    mysqli_close($connection);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>