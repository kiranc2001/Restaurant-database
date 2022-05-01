<?php
$connect=mysqli_connect("localhost","root","","userpass") or die("connection failed");
if(!empty($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="select * from uspas where username='$username' and password='$password' ";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        header("location:first.php");
    }
    else{
        echo "<script> alert('login not successfull') </script>";
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
    margin-top: 27px;
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
        <div class="icon">
            <h2 class="logo">SJMH</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                
            </ul>
        </div>
        
        <form class="box" action="index.php" method="post">
            <h1>Admin  Login</h1>
            <input type="text" name="username" placeholder="Enter username" required id="username">
            <input type="password" name="password" placeholder="Enter password" required id="password">
             <input type="submit" name="login" value="login">
        </form>
    </body>
</html>