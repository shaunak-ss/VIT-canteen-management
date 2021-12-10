<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIT CAnteen | vitcanteen.com</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Baloo Bhai',cursive;
        }

        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            text-align: center;
        }

        .menu {
            width: 20%;
            background-color:black;
            opacity: 0.9;
            

        }

        #logo {
            margin: 10px 34px;

        }

        #logo img {
            height: 59px;
            margin: 3px 6px;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            letter-spacing: 2px;
            display: list-item;
            padding: 20px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .menu a:hover {
            background-color: white;
            color: black;
            letter-spacing: 4px;
            text-transform: uppercase;
            border-radius: 30px;

        }
        .body h1{
            text-align: center;
            margin-top: 100px;
            font-size: 4rem;
            margin-left: 230px;
        }
        .body table{
            margin-left: 14%;
            border: 2px solid black;
            padding: 19px;
            display: inline-block;
            border-radius:10px;
            margin-left: 38%;
        }

        .body h1{
            text-align: center;
            margin-top: 40px;
            font-size: 2rem;
            margin-left: 476px;
            margin-bottom: 5%;
        }
        table label{
            float:left;
            font-size:1.2rem;
            margin: 14px;

        }
        table input{
            width: 250px;
            height: 26px;
            
        }
        
        .btn1{
            background-color: black;
            opacity: 0.8;
            color: white;
            text-decoration: none;
            width: 104px;
            height: 34px;
            margin-bottom: 10%;
            margin-top: 10%;
            margin-left: -34%;
            border-radius:10px;
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="menu">
        <div id="logo"><img src="./images/vitlogo2.png"></div>
            <a href="customer.php">Customers</a>
            <a href="foodmenu.php">Food Menu</a>
            <a href="orders.php">Orders</a>
            <a href="logoutadmin.php">Logout</a>

        </div>
        <div class="body">
<?php
include('db.php');
if(!isset($_SESSION['IS_LOGIN1'])){
    header('location:login.php');
    die();
}

$id=mysqli_real_escape_string($con,$_GET['id']);
if(isset($_POST['submit'])){
    $userid=mysqli_real_escape_string($con,$_POST['userid']);
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
    $age=mysqli_real_escape_string($con,$_POST['age']);
	mysqli_query($con,"update user set id='$userid',name='$username', password='$password',age='$age' where id='$userid'");
	
    header('location:customer.php');
	die();
}
$res=mysqli_query($con,"select * from user where id='$id'");

$row=mysqli_fetch_assoc($res);
$userid=$row['id'];
$username=$row['name'];
$password=$row['password'];
$age=$row['age'];


?>
    <h1 style="text-align:center;"><?php echo "Update Customer details Below"?></h1><br><br>

    <div class="body">
    <form method="post">
	        <table>
                <tr>
		        <td><label>Id:</label></td>
		        <td><input type="textbox" name="userid" value="<?php echo $userid?>"/></td>
	            </tr>
	            <tr>
	            <td><label>Name:</label></td>
	            <td><input type="textbox" name="username" value="<?php echo $username?>"/></td>
	            </tr>
	            <tr>
		        <td><label>Password:</label></td>
		        <td><input type="textbox" name="password" value="<?php echo $password?>"/></td>
	            </tr>
	            <tr>
		        <td><label>Age:</label></td>
		        <td><input type="textbox" name="age" value="<?php echo $age?>"/></td>
	            </tr>
	            <tr>
		        <td></td>
		        <td><input type="submit" name="submit" value="Update" class="btn1"/></td>
	            </tr>
	        </table>
    </form>
    </div>

        </div>
    </div>
</body>

</html>