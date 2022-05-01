<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");
$manager_id = $_GET['manager_id'];

$query="DELETE from hotel where manager_id='$manager_id'";
$data=mysqli_query($connect,$query);
if($data)
{
    echo "<script> alert('record deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/restaurant/HotelDetails.php"/>
    <?php

}
else{
    echo " failed to delete";
}
?>