<?php
$connection=mysqli_connect("localhost","root","","tech_hunt");
if (!$connection) {
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

    if(substr($phone,0,1) == '0')
        $phone = substr($phone,1);

    $phone_code = test_input($_POST['phone_code']);

    $phone += 0;
    $zip += 0;
    $phone_code +=0;


    $sql = "SELECT ID FROM cart WHERE email ='$email' ";

    $result = (mysqli_query($connection, $sql));
    $item_ids_count = mysqli_num_rows($result);
    $item_ids = mysqli_fetch_all($result);

    for( $i = 0 ; $i < $item_ids_count ; $i++ )
    {

        $sql = 'SELECT available,title FROM item_info WHERE ID ="' . $item_ids[$i][0] . '"';

        $result = mysqli_query($connection, $sql);

        $item_info = mysqli_fetch_array($result);

        if($item_info[0] <= 0)
        {
            die($item_info[1].': Not Enough Units Available');
        }
        else
        {
            $temp2 = $item_info[0] - 1;
            $sql = 'UPDATE item_info SET available='.$temp2.' WHERE ID='.$item_ids[$i][0].';';
            mysqli_query($connection, $sql);

        }

    }

    // Placing Order
    $query = "INSERT INTO orders
    (email,first_name, last_name, phone_code,phone, address, city, zip, country,payable_amount)
    VALUES
    ('$nemail','$first_name','$last_name',$phone_code,$phone,'$address','$city',$zip,'$country',$price);  ";

    $temp = mysqli_query($connection, $query);
    if ($temp)
        echo '<div class="confirmation ml-5 mt-5"><p><i class="fa fa-check-circle"></i> Order Placed</p></div>';
    else
        die("Order Failed");

    $query = "DELETE FROM cart WHERE email='$email'";

    mysqli_query($connection, $query);

    mysqli_close($connection);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>