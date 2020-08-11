<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$email = $_REQUEST['email'];
$cart_wl = $_REQUEST['cart_wl'];

$text = "";

if($cart_wl == "cart")
{
    $text = 'wishlist';
}
else
{
    $text = 'cart';
}

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT ID FROM $cart_wl WHERE email ='$email' ";

$result = (mysqli_query($conn, $sql));
$item_ids_count = mysqli_num_rows($result);
$item_ids = mysqli_fetch_all($result);

for( $i = 0 ; $i < $item_ids_count ; $i++ )
{

    $sql = 'SELECT title, price,image FROM item_info WHERE ID ="'.$item_ids[$i][0].'"';

    $result = mysqli_query($conn, $sql);

    $item_info = mysqli_fetch_array($result);




    echo '
        <div id="'.$item_ids[$i][0].'" class="row my-3 bg-white">
            <div class="col-md-3">
                <figure>
                    <img src="'.$item_info[2].'" width="100%" height="auto">
                </figure>
            </div>
            <div class="col-md-9">
                <h1 class="h1">'.$item_info[0].'</h1>
                <h2 class="h2">Price: '.$item_info[1].' Rs</h2>
                <button class="btn btn-light mb-2" onclick="add_to_cart_wl('.$item_ids[$i][0].',\''.$text.'\')">Add to '.$text.'</button>
                <button class="btn btn-light mb-2" 
                onclick="remove_from_cart_wl('.$item_ids[$i][0].',\''.$cart_wl.'\')">Remove From '.$cart_wl.'</button>
            </div>
        </div>
        ';

}


mysqli_close($conn);

?>