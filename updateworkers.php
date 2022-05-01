<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");
$worker_id = $_GET['worker_id'];
$sql = "SELECT * FROM workers where worker_id='$worker_id'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
?>
<?php
$connect=mysqli_connect("localhost","root","","restaurant") or die("connection failed");

if(isset($_POST['submit']))
{
   
    $worker_id=$_POST['worker_id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $phone=$_POST['phone'];
    $sql_query="update workers set worker_id='$worker_id',name='$name',address='$address',salary='$salary',phone='$phone' where worker_id='$worker_id' ";

        if(mysqli_query($connect,$sql_query))
        {
            echo "<script> alert('record updated')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url =http://localhost/restaurant/WorkersDetails.php"/>
    <?php
        }
        else{
            echo "error: " .$sql_query . "" .mysqli_error($connect);
        }
        mysqli_close($connect);
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
    margin-top: 20px;
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
    padding: 10px;
    position: absolute;
    top: 55%;
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
               
                <li><a href="workers.php">Workers</a></li>
                
            </ul>
        </div>
       

           
        <form class="box" action="updateworkers.php" method="post">
            <h1> UPDATE WORKERS</h1>

           
            <input type="text" name="worker_id" value="<?php echo $row['worker_id'];?>" placeholder="worker_id" required>
            <input type="text" name="name" value="<?php echo $row['name'];?>" placeholder="name" required>
            <input type="text" name="address" value="<?php echo $row['address'];?>" placeholder="address" required>
            <input type="text" name="salary" value="<?php echo $row['salary'];?>" placeholder="salary" required>
            <input type="text" name="phone" value="<?php echo $row['phone'];?>" placeholder="phone" required>
            <input type="submit" name="submit" value="Update" onclick="valid()">
         </form>
     </body>
 </html>