<?php
$email = $_REQUEST['email'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM cart WHERE 'email' ='$email' ";

$selectresult = mysqli_fetch_array(mysqli_query($conn, $sql));


echo '
<div class="row my-3 bg-white">
    <div class="col-md-3">
        <figure>
            <img src="img/lp/1.png" alt="Wishlist Item 1" width="100%" height="auto">
        </figure>
    </div>
    <div class="col-md-9">
        <h1 class="h1">Item Name</h1>
        <h2 class="h2">Price: 20,000 Rs</h2>
        <button class="btn btn-light mb-2">Add to Wishlist</button>
        <button class="btn btn-light mb-2">Remove From Cart</button>
    </div>
</div>
';


mysqli_close($conn);

?>