<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");
$item_id = $_GET['item_id'];

$query="DELETE from menu where item_id='$item_id'";
$data=mysqli_query($connect,$query);
if($data)
{
    echo "<script> alert('record deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/restaurant/MenuDetails.php"/>
    <?php

}
else{
    echo " failed to delete";
}
?>