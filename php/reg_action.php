<?php
$conn=mysqli_connect("localhost","root","","tech_hunt");
if (!$conn) {
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

    $phone_code = test_input($_POST['phone_code']);

    $phone += 0;
    $zip += 0;
    $phone_code +=0;

    $email = mysqli_real_escape_string($conn,$email);
    $first_name = mysqli_real_escape_string($conn,$first_name);
    $last_name = mysqli_real_escape_string($conn,$last_name);
    $password = mysqli_real_escape_string($conn,$password);
    $gender = mysqli_real_escape_string($conn,$gender);
    $city = mysqli_real_escape_string($conn,$city);
    $country = mysqli_real_escape_string($conn,$country);
    $zip = mysqli_real_escape_string($conn,$zip);
    $address = mysqli_real_escape_string($conn,$address);
    $phone = mysqli_real_escape_string($conn,$phone);
    $phone_code = mysqli_real_escape_string($conn,$phone_code);


    $sql = "SELECT email FROM user_info WHERE email=?";

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"s",$email);

    //Binding Result
    $result = array();
    mysqli_stmt_bind_result($selectresult, $result);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    // Fetching Result
    mysqli_stmt_fetch($selectresult);

    if(mysqli_stmt_num_rows($selectresult) != 0)
    {
        die ("Email Already Exists");
        mysqli_stmt_close($selectresult);
        mysqli_close($conn);
    }

    $sql = "INSERT INTO user_info
    (email,first_name, last_name, phone_code,phone, gender, password, address, city, zip, country)
    VALUES
    (?,?,?,?,?,?,?,?,?,?,?)";


    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"sssssssssss",$email,
        $first_name,$last_name,$phone_code,$phone,$gender,$password,$address,$city,$zip,$country
    );

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    // Fetching Result
    mysqli_stmt_fetch($selectresult);

    if(mysqli_stmt_num_rows($selectresult) <= 0)
        echo "Uploaded";
    else
        die("Query Failed");

    mysqli_stmt_close($selectresult);
    mysqli_close($conn);
    header('Location: https://localhost/signin.html');
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>