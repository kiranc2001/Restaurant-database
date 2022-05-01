<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");
$order_id = $_GET['order_id'];

$query="DELETE from orders where order_id='$order_id'";
$data=mysqli_query($connect,$query);
if($data)
{
    echo "<script> alert('record deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/restaurant/OrdersDetails.php"/>
    <?php

}
else{
    echo " failed to delete";
}
?>