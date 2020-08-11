<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$conn=mysqli_connect("localhost","root","","tech_hunt");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = test_input($_POST['fname']);
    $last_name = test_input($_POST['lname']);
    $email = test_input($_POST['email']);
    $nemail = test_input($_POST['nemail']);
    $city = test_input($_POST['city']);
    $country = test_input($_POST['country']);
    $zip = test_input($_POST['zip']);
    $address = test_input($_POST['street_address']);
    $phone = $_POST['phone'];
    $price = $_POST['price'];
    $phone_code = test_input($_POST['phone_code']);

    if(substr($phone,0,1) == '0')
        $phone = substr($phone,1);
    $phone += 0;
    $zip += 0;
    $phone_code +=0;

    $email = mysqli_real_escape_string($conn,$email);

    $sql = "SELECT ID FROM cart WHERE email =? ";

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"s",$email);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    $item_ids_count = mysqli_stmt_num_rows($selectresult);

    for( $i = 0 ; $i < $item_ids_count ; $i++ )
    {
        //Binding Result
        $result = "";
        mysqli_stmt_bind_result($selectresult,$result);

        // Fetching Result
        mysqli_stmt_fetch($selectresult);

        $sql = 'SELECT available,title FROM item_info WHERE ID =?';

        // Preparing Template
        $selectresult2 = mysqli_prepare($conn,$sql);

        // Binding Variables
        mysqli_stmt_bind_param($selectresult2,"s",$result);

        // Executing Statement
        mysqli_stmt_execute($selectresult2);

        //Storing Result
        mysqli_stmt_store_result($selectresult2);

        //Binding Result
        $available = "";$title = "";
        mysqli_stmt_bind_result($selectresult2,$available,$title);

        // Fetching Result
        mysqli_stmt_fetch($selectresult2);

        if($available <= 0)
        {
            die($title.$available.': Not Enough Units Available');
        }
        else
        {
            $temp2 = $available - 1;
            $temp2 = mysqli_real_escape_string($conn,$temp2);

            $sql = 'UPDATE item_info SET available=? WHERE ID=?';

            // Preparing Template
            $selectresult2 = mysqli_prepare($conn,$sql);

            // Binding Variables
            mysqli_stmt_bind_param($selectresult2,"ss",$temp2,$result);

            // Executing Statement
            mysqli_stmt_execute($selectresult2);

            //Storing Result
            mysqli_stmt_store_result($selectresult2);

            //Closing Connection
            mysqli_stmt_close($selectresult2);

        }

    }

    $nemail = mysqli_real_escape_string($conn,$nemail);
    $first_name = mysqli_real_escape_string($conn,$first_name);
    $last_name = mysqli_real_escape_string($conn,$last_name);
    $phone_code = mysqli_real_escape_string($conn,$phone_code);
    $phone = mysqli_real_escape_string($conn,$phone);
    $address = mysqli_real_escape_string($conn,$address);
    $city = mysqli_real_escape_string($conn,$city);
    $zip = mysqli_real_escape_string($conn,$zip);
    $country = mysqli_real_escape_string($conn,$country);
    $price = mysqli_real_escape_string($conn,$price);



    // Placing Order
    $sql = "INSERT INTO orders
    (email,first_name, last_name, phone_code,phone, address, city, zip, country,payable_amount)
    VALUES (?,?,?,?,?,?,?,?,?,?)";

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"ssssssssss",$nemail,$first_name,$last_name,$phone_code,
        $phone,$address,$city,$zip,$country,$price);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    if (mysqli_stmt_num_rows($selectresult) <= 0)
    {
        echo '<div class="confirmation ml-5 mt-5" style="color: green;font-size: 100px;">
                <p><i class="fa fa-check-circle"></i> Order Placed</p></div>';
    }
    else
    {
        echo '<div class="confirmation ml-5 mt-5" style="color: red;font-size: 100px;">
                <p><i class="fa fa-check-circle"></i> Order Placed</p></div>';
    }

    $sql = "DELETE FROM cart WHERE email=?";

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"s",$email);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    // CLosing Connection
    mysqli_stmt_close($selectresult);
    mysqli_close($conn);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>