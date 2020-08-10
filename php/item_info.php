<?php
$item_id = $_REQUEST['id'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM item_info WHERE id ='$item_id' ";

$selectresult = mysqli_fetch_array(mysqli_query($conn, $sql));


    echo '<!--Item Description popup-->

<div id="description" class="container bg-light">
    <div class="row">
        <button class="btn btn-danger ml-auto" onclick="close_description()"><i class="fa fa-close"></i></button>
    </div>
    <div class="row p-5">
        <div class="col-sm-4">
            <figure>
                <img src="'.$selectresult[6].'" width="100%" height="300px">
            </figure>
        </div>
        <div class="col-sm-5" >
            <a href="">'.$selectresult[1].'</a>
            <div>
                <p><span style="color: gray;">Category: </span>'.$selectresult[3].'</p>
                <p><span style="color: gray;">Price: </span>'.$selectresult[4].' $</p>
                <p><span style="color: gray;">Company: </span>'.$selectresult[7].' $</p>
                <p>
                    '.$selectresult[2].'
                </p>
            </div>
        </div>
        <div class="col-sm-3">
            <p><span style="color: darkgray;">Availability: </span> '.$selectresult[5].'</p>
            <a class="btn btn-warning" onclick="add_to_cart_wl('.$selectresult[0].',\'cart\')">
                Add to Cart <i class="fa fa-shopping-cart"></i>
            </a>
            <br><br>
            <a class="btn btn-warning" onclick="add_to_cart_wl('.$selectresult[0].',\'wishlist\')">Add to Wishlist</a>
        </div>
    </div>
</div>
<!--./Item Description popup-->';


mysqli_close($conn);

?>