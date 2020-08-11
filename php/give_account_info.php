<?php
session_start();
if (!isset($_SESSION['email']))
{
    echo "Session Expired";
    die();
}
$email = $_POST['email'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$email = mysqli_real_escape_string($conn,$_REQUEST['email']);

$sql = "SELECT * FROM user_info WHERE email=?";

// Preparing Template
$selectresult = mysqli_prepare($conn,$sql);

// Binding Variables
mysqli_stmt_bind_param($selectresult,"s",$email);

//Binding Result
$result = array();
mysqli_stmt_bind_result($selectresult, $result[0],$result[1],$result[2],$result[3],$result[4],$result[5],
    $result[6],$result[7],$result[8],$result[9],$result[10]);

// Executing Statement
mysqli_stmt_execute($selectresult);

//Storing Result
mysqli_stmt_store_result($selectresult);

// Fetching Result
mysqli_stmt_fetch($selectresult);

$gender = "";
if($result[5] == "M")
    $gender = 'male';
elseif ($result[5] == "F")
    $gender = 'female';
else
    $gender = 'other';

echo '
<script type="text/javascript">

    $("#email").val("'.$result[0].'");
    
    $("#fname").val("'.$result[1].'");
    
    $("#lname").val("'.$result[2].'");
    
    $("#phone_code").val("'.$result[3].'");
    
    $("#phone").val("'.$result[4].'");
    
    $("#'.$gender.'").attr("checked","checked");
    
    $("#street_address").val("'.$result[7].'");
        
    $("#city").val("'.$result[8].'");
    
    $("#zip").val("'.$result[9].'");
    
    $("#country").val("'.$result[10].'");
        

</script>';

mysqli_stmt_close($selectresult);
mysqli_close($conn);

?>