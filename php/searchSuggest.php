<?php

$searchterm = $_REQUEST['search'];

if(strlen($searchterm) > 0)
{

    $conn = mysqli_connect("localhost", "root", "", "tech_hunt");

    if(mysqli_connect_error())
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT ID,title FROM item_info WHERE title LIKE '$searchterm%'";

    $selectresult = mysqli_query($conn, $sql);

//    echo "<ul class='pl-1'>";
    if(mysqli_num_rows($selectresult) > 0)
    {
        while($row = mysqli_fetch_array($selectresult))
        {
            echo "<a class='item dropdown-item' href='#' onclick='show_description(".$row["ID"].")'>".$row["title"]."</a>";
        }
    }
//    echo "</ul>";
    mysqli_close($conn);

}

?>
