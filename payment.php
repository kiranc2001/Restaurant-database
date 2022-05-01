<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="restaurant";
$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(isset($_POST['submit']))
{
    
    
    $order_id = $_POST['order_id'];
    $bill = $_POST['bill'];
    $payment_mode=$_POST['payment_mode'];
    $sql_query="INSERT INTO payment (order_id,bill,payment_mode) VALUES ('$order_id','$bill','$payment_mode')";
    if(mysqli_query($conn, $sql_query))
    {
    echo "<script type='text/javascript'>alert('Payment Successfully');</script>";
    }
    else
    {
    echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lan="en" and dir="Itr">
    <head>
        <meta charset="utf-8">
        <title> Hotel login</title>
        <style>
            body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url(volkan-vardar-1H30uRC1plc-unsplash\ \(1\).jpg);
    background-size: cover;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-size: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;

}

menu{
    width: 400px;
    float: left;
    height: 70px;

}


ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: -1px;
    font-size: 14px;
}

ul li a{
    text-decoration: none;
    color: #fff;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
    color: #ff7200;
}

.box{
    width: 300px;
    padding: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: rgba(0, 0, 0, 0.336);
    text-align: center;
}
.box h1{
    color: rgb(255, 255, 255);
    text-transform: uppercase;
    font-weight: 700;
}
.box input[type="text"],.box input[type="password"]
{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 3px solid #fd2903;
    padding: 14px 10px;
    width: 220px;
    outline: none;
    color: rgb(255, 255, 255);
    border-radius: 24px;
    transition: 0.25px;

}
.box input[type="text"]:focus,.box input[type="password"]:focus
{
    width: 270px;
    border-color: #ffc400;
}
.box input[type="submit"]
{
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 3px solid #ffc400;
    padding: 14px 10px;
   
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25px;  
    cursor: pointer;
}
.box input[type="submit"]:hover
{
    background: #ffc400;
}
</style>
        <script src="script.js"></script>
    </head>
    <body>

        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="first.php">Hotel</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="workers.php">Workers</a></li>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="orders.php">orders</a></li>
                <li><a href="payment.php">Payment</a></li>
                <li><a href="PaymentDetails.php">Payment list</a></li>
                
            </ul>
        </div>
       

           
        <form class="box" action="payment.php" method="post">
            <h1>Payment</h1>

            <input type="text" name="order_id" placeholder="order_id" required>
            <input type="text" name="bill" placeholder="bill" required>
            <input type="text" name="payment_mode" placeholder="payment_mode" required>
            <input type="submit" name="submit" value="submit" onclick="valid()">
            
         </form>
     </body>
 </html>