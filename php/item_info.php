<?php
$item_id = $_REQUEST['id'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$item_id = mysqli_real_escape_string($conn,$item_id) ;

$sql = "SELECT * FROM item_info WHERE id ='$item_id' ";

$selectresult = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param($selectresult,"i",$item_id);

//Binding Result
$result = array();
mysqli_stmt_bind_result($selectresult, $result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],
    $result[7]);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);

// Checking Availablity
$avail = "In Stock";
if($result[5] <= 0)
    $avail = "Out Of Stock";
    echo '<!--Item Description popup-->

<div id="description" class="container bg-light">
    <div class="row">
        <button class="btn btn-danger ml-auto" onclick="close_description()"><i class="fa fa-close"></i></button>
    </div>
    <div class="row p-5">
        <div class="col-md-4">
            <figure>
                <img src="'.$result[6].'" width="100%" height="300px">
            </figure>
        </div>
        <div class="col-md-5" >
            <a href="">'.$result[1].'</a>
            <div>
                <p><span style="color: gray;">Category: </span>'.$result[3].'</p>
                <p><span style="color: gray;">Price: </span>'.$result[4].' $</p>
                <p><span style="color: gray;">Company: </span>'.$result[7].' $</p>
                <p>
                    '.$result[2].'
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <p><span style="color: darkgray;">Availability: </span> '.$avail.'</p>
            <a class="btn btn-warning" onclick="add_to_cart_wl('.$result[0].',\'cart\')">
                Add to Cart <i class="fa fa-shopping-cart"></i>
            </a>
            <br><br>
            <a class="btn btn-warning" onclick="add_to_cart_wl('.$result[0].',\'wishlist\')">Add to Wishlist</a>
        </div>
    </div>
</div>
<!--./Item Description popup-->';


mysqli_close($conn);

?>