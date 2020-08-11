<?php

$searchterm = $_REQUEST['search'];

if(strlen($searchterm) > 0)
{

    $conn = mysqli_connect("localhost", "root", "", "tech_hunt");

    if(mysqli_connect_error())
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    $searchterm = mysqli_real_escape_string($conn,$searchterm);

    $sql = "SELECT ID,title FROM item_info WHERE title LIKE '$searchterm%'";

    // Preparing Template
    $selectresult = mysqli_prepare($conn,$sql);

    //Binding Result
    $ID = "";$title = "";
    mysqli_stmt_bind_result($selectresult, $ID,$title);

    // Executing Statement
    mysqli_stmt_execute($selectresult);

    //Storing Result
    mysqli_stmt_store_result($selectresult);

    if(mysqli_stmt_num_rows($selectresult) > 0)
    {
        // Fetching Result
        while (mysqli_stmt_fetch($selectresult))
        {
            echo "<a class='item dropdown-item' href='#' onclick='show_description(".$ID.")'>".$title."</a>";
        }

    }

    mysqli_close($conn);
    mysqli_stmt_close($selectresult);

}

?>
