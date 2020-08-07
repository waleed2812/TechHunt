<?php
$connection=mysqli_connect("localhost","root","","tech_hunt");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = test_input($_POST['email']);

    $password = $_POST['password'];

    $query = "SELECT * from user_info where 'email' = '$email' and 'password' = '$password';";

    $result = mysqli_query($connection,$query);

    $count = mysqli_num_rows($result);
    if ($count == 0){
        die("Invalid email or password");
    }
    else{
        $_SESSION['login_user'] = $email;
        header('Location: index.html');
    }

    mysqli_close($connection);
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>