<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$cart_wl = $_REQUEST['cart_wl'];
$text = "";
if($cart_wl == "cart")
    $text = 'wishlist';
else
    $text = 'cart';

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn,$_REQUEST['email']);

$sql = "SELECT ID FROM $cart_wl WHERE email =? ";
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

// Counting Rows
$item_ids_count = mysqli_stmt_num_rows($selectresult);

for( $i = 0 ; $i < $item_ids_count ; $i++ ){
    // Fetching Result
    mysqli_stmt_fetch($selectresult);

    // Getting Item Info
    $sql = 'SELECT title, price,image FROM item_info WHERE ID =?';

    // Preparing Template
    $selectresult2 = mysqli_prepare($conn,$sql);

    // Binding Variables
    mysqli_stmt_bind_param($selectresult2,"s",$result);

    //Binding Result
    $title="";$price="";$image="";
    mysqli_stmt_bind_result($selectresult2, $title,$price,$image);

    // Executing Statement
    mysqli_stmt_execute($selectresult2);

    //Storing Result
    mysqli_stmt_store_result($selectresult2);

    // Fetching Result
    mysqli_stmt_fetch($selectresult2);

    echo '
        <div id="'.$result.'" class="row my-3 bg-white">
            <div class="col-md-3">
                <figure>
                    <img src="'.$image.'" width="100%" height="200px">
                </figure>
            </div>
            <div class="col-md-9">
                <h1 class="h1">'.$title.'</h1>
                <h2 class="h2">Price: '.$price.' Rs</h2>
                <button class="btn btn-light mb-2" onclick="add_to_cart_wl('.$result.',\''.$text.'\')">Add to '.$text.'</button>
                <button class="btn btn-light mb-2" 
                onclick="remove_from_cart_wl('.$result.',\''.$cart_wl.'\')">Remove From '.$cart_wl.'</button>
            </div>
        </div>
        ';

    mysqli_stmt_close($selectresult2);
}

?>