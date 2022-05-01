<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");
$customer_id = $_GET['customer_id'];

$query="DELETE from customer where customer_id='$customer_id'";
$data=mysqli_query($connect,$query);
if($data)
{
    echo "<script> alert('record deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/restaurant/CustomerDetails.php"/>
    <?php

}
else{
    echo " failed to delete";
}
?>