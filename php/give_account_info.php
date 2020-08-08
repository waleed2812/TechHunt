<?php
$email = $_POST['email'];

$conn = mysqli_connect("localhost", "root", "", "tech_hunt");

if(mysqli_connect_error())
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM user_info WHERE email='$email'";


$result =mysqli_fetch_array(mysqli_query($conn, $sql));
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

mysqli_close($conn);

?>