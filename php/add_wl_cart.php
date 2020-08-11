<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn,$_REQUEST['email']);
$item_id = mysqli_real_escape_string($conn,$_REQUEST['item_id']);
$cart_wl = mysqli_real_escape_string($conn,$_REQUEST['cart_wl']);


$sql = "SELECT ID FROM ".$cart_wl." WHERE email=? AND ID=?";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"ss",$email,$item_id);

//Binding Result
$result = array();
mysqli_stmt_bind_result($selectresult, $result);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);

if(mysqli_stmt_num_rows($selectresult)) {
    echo "Already Added in ".$cart_wl;
    die();
}

if($cart_wl == "cart")
{
    $sql = 'SELECT available,title FROM item_info WHERE ID =?';

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult,"s",$item_id);

    //Binding Result
    mysqli_stmt_bind_result($selectresult, $result[0],$result[1]);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    // Fetching Result
    mysqli_stmt_fetch($selectresult);

    if($result[0] <= 0)
    {
        echo $result[1].': Not Enough Units Available';
        mysqli_close($conn);
        die();
    }
}

$sql = "INSERT INTO $cart_wl (email, ID) VALUES (?,?)";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"ss",$email,$item_id);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);


if(mysqli_stmt_num_rows($selectresult) <= 0)
    echo "Added to ".$cart_wl;
else
    echo "Failed to Add";

mysqli_close($conn);
mysqli_stmt_close($selectresult);

?>