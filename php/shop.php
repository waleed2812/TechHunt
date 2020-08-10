<?php
$category = $_REQUEST['category'];
$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM item_info where category = '$category'";
$result = mysqli_query($conn, $sql);
////$row = mysqli_fetch_array($result);
//echo $row[0];
echo "\n";
$count = 0 ;
if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_array($result)){
        echo '
        <div class="row">
                    <div class="col-sm-4">
                        <figure>
                            <img src="'.$row[6].'" height=auto width="100%">
                        </figure>
                    </div>
                    <div class="col-sm-5" >
                        <a href="">'.$row[1].'</a>
                        <div>
                            <p><span style="color: gray;">Category: </span>'.$row[3].'</p>
                            <p><span style="color: gray;">Code: </span>'.$row[0].'</p>
                            <p><span style="color: gray;">Code: </span>'.$row[7].'</p>
                            <p>
                           '.$row[2].'
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p><span style="color: lightgrey;">Availability: </span> '.$row[5].'</p>
                        <p><span style="color: lightgrey;">Price: </span> '.$row[4].'</p>
                        <a class="btn btn-light" style="background: yellow;" onclick="add_to_cart('.$row[0].')">Add to Cart <i class="fa fa-shopping-cart"></i></a>
                        <br><br>
                        <a class="btn btn-outline-light" onclick="add_to_wl('.$row[0].')">Add to Wishlist <i class="fa fa-heart-o"></i></a>

                    </div>
                </div>
                <hr>';

    }
}

