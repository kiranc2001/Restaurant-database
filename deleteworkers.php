<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");
$worker_id = $_GET['worker_id'];

$query="DELETE from workers where worker_id='$worker_id'";
$data=mysqli_query($connect,$query);
if($data)
{
    echo "<script> alert('record deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/restaurant/WorkersDetails.php"/>
    <?php

}
else{
    echo " failed to delete";
}
?>